<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Beranda');
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Odf');
        $this->load->model('M_Mitra');
        $this->load->model('M_Cluster');
        $this->load->model('M_Pop');
        $this->load->model('M_Olt');
        $this->load->model('M_Odf');
        $this->load->model('M_Fdt');
        $this->load->model('M_Fat');
        $this->load->model('M_Potensi');
        login();
    }
    public function index()
    {
        $data['title'] = 'Maps';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index()->result_array();
        // $data['cluster'] = $this->M_Cluster->index()->result_array();

        //$pelanggan = $this->M_Fat->pelanggan_pot();
        if (
            $this->session->userdata('akses') == 'Sales Internal'
            or $this->session->userdata('akses') == 'Sales Eksternal'
        ) {
            $data['fatmap'] = $this->M_Fat->fatready();
            // $data['fatongoing'] = $this->M_Fat->fatongoing();
            // $data['fatproses'] = $this->M_Fat->fatproses();
            // $data['polemap'] = $this->M_Fat->polemap();
            // $data['fat'] = $this->M_Fat->index()->result_array();
            // $data['pelanggan_eks'] = $this->M_Fat->pelanggan_eks();
            // $data['pelanggan_pot'] = $this->M_Fat->potensi_sales();
            // $data['pelanggan_open'] = $this->M_Fat->spa();
        } elseif ($this->session->userdata('akses') == 'Admin') {
            $data['fatmap'] = $this->M_Fat->fatready();
            // $data['fatongoing'] = $this->M_Fat->fatongoing();
            // $data['fatproses'] = $this->M_Fat->fatproses();
            // $data['polemap'] = $this->M_Fat->polemap();
            // $data['fat'] = $this->M_Fat->index()->result_array();
            // $data['pelanggan_eks'] = $this->M_Fat->pelanggan_eks();
            // $data['pelanggan_pot'] = $this->M_Fat->potensi();
            // $data['pelanggan_open'] = $this->M_Fat->spa();
        }
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/map/index2', $data);
        $this->load->view('admin/template/footer');
        // $data['datafat'] = json_encode($data['fatmap']);
        // var_dump($data['datafat']);
    }
}