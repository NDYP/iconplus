<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pop extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pop');
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
        $data['title'] = 'POP';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['pop'] = $this->M_Pop->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pop/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    function get($no)
    {
        $data['pop'] = $this->M_Pop->get($no);
        $url = $data['pop']['nama_pop'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('pop/edit/' . $no . '/'  . $url_slug));
    }
    function tambah()
    {
        $this->form_validation->set_rules('id_pop', 'id_pop', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('koordinat_pop', 'koordinat_pop', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('kota', 'kota', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nama_pop', 'nama_pop', 'required|trim|is_unique[pop.nama_pop]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'POP';
            $data['title2'] = 'Add Data';
            $data['pop'] = $this->M_Pop->index();
            $data['mitra'] = $this->M_Mitra->index();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/pop/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $id_pop = $this->input->post('id_pop');
            $nama_pop = $this->input->post('nama_pop');
            $koordinat_pop = $this->input->post('koordinat_pop');
            $kota = $this->input->post('kota');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');

            $data = array(
                'id_pop' => $id_pop,
                'nama_pop' => $nama_pop,
                'koordinat_pop' => $koordinat_pop,
                'kota' => $kota,
                'long' => $long,
                'lat' => $lat,
            );
            $this->M_Pop->tambah('pop', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('pop/index', 'refresh');
        }
    }
    public function edit($no)
    {
        $data['title'] = 'POP';
        $data['title2'] = 'Edit Data';
        $data['pop'] = $this->M_Pop->get($no);
        $data['mitra'] = $this->M_Mitra->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pop/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function detail($no)
    {
        $data['title'] = 'POP';
        $data['title2'] = 'Detail Data';
        $data['pop'] = $this->M_Pop->get($no);
        $data['mitra'] = $this->M_Mitra->index();
        //$data['cluster'] = $this->M_Pop->index();
        $no = $data['pop']['no'];
        $data['olt'] = $this->M_Pop->olt($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pop/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $no = $this->input->post('no');
        $id_pop = $this->input->post('id_pop');
        $nama_pop = $this->input->post('nama_pop');
        $koordinat_pop = $this->input->post('koordinat_pop');
        $kota = $this->input->post('kota');
        $long = $this->input->post('long');
        $lat = $this->input->post('lat');

        $data = array(
            'id_pop' => $id_pop ? $id_pop : NULL,
            'nama_pop' => $nama_pop ? $nama_pop : NULL,
            'koordinat_pop' => $koordinat_pop ? $koordinat_pop : NULL,
            'kota' => $kota ? $kota : NULL,
            'long' => $long ? $long : NULL,
            'lat' => $lat ? $lat : NULL,
        );
        $this->M_Pop->update('pop', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('pop/index', 'refresh');
    }

    public function hapus($no)
    {
        $data = $this->M_Pop->get($no);
        if ($data) {
            $this->M_Pop->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('flash', '');
            redirect('pop/index', 'refresh');
        }
    }
}