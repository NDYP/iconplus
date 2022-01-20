<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Odf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Odf');
        $this->load->model('M_Mitra');
        $this->load->model('M_Cluster');
        $this->load->model('M_Pop');
        $this->load->model('M_Olt');
        $this->load->model('M_Odf');
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
        $data['title'] = 'ODF';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['cluster'] = $this->M_Cluster->index();
        $data['odf'] = $this->M_Odf->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/odf/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    function get($no)
    {
        $data['olt'] = $this->M_Odf->get($no);
        $url = $data['olt']['nama_odf'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('odf/edit/' . $no . '/'  . $url_slug));
    }
    function tambah()
    {
        $this->form_validation->set_rules('nama_odf', 'nama_odf', 'required|trim|is_unique[odf.nama_odf]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('kapasitas_port_max', 'kapasitas_port_max', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('rack_odf', 'rack_odf', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('instalatir', 'instalatir', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_instalasi', 'tanggal_instalasi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('hostname_olt', 'hostname_olt', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('port_olt', 'port_olt', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'ODF';
            $data['title2'] = 'Add Data';
            $data['olt'] = $this->M_Olt->index();
            $data['cluster'] = $this->M_Cluster->index();
            $data['mitra'] = $this->M_Mitra->index();
            $data['pop'] = $this->M_Pop->index();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/odf/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $nama_odf = $this->input->post('nama_odf');
            $kapasitas_port_max = $this->input->post('kapasitas_port_max');
            $rack_odf = $this->input->post('rack_odf');
            $koordinat = $this->input->post('koordinat');
            $instalatir = $this->input->post('instalatir');
            $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));
            $hostname_olt = $this->input->post('hostname_olt');
            $port_olt = $this->input->post('port_olt');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $cluster = $this->input->post('cluster');
            $data = array(
                'nama_odf' => $nama_odf,
                'kapasitas_port_max' => $kapasitas_port_max,
                'rack_odf' => $rack_odf,
                'koordinat' => $koordinat,
                'instalatir' => $instalatir,
                'tanggal_instalasi' => $tanggal_instalasi,
                'hostname_olt' => $hostname_olt,
                'port_olt' => $port_olt,
                'long' => $long,
                'lat' => $lat,
                'cluster' => $cluster,
            );
            //var_dump($data);
            $this->M_Odf->tambah('odf', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('odf/index', 'refresh');
        }
    }
    public function edit($no)
    {
        $data['title'] = 'ODF';
        $data['title2'] = 'Edit Data';
        $data['odf'] = $this->M_Odf->get($no);
        $data['mitra'] = $this->M_Mitra->index();
        $data['olt'] = $this->M_Olt->index();
        $data['cluster'] = $this->M_Cluster->index();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/odf/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function detail($no)
    {
        $data['title'] = 'ODF';
        $data['title2'] = 'Edit Data';
        $data['odf'] = $this->M_Odf->get($no);
        $data['mitra'] = $this->M_Mitra->index();
        $data['olt'] = $this->M_Olt->index();
        //$data['pop'] = $this->M_Pop->index();
        //$data['cluster'] = $this->M_Odf->index();
        $no = $data['odf']['no'];
        $data['fdt'] = $this->M_Odf->fdt($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/odf/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $no = $this->input->post('no');
        $nama_odf = $this->input->post('nama_odf');
        $kapasitas_port_max = $this->input->post('kapasitas_port_max');
        $rack_odf = $this->input->post('rack_odf');
        $koordinat = $this->input->post('koordinat');
        $instalatir = $this->input->post('instalatir');
        $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));
        $hostname_olt = $this->input->post('hostname_olt');
        $port_olt = $this->input->post('port_olt');
        $long = $this->input->post('long');
        $lat = $this->input->post('lat');
        $cluster = $this->input->post('cluster');
        $data = array(
            'nama_odf' => $nama_odf ? $nama_odf : NULL,
            'kapasitas_port_max' => $kapasitas_port_max ? $kapasitas_port_max : NULL,
            'rack_odf' => $rack_odf ? $rack_odf : NULL,
            'koordinat' => $koordinat ? $koordinat : NULL,
            'instalatir' => $instalatir ? $instalatir : NULL,
            'cluster' => $cluster ? $cluster : NULL,
            'tanggal_instalasi' => $tanggal_instalasi ? $tanggal_instalasi : NULL,
            'hostname_olt' => $hostname_olt ? $hostname_olt : NULL,
            'port_olt' => $port_olt ? $port_olt : NULL,
            'long' => $long ? $long : NULL,
            'lat' => $lat ? $lat : NULL,
        );
        //var_dump($data);
        $this->M_Odf->update('odf', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('odf/index', 'refresh');
    }

    public function hapus($no)
    {
        $data = $this->M_Odf->get($no);
        if ($data) {
            $this->M_Odf->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('olt/index', 'refresh');
        }
    }
}