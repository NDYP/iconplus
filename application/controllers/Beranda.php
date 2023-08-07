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
        $query = $this->M_Olt->hc_new();
        $record = $query->result();
        $y = [];
        //memanggil data jumlah jurnal
        foreach ($record as $row) {
            $y['label'][] = $row->nama_cluster;
            // $y['bulan'][] = $row->bulan;
            $y['hc'][] = (int)$row->hc;
            $y['title'] = 'KLIK SALAH SATU WARNA';
        }
        $data['chart_data1'] = json_encode($y);
        $hc = $y['hc']; //sebelumnya tanpa int

        $query1 = $this->M_Olt->hp_new();
        $row = $query1->result_array();
        $x = [];

        //memanggil data jumlah jurnal
        foreach ($row as $key => $value) {
            $x['label'][] = $value['nama_cluster'];
            $x['hp'][] = (int)$value['hp'];
            $x['fat_aktif'][] = $value['fat_aktif'];
            $x['tur'][] = number_format(($hc[$key] / $value['hp']) * 100, 2);
            $x['title'] = 'KLIK SALAH SATU WARNA';
        }
        $data['chart_data2'] = json_encode($x);




        ///////////////////////////////////////////////////////
        $query2 = $this->M_Olt->hc_bulan();
        $x = $query2->result();
        $z = [];
        //memanggil data jumlah jurnal
        foreach ($x as $row) {
            // $z['label'][] = $row->hostname;
            $y['bulan'] = (array) $row->bulan;
            $z['hc'][] = (int)$row->hc;
            $z['title'] = 'KLIK SALAH SATU WARNA';
        }
        $data['chart_data3'] = json_encode($z);


        // TUR OLT
        $query = $this->M_Olt->hc();
        $record = $query->result();
        $y = [];
        foreach ($record as $row) {
            $y['label'][] = $row->olt;
            // $y['bulan'][] = $row->bulan;
            $y['hc'][] = (int)$row->hc;
            $y['title'] = 'KLIK SALAH SATU WARNA';
        }
        $data['chart_data4'] = json_encode($y);
        $hc = $y['hc'];

        $query1 = $this->M_Olt->hp();
        $row = $query1->result_array();
        $x = [];

        foreach ($row as $key => $value) {
            $x['label'][] = $value['olt'];
            $x['hp'][] = (int)$value['hp'];
            $x['fat_aktif'][] = $value['fat_aktif'];
            $x['tur'][] = number_format(($hc[$key] / $value['hp']) * 100, 2);
            $x['title'] = 'KLIK SALAH SATU WARNA';
        }
        $data['chart_data5'] = json_encode($x);

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
        $data['hp'] = $this->M_Beranda->hp()->result_array();
        $data['pelanggan'] = $this->M_Beranda->pelanggan();
        $data['potensi'] = $this->M_Beranda->potensi();

        $query = $this->M_Olt->hc_new();
        $record = $query->result();
        $y = [];
        //memanggil data jumlah jurnal
        foreach ($record as $row) {
            $y['label'][] = $row->nama_cluster;
            // $y['bulan'][] = $row->bulan;
            $y['hc'][] = (int)$row->hc;
            $y['title'] = 'KLIK SALAH SATU WARNA';
        }
        $data['chart_data1'] = json_encode($y);
        $data['hc'] = $y['hc'];


        $six = $this->M_Olt->table1();
        $data['xnxx'] = $six->result_array();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/beranda/index', $data);
        $this->load->view('admin/template/footer2', $data);
        // var_dump($data['chart_data3']);
        // var_dump($data['tabelx']);
    }
    function get($nama_cluster)
    {
        $data['cluster'] = $this->M_Pelanggan->get($nama_cluster);
        $url = $data['cluster']['nama_cluster'];
        $url_slug = url_title($url, 'dash', TRUE);
        redirect(base_url('album/galeri/' . $url_slug));
    }
}
