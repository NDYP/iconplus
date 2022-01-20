<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mitra extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('mitra_pembangunan') //urut berdasarkan id
            ->order_by('mitra_pembangunan.no', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('mitra_pembangunan')
            ->where('mitra_pembangunan.no', $no)
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
        $this->db->delete('mitra_pembangunan');
    }
}