<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Olt extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('olt.hostname, olt.sn_olt, olt.type, olt.kapasitas_pon_max, olt.kapasitas_pon_terpasang,mitra_pembangunan.nama as nama_instalatir,
        olt_brand.nama_brand as nama_brand, olt.no as no, olt.status,
        pop.id_pop as pop, olt.id_pop, count(pelanggan.no) as hc, count(fat.kapasitas_port_terpasang) as hp, olt.tanggal_instalasi')
            ->from('olt') //urut berdasarkan id
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->join('mitra_pembangunan', 'olt.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt_brand', 'olt.brand=olt_brand.no', 'left')

            ->join('odf', 'olt.no=odf.hostname_olt', 'left')
            ->join('fdt', 'fdt.nama_odf=odf.no', 'left')
            ->join('fat', 'fdt.no=fat.id_fdt', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->order_by('olt.no', 'desc')

            ->group_by('olt_brand.nama_brand', 'desc')
            ->group_by('mitra_pembangunan.nama')
            ->group_by('olt.hostname')
            ->group_by('pop.id_pop')
            ->get();
        // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function hc()
    {
        // $query = $this->db->select('olt.hostname,
        // count(pelanggan.no) as hc
        // ')
        //     ->from('olt') //urut berdasarkan id
        //     ->where('fat.status_pembangunan', 'Ready for sale')
        //     ->join('odf', 'olt.no=odf.hostname_olt', 'left')
        //     ->join('fdt', 'odf.no=fdt.nama_odf', 'left')
        //     ->join('fat', 'fdt.no=fat.id_fdt', 'left')
        //     ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
        //     ->where('pelanggan.status', 'SPA Closed')
        //     ->order_by('olt.no', 'desc')
        //     ->group_by('olt.hostname')
        //     ->get(); //ditampilkan dalam bentuk array
        // return $query;
        $query = $this->db->select('fat.olt,
        count(pelanggan.no) as hc')
            ->from('fat') //urut berdasarkan id
            ->where('fat.status_pembangunan', 'Ready for sale')
            ->where('fat.status_pembangunan', 'Ready for sale')
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->where('pelanggan.status', 'SPA Closed')
            ->order_by('fat.olt', 'desc')
            ->group_by('fat.olt')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function table1()
    {
        $query = $this->db->select('cluster.nama_cluster, SUM(fat.kapasitas_port_terpasang) as hp, count(fat.kapasitas_port_terpasang) as fat_aktif')
            ->from('fat') //urut berdasarkan id
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->where('fat.status_pembangunan', 'Ready for sale')
            ->order_by('cluster.nama_cluster', 'asc')
            ->group_by('cluster.nama_cluster')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function hc_new()
    {
        $query = $this->db->select('cluster.nama_cluster,
        count(pelanggan.no) as hc')
            ->from('fat') //urut berdasarkan id
            ->where('fat.status_pembangunan', 'Ready for sale')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->where('pelanggan.status', 'SPA Closed')
            ->order_by('cluster.nama_cluster', 'asc')
            ->group_by('cluster.nama_cluster')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function hc_bulan()
    {
        $where = "date_trunc('year', pelanggan.tanggal_instalasi) = now('Y')";

        $query = $this->db->select("extract(Month from pelanggan.tanggal_instalasi) as bulan,
        count(pelanggan.no) as hc
        ")
            ->from('pelanggan') //urut berdasarkan id

            ->order_by('bulan', 'asc')
            ->group_by('bulan')
            ->where('pelanggan.status', 'SPA Closed')
            ->where('pelanggan.tanggal_instalasi !=', NULL)
            ->where('extract(year from pelanggan.tanggal_instalasi) =', date('Y'))
            // ->group_by("extract(year from pelanggan.tanggal_instalasi)")
            // ->group_by("extract(month from pelanggan.tanggal_instalasi)")
            // ->group_by("pelanggan.tanggal_instalasi")
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function hp()
    {
        // $query = $this->db->select('olt.hostname, SUM(fat.kapasitas_port_terpasang) as hp, count(fat.kapasitas_port_terpasang) as fat_aktif')
        //     ->from('olt') //urut berdasarkan id
        //     ->where('fat.status_pembangunan', 'Ready for sale')
        //     ->join('odf', 'olt.no=odf.hostname_olt', 'left')
        //     ->join('fdt', 'odf.no=fdt.nama_odf', 'left')
        //     ->join('fat', 'fdt.no=fat.id_fdt', 'left')
        //     ->order_by('olt.no', 'desc')
        //     ->group_by('olt.hostname')
        //     ->get(); //ditampilkan dalam bentuk array
        // return $query;
        $query = $this->db->select('fat.olt, SUM(fat.kapasitas_port_terpasang) as hp, count(fat.kapasitas_port_terpasang) as fat_aktif')
            ->from('fat') //urut berdasarkan id
            ->where('fat.status_pembangunan', 'Ready for sale')
            ->order_by('fat.olt', 'desc')
            ->group_by('fat.olt')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function hp_new()
    {
        $query = $this->db->select('cluster.nama_cluster, SUM(fat.kapasitas_port_terpasang) as hp, count(fat.kapasitas_port_terpasang) as fat_aktif')
            ->from('fat') //urut berdasarkan id
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->where('fat.status_pembangunan', 'Ready for sale')
            ->order_by('cluster.nama_cluster', 'asc')
            ->group_by('cluster.nama_cluster')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function halaman($rownomer, $rowper)
    {
        $this->db->select('*, mitra_pembangunan.nama as nama_instalatir,olt_brand.nama_brand as nama_brand, olt.no as no,
        pop.id_pop as pop, olt.id_pop')
            ->from('olt') //urut berdasarkan id
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->join('mitra_pembangunan', 'olt.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt_brand', 'olt.brand=olt_brand.no', 'left')
            ->order_by('olt.no', 'desc');

        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search($rownomer, $rowper, $search = "")
    {
        $this->db->select('*, mitra_pembangunan.nama as nama_instalatir,olt_brand.nama_brand as nama_brand, olt.no as no,
        pop.id_pop as pop, olt.id_pop')
            ->from('olt') //urut berdasarkan id
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->join('mitra_pembangunan', 'olt.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt_brand', 'olt.brand=olt_brand.no', 'left')
            ->order_by('olt.no', 'desc');
        if ($search != '') {
            $this->db->like('olt.hostname', strtolower($search));
            $this->db->or_like('pop.id_pop', strtolower($search));
        }
        $this->db->limit($rowper, $rownomer);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('olt.hostname')
            ->from('olt') //urut berdasarkan id
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->join('mitra_pembangunan', 'olt.instalatir=mitra_pembangunan.no', 'left')
            ->join('olt_brand', 'olt.brand=olt_brand.no', 'left')
            ->order_by('olt.no', 'desc');
        if ($search != '') {
            $this->db->like('olt.hostname', $search);
            $this->db->or_like('pop.id_pop', $search);
            // $this->db->or_like('content', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function brand()
    {
        $query = $this->db->select('*')
            ->from('olt_brand') //urut berdasarkan id
            ->order_by('olt_brand.no', 'desc')
            ->get();
        // ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function halaman_olt($rowno, $rowperpage)
    {
        $query = $this->db->select('*')
            ->from('olt_brand') //urut berdasarkan id
            ->order_by('olt_brand.no', 'desc');

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function search_olt($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*, olt_brand.no,olt_brand.nama_brand')
            ->from('olt_brand') //urut berdasarkan id
            ->order_by('olt_brand.no', 'desc');
        if ($search != '') {
            $this->db->like('lower(olt_brand.nama_brand)', strtolower($search));
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah_olt($search = '')
    {
        $this->db->select('*, olt_brand.nama_brand')
            ->from('olt_brand') //urut berdasarkan id
            ->order_by('olt_brand.no', 'desc');
        if ($search != '') {
            $this->db->like('olt_brand.nama_brand', $search);
            // $this->db->or_like('content', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
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
