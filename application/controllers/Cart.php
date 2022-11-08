<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('CRUD_model');
    }
    public function index(){
        if ($this->session->userdata('level')!='Pembeli') {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Silahkan login terlebih dahulu untuk menambah produk ke keranjang.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
            redirect('auth/login');   
        } else {
            $site = $this->Konfigurasi_model->listing();
            $data = array(
                'title'                 => 'Keranjang Belanja | '.$site['nama_website'],
                'site'                  => $site,
                'nama_kategori'         => 'Keranjang Belanja'
            );
            $this->db->select('*')->from('temp_cart a');
            $this->db->join('produk b', 'b.kode_produk = a.kode_produk','left');
            $this->db->where('pembeli',$this->session->userdata('username'));
            $cart = $this->db->get()->result_array();
            $data2 = array('cart' => $cart);
            $this->load->view('frontend/cart',array_merge($data,$data2));
        }
    }
    public function simpan(){
        if ($this->session->userdata('level')!='Pembeli') {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Silahkan login terlebih dahulu untuk menambah produk ke keranjang.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
            redirect('auth/login');   
        } else {
            $where = array(
            'kode_produk' => $this->input->post('kode_produk'),
            'pembeli' => $this->input->post('pembeli'),
            );
            $data = $this->CRUD_model->Delete('temp_cart',$where);
            $data = array(
                'jumlah' => $this->input->post('jumlah'),
                'kode_produk' => $this->input->post('kode_produk'),
                'pembeli' => $this->input->post('pembeli'),
                'penjual' => $this->input->post('penjual')
            );  
            $this->CRUD_model->Insert('temp_cart', $data);
            $this->session->set_flashdata('alert', '
                <div class="alert alert-success alert-dismissible" role="alert">
                <center> Dimasukan ke keranjang. </center> 
                </div>
                    ');
            redirect('home/product/'.$this->input->post('kode_produk'));  
        }     
    }
    public function hapus($kode_produk){
        $where = array(
        'kode_produk' => $kode_produk,
        'pembeli' => $this->session->userdata('username'),
        );
        $data = $this->CRUD_model->Delete('temp_cart',$where);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-danger alert-dismissible" role="alert">
        <center> Produk dihapus dari keranjang belanja. </center> 
        </div>
        ');
        redirect('cart');    
    }
}