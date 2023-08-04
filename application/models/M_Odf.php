<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Odf extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, odf.no as no, cluster.nama_cluster
        , olt.hostname as hostname_oltx')
            ->from('odf') //urut berdasarkan id
            ->join('mitra_pembangunan', 'odf.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('cluster', 'odf.cluster=cluster.no', 'left')
            //->group_by('odf.nama_odf', 'desc')
            ->order_by('odf.no')
            ->get();
        // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function halaman($rownomer, $rowper)
    {
        $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, odf.no as no, cluster.nama_cluster
        , olt.hostname as hostname_oltx')
            ->from('odf') //urut berdasarkan id
            ->join('mitra_pembangunan', 'odf.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('cluster', 'odf.cluster=cluster.no', 'left')
            //->group_by('odf.nama_odf', 'desc')
            ->order_by('odf.no', 'desc');

        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function search($rownomer, $rowper, $search = "")
    {
        $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, odf.no as no, cluster.nama_cluster
        , olt.hostname as hostname_oltx')
            ->from('odf') //urut berdasarkan id
            ->join('mitra_pembangunan', 'odf.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('cluster', 'odf.cluster=cluster.no', 'left')
            //->group_by('odf.nama_odf', 'desc')
            ->order_by('odf.no', 'desc');
        if ($search != '') {
            $this->db->like('lower(odf.nama_odf)', strtolower($search));
            $this->db->or_like('lower(olt.hostname)', strtolower($search));
            $this->db->or_like('lower(cluster.nama_cluster)', strtolower($search));
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('odf.nama_odf')
            ->from('odf') //urut berdasarkan id
            ->join('mitra_pembangunan', 'odf.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('cluster', 'odf.cluster=cluster.no', 'left')
            //->group_by('odf.nama_odf', 'desc')
            ->order_by('odf.no', 'desc');
        if ($search != '') {
            $this->db->like('odf.nama_odf', $search);
            $this->db->or_like('olt.hostname', $search);
            $this->db->or_like('cluster.nama_cluster', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function get($no)
    {
        $query = $this->db->select('*, odf.instalatir, mitra_pembangunan.nama as nama_instalatir, odf.no as no, cluster.nama_cluster
        , olt.hostname as hostname, odf.hostname_olt, olt.hostname as hostname_oltx')
            ->from('odf') //urut berdasarkan id
            ->join('mitra_pembangunan', 'odf.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('cluster', 'odf.cluster=cluster.no', 'left')
            ->where('odf.no', $no)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function fdt($nama_odf)
    {
        $query = $this->db->select('*, fdt.no, fdt_brand.nama_brand, fdt.instalatir, fdt.nama_odf, mitra_pembangunan.nama
        as nama_instalatir, odf.nama_odf as odf')
            ->from('fdt') //urut berdasarkan id
            ->join('mitra_pembangunan', 'fdt.instalatir=mitra_pembangunan.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('fdt_brand', 'fdt.brand=fdt_brand.no', 'left')
            ->order_by('fdt.no', 'desc')
            ->where('fdt.nama_odf', $nama_odf)
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
        $this->db->delete('odf');
    }
}