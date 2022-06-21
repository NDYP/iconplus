<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Korporat_Site');
        $this->load->model('M_Korporat_Pic');
        $this->load->model('M_Korporat_Customer');
    }
    public function index()
    {
        $data['title'] = 'Sites';
        $data['title2'] = 'Index';
        $data['site'] = $this->M_Korporat_Site->index();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/site/index', $data);
        $this->load->view('korporat/template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('pelanggan_pln', 'pelanggan_pln', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('pic', 'pic', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('customer', 'customer', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('biaya', 'biaya', 'numeric', [
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Sites';
            $data['title2'] = 'Add';
            $data['site'] = $this->M_Korporat_Site->index();
            $data['customer'] = $this->M_Korporat_Customer->index();
            $data['pic'] = $this->M_Korporat_Pic->index();

            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/site/add', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $koordinat = $this->input->post('koordinat');
            $pelanggan_pln = $this->input->post('pelanggan_pln');
            $customer = $this->input->post('customer');
            $pic = $this->input->post('pic');
            $layanan = $this->input->post('layanan');
            $provider = $this->input->post('provider');
            $bandwith = $this->input->post('bandwith');
            $biaya = $this->input->post('biaya');
            $estimasi_kontrak = $this->input->post('estimasi_kontrak');
            $data = array(
                'nama' => $nama,
                'long' => $long,
                'lat' => $lat,
                'koordinat' => $koordinat,
                'pelanggan_pln' => $pelanggan_pln,
                'customer' => $customer,
                'layanan' => $layanan,
                'provider' => $provider,
                'bandwith' => $bandwith,
                'biaya' => $biaya,
                'estimasi_kontrak' =>
                date('Y-m-d', strtotime($estimasi_kontrak)),
                'pic' => $pic,
            );
            $this->M_Korporat_Site->tambah('site', $data);
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('korporat/site/index', 'refresh');
            // var_dump($data);
        }
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('pelanggan_pln', 'pelanggan_pln', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('pic', 'pic', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('customer', 'customer', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('biaya', 'biaya', 'numeric', [
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Sites';
            $data['title2'] = 'Edit';
            $data['site'] = $this->M_Korporat_Site->index();
            $data['customer'] = $this->M_Korporat_Customer->index();
            $data['pic'] = $this->M_Korporat_Pic->index();
            $data['site'] = $this->M_Korporat_Site->get($no);
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/site/edit', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $no = $this->input->post('no');
            $nama = $this->input->post('nama');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $koordinat = $this->input->post('koordinat');
            $pelanggan_pln = $this->input->post('pelanggan_pln');
            $customer = $this->input->post('customer');
            $pic = $this->input->post('pic');
            $layanan = $this->input->post('layanan');
            $provider = $this->input->post('provider');
            $bandwith = $this->input->post('bandwith');
            $biaya = $this->input->post('biaya');
            $estimasi_kontrak = $this->input->post('estimasi_kontrak');
            $data = array(
                'nama' => $nama,
                'long' => $long,
                'lat' => $lat,
                'koordinat' => $koordinat,
                'pelanggan_pln' => $pelanggan_pln,
                'customer' => $customer,
                'layanan' => $layanan,
                'provider' => $provider,
                'bandwith' => $bandwith,
                'biaya' => $biaya,
                'estimasi_kontrak' =>
                date('Y-m-d', strtotime($estimasi_kontrak)),
                'pic' => $pic,
            );
            $this->M_Korporat_Site->update('site', $data, array('no' => $no));
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('korporat/site/index', 'refresh');
            // var_dump($data);
        }
    }
    public function hapus($no)
    {
        $data = $this->M_Korporat_Site->get($no);
        if ($data) {
            $this->M_Korporat_Site->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}