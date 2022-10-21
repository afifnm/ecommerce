<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Beranda | '.$site['nama_website'],
            'site'                  => $site,
        );
        $this->db->select('a.*,b.kategori')->from('produk a');
        $this->db->join('kategori b', 'b.id_kategori = a.id_kategori','left');
        $this->db->order_by('tanggal','DESC');
        $produks = $this->db->get()->result_array();
        $data2 = array('produks' => $produks);
        $this->load->view('frontend/beranda',array_merge($data,$data2));
    }
}
 