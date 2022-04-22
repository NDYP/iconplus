<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Spa extends CI_Model
{

    public function get($no)
    {
        $query = $this->db->select('pelanggan.nik,pelanggan.nama,pelanggan.id_pln,pelanggan.no_hp, pelanggan.email,pelanggan.alamat,
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
            ->where('pelanggan.status', 'SPA')
            ->where('pelanggan.no', $no)

            ->get()
            ->row_array(); //ditampilkan dalam bentuk array
        return $query;
    }

    public function hapus($no)
    {
        $this->db->where('no', $no);
        $this->db->delete('pelanggan');
    }
}