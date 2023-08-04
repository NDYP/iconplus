<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pole extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*')
            ->from('pole') //urut berdasarkan id
            ->order_by('pole.id', 'desc')
            ->get();
            // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function halaman($rownomer, $rowper)
    {
        $this->db->select('*')
        ->from('pole') //urut berdasarkan id
        ->order_by('pole.id', 'desc');
          
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search($rownomer, $rowper, $search = "")
    {
       $this->db->select('*')
            ->from('pole') //urut berdasarkan id
            ->order_by('pole.id','desc');
        if ($search != '') {
            $this->db->like('pole.id', $search);
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('pole.id')
            ->from('pole') //urut berdasarkan id
            ->order_by('pole.id','desc');
        if ($search != '') {
            $this->db->like('pole.id', $search);
            // $this->db->or_like('content', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }
    public function get($no)
    {
        $query = $this->db->select('*')
            ->from('pole') //urut berdasarkan id
            ->order_by('pole.no', 'desc')
            ->where('pole.no', $no)
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
        $this->db->where('id', $no);
        $this->db->delete('pole');
    }
}