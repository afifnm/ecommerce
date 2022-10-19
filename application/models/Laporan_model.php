<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model{

    public function sum_pembayaran($pembayaran,$i,$id){
        $x = $pembayaran.$i;
        $this->db->select('sum('.$x.') as nominal');
        $this->db->from('pembayaran');
        $this->db->or_where('id', $id); 
        $this->db->or_where('tahun_ajaran', $id); 
        return $this->db->get()->row()->nominal;
    }

    public function sum_pembayaran_tweak($id){
        $this->db->select('sum(tweak) as nominal');
        $this->db->from('pembayaran');
        $this->db->or_where('id', $id); 
        $this->db->or_where('tahun_ajaran', $id); 
        return $this->db->get()->row()->nominal;
    }

    public function sum_pembayaran_siswa($pembayaran,$i,$id){
        $x = $pembayaran.$i;
        $this->db->select('sum('.$x.') as nominal');
        $this->db->from('siswa');
        $this->db->where('angkatan', $id); 
        return $this->db->get()->row()->nominal;
    }


    public function pembayaran_siswa($pembayaran,$i,$id){
        $x = $pembayaran.$i;
        $this->db->select('sum('.$x.') as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id); 
        return $this->db->get()->row()->nominal;
    }

    public function pembayaran_siswa_tweak($id){
        $this->db->select('sum(tweak) as nominal');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id); 
        return $this->db->get()->row()->nominal;
    }




   
}
