<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Korporat_Layanan');
        $this->load->model('M_Korporat_Site');
        $this->load->model('M_Korporat_Customer');
    }
    public function index()
    {
        $data['title'] = 'Layanan';
        $data['title2'] = 'Index';
        $data['layanan'] = $this->M_Korporat_Layanan->index();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/layanan/index', $data);
        $this->load->view('korporat/template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('produk', 'produk', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('budget', 'budget', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('bandwith', 'bandwith', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('metode_pengadaan', 'metode_pengadaan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('site', 'site', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Layanan';
            $data['title2'] = 'Add';
            $data['layanan'] = $this->M_Korporat_Layanan->index();
            $data['layanan'] = $this->M_Korporat_Customer->index();
            $data['site'] = $this->M_Korporat_Site->index();
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/layanan/add', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $site = $this->input->post('site');
            $produk = $this->input->post('produk');
            $budget = $this->input->post('budget');
            $bandwith = $this->input->post('bandwith');
            $note = $this->input->post('note');
            $metode_pengadaan = $this->input->post('metode_pengadaan');
            $estimasi_pengadaan = $this->input->post('estimasi_pengadaan');
            $data = array(
                'produk' => $produk,
                'budget' => $budget,
                'bandwith' => $bandwith,
                'note' => $note,
                'metode_pengadaan' => $metode_pengadaan,
                'estimasi_pengadaan' =>
                date('Y-m-d', strtotime($estimasi_pengadaan)),
                'site' => $site,
            );
            $this->M_Korporat_Layanan->tambah('korporat_layanan', $data);
            $this->session->set_flashdata('flash', 'ditambah');

            redirect('korporat/layanan/index', 'refresh');
            // var_dump($data);
        }
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('produk', 'produk', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('budget', 'budget', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('bandwith', 'bandwith', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('note', 'note', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('site', 'site', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Layanan';
            $data['title2'] = 'Edit';
            $data['layanan'] = $this->M_Korporat_Layanan->index();
            $data['layanan'] = $this->M_Korporat_Customer->index();
            $data['site'] = $this->M_Korporat_Site->index();
            $data['layanan'] = $this->M_Korporat_Layanan->get($no);
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/layanan/edit', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $no = $this->input->post('no');
            $site = $this->input->post('site');
            $produk = $this->input->post('produk');
            $budget = $this->input->post('budget');
            $bandwith = $this->input->post('bandwith');
            $note = $this->input->post('note');
            $metode_pengadaan = $this->input->post('metode_pengadaan');
            $estimasi_pengadaan = $this->input->post('estimasi_pengadaan');
            $data = array(
                'produk' => $produk,
                'budget' => $budget,
                'bandwith' => $bandwith,
                'note' => $note,
                'metode_pengadaan' => $metode_pengadaan,
                'estimasi_pengadaan' =>
                date('Y-m-d', strtotime($estimasi_pengadaan)),
                'site' => $site,
            );
            $this->M_Korporat_Layanan->update('korporat_layanan', $data, array('no' => $no));
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('korporat/layanan/index', 'refresh');
            // var_dump($data);
        }
    }
    public function hapus($no)
    {
        $data = $this->M_Korporat_Layanan->get($no);
        if ($data) {
            $this->M_Korporat_Layanan->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}