<?php

class My404 extends CI_Controller
{
   public function __construct(){
       parent::__construct();
   }
   public function index(){
    $site = $this->Konfigurasi_model->listing();
    $data = array(
        'title'                 => '404 Error - Halaman tidak ditemukan',
        'site'                  => $site,
    );
    $this->template->load('authentication/layout/template', '404', $data);
   }
}