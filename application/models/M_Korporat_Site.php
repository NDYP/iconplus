<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Korporat_Site extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('korporat_site.pelanggan_pln,korporat_site.nama, korporat_site.long,korporat_site.lat,korporat_site.koordinat, korporat_site.no, korporat_pic.nama as nama_pic,
        korporat_site.layanan, korporat_site.provider,korporat_site.bandwith, korporat_site.biaya, korporat_site.estimasi_kontrak')
            ->from('korporat_site')
            ->join('korporat_pic', 'korporat_site.pic=korporat_pic.no', 'LEFT')
            ->order_by('korporat_site.no', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('korporat_site')
            ->order_by('korporat_site.no', 'desc')
            ->where('korporat_site.no', $no)
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
        $this->db->delete('korporat_site');
    }
}