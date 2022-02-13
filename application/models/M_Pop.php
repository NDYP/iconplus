<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pop extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('pop') //urut berdasarkan id
            ->order_by('pop.no', 'desc')
            ->get();
        // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function halaman($rownomer, $rowper)
    {
        $this->db->select('*')
            ->from('pop') //urut berdasarkan id
            ->order_by('pop.id_pop', 'desc');

        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search($rownomer, $rowper, $search = "")
    {
        $this->db->select('*')
            ->from('pop') //urut berdasarkan id
            ->order_by('pop.id_pop', 'desc');
        if ($search != '') {
            $this->db->like('pop.id_pop', $search);
            $this->db->or_like('pop.nama_pop', $search);
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('pop.id_pop')
            ->from('pop') //urut berdasarkan id
            ->order_by('pop.id_pop', 'desc');
        if ($search != '') {
            $this->db->like('pop.id_pop', $search);
            $this->db->or_like('pop.nama_pop', $search);
            // $this->db->or_like('content', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('pop')
            ->where('pop.no', $no)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function olt($id_pop)
    {
        $query = $this->db->select('*, mitra_pembangunan.nama as nama_instalatir,olt_brand.nama_brand as nama_brand, olt.no as no,
        pop.id_pop as pop, olt.id_pop')
            ->from('olt') //urut berdasarkan id
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->join('mitra_pembangunan', 'olt.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt_brand', 'olt.brand=olt_brand.no', 'left')
            ->order_by('olt.no', 'desc')
            ->where('olt.id_pop', $id_pop)
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
        $this->db->delete('pop');
    }
}