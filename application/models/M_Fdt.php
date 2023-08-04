<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Fdt extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('*, fdt.no, fdt_brand.nama_brand, fdt.instalatir, fdt.nama_odf, mitra_pembangunan.nama
        as nama_instalatir, odf.nama_odf as odf, fdt.port_odf')
            ->from('fdt') //urut berdasarkan id
            ->join('mitra_pembangunan', 'fdt.instalatir=mitra_pembangunan.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('fdt_brand', 'fdt.brand=fdt_brand.no', 'left')
            ->order_by('fdt.no', 'desc')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function halaman($rownomer, $rowper)
    {
        $this->db->select('*, fdt.no, fdt_brand.nama_brand, fdt.instalatir, fdt.nama_odf, mitra_pembangunan.nama
        as nama_instalatir, odf.nama_odf as odf, fdt.port_odf')
            ->from('fdt') //urut berdasarkan id
            ->join('mitra_pembangunan', 'fdt.instalatir=mitra_pembangunan.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('fdt_brand', 'fdt.brand=fdt_brand.no', 'left')
            ->order_by('fdt.no', 'desc');

        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search($rownomer, $rowper, $search = "")
    {
        $this->db->select('*, fdt.no, fdt_brand.nama_brand, fdt.instalatir, fdt.nama_odf, mitra_pembangunan.nama
        as nama_instalatir, odf.nama_odf as odf, fdt.port_odf')
            ->from('fdt') //urut berdasarkan id
            ->join('mitra_pembangunan', 'fdt.instalatir=mitra_pembangunan.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('fdt_brand', 'fdt.brand=fdt_brand.no', 'left')
            ->order_by('fdt.no', 'desc');
        if ($search != '') {
            $this->db->like('lower(fdt.id_fdt)', strtolower($search));
            $this->db->or_like('lower(odf.nama_odf)', strtolower($search));
            $this->db->or_like('lower(fdt_brand.nama_brand)', strtolower($search));
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('fdt.id_fdt')
            ->from('fdt') //urut berdasarkan id
            ->join('mitra_pembangunan', 'fdt.instalatir=mitra_pembangunan.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('fdt_brand', 'fdt.brand=fdt_brand.no', 'left')
            ->order_by('fdt.no', 'desc');
        if ($search != '') {
            $this->db->like('fdt.id_fdt', $search);
            $this->db->or_like('odf.nama_odf', $search);
            $this->db->or_like('fdt_brand.nama_brand', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function brand()
    {
        $query = $this->db->select('*')
            ->from('fdt_brand') //urut berdasarkan id
            ->order_by('fdt_brand.no', 'desc')
            ->get();
        // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function halaman_fdt($rownomer, $rowper)
    {
        $this->db->select('*')
            ->from('fdt_brand') //urut berdasarkan id
            ->order_by('fdt_brand.no', 'desc');

        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search_fdt($rownomer, $rowper, $search = "")
    {
        $this->db->select('*, fdt_brand.nama_brand')
            ->from('fdt_brand') //urut berdasarkan id
            ->order_by('fdt_brand.no', 'desc');
        if ($search != '') {
            $this->db->like('fdt_brand.nama_brand', $search);
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah_fdt($search = '')
    {
        $this->db->select('*, fdt_brand.nama_brand')
            ->from('fdt_brand') //urut berdasarkan id
            ->order_by('fdt_brand.no', 'desc');
        if ($search != '') {
            $this->db->like('fdt_brand.nama_brand', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }
    public function get($no)
    {
        $query = $this->db->select('*, fdt.no, fdt_brand.nama_brand, fdt.instalatir, fdt.nama_odf, mitra_pembangunan.nama
        as nama_instalatir, odf.nama_odf as odf, fdt.long, fdt.lat, fdt.koordinat')
            ->from('fdt') //urut berdasarkan id
            ->join('mitra_pembangunan', 'fdt.instalatir=mitra_pembangunan.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('fdt_brand', 'fdt.brand=fdt_brand.no', 'left')
            ->where('fdt.no', $no)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function fat($id_fdt)
    {
        $query = $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang,
    fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
    fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long,fat.brand,fat.cluster,fat.instalatir,
    fat.id_fdt, fat_brand.nama_brand, mitra_pembangunan.nama
        as nama_instalatir, cluster.nama_cluster, fdt.id_fdt, fat.jenis,
        fat.kapasitas_port_max - count(pelanggan.no) AS port_idle,
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
            ->where('fat.id_fdt', $id_fdt)
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function count($id_fdt)
    {
        $query = $this->db->select('COUNT(fat.no) as jumlah')
            ->from('fat') //urut berdasarkan id
            ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->order_by('fat.no', 'desc')
            ->where('fat.id_fdt', $id_fdt)
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
        $this->db->delete('fdt');
    }
    public function hapus_brand($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('fdt_brand');
    }
}