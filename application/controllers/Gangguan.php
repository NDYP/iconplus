<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gangguan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pelanggan');
        login();
    }

    function index()
    {
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('status_pembangunan', 'status_pembangunan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_gangguan', 'tanggal_gangguan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('indikator_modem', 'indikator_modem', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('keluhan', 'keluhan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('info', 'info', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['pelanggan'] = $this->M_Pelanggan->index()->result_array();
            $this->load->view('gangguan/form', $data);
        } else {
            $pelanggan = $this->input->post('pelanggan');
            $tanggal_gangguan = $this->input->post('tanggal_gangguan');
            $telepon = $this->input->post('telepon');
            $indikator_modem = $this->input->post('indikator_modem');
            $keluhan = $this->input->post('keluhan');
            $info = $this->input->post('info');


            $data = array(
                'pelanggan' => $pelanggan,
                'telepon' => $telepon,
                'tanggal_gangguan' => $tanggal_gangguan,
                'indikator_modem' => $indikator_modem,
                'keluhan' => $keluhan,
                'info' => $info,
                'tanggal_lapor' => date(
                    "Y-m-d h:i:sa"
                ),
            );
            //var_dump($data);
            $this->M_Fdt->tambah('gangguna', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('gangguan/index', 'refresh');
        }
    }
}