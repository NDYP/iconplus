<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Mitra extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('mitra_pembangunan') //urut berdasarkan id
            ->order_by('mitra_pembangunan.no', 'desc')
            ->get();
        // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function halaman($rownomer, $rowper)
    {
        $this->db->select('*')
            ->from('mitra_pembangunan') //urut berdasarkan id
            ->order_by('mitra_pembangunan.nama', 'desc');

        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function search($rownomer, $rowper, $search = "")
    {
        $this->db->select('*')
            ->from('mitra_pembangunan') //urut berdasarkan id
            ->order_by('mitra_pembangunan.nama', 'desc');
        if ($search != '') {
            $this->db->like('lower(mitra_pembangunan.nama)', strtolower($search));
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('*')
            ->from('mitra_pembangunan') //urut berdasarkan id
            ->order_by('mitra_pembangunan.nama', 'desc');
        if ($search != '') {
            $this->db->like('mitra_pembangunan.nama', $search);
            // $this->db->or_like('content', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('mitra_pembangunan')
            ->where('mitra_pembangunan.no', $no)
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
        $this->db->where('no', $no);
        $this->db->delete('mitra_pembangunan');
    }
}