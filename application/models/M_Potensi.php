<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Potensi extends CI_Model
{
    public function index()
    {
        $query =
            $this->db->select(
                'pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,pelanggan.marketer,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid, pelanggan.jarak_fat,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp, pelanggan.potensi_status, pelanggan.potensi_callback,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak, fat.status_pembangunan, potensi_status.tag, potensi_callback.callback'
            )
            ->from('pelanggan')
            ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')

            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->where('pelanggan.status', 'Potensi')
            ->or_where('pelanggan.status', 'SPA Cancel')

            ->order_by('pelanggan.no', 'desc')
            ->get();
        return $query;
    }
    public function halaman($rowno, $rowperpage)
    {
        $this->db->select(
            'pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,pelanggan.marketer,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid, pelanggan.jarak_fat,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak, fat.status_pembangunan, potensi_status.tag, potensi_callback.callback'
        )
            ->from('pelanggan')
            ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')

            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc');
        $this->db->limit($rowperpage, $rowno);

        $this->db
            ->where('pelanggan.status', 'Potensi')
            // ->or_where('pelanggan.status', 'SPA Cancel')
            ->or_where('pelanggan.status', 'SPA Cancel');
        $query = $this->db->get();

        return $query->result_array();
    }
    public function search($rowno, $rowperpage, $search = "")
    {
        $this->db->select(
            'pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.marketer,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak,
        fat.status_pembangunan, potensi_status.tag, potensi_callback.callback'
        )
            ->from('pelanggan')
            ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')

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
            $this->db->or_like('lower(pelanggan.marketer)', strtolower($search));
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $this->db
            ->where('pelanggan.status', 'Potensi');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function jumlah($search = "")
    {
        $this->db->select(
            'pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.marketer,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak
        , fat.status_pembangunan, potensi_status.tag, potensi_callback.callback'
        )
            ->from('pelanggan')
            ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')

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
            // $this->db->or_like('content', $search);
            $this->db->or_like('pelanggan.marketer', $search);
        }

        $this->db
            ->where('pelanggan.status', 'Potensi');
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }


    public function indexsales()
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.marketer,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak,
        fat.status_pembangunan, potensi_status.tag, potensi_callback.callback')
            ->from('pelanggan')
            ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')

            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')

            ->where('pelanggan.status', 'Potensi')
            // ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.marketer', $this->session->userdata('username'))
            ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.marketer', $this->session->userdata('username'))
            ->order_by('pelanggan.no', 'desc')

            ->get();
        return $query;
    }
    public function halamansales($rowno, $rowperpage)
    {
        $this->db->select(
            'pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,pelanggan.marketer,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid, pelanggan.jarak_fat,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak, fat.status_pembangunan, potensi_status.tag, potensi_callback.callback'
        )
            ->from('pelanggan')
            ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')

            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc');
        $this->db->limit($rowperpage, $rowno);

        $this->db
            ->where('pelanggan.status', 'Potensi')
            // ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.marketer', $this->session->userdata('username'))
            ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.marketer', $this->session->userdata('username'));
        $query = $this->db->get();

        return $query->result_array();
    }
    public function searchsales($rowno, $rowperpage, $search = "")
    {
        $this->db->select(
            'pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.marketer,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak,
        fat.status_pembangunan, potensi_status.tag, potensi_callback.callback'
        )
            ->from('pelanggan')
            ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')

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
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $this->db
            ->where('pelanggan.status', 'Potensi')
            // ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.marketer', $this->session->userdata('username'));
        // ->or_where('pelanggan.status', 'SPA Cancel')
        // ->where('pelanggan.marketer', $this->session->userdata('username'));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function jumlahsales($search = "")
    {
        $this->db->select(
            'pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith, pelanggan.marketer,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak
        , fat.status_pembangunan, potensi_status.tag, potensi_callback.callback'
        )
            ->from('pelanggan')
            ->join('potensi_callback', 'pelanggan.potensi_callback=potensi_callback.no', 'left')
            ->join('potensi_status', 'pelanggan.potensi_status=potensi_status.no', 'left')

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
            // $this->db->or_like('content', $search);
        }

        $this->db
            ->where('pelanggan.status', 'Potensi')
            // ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.marketer', $this->session->userdata('username'));
        // ->or_where('pelanggan.status', 'SPA Cancel')
        // ->where('pelanggan.marketer', $this->session->userdata('username'));
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function spa()
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fdt.lat)) as jarak,
        pelanggan.jarak_fat, fat.status_pembangunan, pelanggan.note, pelanggan.facebook, pelanggan.instagram')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->where('pelanggan.status', 'SPA')
            ->order_by('pelanggan.no', 'desc')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function halamanspa($rowno, $rowperpage)
    {
        $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak,
         fat.status_pembangunan')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc');

        $this->db->limit($rowperpage, $rowno);
        $this->db->where('pelanggan.status', 'SPA');
        $query = $this->db->get();

        return $query->result_array();
    }
    public function searchspa($rowno, $rowperpage, $search = "")
    {
        $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak, fat.status_pembangunan')
            ->from('pelanggan')
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
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $this->db->where('pelanggan.status', 'SPA');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function jumlahspa($search = "")
    {
        $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,
        mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,
        ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak, fat.status_pembangunan')
            ->from('pelanggan')
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
            // $this->db->or_like('content', $search);
        }

        $this->db->where('pelanggan.status', 'SPA');
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }


    public function spasales()
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fdt.lat)) as jarak,
        pelanggan.jarak_fat, fat.status_pembangunan, pelanggan.note, pelanggan.facebook, pelanggan.instagram')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->where('pelanggan.status', 'SPA')
            ->where('pelanggan.penginput', $this->session->userdata('username'))
            ->order_by('jarak', 'desc')
            ->get(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function halamanspasales($rowno, $rowperpage)
    {
        $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak,
         fat.status_pembangunan')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->order_by('pelanggan.no', 'desc');
        $this->db->limit($rowperpage, $rowno);
        $this->db->where('pelanggan.status', 'SPA')
            ->where('pelanggan.penginput', $this->session->userdata('username'));
        $query = $this->db->get();

        return $query->result_array();
    }
    public function searchspasales($rowno, $rowperpage, $search = "")
    {
        $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak, fat.status_pembangunan')
            ->from('pelanggan')
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
            // $this->db->or_like('content', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $this->db->where('pelanggan.status', 'SPA')
            ->where('pelanggan.penginput', $this->session->userdata('username'));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function jumlahspasales($search = "")
    {
        $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
        pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
        pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
        pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
        pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
        pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
        cluster.nama_cluster,
        mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi, pelanggan.instagram, pelanggan.facebook,
        pop.id_pop, olt.hostname, fdt.id_fdt,
        ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak, fat.status_pembangunan')
            ->from('pelanggan')
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
            // $this->db->or_like('content', $search);
        }

        $this->db->where('pelanggan.status', 'SPA')
            ->where('pelanggan.penginput', $this->session->userdata('username'));
        $query = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }



    public function index_sales()
    {
        $query = $this->db->select('
    pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
    pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
    cluster.nama_cluster,
    mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi,
    pop.id_pop, olt.hostname, fdt.id_fdt,
    ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fat.lat)) as jarak
    , fat.status_pembangunan')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')

            ->where('pelanggan.status', 'Potensi')
            ->or_where('pelanggan.status', 'SPA Cancel')
            ->where('pelanggan.penginput', $this->session->userdata('username'))
            ->order_by('pelanggan.no', 'desc')

            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function spa_sales()
    {
        $query = $this->db->select('
    pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,pelanggan.panjang_kabel_dropcore,
    pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,pelanggan.no,pelanggan.lat,pelanggan.long,
    pelanggan.instalatir,pelanggan.brand,pelanggan.status,pelanggan.penginput,pelanggan.timestamp,
    cluster.nama_cluster,mitra_pembangunan.nama as nama_instalatir, fat.id_fat, pelanggan.tanggal_instalasi,
    pop.id_pop, olt.hostname, fdt.id_fdt,ST_DistanceSphere(ST_MakePoint(pelanggan.long,pelanggan.lat),ST_MakePoint(fat.long,fdt.lat)) as jarak
    , pelanggan.jarak_fat, fat.status_pembangunan, pelanggan.note, pelanggan.facebook, pelanggan.instagram')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->where('pelanggan.status', 'SPA')
            ->where('pelanggan.marketer', $this->session->userdata('username'))
            ->order_by('jarak', 'desc')
            ->get()
            ->result_array(); //ditampilkan dalam bentuk array
        return $query;
    }
    public function get($no)
    {
        $query = $this->db->select('    pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
    pelanggan.koordinat,pelanggan.no_va,pelanggan.service,pelanggan.bandwith,
    pelanggan.paket_tambahan,pelanggan.biaya_instalasi,pelanggan.no_spa,pelanggan.sid,
    pelanggan.sn_ont,pelanggan.jenis_konektor_ont,pelanggan.sn_stb,pelanggan.jenis_kabel_dropcore,
    pelanggan.panjang_kabel_dropcore, pelanggan.dbm,pelanggan.tanggal_instalasi,pelanggan.port_fat,
    pelanggan.no,pelanggan.lat,pelanggan.long,pelanggan.instalatir,pelanggan.id_fat as fat,pelanggan.brand,
    pelanggan.status,  fat.id_fat, pop.id_pop,
    olt.hostname, fdt.id_fdt, fat.tray_fdt, odf.nama_odf, odf.port_olt,fdt.port_odf,
    olt.hostname, fat.port_fdt,pelanggan.jarak_fat,  pelanggan.marketer, pelanggan.penginput,
    pelanggan.timestamp, pelanggan.note, pelanggan.facebook, pelanggan.instagram')
            ->from('pelanggan')
            ->join('fat', 'pelanggan.id_fat=fat.no', 'left')
            ->join('cluster', 'fat.cluster=cluster.no', 'left')
            ->join('mitra_pembangunan', 'pelanggan.instalatir=mitra_pembangunan.no', 'left')
            ->join('fdt', 'fat.id_fdt=fdt.no', 'left')
            ->join('odf', 'fdt.nama_odf=odf.no', 'left')
            ->join('olt', 'odf.hostname_olt=olt.no', 'left')
            ->join('pop', 'olt.id_pop=pop.no', 'left')
            ->where('pelanggan.status', 'Potensi')
            ->where('pelanggan.no', $no)
            ->or_where('pelanggan.status', 'SPA Cancel')
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
}