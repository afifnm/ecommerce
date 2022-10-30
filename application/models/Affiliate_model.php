<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Affiliate_model extends CI_Model{
    public function ambil_produk($username,$num, $offset){
        $this->db->order_by('a.tanggal', 'DESC');
        $this->db->where('a.active',1);
        $this->db->join('affiliasi c', 'c.kode_produk = a.kode_produk','left');
        $this->db->where('c.username',$username);
        $data = $this->db->get('produk a', $num, $offset);
        return $data->result();
     }

    public function ambil_pencarian($username, $num, $offset,$isi){
        $this->db->order_by('a.tanggal', 'DESC');
        $this->db->like('a.nama', $isi);
        $this->db->join('affiliasi c', 'c.kode_produk = a.kode_produk','left');
        $this->db->where('c.username',$username);
        $data = $this->db->get('produk a', $num, $offset);
        return $data->result();
     }

    public function ambil_produk_kategori($username, $id_kategori,$num, $offset){
        $this->db->where('a.id_kategori',$id_kategori);
        $this->db->where('a.active',1);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->join('affiliasi c', 'c.kode_produk = a.kode_produk','left');
        $this->db->where('c.username',$username);
        $data = $this->db->get('produk a', $num, $offset);
        return $data->result();
     }
}