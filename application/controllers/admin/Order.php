<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->check_login();
        if (($this->session->userdata('level') != "Admin") AND ($this->session->userdata('level') != "Siswa")) {
            redirect('', 'refresh');
        }
    }

    public function status($status){
        if($status==0){ $nama = 'Pesanan Masuk'; }
        elseif($status==1){ $nama = 'Pesanan Dibatalkan'; }
        elseif($status==2){ $nama = 'Pesanan Dalam Perjalanan'; }
        elseif($status==3){ $nama = 'Pesanan Selesai'; }
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Daftar Pesanan | '.$site['nama_website'],
            'site'                  => $site,
            'status'                => $status,
            'nav'                   => '
                <a class="navigasi-link">Daftar Pesanan</a>
                &nbsp; / &nbsp; <a class="navigasi-link">'.$nama.'</a>
            '
        );
        $this->db->select('*')->from('transaksi');
        $this->db->order_by('tanggal_beli','DESC');
        $this->db->where('status',$status);
        if ($this->session->userdata('level')=="Siswa") {
            $this->db->where('penjual',$this->session->userdata('username'));
        }
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/order_index', array_merge($data,$data2));
    }
    public function detail($kode_transaksi){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Pesanan Saya | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                <a class="navigasi-link" href="'.site_url('pembeli/order/').'">Pesanan Saya</a>
                &nbsp; / &nbsp; <a class="navigasi-link">'.$kode_transaksi.'</a>
            '
        );
        $this->db->select('*')->from('transaksi')->where('kode_transaksi',$kode_transaksi);
        $transaksi = $this->db->get()->result_array();
        $this->db->select('*')->from('cart')->where('kode_transaksi',$kode_transaksi);
        $cart = $this->db->get()->result_array();
        $data2 = array(
            'transaksi' => $transaksi,
            'cart'      => $cart
        );
        $this->template->load('layout/template', 'pembeli/order_detail', array_merge($data,$data2));
    }
    public function cancel($kode_transaksi){
        $data = array('status' => 1); //1 Dibatalkan 
        $where = array('kode_transaksi' => $kode_transaksi);
        $data = $this->CRUD_model->Update('transaksi', $data, $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
            Pesanan telah dibatalkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/order/status/1');
    }
    
    public function accept($kode_transaksi){
        $data = array('status' => 2); //2 Diterima 
        $where = array('kode_transaksi' => $kode_transaksi);
        $data = $this->CRUD_model->Update('transaksi', $data, $where);
        
        $this->db->select('*')->from('cart');
        $this->db->where('kode_transaksi',$kode_transaksi);
        $carts = $this->db->get()->result_array();
        foreach ($carts as $cart) {
            $stok_awal = $this->CRUD_model->get_stok($cart['kode_produk']);
            $jumlah = $cart['jumlah'];
            $data = array('stok' => $stok_awal-$jumlah); //2 Diterima 
            $where = array('kode_produk' => $cart['kode_produk']);
            $data = $this->CRUD_model->Update('produk', $data, $where);
        }
        $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible" role="alert">
            Pesanan telah diterima, hubungi pembeli untuk melanjutkan proses transaksi pembayaran dan pengiriman.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/order/status/2');
    }
    public function done($kode_transaksi){
        $data = array('status' => 3); //3 Pesanan selesai 
        $where = array('kode_transaksi' => $kode_transaksi);
        $data = $this->CRUD_model->Update('transaksi', $data, $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible" role="alert">
            Pesanan telah diselesaikan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/order/status/3');
    }
}
