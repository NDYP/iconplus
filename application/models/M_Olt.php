<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Olt extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, mitra_pembangunan.nama as nama_instalatir,olt_brand.nama_brand as nama_brand, olt.no as no,
        pop.id_pop as pop, olt.id_pop')
            ->from('olt') //urut berdasarkan id
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->join('mitra_pembangunan', 'olt.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt_brand', 'olt.brand=olt_brand.no', 'left')
            ->order_by('olt.no', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function brand()
    {
        $query = $this->db->select('*')
            ->from('olt_brand') //urut berdasarkan id
            ->order_by('olt_brand.no', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, olt_brand.nama_brand as nama_brand, olt.no as no,
        pop.id_pop as pop, olt.id_pop, olt.tanggal_instalasi')
            ->from('olt') //urut berdasarkan id
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->join('mitra_pembangunan', 'olt.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt_brand', 'olt.brand=olt_brand.no', 'left')
            ->where('olt.no', $no)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function count($no)
    {
        $query = $this->db->select('COUNT(odf.no) as jumlah')
            ->from('olt')
            ->join('odf', 'olt.no=odf.hostname_olt', 'left')
            ->where('olt.no', $no)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function odf($hostname_olt)
    {
        $query = $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, odf.no as no, cluster.nama_cluster
        , olt.hostname as hostname_olt')
            ->from('odf') //urut berdasarkan id
            ->join('mitra_pembangunan', 'odf.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('cluster', 'odf.cluster=cluster.no', 'left')
            //->group_by('odf.nama_odf', 'desc')
            ->order_by('odf.no')
            ->where('odf.hostname_olt', $hostname_olt)
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
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
        $this->db->delete('olt');
    }
    public function hapus_brand($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('olt_brand');
    }
}