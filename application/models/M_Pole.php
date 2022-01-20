<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pole extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('pole') //urut berdasarkan id
            ->order_by('pole.id', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('pole') //urut berdasarkan id
            ->order_by('pole.no', 'desc')
            ->where('pole.no', $no)
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
        $this->db->where('id', $no);
        $this->db->delete('pole');
    }
}