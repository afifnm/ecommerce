<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public $table       = 'user';
    public $id          = 'user.id';

    public function __construct()
    {
        parent::__construct();
    }
    public function register()
    {
      date_default_timezone_set('ASIA/JAKARTA'); 
      $data = array(
        'username' => $this->input->post('username'),
        'foto' => $this->input->post('username').'jpg',
        'password' => get_hash($this->input->post('password')),
        'level' => $this->input->post('level'),
        'nama' => $this->input->post('nama'),
        'tahun_ajaran' => $this->input->post('tahun_ajaran'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tanggal_lahir' => $this->input->post('tanggal_lahir'),
        'alamat' => $this->input->post('alamat'),
        'email' => $this->input->post('email'),
        'no_hp' => $this->input->post('no_hp'),
        'kelas' => $this->input->post('kelas'),
        'tahun_ajaran' => $this->input->post('tahun_ajaran'),
        'active' => 1,
      );
      return $this->db->insert('user', $data);
    }
    function tampil_data(){
        return $this->db->get('user');
    }
    public function update($data, $id)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
        return $this->db->affected_rows();
    }
    public function login($username, $password)
    {
        $query = $this->db->get_where('user', array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }

    public function check_account($username)
    {
        //cari username lalu lakukan validasi
        $this->db->where('username', $username);
        $query = $this->db->get($this->table)->row();

        //jika bernilai 1 maka user tidak ditemukan
        if (!$query) {
            return 1;
        }
        //jika bernilai 3 maka password salah
        if (!hash_verified($this->input->post('password'), $query->password)) {
            return 2;
        }
        return $query;
    }

    public function logout($date, $id)
    {
        $this->db->where('user.id', $id);
        $this->db->update('user', $date);
    }   
}
