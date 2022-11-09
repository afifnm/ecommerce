<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->check_login();
        if ($this->session->userdata('level') != "Siswa") {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Produk | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                <a class="navigasi-link">Produk</a>
            '
        );
        $this->db->select('a.*,b.kategori')->from('produk a');
        $this->db->join('kategori b', 'b.id_kategori = a.id_kategori','left');
        $this->db->order_by('tanggal','DESC');
        $data2 = $this->db->get()->result_array();
        $this->db->select('*')->from('kategori');
        $this->db->order_by('kategori','ASC');
        $kategori = $this->db->get()->result_array();
        $data2 = array('data2' => $data2, 'kategori' => $kategori);
        $this->template->load('layout/template', 'siswa/produk_index', array_merge($data,$data2));
    }

    public function kategori($id){
        $namakategori = $this->CRUD_model->get_kategori($id);
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => $namakategori.' | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                    <a class="navigasi-link">Produk</a>
                    &nbsp; / &nbsp; <a class="navigasi-link">'.$namakategori.'</a>
            '
        );
        $this->db->select('a.*,b.kategori')->from('produk a');
        $this->db->join('kategori b', 'b.id_kategori = a.id_kategori','left');
        $this->db->join('affiliasi c', 'c.kode_produk = a.kode_produk','left');
        $this->db->order_by('tanggal','DESC');
        $this->db->where('a.id_kategori',$id);
        $this->db->where('c.username',$this->session->userdata('username'));
        $data2 = $this->db->get()->result_array();

        $this->db->select('a.*,b.kategori')->from('produk a');
        $this->db->join('kategori b', 'b.id_kategori = a.id_kategori','left');
        $this->db->order_by('tanggal','DESC');
        $this->db->where('a.id_kategori',$id);
        $this->db->where('a.stok >',0);
        $produk = $this->db->get()->result_array();

        $this->db->select('*')->from('kategori');
        $this->db->order_by('kategori','ASC');
        $kategori = $this->db->get()->result_array();
        $data2 = array(
            'data2' => $data2,
            'kategori' => $kategori,
            'produk'    => $produk
        );
        $this->template->load('layout/template', 'siswa/produk_index', array_merge($data,$data2));
    }
    public function pilih($kode_produk,$id_kategori){
        $this->db->select('*')->from('affiliasi');
        $this->db->where('kode_produk',$kode_produk);
        $count = $this->db->count_all_results();
        if ($count>0) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Produk yang kamu pilih sudah ada, pilih produk lain yang belum ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
            redirect('siswa/produk/kategori/'.$id_kategori);   
        }
        $data = array(
            'kode_produk' => $kode_produk,
            'username' => $this->session->userdata('username')
         );  
        $this->CRUD_model->Insert('affiliasi', $data);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Produk telah berhasil ditambahkan ke toko anda
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('siswa/produk/kategori/'.$id_kategori);       
    }


    public function hapus($id_kategori,$kode_produk){
        $where = array(
            'kode_produk' => $kode_produk
        );
        $data = $this->CRUD_model->Delete('affiliasi',$where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Produk berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('siswa/produk/kategori/'.$id_kategori);
    }
}
