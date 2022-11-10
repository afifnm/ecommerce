<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->check_login();
        if ($this->session->userdata('level') != "Admin") {
            redirect('', 'refresh');
        }
    }

    public function index(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Kategori Produk | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                    <a class="navigasi-link">Daftar Produk</a>
                    &nbsp; / &nbsp; <b> <i>Kategori Produk</i></b>
            '
        );
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('kategori','ASC');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/kategori_index', array_merge($data,$data2));
    }

    public function simpan(){
        $data = array(
            'kategori' => $this->input->post('kategori')
         );  
        $this->CRUD_model->Insert('kategori', $data);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Kategori produk berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/kategori');       
    }

    public function hapus($id){
        $where = array(
            'id_kategori' => $id
        );
        $data = $this->CRUD_model->Delete('kategori',$where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Kategori produk berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/kategori/');
    }
    public function editdata($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Edit Kategori Produk | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                    <a class="navigasi-link">Daftar Produk</a>
                    &nbsp; / &nbsp; <a class="navigasi-link" href="../"> <b> <i>Kategori Produk</i></b></a>
                    &nbsp; / &nbsp; <b> <i>Edit Kategori Produk</i></b>
            '
        );
        $where = array(
            'id_kategori' => $id
         );
        $data2['kategori'] = $this->CRUD_model->edit_data($where,'kategori')->result();
        $this->template->load('layout/template', 'admin/kategori_edit', array_merge($data, $data2));
    }
    public function updatedata(){   
        $data = array(
            'kategori' => $this->input->post('kategori')
         ); 
        $where = array(
            'id_kategori' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('kategori', $data, $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Kategori produk berhasil diperbarui.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/kategori');
    }
    public function delete_data($id){
        $id = array('id_kategori' => $id);
        $this->CRUD_model->Delete('kategori', $id);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible" role="alert">
        Kategori produk berhasil dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            ');
        redirect('admin/kategori/');
    }
}
