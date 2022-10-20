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
        $this->load->view('frontend/beranda');
    }
}
 