<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends MY_Controller{
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
        $this->template->load('layout/template', 'admin/produk_index', array_merge($data,$data2));
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
        $this->db->order_by('tanggal','DESC');
        $this->db->where('a.id_kategori',$id);
        $data2 = $this->db->get()->result_array();
        $this->db->select('*')->from('kategori');
        $this->db->order_by('kategori','ASC');
        $kategori = $this->db->get()->result_array();
        $data2 = array('data2' => $data2, 'kategori' => $kategori);
        $this->template->load('layout/template', 'admin/produk_index', array_merge($data,$data2));
    }
    public function simpan(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'id_kategori' => $this->input->post('kategori'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tanggal'=> date('Y-m-d H:i:s'),
            'active' => 0,
            'stok' => $this->input->post('stok'),
            'kode_produk' => date('YmdHis').$this->session->userdata('id'),
            'username' => $this->session->userdata('username')
         );  
        $this->CRUD_model->Insert('produk', $data);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Produk berhasil ditambahkan, upload gambar produk sebelum menampilkan produk ke publik.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/produk/kategori/'.$this->input->post('kategori'));       
    }
    public function uploadfoto(){
        date_default_timezone_set("Asia/Jakarta");
        $time = date('YmdHis').'.jpg';
        $config['upload_path']          = 'assets/upload/images/produk/';
        $config['max_size'] = 500 * 1024; //3 * 1024 * 1024; //3Mb; 0=unlimited
        $config['allowed_types']        = '*';
        $config['overwrite']            = TRUE;
        $config['file_name']            = $time;
        $this->load->library('upload', $config);
        if($_FILES['foto']['size'] >= 500 * 1024){
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 KB.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
            redirect('admin/produk/foto/'.$this->input->post('kode_produk'));  
        }  elseif( ! $this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
        }else{
            $data = array('upload_data' => $this->upload->data());
        }   

        $data = array(
            'kode_produk' => $this->input->post('kode_produk'),
            'namafile' => $time
         );  
        $this->CRUD_model->Insert('foto', $data);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Foto produk berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/produk/foto/'.$this->input->post('id_kategori').'/'.$this->input->post('kode_produk'));       
    }

    public function delete_data($id_kategori,$kode_produk){
        foreach($this->CRUD_model->foto_produk($kode_produk) as $foto) {
            $filename=FCPATH.'/assets/upload/images/produk/'.$foto['namafile'];
            if (file_exists($filename)){
                unlink("./assets/upload/images/produk/".$foto['namafile']);
            }
        }
        $where = array(
            'kode_produk' => $kode_produk
        );
        $data = $this->CRUD_model->Delete('produk',$where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Produk berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/produk/kategori/'.$id_kategori);
    }
    public function delete_foto($id_kategori,$namafile,$kode_produk){
        $filename=FCPATH.'/assets/upload/images/produk/'.$namafile;
        if (file_exists($filename)){
            unlink("./assets/upload/images/produk/".$namafile);
        }
        $where = array(
            'namafile' => $namafile
        );
        $data = $this->CRUD_model->Delete('foto',$where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Foto produk berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/produk/foto/'.$id_kategori.'/'.$kode_produk);
    }
    public function editdata($id_kategori,$id){
        $nama = $this->CRUD_model->get_kategori($id_kategori);
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Perbarui Produk | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                <a class="navigasi-link"> Produk</a>
                &nbsp; / &nbsp; <a class="navigasi-link" href="'.site_url('admin/produk/kategori/'.$id_kategori).'">'.$nama.'</a>
                &nbsp; / &nbsp; '.$id.'
            '
        );
        $this->db->select('*')->from('kategori');
        $this->db->order_by('kategori','ASC');
        $data2['kategori'] = $this->db->get()->result_array();
        $where = array('kode_produk' => $id);
        $data2['produk'] = $this->CRUD_model->edit_data($where,'produk')->result();
        $this->template->load('layout/template', 'admin/produk_edit', array_merge($data, $data2));
    }
    public function foto($id_kategori,$id){
        $nama = $this->CRUD_model->get_kategori($id_kategori);
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Foto Produk | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                <a class="navigasi-link"> Produk</a>
                &nbsp; / &nbsp; <a class="navigasi-link" href="'.site_url('admin/produk/kategori/'.$id_kategori).'">'.$nama.'</a>
                &nbsp; / &nbsp; '.$id.'
            '
        );
        $this->db->select('*')->from('kategori');
        $this->db->order_by('kategori','ASC');
        $data2['kategori'] = $this->db->get()->result_array();
        $where = array('kode_produk' => $id);
        $data2['produk'] = $this->CRUD_model->edit_data($where,'produk')->result();
        $this->template->load('layout/template', 'admin/produk_foto', array_merge($data, $data2));
    }
    public function updatedata(){   
        $data = array(
            'nama' => $this->input->post('nama'),
            'id_kategori' => $this->input->post('kategori'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
         ); 
        $where = array(
            'id_produk' => $this->input->post('id'),
        );
        $data = $this->CRUD_model->Update('produk', $data, $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Produk berhasil diperbarui.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/produk/kategori/'.$this->input->post('kategori'));
    }
    public function active($id_kategori,$kode_produk){
        $data = array('active' => 1); 
        $where = array('kode_produk' => $kode_produk);
        $data = $this->CRUD_model->Update('produk', $data, $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Produk yang dipilih telah ditampilkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/produk/kategori/'.$id_kategori);
    }
    public function non_active($id_kategori,$kode_produk){
        $data = array('active' => 0); 
        $where = array('kode_produk' => $kode_produk);
        $data = $this->CRUD_model->Update('produk', $data, $where);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Produk yang dipilih telah disembunyikan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
        redirect('admin/produk/kategori/'.$id_kategori);
    }
}
