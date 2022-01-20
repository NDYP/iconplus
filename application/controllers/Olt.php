<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Olt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Olt');
        $this->load->model('M_Mitra');
        $this->load->model('M_Cluster');
        $this->load->model('M_Pop');
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
        $data['title'] = 'OLT';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['cluster'] = $this->M_Cluster->index();
        $data['olt'] = $this->M_Olt->index();
        $data['pop'] = $this->M_Pop->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/olt/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    function get($no)
    {
        $data['olt'] = $this->M_Olt->get($no);
        $url = $data['olt']['hostname'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('olt/edit/' . $no . '/'  . $url_slug));
    }
    function tambah()
    {
        $this->form_validation->set_rules('hostname', 'hostname', 'required|trim|is_unique[olt.hostname]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('kapasitas_pon_terpasang', 'kapasitas_pon_terpasang', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        //$this->form_validation->set_rules('sn_olt', 'sn_olt', 'required|trim', ['required' => 'Tidak Boleh Kosong!']);
        $this->form_validation->set_rules('kapasitas_pon_max', 'kapasitas_pon_max', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('brand', 'brand', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('type', 'type', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('status', 'status', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('instalatir', 'instalatir', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_instalasi', 'tanggal_instalasi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_pop', 'id_pop', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'OLT';
            $data['title2'] = 'Add Data';
            $data['olt'] = $this->M_Olt->index();
            $data['cluster'] = $this->M_Cluster->index();
            $data['mitra'] = $this->M_Mitra->index();
            $data['pop'] = $this->M_Pop->index();
            $data['olt_brand'] = $this->M_Olt->brand();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/olt/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $hostname = $this->input->post('hostname');
            $kapasitas_pon_terpasang = $this->input->post('kapasitas_pon_terpasang');
            $sn_olt = $this->input->post('sn_olt');
            $kapasitas_pon_max = $this->input->post('kapasitas_pon_max');
            $brand = $this->input->post('brand');
            $type = $this->input->post('type');
            $status = $this->input->post('status');
            $instalatir = $this->input->post('instalatir');
            $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));
            $id_pop = $this->input->post('id_pop');
            $data = array(
                'hostname' => $hostname,
                'kapasitas_pon_terpasang' => $kapasitas_pon_terpasang,
                'sn_olt' => $sn_olt,
                'kapasitas_pon_max' => $kapasitas_pon_max,
                'brand' => $brand,
                'type' => $type,
                'status' => $status,
                'instalatir' => $instalatir,
                'tanggal_instalasi' => $tanggal_instalasi,
                'id_pop' => $id_pop,
            );
            $this->M_Olt->tambah('olt', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('olt/index', 'refresh');
        }
    }
    function tambah_brand()
    {
        $nama_brand = $this->input->post('nama_brand');
        $data = array(
            'nama_brand' => $nama_brand,
        );
        $this->M_Olt->tambah('olt_brand', $data);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('olt/index', 'refresh');
    }
    public function edit($no)
    {
        $data['title'] = 'OLT';
        $data['title2'] = 'Edit Data';
        $data['olt'] = $this->M_Olt->get($no);
        $data['mitra'] = $this->M_Mitra->index();

        $data['pop'] = $this->M_Pop->index();
        $data['olt_brand'] = $this->M_Olt->brand();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/olt/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function detail($no)
    {
        $data['title'] = 'OLT';
        $data['title2'] = 'Detail Data';
        $data['olt'] = $this->M_Olt->get($no);
        $data['mitra'] = $this->M_Mitra->index();

        $data['pop'] = $this->M_Pop->index();
        //$data['cluster'] = $this->M_Olt->index();
        $no = $data['olt']['no'];
        $data['odf'] = $this->M_Olt->odf($no);
        $data['jumlah'] = $this->M_Olt->count($no);

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/olt/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $no = $this->input->post('no');
        $hostname = $this->input->post('hostname');
        $kapasitas_pon_terpasang = $this->input->post('kapasitas_pon_terpasang');
        $sn_olt = $this->input->post('sn_olt');
        $kapasitas_pon_max = $this->input->post('kapasitas_pon_max');
        $brand = $this->input->post('brand');
        $type = $this->input->post('type');
        $status = $this->input->post('status');
        $instalatir = $this->input->post('instalatir');
        $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));
        $id_pop = $this->input->post('id_pop');
        $data = array(
            'hostname' => $hostname ? $hostname : NULL,
            'kapasitas_pon_terpasang' => $kapasitas_pon_terpasang ? $kapasitas_pon_terpasang : NULL,
            'sn_olt' => $sn_olt ? $sn_olt : NULL,
            'kapasitas_pon_max' => $kapasitas_pon_max ? $kapasitas_pon_max : NULL,
            'brand' => $brand ? $brand : NULL,
            'type' => $type ? $type : NULL,
            'status' => $status ? $status : NULL,
            'instalatir' => $instalatir ? $instalatir : NULL,
            'tanggal_instalasi' => $tanggal_instalasi ? $tanggal_instalasi : NULL,
            'id_pop' => $id_pop ? $id_pop : NULL,
        );
        $this->M_Olt->update('olt', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('olt/index', 'refresh');
    }

    public function hapus($no)
    {
        $data = $this->M_Olt->get($no);
        if ($data) {
            $this->M_Olt->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('olt/index', 'refresh');
        }
    }
}