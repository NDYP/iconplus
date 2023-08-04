<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pelanggan extends CI_Model
{
    public function index()
    {
        $query = $this->db->select('
    pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
    pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
    cluster.nama_cluster, fat.olt, mitra_pembangunan.no as no_mitra, id_pel,
    mitra_pembangunan.nama as nama_instalatir, fat.id_fat,fat.no as no_fat, pelanggan.tanggal_instalasi, fat.long as fat_long, fat.lat as fat_lat,
    pop.id_pop, olt.hostname, fdt.id_fdt, pelanggan.instagram, pelanggan.facebook,
    ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fdt.lat)) as jarak, fat.kapasitas_port_terpasang,
    , pelanggan.note')
            ->from('pelanggan')
            ->where('pelanggan.status', 'SPA Closed')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc')
            ->get();
        return $query;
    }
    public function halaman($rowno, $rowperpage)
    {
        $this->db->select('
    pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
    pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
    cluster.nama_cluster,
    mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi,
    pop.id_pop, olt.hostname, fdt.id_fdt, pelanggan.instagram, pelanggan.facebook,
    ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fdt.lat)) as jarak,
    , pelanggan.note')
            ->from('pelanggan')
            ->where('pelanggan.status', 'SPA Closed')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc');

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }
    public function search($rowno, $rowperpage, $search = "")
    {
        $this->db->select('
    pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
    pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
    cluster.nama_cluster,
    mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi,
    pop.id_pop, olt.hostname, fdt.id_fdt, pelanggan.instagram, pelanggan.facebook,
    ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fdt.lat)) as jarak,
    , pelanggan.note')
            ->from('pelanggan')
            ->where('pelanggan.status', 'SPA Closed')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc');
        if ($search != '') {
            $this->db->like('lower(pelanggan.nama)', strtolower($search));
            $this->db->or_like('lower(pelanggan.no_spa)', strtolower($search));
            $this->db->or_like('lower(pelanggan.sid)', strtolower($search));
            $this->db->or_like('lower(fat.id_fat)', strtolower($search));
            $this->db->or_like('lower(fdt.id_fdt)', strtolower($search));
            $this->db->or_like('lower(fat.olt)', strtolower($search));
            $this->db->or_like('lower(pop.id_pop)', strtolower($search));
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    public function jumlah($search = "")
    {
        $this->db->select('
    pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
    pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
    cluster.nama_cluster,
    mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi,
    pop.id_pop, olt.hostname, fdt.id_fdt, pelanggan.instagram, pelanggan.facebook,
    ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fdt.lat)) as jarak,
    , pelanggan.note')
            ->from('pelanggan')
            ->where('pelanggan.status', 'SPA Closed')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc');
        if ($search != '') {
            $this->db->like('pelanggan.nama', $search);
            $this->db->or_like('pelanggan.no_spa', $search);
            $this->db->or_like('fat.id_fat', $search);
            $this->db->or_like('fdt.id_fdt', $search);
            $this->db->or_like('fat.olt', $search);
            $this->db->or_like('pop.id_pop', $search);
        }
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }
    public function perbulan()
    {
        $where = "extract(year from tanggal_instalasi) = date_part('year',now())";
        $query = $this->db->select("COUNT(pelanggan.no_spa) as count, TO_CHAR(current_timestamp, 'Month') as month_name")
            ->from('pelanggan')
            // ->where($where)
            ->group_by('extract(month from tanggal_instalasi)')
            ->group_by('extract(year from tanggal_instalasi)')
            ->get();
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('
    pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.id_pel,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
    pelanggan.instalatir,pelanggan.id_fat as fat,pelanggan.brand,pelanggan.status, 
        cluster.nama_cluster, pelanggan.instagram, pelanggan.facebook, pelanggan.marketer, pelanggan.timestamp,
        mitra_pembangunan.nama as nama_instalatir, fat.id_fat,
        pop.id_pop, olt.hostname, fdt.id_fdt, fat.tray_fdt, odf.nama_odf, odf.port_olt,fdt.port_odf,
        olt.hostname, fat.port_fdt, pelanggan.jarak_fat, pelanggan.marketer, pelanggan.timestamp,
        pelanggan.penginput, pelanggan.note')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->where('pelanggan.no', $no)
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
        $this->db->delete('pelanggan');
    }
    public function status_potensi($potensi_status)
    {
        $query = $this->db->select('potensi_status.no as id_potensi_status,potensi_callback.no as id_potensi_callback,
        potensi_callback.callback, potensi_callback.potensi_status, potensi_status.tag') //pilih semua
            ->from('potensi_status') //dari tbel user
            ->join('potensi_callback', 'potensi_status.no=potensi_callback.potensi_status', 'left')
            ->where('potensi_status.no', $potensi_status)
            ->order_by('potensi_status.no', 'desc') //urut berdasarkan id
            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }
}