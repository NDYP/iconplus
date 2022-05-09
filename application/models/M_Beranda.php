<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Beranda extends CI_Model
{
    public function mitra()
    {
        $query = $this->db->select('*')
            ->from('mitra_pembangunan')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function cluster()
    {
        $query = $this->db->select('*')
            ->from('cluster')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pop()
    {
        $query = $this->db->select('*')
            ->from('pop') //urut berdasarkan id
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function olt()
    {
        $query = $this->db->select('*')
            ->from('olt') //urut berdasarkan id
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function odf()
    {
        $query = $this->db->select('*')
            ->from('odf') //urut berdasarkan id
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function fdt()
    {
        $query = $this->db->select('*')
            ->from('fdt') //urut berdasarkan id
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function fat()
    {
        $query = $this->db->select('*')
            ->from('fat') //urut berdasarkan id
            ->where('status_pembangunan', 'Ready for sale')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pelanggan()
    {
        $query = $this->db->select('*')
            ->from('pelanggan') //urut berdasarkan id
            ->where('status', 'SPA Closed')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function potensi()
    {
        $query = $this->db->select('*')
            ->from('pelanggan') //urut berdasarkan id
            ->where('status', 'Potensi')
            ->get()
            ->num_rows(); //ditampilkan dalam bentuk array
        return $query;
    }
}