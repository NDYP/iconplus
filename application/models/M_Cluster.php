<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Cluster extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, cluster.no as no, berkas.file, berkas.nama')
            ->from('cluster') //urut berdasarkan id
            ->join('mitra_pembangunan', 'cluster.instalatir=mitra_pembangunan.no', 'left')
            ->join('berkas', 'cluster.no=berkas.cluster', 'left')
            ->order_by('cluster.no', 'desc')
            ->get();
        // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function halaman($rownomer, $rowper)
    {
        $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, cluster.no as no, berkas.file, berkas.nama')
            ->from('cluster') //urut berdasarkan id
            ->join('mitra_pembangunan', 'cluster.instalatir=mitra_pembangunan.no', 'left')
            ->join('berkas', 'cluster.no=berkas.cluster', 'left')
            ->order_by('cluster.no', 'desc');

        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function search($rownomer, $rowper, $search = "")
    {
        $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, cluster.no as no, berkas.file, berkas.nama')
            ->from('cluster') //urut berdasarkan id
            ->join('mitra_pembangunan', 'cluster.instalatir=mitra_pembangunan.no', 'left')
            ->join('berkas', 'cluster.no=berkas.cluster', 'left')
            ->order_by('cluster.no', 'desc');
        if ($search != '') {
            $this->db->like('lower(cluster.nama_cluster)', strtolower($search));
            $this->db->or_like('lower(cluster.no_pa)', strtolower($search));
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('mitra_pembangunan.nama as nama_instalatir, cluster.no as no, berkas.file, berkas.nama')
            ->from('cluster') //urut berdasarkan id
            ->join('mitra_pembangunan', 'cluster.instalatir=mitra_pembangunan.no', 'left')
            ->join('berkas', 'cluster.no=berkas.cluster', 'left')
            ->order_by('cluster.no', 'desc');
        if ($search != '') {
            $this->db->like('cluster.nama_cluster', $search);
            // $this->db->or_like('content', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }
    public function get($no)
    {
        $query = $this->db->select('*, mitra_pembangunan.nama as nama_instalatir, cluster.no as no')
            ->from('cluster') //urut berdasarkan id
            ->join('mitra_pembangunan', 'cluster.instalatir=mitra_pembangunan.no', 'left')
            ->order_by('cluster.no', 'desc')
            ->where('cluster.no', $no)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function fat($nama_cluster)
    {
        $query = $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang,
    fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
    fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long,fat.brand,fat.cluster,fat.instalatir,
    fat.id_fdt, fat_brand.nama_brand, mitra_pembangunan.nama
        as nama_instalatir, cluster.nama_cluster, fdt.id_fdt, fat.jenis,
        fat.kapasitas_port_terpasang - count(pelanggan.no) AS port_idle,
    count(pelanggan.no) AS jumlah_pelanggan,
    ST_DistanceSphere(ST_MakePoint(fat.long,fat.lat),ST_MakePoint(fdt.long,fdt.lat)) as jarak, fat.timestamp, fat.penginput')
            ->from('fat') //urut berdasarkan id
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->order_by('fat.no', 'desc')
            ->group_by('fat.no')
            ->group_by('fat_brand.nama_brand')
            ->group_by('mitra_pembangunan.nama')
            ->group_by('cluster.nama_cluster')
            ->group_by('fdt.id_fdt')
            ->where('fat.cluster', $nama_cluster)
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function count($nama_cluster)
    {
        $query = $this->db->select('COUNT(fat.no) as jumlah')
            ->from('fat') //urut berdasarkan id
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->order_by('fat.no', 'desc')
            ->where('fat.cluster', $nama_cluster)
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
    public function batch($tabel, $params)
    {
        return $this->db->insert_batch($tabel, $params);
    }
    public function hapus($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('cluster');
    }
}
