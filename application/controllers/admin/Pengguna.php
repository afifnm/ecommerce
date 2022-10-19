<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $level = $this->session->userdata('level');
        $this->load->model('CRUD_model');
        $this->load->model('Auth_model');
        $this->check_login();
        if ($level != "Admin") {
            redirect('', 'refresh');
        }
    }
    public function index(){
        $level = $this->session->userdata('level');
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Data Pengguna | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                    <a href="../home" class="navigasi-link">Dashboard</a>
                    &nbsp; / &nbsp; <b> <i>Pengguna</i></b>
            '
        );
        $this->db->select('*');
        $this->db->from('user');
        $data2 = $this->db->get()->result_array();
        $data2 = array('data2' => $data2);
        $this->template->load('layout/template', 'admin/pengguna/index', array_merge($data,$data2));
    } 

    public function profil($username){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Profil '.$username.' | '.$site['nama_website'],
            'favicon'               => $site['favicon'],
            'site'                  => $site,
            'nav'                   => '
                    <a href="../../home" class="navigasi-link">Dashboard</a>
                    &nbsp; / &nbsp; <a <a href="../../pengguna/" class="navigasi-link">Pengguna</a>
                    &nbsp; / &nbsp; <b> <i>'.$username.'</i></b>
            '
        );
        $where = array('username' => $username);
        $data2['profil'] = $this->CRUD_model->edit_data($where,'user')->result();
        $this->template->load('layout/template', 'admin/pengguna/profil', array_merge($data, $data2));
    }
    public function tambah(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Tambah Kader | '.$site['judul'],
            'site'                  => $site,
        );
        $this->template->load('layout/template', 'admin/pengguna/tambah', $data);
    }
    public function simpan(){
        $username = $this->input->post('username');
        $cekusername = $this->db->where('username', $username)->count_all_results('user');
        if ($cekusername > 0) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            NIS/NIP telah digunakan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
             redirect('admin/pengguna'); 
        } else{
            $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Pengguna berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
            $this->Auth_model->register(); 
            redirect('admin/pengguna'); 
        } 
    }
    public function delete_data($id){
        $id = array('id' => $id);
        $this->CRUD_model->Delete('user', $id);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible" role="alert">
        Pengguna berhasil dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            ');
        redirect('admin/pengguna/');
    }

}
