<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Korporat_Rab extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, korporat_layanan.produk, korporat_layanan.bandwith, korporat_site.nama as nama_site,')
            ->from('korporat_rab')
            ->join('korporat_layanan', 'korporat_rab.layanan=korporat_layanan.no')
            ->join('korporat_site', 'korporat_layanan.site=korporat_site.no', 'LEFT')

            ->order_by('korporat_rab.no', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('korporat_rab')
            ->order_by('korporat_rab.no', 'desc')
            ->where('korporat_rab.no', $no)
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
        $this->db->delete('korporat_rab');
    }
}