<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Affiliate extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('CRUD_model');
        $this->load->model('Affiliate_model');
    }

    public function store($username,$id=NULL){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Beranda | '.$site['nama_website'],
            'site'                  => $site,
            'nama_kategori'         => '',
            'username'              => $username
        );
        $userdata = array('affiliate' => $username);
        $this->session->set_userdata($userdata);
        $this->db->where('active',1);
        $this->db->join('affiliasi c', 'c.kode_produk = a.kode_produk','left');
        $this->db->where('c.username',$username);
        $jml = $this->db->get('produk a');
        $config['base_url'] = base_url().'affiliate/store/'.$username;
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '12';
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
        $data['query'] = $this->Affiliate_model->ambil_produk($username, $config['per_page'], $id);
        $this->load->view('frontend/products_af',array_merge($data));
    }
    public function kategori($username,$id_kategori,$id=NULL){
        $nama_kategori = $this->CRUD_model->get_kategori($id_kategori);
        if ($id==NULL) {
            redirect('home/kategori/'.$id_kategori.'/0');   
        }
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => $nama_kategori.' | '.$site['nama_website'],
            'site'                  => $site,
            'nama_kategori'         => $nama_kategori,
            'username'              => $username
        );
        $this->db->select('*');
        $this->db->where('active',1);
        $this->db->where('id_kategori',$id_kategori);
        $this->db->order_by('tanggal', 'DESC');
        $jml = $this->db->get('produk');
        $data['jumlah'] = $jml->num_rows();
        $config['base_url'] = base_url().'home/kategori/'.$id_kategori;
        $config['total_rows'] = $jml->num_rows();
        $config['per_page'] = '12';
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
        $data['query'] = $this->Affiliate_model->ambil_produk_kategori($username, $id_kategori,$config['per_page'], $id);
        $this->load->view('frontend/products_af',array_merge($data));
    }
    public function product($id){
        $nama = $this->CRUD_model->get_nama($id);
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => $nama.' | '.$site['nama_website'],
            'site'                  => $site,
            'nama_kategori'         => $nama,
            'username'              => $this->session->userdata('affiliate')
        );
        $this->db->select('a.*,b.kategori')->from('produk a');
        $this->db->join('kategori b', 'b.id_kategori = a.id_kategori','left');
        $this->db->order_by('tanggal','DESC');
        $this->db->where('a.kode_produk',$id);
        $data2 = $this->db->get()->result_array();
        $data2 = array('products' => $data2);
        $this->load->view('frontend/product_af',array_merge($data,$data2));
    } 
}