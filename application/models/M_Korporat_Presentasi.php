<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Korporat_Presentasi extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('korporat_presentasi.quotation_date,korporat_presentasi.no,
        korporat_presentasi.quotation_number,korporat_presentasi.berkas,
        korporat_presentasi.revisi,korporat_layanan.produk,
        korporat_layanan.bandwith,korporat_layanan.budget,korporat_site.nama as nama_site,
        korporat_layanan.metode_pengadaan')
            ->from('korporat_presentasi')
            ->join('korporat_layanan', 'korporat_presentasi.layanan=korporat_layanan.no', 'LEFT')
            ->join('korporat_site', 'korporat_layanan.site=korporat_site.no', 'LEFT')
            ->order_by('korporat_presentasi.no', 'desc')
            ->get()
            ->result_array();
        return $query;
    }
    public function get($no)
    {

        $query = $this->db->select('korporat_presentasi.quotation_date,korporat_presentasi.no,
         korporat_presentasi.layanan,
        korporat_presentasi.quotation_number,korporat_presentasi.berkas,
        korporat_presentasi.revisi,korporat_layanan.produk,
        korporat_layanan.bandwith,korporat_layanan.budget,korporat_site.nama as nama_site,
        korporat_site.long as long_site, korporat_site.lat as lat_site,
        korporat_layanan.metode_pengadaan, korporat_customer.afiliasi, korporat_customer.segment,
        korporat_customer.nama as nama_customer, korporat_customer.alamat, korporat_customer.no as no_customer,
        , korporat_site.pelanggan_pln')
            ->from('korporat_presentasi')
            ->join('korporat_layanan', 'korporat_presentasi.layanan=korporat_layanan.no', 'LEFT')
            ->join('korporat_site', 'korporat_layanan.site=korporat_site.no', 'LEFT')
            ->join('korporat_customer', 'korporat_site.customer=korporat_customer.no', 'LEFT')
            ->where('korporat_presentasi.no', $no)
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
        $this->db->delete('korporat_presentasi');
    }
}