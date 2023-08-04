<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Korporat_User extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('korporat_user')
            ->order_by('korporat_user.no', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('korporat_user')
            ->order_by('korporat_user.no', 'desc')
            ->where('korporat_user.no', $no)
            ->get()
            ->row_array();
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
    public function batch($tabel, $params)
    {
        return $this->db->insert_batch($tabel, $params);
    }
    public function hapus($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('korporat_user');
    }
}