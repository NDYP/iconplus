<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Cluster');
        $this->load->model('M_Mitra');
        login();
        $user_session =
            ($this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function index()
    {
        $data['title'] = 'Mitra Pembangunan';
        $data['title2'] = 'Index Data';
        $data['cluster'] = $this->M_Cluster->index();
        $data['mitra'] = $this->M_Mitra->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/mitra/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    function get($no)
    {
        $data['mitra'] = $this->M_Mitra->get($no);
        $url = $data['mitra']['nama'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('mitra/edit/' . $no . '/'  . $url_slug));
    }
    function tambah()
    {
        $this->form_validation->set_rules('mitra', 'mitra', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim|is_unique[mitra_pembangunan.nama]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Mitra Pembangunan';
            $data['title2'] = 'Add Data';
            $data['mitra'] = $this->M_Mitra->index();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/mitra/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $nama = $this->input->post('nama');
            $mitra = $this->input->post('mitra');

            $data = array(
                'nama' => $nama,
                'mitra' => $mitra,
            );
            $this->M_Cluster->tambah('mitra_pembangunan', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('mitra/index', 'refresh');
        }
    }
    public function edit($no)
    {
        $data['title'] = 'Mitra Pembangunan';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->get($no);
        //$data['cluster'] = $this->M_Cluster->index();
        //$nama_mitra = $data['mitra']['nama'];
        //$data['fat'] =
        //$this->M_Cluster->fat($nama_mitra);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/mitra/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $no = $this->input->post('no');
        $nama = $this->input->post('nama');
        $mitra = $this->input->post('mitra');
        $data = array(
            'nama' => $nama,
            'mitra' => $mitra,
        );
        $this->M_Mitra->update('mitra_pembangunan', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('mitra/index', 'refresh');
    }

    public function hapus($no)
    {
        $data = $this->M_Mitra->get($no);
        if ($data) {
            $this->M_Mitra->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('flash', 'Gagal Hapus Data');
            redirect('mitra/index', 'refresh');
        }
    }
}