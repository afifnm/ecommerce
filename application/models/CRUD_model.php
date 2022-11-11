<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CRUD_model extends CI_Model{

 	public function GetWhere($table){
        $res=$this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }
    public function edit_data($where,$table){      
        return $this->db->get_where($table,$where);
    }

    public function Insert($table,$data){
        $res = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }
 
    public function Delete($table, $where){
        $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }
    public function get_kategori($id){
        $this->db->select('kategori')->from('kategori');
        $this->db->where('id_kategori',$id);
        return $this->db->get()->row()->kategori;
    }
    public function get_wa($id){
        $this->db->select('no_hp')->from('user');
        $this->db->where('username',$id);
        return $this->db->get()->row()->no_hp;
    }
    public function get_stok($id){
        $this->db->select('stok')->from('produk');
        $this->db->where('kode_produk',$id);
        return $this->db->get()->row()->stok;
    }
    public function get_nama($id){
        $this->db->select('nama')->from('produk');
        $this->db->where('kode_produk',$id);
        return $this->db->get()->row()->nama;
    }
    public function get_nama_user($id){
        $this->db->select('nama')->from('user');
        $this->db->where('username',$id);
        return $this->db->get()->row()->nama;
    }
    public function foto_produk($kode_produk){
        $this->db->select('*')->from('foto');
        $this->db->where('kode_produk',$kode_produk);
        return $this->db->get()->result_array();
    }
    public function foto_produk_1($kode_produk){
        $this->db->select('*')->from('foto');
        $this->db->where('kode_produk',$kode_produk);
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }
    public function ambil_produk($num, $offset){
        $this->db->order_by('tanggal', 'DESC');
        $this->db->where('active',1);
        $data = $this->db->get('produk', $num, $offset);
        return $data->result();
     }

    public function ambil_pencarian($num, $offset,$isi){
        $this->db->order_by('tanggal', 'DESC');
        $this->db->like('nama', $isi);
        $data = $this->db->get('produk', $num, $offset);
        return $data->result();
     }

    public function ambil_produk_kategori($id_kategori,$num, $offset){
        $this->db->where('id_kategori',$id_kategori);
        $this->db->where('active',1);
        $this->db->order_by('tanggal', 'DESC');
        $data = $this->db->get('produk', $num, $offset);
        return $data->result();
     }
     public function sum_pesanan($kode_transaksi){
        $this->db->select('*')->from('cart a');
        $this->db->join('produk b', 'b.kode_produk = a.kode_produk','left');
        $this->db->where('kode_transaksi',$kode_transaksi);
        $carts = $this->db->get()->result_array();
        if($carts==NULL){
            return 0;
        } else {
            $sum = 0;
            foreach ($carts as $cart) {
                $sum = $sum+$cart['jumlah']*$cart['harga'];
            }
            return $sum;
        }
     }
}