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
        $this->form_validation->set_rules('pelanggan', 'pelanggan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('kontak', 'kontak', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_gangguan', 'tanggal_gangguan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('indikator_modem', 'indikator_modem', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('keluhan[]', 'keluhan[]', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['pelanggan'] = $this->M_Pelanggan->index()->result_array();
            $this->load->view('gangguan/form', $data);
        } else {
            $pelanggan = $this->input->post('pelanggan');
            $tanggal_gangguan =
                date('Y-m-d', strtotime($this->input->post('tanggal_gangguan')));
            $kontak = $this->input->post('kontak');
            $indikator_modem = $this->input->post('indikator_modem');
            $keluhan = $this->input->post('keluhan');
            $info = $this->input->post('info');

            $data = array(
                'pelanggan' => $pelanggan,
                'kontak' => $kontak,
                'tanggal_gangguan' => $tanggal_gangguan,
                'indikator_modem' => $indikator_modem,
                'info' => $info,
                'tanggal_lapor' => date(
                    "Y-m-d h:i:sa"
                ),
            );
            $this->db->insert('gangguan', $data);

            //ambil id terkahir di input
            $insert_id = $this->db->insert_id();

            //input array
            $y = array();
            foreach ($keluhan as $k => $v) {
                $y[$k]['gangguan'] = $insert_id;
                $y[$k]['keluhan'] = $v;
            }
            // var_dump($y);
            $this->db->insert_batch('gangguan_keluhan', $y);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('gangguan/index', 'refresh');
        }
    }
}