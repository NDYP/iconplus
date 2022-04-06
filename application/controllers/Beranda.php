<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Beranda');
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Olt');
        login();
    }
    public function index()
    {
        $query = $this->M_Olt->hc();
        $record = $query->result();
        $y = [];
        //memanggil data jumlah jurnal
        foreach ($record as $row) {
            $y['label'][] = $row->hostname;
            $y['hc'][] = (int)$row->hc;
            $y['title'] = 'KLIK SALAH SATU WARNA';
        }
        $data['chart_data1'] = json_encode($y);
        $hc = $y['hc'];

        $query1 = $this->M_Olt->hp();
        $row = $query1->result_array();
        $x = [];

        //memanggil data jumlah jurnal
        foreach ($row as $key => $value) {
            $x['label'][] = $value['hostname'];
            $x['hp'][] = (int)$value['hp'];
            $x['fat_aktif'][] = $value['fat_aktif'];
            $x['tur'][] = number_format(($hc[$key] / $value['hp'] ?: 1) * 100, 2);
            $x['title'] = 'KLIK SALAH SATU WARNA';
        }

        // echo (int)$hc;

        // number_format((($x['hp'] ?: 1) / $y['hc']), 2);
        $data['chart_data2'] = json_encode($x);

        $data['title'] = 'Beranda';
        $data['title2'] = 'Dashboard';
        $data['title3'] = 'Pelanggan/Bulan';
        $data['mitra'] = $this->M_Beranda->mitra();
        $data['cluster'] = $this->M_Beranda->cluster();
        $data['pop'] = $this->M_Beranda->pop();
        $data['olt'] = $this->M_Beranda->olt();
        $data['odf'] = $this->M_Beranda->odf();
        $data['fdt'] = $this->M_Beranda->fdt();
        $data['fat'] = $this->M_Beranda->fat();
        $data['pelanggan'] = $this->M_Beranda->pelanggan();
        $data['potensi'] = $this->M_Beranda->potensi();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/beranda/index', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function get($nama_cluster)
    {
        $data['cluster'] = $this->M_Pelanggan->get($nama_cluster);
        $url = $data['cluster']['nama_cluster'];
        $url_slug = url_title($url, 'dash', TRUE);
        redirect(base_url('album/galeri/' . $url_slug));
    }
}