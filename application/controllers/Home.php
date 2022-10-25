<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('CRUD_model');
    }

    public function index($id=NULL){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Beranda | '.$site['nama_website'],
            'site'                  => $site,
        );
        $this->db->where('active',1);
        $jml = $this->db->get('produk');
        $config['base_url'] = base_url().'home/index';
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '9';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '<span class="ti-arrow-right"></span>';
        $config['prev_link']        = '<span class="ti-arrow-left"></span>';
        $config['num_tag_open']     = '<li class="page-item active page-link">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="page-item current page-link">';
        $config['cur_tag_close']    = '</li>';
        $config['next_tag_open']    = '<li class="page-item page-link">';
        $config['next_tagl_close']  = '&raquo;</li>';
        $config['prev_tag_open']    = '<li class="page-item page-link">';
        $config['prev_tagl_close']  = '</li>Next';
        $config['first_tag_open']   = '<li class="page-item page-link">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="page-item page-link">';
        $config['last_tagl_close']  = '</li>';
        $this->pagination->initialize($config);
        $data['halaman'] = $this->pagination->create_links();
        $data['query'] = $this->CRUD_model->ambil_produk($config['per_page'], $id);
        $this->load->view('frontend/beranda',array_merge($data));
    }
    public function kategori($id_kategori,$id=NULL){
        if ($id==NULL) {
            redirect('home/kategori/'.$id_kategori.'/0');   
        }
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Beranda | '.$site['nama_website'],
            'site'                  => $site,
        );
        $this->db->select('*');
        $this->db->where('active',1);
        $this->db->where('id_kategori',$id_kategori);
        $this->db->order_by('tanggal', 'DESC');
        $jml = $this->db->get('produk');
        $data['jumlah'] = $jml->num_rows();
        $config['base_url'] = base_url().'home/kategori/'.$id_kategori;
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '9';
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '<span class="ti-arrow-right"></span>';
        $config['prev_link']        = '<span class="ti-arrow-left"></span>';
        $config['num_tag_open']     = '<li class="page-item active page-link">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="page-item current page-link">';
        $config['cur_tag_close']    = '</li>';
        $config['next_tag_open']    = '<li class="page-item page-link">';
        $config['next_tagl_close']  = '&raquo;</li>';
        $config['prev_tag_open']    = '<li class="page-item page-link">';
        $config['prev_tagl_close']  = '</li>Next';
        $config['first_tag_open']   = '<li class="page-item page-link">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="page-item page-link">';
        $config['last_tagl_close']  = '</li>';
        $this->pagination->initialize($config);
        $data['halaman'] = $this->pagination->create_links();
        $data['query'] = $this->CRUD_model->ambil_produk_kategori($id_kategori,$config['per_page'], $id);
        $this->load->view('frontend/beranda',array_merge($data));
    }
}