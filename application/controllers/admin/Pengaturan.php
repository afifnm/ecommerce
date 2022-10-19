<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('tgl_indo');
        $this->load->model('CRUD_model');
        $this->load->model('Auth_model');
        $this->check_login();
        if (($this->session->userdata('level') != "Admin") AND ($this->session->userdata('level') != "Kecamatan") AND ($this->session->userdata('level') != "Kelurahan")) {
            redirect('', 'refresh');
        }
    }

    public function akun(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Akun Pengguna | '.$site['judul'],
            'site'                  => $site,
            'saldo'                 => $site['saldo'],
            'bunga'                 => $site['bunga']
        );
        $this->template->load('layout/template', 'admin/pengaturan_akun', array_merge($data));
    }

    public function user(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Daftar Pengguna Sistem | '.$site['judul'],
            'site'                  => $site
        );
        $this->db->select('*');
        $this->db->from('user');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/pengaturan_user', array_merge($data, $data3));
    }

    public function jenis(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Daftar Kategori Produksi | '.$site['judul'],
            'site'                  => $site
        );
        $this->db->select('*');
        $this->db->from('jenis');
        $data3 = $this->db->get()->result_array();
        $data3 = array('data3' => $data3);
        $this->template->load('layout/template', 'admin/pengaturan_jenis', array_merge($data, $data3));
    }

    public function input_user(){
        $username = $this->input->post('username');
        $cekusername = $this->db->where('username', $username)->count_all_results('user');
        if ($cekusername > 0) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
                    <div class="info-box alert-info">
                    <div class="info-box-icon">
                    <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="info-box-content" style="font-size:14">
                    <b style="font-size: 20px">INFO</b><br>Username '.$username.' sudah digunakan.</div>
                    </div>
                    </p>
            ');
             redirect('admin/pengaturan/user'); 
        } else{
            $this->session->set_flashdata('alert', '<p class="box-msg">
                    <div class="info-box alert-success">
                    <div class="info-box-icon">
                    <i class="fa fa-check"></i>
                    </div>
                    <div class="info-box-content" style="font-size:14">
                    <b style="font-size: 20px">SUCCESS</b><br>Pengguna '.$username.' telah ditambahkan.</div>
                    </div>
                    </p>
            ');
            $this->Auth_model->register(); 
            redirect('admin/pengaturan/user'); 
        } 
    }
    public function delete_user($id){
        $id = array('id' => $id);
        $this->CRUD_model->Delete('user', $id);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-trash"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br>Berhasil menghapus pengguna.</div>
        </div>
        </p>
        ');
        redirect('admin/pengaturan/user'); 
    }
    public function profil(){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Profil CV | '.$site['judul'],
        );
        $where = array('id' => 1);
        $data2['profil'] = $this->CRUD_model->edit_data($where,'konfigurasi')->result();
        $this->template->load('layout/template', 'admin/pengaturan_profil', array_merge($data, $data2));
    } 
    public function edit_jenis($id){
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Edit Kategori Produksi | '.$site['judul'],
        );
        $where = array('id' => $id);
        $data2['data2'] = $this->CRUD_model->edit_data($where,'jenis')->result();
        $this->template->load('layout/template', 'admin/pengaturan_jenis2', array_merge($data, $data2));
    } 
    public function update_profil(){   
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'judul' => $this->input->post('judul'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
         ); 
        $where = array(
            'id' => 1,
        );
        $data = $this->CRUD_model->Update('konfigurasi', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Biodata telah diperbarui.</div>
        </div>
        </p>
        ');
        redirect('admin/auth/profile');
    }

    public function update_jenis(){   
        $data = array(
            'jenis' => $this->input->post('nama')
         ); 
        $where = array(
            'id' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('jenis', $data, $where);
        $this->session->set_flashdata('alert', '<p class="box-msg">
        <div class="info-box alert-success">
        <div class="info-box-icon">
        <i class="fa fa-check"></i>
        </div>
        <div class="info-box-content" style="font-size:14">
        <b style="font-size: 20px">SUCCESS</b><br> Kategori produksi telah diperbarui.</div>
        </div>
        </p>
        ');
        redirect('admin/pengaturan/jenis');
    }
}
