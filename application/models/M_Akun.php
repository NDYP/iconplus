<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Akun extends CI_Model
{
    public function auth($username)
    {
        $query = $this->db->select('*')
            ->from('user')
            ->where('user.username', $username)
            ->get();
        return $query;
    }
    public function pelanggan($id_fat)
    {
        $query = $this->db->select('*')
            ->from('pelanggan')
            //->join('pelanggan', 'cluster.nama_cluster=pelanggan.nama_cluster', 'left')
            ->where('pelanggan.id_fat', $id_fat)
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
        $this->db->delete('user');
    }
    public function hapus_brand($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('fat_brand');
    }
}