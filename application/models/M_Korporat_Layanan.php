<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Korporat_Layanan extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*,korporat_layanan.no, korporat_site.nama as nama_site, korporat_layanan.budget')
            ->from('korporat_layanan')
            ->join('korporat_site', 'korporat_layanan.site=korporat_site.no', 'LEFT')
            ->order_by('korporat_layanan.no', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('korporat_layanan.*, korporat_site.pelanggan_pln, korporat_site.nama as nama_site')
            ->from('korporat_layanan')
            ->join('korporat_site', 'korporat_layanan.site=korporat_site.no', 'LEFT')
            ->order_by('korporat_layanan.no', 'desc')
            ->where('korporat_layanan.no', $no)
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
        $this->db->delete('korporat_layanan');
    }
}