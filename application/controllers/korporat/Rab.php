<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rab extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Korporat_Rab');
        $this->load->model('M_Korporat_Site');
        $this->load->model('M_Korporat_Layanan');
    }
    public function index()
    {
        $data['title'] = 'RAB';
        $data['title2'] = 'Index';
        $data['rab'] = $this->M_Korporat_Rab->index();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/rab/index', $data);
        $this->load->view('korporat/template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('jarak_tiang', 'jarak_tiang', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('harga_tiang', 'harga_tiang', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('jarak_jb', 'jarak_jb', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('harga_jb', 'harga_jb', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('izin_kawasan', 'izin_kawasan', 'required|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('layanan', 'layanan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('estimasi', 'estimasi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'RAB';
            $data['title2'] = 'Add';
            $data['rab'] = $this->M_Korporat_Rab->index();
            $data['layanan'] = $this->M_Korporat_Layanan->index();
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/rab/add', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $layanan = $this->input->post('layanan');
            $exs = $this->M_Korporat_Layanan->get($layanan);
            $budget = $exs['budget'];
            $pelanggan_pln = $exs['pelanggan_pln'];
            $jarak_tiang = $this->input->post('jarak_tiang');
            $jarak_jb = $this->input->post('jarak_jb');
            $estimasi = $this->input->post('estimasi');
            $izin_kawasan = $this->input->post('izin_kawasan');
            $harga_tiang = $this->input->post('harga_tiang');
            $harga_jb = $this->input->post('harga_jb');
            if ($pelanggan_pln == 'Ya') {
                $banding = (floor($jarak_tiang / 50) * $harga_tiang) + (($jarak_tiang + $jarak_jb) * $harga_jb) + $izin_kawasan;
            } else {
                $banding = ($jarak_jb * $harga_jb) + $izin_kawasan;
            }
            if ($budget < $banding) {
                $this->session->set_flashdata('message', 'Budget penawaran layanan kurang!');
                redirect('RAB/index', 'refresh');
            } elseif ($budget > $banding) {
                $data = array(
                    'jarak_tiang' => $jarak_tiang,
                    'jarak_jb' => $jarak_jb,
                    'biaya' => (floor($jarak_tiang / 50) * $harga_tiang) + (($jarak_tiang + $jarak_jb) * $harga_jb) + $izin_kawasan,
                    'estimasi' =>
                    date('Y-m-d', strtotime($estimasi)),
                    'izin_kawasan' => $izin_kawasan,
                    'layanan' => $layanan,
                );
                $this->M_Korporat_Rab->tambah('korporat_rab', $data);
                $this->session->set_flashdata('flash', 'ditambah');
                redirect('korporat/rab/index', 'refresh');
                // var_dump($pelanggan_pln);
            }
        }
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('jarak_tiang', 'jarak_tiang', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('harga_tiang', 'harga_tiang', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('jarak_jb', 'jarak_jb', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('harga_jb', 'harga_jb', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('izin_kawasan', 'izin_kawasan', 'required|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Angka tanpa tanda baca!',
        ]);
        $this->form_validation->set_rules('layanan', 'layanan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('estimasi', 'estimasi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'RAB';
            $data['title2'] = 'Edit';
            $data['RAB'] = $this->M_Korporat_Rab->index();
            $data['customer'] = $this->M_Customer->index();
            $data['layanan'] = $this->M_layanan->index();
            $data['RAB'] = $this->M_Korporat_Rab->get($no);
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/rab/edit', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $no = $this->input->post('no');
            $layanan = $this->input->post('layanan');
            $exs = $this->M_Korporat_Layanan->get($layanan);
            $budget = $exs['budget'];
            $pelanggan_pln = $exs['pelanggan_pln'];
            $jarak_tiang = $this->input->post('jarak_tiang');
            $jarak_jb = $this->input->post('jarak_jb');
            $estimasi = $this->input->post('estimasi');
            $izin_kawasan = $this->input->post('izin_kawasan');
            $harga_tiang = $this->input->post('harga_tiang');
            $harga_jb = $this->input->post('harga_jb');
            if ($pelanggan_pln == 'Ya') {
                $banding = (floor($jarak_tiang / 50) * $harga_tiang) + (($jarak_tiang + $jarak_jb) * $harga_jb) + $izin_kawasan;
            } else {
                $banding = ($jarak_jb * $harga_jb) + $izin_kawasan;
            }
            if ($budget < $banding) {
                $this->session->set_flashdata('message', 'Budget layanan kurang!');
                redirect('RAB/index', 'refresh');
            } elseif ($budget > $banding) {
                $data = array(
                    'jarak_tiang' => $jarak_tiang,
                    'jarak_jb' => $jarak_jb,
                    'biaya' => (floor($jarak_tiang / 50) * $harga_tiang) + (($jarak_tiang + $jarak_jb) * $harga_jb) + $izin_kawasan,
                    'estimasi' =>
                    date('Y-m-d', strtotime($estimasi)),
                    'izin_kawasan' => $izin_kawasan,
                    'layanan' => $layanan,
                );
                $this->M_Korporat_Rab->update('rab', $data, array('no' => $no));
                $this->session->set_flashdata('flash', 'ditambah');
                redirect('RAB/index', 'refresh');
            }
            // var_dump($data);
        }
    }
    public function hapus($no)
    {
        $data = $this->M_Korporat_Rab->get($no);
        if ($data) {
            $this->M_Korporat_Rab->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}