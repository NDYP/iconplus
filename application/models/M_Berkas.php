<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Berkas extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('berkas')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('berkas')
            //->join('berkas', 'cluster.nama_cluster=berkas.nama_cluster', 'left')
            ->where('berkas.no', $no)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function update($tabel, $data, $where)
    {
        return $this->db->update($tabel, $data, $where);
    }
    public function tambah($tabel, $params)
    {
        return $this->db->insert($tabel, $params);
    }
    public function hapus($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('berkas');
    }
    public function hapus_brand($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('fat_brand');
    }
}