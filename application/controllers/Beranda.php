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
        $query = $this->M_Olt->tur();
        $record = $query->result();
        $data = [];

        //memanggil data jumlah jurnal
        foreach ($record as $row) {
            $data['label'][] = $row->hostname;
            $data['data'][] = number_format(($row->hc / ($row->hp ?: 1)) * 100, 2);
            $data['title'] = 'TUR OLT';
        }
        $data['chart_data'] = json_encode($data);

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