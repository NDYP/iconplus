<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Fat extends CI_Model
{
    public function index()
    {
        $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang,
        fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
        fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long,fat.brand,fat.cluster,fat.instalatir,
        fat.id_fdt as no_fdt, fat_brand.nama_brand, mitra_pembangunan.nama
        as nama_instalatir, cluster.nama_cluster, fdt.id_fdt, fat.jenis, fat.olt,
        fat.kapasitas_port_terpasang - count(pelanggan.no) AS port_idle,
        count(pelanggan.no) AS jumlah_pelanggan, olt.hostname, pop.id_pop,
        ST_DistanceSphere(ST_MakePoint(fat.long,fat.lat),ST_MakePoint(fdt.long,fdt.lat)) as jarak, fat.timestamp, fat.penginput')
            ->from('fat') //urut berdasarkan id
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            // ->where('pelanggan.status', 'SPA Closed')
            ->where('fat.status_pembangunan', 'Ready for sale')
            ->or_where('fat.status_pembangunan', 'FULL')
            ->order_by('fat.no', 'desc')
            ->group_by('fat.no')
            ->group_by('fat_brand.nama_brand')
            ->group_by('mitra_pembangunan.nama')
            ->group_by('cluster.nama_cluster')
            ->group_by('olt.hostname')
            ->group_by('pop.id_pop')
            ->group_by('fdt.id_fdt');
        return $this->db->get();
    }
    public function halaman($rowno, $rowperpage)
    {
        $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang,
        fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
        fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long,fat.brand,fat.cluster,fat.instalatir,
        fat.id_fdt as no_fdt, fat_brand.nama_brand, mitra_pembangunan.nama
        as nama_instalatir, cluster.nama_cluster, fdt.id_fdt, fat.jenis, fat.olt,
        fat.kapasitas_port_terpasang - count(pelanggan.no) AS port_idle,
        count(pelanggan.no) AS jumlah_pelanggan, olt.hostname, pop.id_pop,
        ST_DistanceSphere(ST_MakePoint(fat.long,fat.lat),ST_MakePoint(fdt.long,fdt.lat)) as jarak, fat.timestamp, fat.penginput')
            ->from('fat') //urut berdasarkan id
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            // ->where('pelanggan.status', 'SPA Closed')
            ->where('fat.status_pembangunan', 'Ready for sale')
            ->or_where('fat.status_pembangunan', 'FULL')

            ->order_by('fat.no', 'desc')
            ->group_by('fat.no')
            ->group_by('fat_brand.nama_brand')
            ->group_by('mitra_pembangunan.nama')
            ->group_by('cluster.nama_cluster')
            ->group_by('olt.hostname')
            ->group_by('pop.id_pop')
            ->group_by('fdt.id_fdt');
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function search($rowno, $rowperpage, $search = "")
    {
        $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang, fat.olt,
        fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
        fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long,fat.brand,fat.cluster,fat.instalatir,
        fat.id_fdt as no_fdt, fat_brand.nama_brand, mitra_pembangunan.nama as nama_instalatir, cluster.nama_cluster, fdt.id_fdt, fat.jenis,
        fat.kapasitas_port_terpasang - count(pelanggan.no) AS port_idle,count(pelanggan.no) AS jumlah_pelanggan, olt.hostname, pop.id_pop,
        ST_DistanceSphere(ST_MakePoint(fat.long,fat.lat),ST_MakePoint(fdt.long,fdt.lat)) as jarak, fat.timestamp, fat.penginput')
            ->from('fat') //urut berdasarkan id
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('fat.no', 'desc')
            ->group_by('fat.no')
            ->group_by('fat_brand.nama_brand')
            ->group_by('mitra_pembangunan.nama')
            ->group_by('cluster.nama_cluster')
            ->group_by('olt.hostname')
            ->group_by('pop.id_pop')
            ->group_by('fdt.id_fdt');
        if ($search != '') {
            $this->db->like('(fat.id_fat)', $search);
            $this->db->or_like('lower(fat.status_pembangunan)', strtolower($search));
            $this->db->or_like('lower(pop.id_pop)', strtolower($search));
            $this->db->or_like('lower(fat.olt)', strtolower($search));
            $this->db->or_like('lower(fdt.id_fdt)', strtolower($search));
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah($search = '')
    {
        $this->db->select('fat.id_fat')
            ->from('fat') //urut berdasarkan id
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('fat.no', 'desc')
            ->group_by('fat.no')
            ->group_by('fat_brand.nama_brand')
            ->group_by('mitra_pembangunan.nama')
            ->group_by('cluster.nama_cluster')
            ->group_by('olt.hostname')
            ->group_by('pop.id_pop')
            ->group_by('fdt.id_fdt');
        if ($search != '') {
            $this->db->like('fat.id_fat', $search);
            $this->db->or_like('fat.status_pembangunan', $search);
            $this->db->or_like('pop.id_pop', $search);
            $this->db->or_like('fat.olt', $search);
            $this->db->or_like('fdt.id_fdt', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function brand()
    {
        $query = $this->db->select('*')
            ->from('fat_brand') //urut berdasarkan id
            ->order_by('fat_brand.no', 'desc');
        // ->get();
        // ->result_array(); //ditampilkan dalam bentuk array
        return $this->db->get();
    }
    public function halaman_fat($rowno, $rowperpage)
    {
        $query = $this->db->select('*')
            ->from('fat_brand') //urut berdasarkan id
            ->order_by('fat_brand.no', 'desc');
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function search_fat($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*')
            ->from('fat_brand') //urut berdasarkan id
            ->order_by('fat_brand.no', 'desc');
        if ($search != '') {
            $this->db->like('fat_brand.nama_brand', $search);
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function jumlah_fat($search = '')
    {
        $this->db->select('fat_brand.nama_brand')
            ->from('fat_brand') //urut berdasarkan id
            ->order_by('fat_brand.no', 'desc');
        if ($search != '') {
            $this->db->like('fat_brand.nama_brand', $search);
            // $this->db->or_like('content', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function fatready()
    {
        $query = $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang, fat.olt,
    fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
    fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long,fat.brand,fat.cluster,fat.instalatir,
    fat.id_fdt as no_fdt, fat_brand.nama_brand, mitra_pembangunan.nama
        as nama_instalatir, cluster.nama_cluster, fdt.id_fdt, fat.jenis,
        fat.kapasitas_port_terpasang - count(pelanggan.no) AS port_idle,
    count(pelanggan.no) AS jumlah_pelanggan, olt.hostname, pop.id_pop,
    ST_DistanceSphere(ST_MakePoint(fat.long,fat.lat),ST_MakePoint(fdt.long,fdt.lat)) as jarak, fat.timestamp, fat.penginput')
            ->from('fat') //urut berdasarkan id
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            // ->where('pelanggan.status', 'SPA Closed')
            ->order_by('fat.no', 'desc')
            ->group_by('fat.no')
            ->group_by('fat_brand.nama_brand')
            ->group_by('mitra_pembangunan.nama')
            ->group_by('cluster.nama_cluster')
            ->group_by('olt.hostname')
            ->group_by('pop.id_pop')
            ->group_by('fdt.id_fdt')
            ->where('status_pembangunan', 'Ready for sale')
            ->where('fat.long !=', NULL)
            ->where('fat.lat !=', NULL)
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function fatongoing()
    {
        $query = $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang,
    fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
    fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long')
            ->from('fat') //urut berasarkan id
            ->where('status_pembangunan', 'Plan/Ongoing')
            ->where('fat.long !=', NULL)
            ->where('fat.lat !=', NULL)
            ->order_by('fat.id_fat')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function fatproses()
    {
        $query = $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang,
    fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
    fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long')
            ->from('fat') //urut berdasarkan id
            ->where('status_pembangunan', 'Proses pembangunan')
            ->where('fat.long !=', NULL)
            ->where('fat.lat !=', NULL)
            ->order_by('fat.id_fat')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function polemap()
    {
        $query = $this->db->select('*')
            ->from('pole') //urut berdasarkan id
            ->order_by('pole.id')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pelanggan_eks()
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.instagram, pelanggan.facebook, pelanggan.marketer, pelanggan.timestamp,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long')
            ->from('pelanggan') //urut berdasarkan spa
            ->where('pelanggan.status', 'SPA Closed')
            ->where('pelanggan.long !=', NULL)
            ->where('pelanggan.lat !=', NULL)
            ->order_by('pelanggan.no')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }


    public function spa_sales()
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.instagram, pelanggan.facebook, pelanggan.marketer, pelanggan.timestamp,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long')
            ->from('pelanggan') //urut berdasarkan spa
            ->where('pelanggan.status', 'SPA')
            ->where('pelanggan.penginput', $this->session->userdata('username'))
            ->where('pelanggan.long !=', NULL)
            ->where('pelanggan.lat !=', NULL)
            ->order_by('pelanggan.no')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function potensi()
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.instagram, pelanggan.facebook, pelanggan.marketer, pelanggan.timestamp,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long
            ')
            ->from('pelanggan') //urut berdasarkan spa
            // ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            // ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')
            ->where('pelanggan.status', 'Potensi')
            ->where('pelanggan.long !=', NULL)
            ->where('pelanggan.lat !=', NULL)
            ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.long !=', NULL)
            ->where('pelanggan.lat !=', NULL)
            // ->order_by('pelanggan.no')
            // ->where('pelanggan.marketer', $this->session->userdata('username'))
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function potensi_sales()
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.instagram, pelanggan.facebook, pelanggan.marketer, pelanggan.timestamp,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long')
            ->from('pelanggan') //urut berdasarkan spa
            ->where('pelanggan.status', 'Potensi')
            // ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.marketer', $this->session->userdata('username'))
            ->where('pelanggan.long !=', NULL)
            ->where('pelanggan.lat !=', NULL)
            ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.marketer', $this->session->userdata('username'))
            ->where('pelanggan.long !=', NULL)
            ->where('pelanggan.lat !=', NULL)
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function spa()
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.instagram, pelanggan.facebook, pelanggan.marketer, pelanggan.timestamp,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long')
            ->from('pelanggan') //urut berdasarkan spa
            ->where('pelanggan.status', 'SPA')
            ->where('pelanggan.long !=', NULL)
            ->where('pelanggan.lat !=', NULL)

            // ->where('pelanggan.marketer', $this->session->userdata('username'))
            ->order_by('pelanggan.no')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function get($no)
    {
        $query = $this->db->select('fat.id_fat,fat.jenis,fat.kapasitas_port_max,fat.kapasitas_port_terpasang,
    fat.jenis_konektor,fat.power_in,fat.power_out,fat.power_losses,fat.status_pembangunan,fat.koordinat,
    fat.tray_fdt,fat.port_fdt,fat.tanggal_instalasi,fat.no,fat.lat,fat.long,fat.brand,fat.cluster,fat.instalatir,
    fat.id_fdt as no_fdt, fat_brand.nama_brand, mitra_pembangunan.nama
        as nama_instalatir, cluster.nama_cluster, fdt.id_fdt, fat.jenis, fat.olt,
        fat.kapasitas_port_max - count(pelanggan.no) AS port_idle,
    count(pelanggan.no) AS jumlah_pelanggan, olt.hostname, pop.id_pop,
    ST_DistanceSphere(ST_MakePoint(fat.long,fat.lat),ST_MakePoint(fdt.long,fdt.lat)) as jarak, fat.timestamp, fat.penginput')
            ->from('fat') //urut berdasarkan id
            ->join('pelanggan', 'fat.no=pelanggan.id_fat', 'left')
            ->join('fat_brand', 'fat.brand=fat_brand.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('mitra_pembangunan', 'fat.instalatir=mitra_pembangunan.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            // ->where('status_pembangunan', 'Ready for sale')
            // ->where('pelanggan.status', 'SPA Closed')

            ->order_by('fat.no', 'desc')
            ->group_by('fat.no')
            ->group_by('fat_brand.nama_brand')
            ->group_by('mitra_pembangunan.nama')
            ->group_by('cluster.nama_cluster')
            ->group_by('olt.hostname')
            ->group_by('pop.id_pop')
            ->group_by('fdt.id_fdt')
            ->where('fat.no', $no)
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function pelanggan($id_fat)
    {
        $query = $this->db->select('*, pelanggan.no as no_pelanggan, pelanggan.nama, 
        pelanggan.brand,pelanggan.paket_tambahan,
        pelanggan.instalatir, pelanggan.id_fat, cluster.nama_cluster,
        mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi,
        pelanggan.koordinat, pelanggan.lat, pelanggan.long, pop.id_pop, olt.hostname, fdt.id_fdt')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc')
            ->where('pelanggan.id_fat', $id_fat)
            ->where('pelanggan.status', 'SPA Closed')
            ->order_by('pelanggan.no', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function count($id_fat)
    {
        $query = $this->db->select('COUNT(pelanggan.no) as jumlah')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->order_by('pelanggan.no', 'desc')
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
        $this->db->delete('fat');
    }
    public function hapus_brand($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('fat_brand');
    }
}