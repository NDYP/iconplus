<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Users extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('user.no,user.nama, mitra_pembangunan.no as no_mitra,mitra_pembangunan.nama as nama_mitra, user.akses, user.wa, user.telegram,
        user.email, user.email, user.username, user.password, user.daftar, user.login, user.foto')
            ->from('user') //urut berdasarkan id
            ->join('mitra_pembangunan', 'user.mitra=mitra_pembangunan.no', 'left')
            ->order_by('user.no', 'desc')
            ->get();
            // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function halaman($rownomer, $rowper)
    {
        $this->db->select('user.no,user.nama, mitra_pembangunan.no as no_mitra,mitra_pembangunan.nama as nama_mitra, user.akses, user.wa, user.telegram,
        user.email, user.email, user.username, user.password, user.daftar, user.login, user.foto')
            ->from('user') //urut berdasarkan id
            ->join('mitra_pembangunan', 'user.mitra=mitra_pembangunan.no', 'left')
            ->order_by('user.no', 'desc');
          
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function search($rownomer, $rowper, $search = "")
    {
       $this->db->select('user.no,user.nama, mitra_pembangunan.no as no_mitra,mitra_pembangunan.nama as nama_mitra, user.akses, user.wa, user.telegram,
        user.email, user.email, user.username, user.password, user.daftar, user.login, user.foto')
            ->from('user') //urut berdasarkan id
            ->join('mitra_pembangunan', 'user.mitra=mitra_pembangunan.no', 'left')
            ->order_by('user.no', 'desc');
        if ($search != '') {
            $this->db->like('user.nama', $search);
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('user.no')
            ->from('user') //urut berdasarkan id
            ->join('mitra_pembangunan', 'user.mitra=mitra_pembangunan.no', 'left')
            ->order_by('user.no', 'desc');
        if ($search != '') {
            $this->db->like('user.nama', $search);
            // $this->db->or_like('content', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function get($no)
    {
        $query = $this->db->select('user.no,user.nama, mitra_pembangunan.no as no_mitra,mitra_pembangunan.nama as nama_mitra, user.akses, user.wa, user.telegram,
        user.email, user.email, user.username, user.password, user.daftar, user.login, user.foto')
            ->from('user')
            ->join('mitra_pembangunan', 'user.mitra=mitra_pembangunan.no', 'left')
            ->where('user.no', $no)
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
        $this->db->delete('user');
    }
}