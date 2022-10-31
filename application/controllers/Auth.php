<?php defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
        $this->load->model('CRUD_model');
        $this->load->helper('url');
    }

    public function register(){
      $site = $this->Konfigurasi_model->listing();
      $data = array(
          'title'                 => 'Register | '.$site['nama_website'],
          'site'                  => $site,
      );
      $this->load->view('authentication/register', $data);
    }
    public function simpan(){
        $username = $this->input->post('username');
        $cekusername = $this->db->where('username', $username)->count_all_results('user');
        if ($cekusername > 0) {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Username/NIS sudah digunakan, silahkan coba lagi dengan username/nis lain.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
             redirect('auth/register'); 
        } else{
            $this->session->set_flashdata('alert', '
            <div class="alert alert-primary alert-dismissible" role="alert">
            Berhasil mendaftar, silahkan login terlebih dahulu.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
                ');
            $this->Auth_model->register(); 
            redirect('auth/login'); 
        } 
    }
    public function check_account()
    {
        //validasi login
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');
        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($username, $password);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Username yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
          }
        elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
              'is_login'    => true,
              'id'          => $query->id,
              'password'    => $query->password,
              'username'    => $query->username,
              'level'       => $query->level,
              'nama'        => $query->nama,
              'tempat_lahir'        => $query->tempat_lahir,
              'tanggal_lahir'        => $query->tanggal_lahir,
              'alamat'        => $query->alamat,
              'kelas'        => $query->kelas,
              'tahun_ajaran'        => $query->tahun_ajaran,
              'email'        => $query->email,
              'no_hp'        => $query->no_hp,
              'foto'        => $query->foto,
              'last_login'  => $query->last_login
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }
    public function login()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Login | '.$site['nama_website'],
            'site'      => $site
        );
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('level') == "Admin") {
            redirect('admin/home');
        } 
        if ($this->session->userdata('level') == "Siswa") {
            redirect('siswa/home');
        } 
        if ($this->session->userdata('level') == "Pembeli") {
            redirect('pembeli/home');
        } 
        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('username'), $this->input->post('password'));
                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->level == 'Admin') {
                    redirect('admin/home');
                } elseif ($data->level == 'Siswa') {
                    redirect('siswa/home');
                } else {
                    redirect('pembeli/home');
                }
            } else {
                $this->load->view('authentication/login', $data);
            }
        } else {
            $this->load->view('authentication/login', $data);
        }
    } 
    public function logout(){ 
        $this->session->sess_destroy();
        redirect('home');
    }
    function profile(){
        $data['user'] = $this->Auth_model->tampil_data()->result();
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'My Profile | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                <a class="navigasi-link">Account</a>
                    &nbsp; / &nbsp; <b> <i>My Profile</i></b>
            '
        );
        $this->template->load('layout/template', 'authentication/profile', $data);
    }
    function password(){
        $data['user'] = $this->Auth_model->tampil_data()->result();
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Password | '.$site['nama_website'],
            'site'                  => $site,
            'nav'                   => '
                <a class="navigasi-link">Account</a>
                    &nbsp; / &nbsp; <b> <i>Password</i></b>
            '
        );
        $this->template->load('layout/template', 'authentication/password', $data);
    }
    public function updatePassword()
    {
        $id = $this->session->userdata('id');
            if (password_verify($this->input->post('passLama'), $this->session->userdata('password'))) {
                if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
                    $this->session->set_flashdata('alert', '
                    <div class="alert alert-primary alert-dismissible" role="alert">
                    Konfirmasi password salah.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                        ');
                    redirect('auth/password');
                } else {
                    $data = ['password' => get_hash($this->input->post('passBaru'))];
                    $result = $this->Auth_model->update($data, $id);
                    if ($result > 0) {
                        $this->Auth_model->update($data, $data['password'], 'user');
                        $this->session->set_flashdata('alert', '
                        <div class="alert alert-primary alert-dismissible" role="alert">
                        Password berhasil diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                            ');
                        $userdata = array(
                            'password' => $data['password']
                        );
                        $this->session->set_userdata($userdata);
                        redirect('auth/password');
                    } else {
                        $this->session->set_flashdata('alert', '
                        <div class="alert alert-primary alert-dismissible" role="alert">
                        Password gagal diubah.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                            ');
                          redirect('auth/password');
                    }
                }
            } else {
                $this->session->set_flashdata('alert', '
                <div class="alert alert-primary alert-dismissible" role="alert">
                Password salah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                    ');
                redirect('auth/password');
            }
    }
    public function updateProfile()
    {
        $id = $this->session->userdata('id');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $kelas = $this->input->post('kelas');
        $tahun_ajaran = $this->input->post('tahun_ajaran');
        $no_hp = $this->input->post('no_hp');
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'email' => $email,
            'kelas' => $kelas,
            'tahun_ajaran' => $tahun_ajaran,
            'no_hp' => $no_hp
        );
        $userdata = array(
            'nama' => $nama,
            'username' => $username,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'email' => $email,
            'kelas' => $kelas,
            'tahun_ajaran' => $tahun_ajaran,
            'no_hp' => $no_hp
        );
        $this->session->set_userdata($userdata);
        $result = $this->Auth_model->update($data, $id);
        $this->session->set_flashdata('alert', '
        <div class="alert alert-primary alert-dismissible" role="alert">
        Data diri berhasil diperbarui.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            ');
        redirect('auth/profile');
    }

}