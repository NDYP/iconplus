<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Korporat_Customer extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, korporat_customer.no, korporat_customer.nama, user.nama as nama_sales')
            ->from('korporat_customer')
            ->join('user', 'korporat_customer.sales=user.no', 'left')
            ->order_by('korporat_customer.no', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('korporat_customer')
            ->order_by('korporat_customer.no', 'desc')
            ->where('korporat_customer.no', $no)
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
        $this->db->delete('korporat_customer');
    }
}