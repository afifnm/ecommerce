<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->check_login();
        if ($this->session->userdata('level') != "Pembeli") {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Pesanan Saya | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                <a class="navigasi-link">Pesanan Saya</a>
            '
        );
        $this->db->select('*')->from('transaksi');
        $this->db->where('pembeli',$this->session->userdata('username'));
        $this->db->order_by('tanggal_beli','DESC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'pembeli/order_index', array_merge($data,$data2));
    }
    public function cancel($kode_transaksi){
        $data = array('status' => 1); //1 Dibatalkan 
        $where = array('kode_transaksi' => $kode_transaksi);
        $data = $this->CRUD_model->Update('transaksi', $data, $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
            Pesanan anda telah dibatalkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('pembeli/order');
    }
}
