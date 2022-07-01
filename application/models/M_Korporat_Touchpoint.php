<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Korporat_Touchpoint extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*,korporat_touchpoint.no as no, korporat_customer.nama as nama_customer')
            ->from('korporat_touchpoint')
            ->join('korporat_customer', 'korporat_touchpoint.customer=korporat_customer.no', 'LEFT')
            ->order_by('korporat_touchpoint.no', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*,korporat_touchpoint.no as no,korporat_touchpoint.customer, korporat_customer.nama as nama_customer')
            ->from('korporat_touchpoint')
            ->join('korporat_customer', 'korporat_touchpoint.customer=korporat_customer.no', 'LEFT')
            ->where('korporat_touchpoint.no', $no)
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
        $this->db->delete('korporat_touchpoint');
    }
}