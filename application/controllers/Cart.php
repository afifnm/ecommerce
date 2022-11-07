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
            $this->load->view('frontend/cart',array_merge($data));
        }
    }
}