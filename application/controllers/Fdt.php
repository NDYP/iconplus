<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fdt extends CI_Controller
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
        $this->load->model('M_Fdt');
        login();
        $user_session =
            ($this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function index()
    {
        $data['title'] = 'FDT';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['cluster'] = $this->M_Cluster->index();
        $data['fdt'] = $this->M_Fdt->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/fdt/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }

    function tambah()
    {
        $this->form_validation->set_rules('id_fdt', 'id_fdt', 'required|trim|is_unique[fdt.id_fdt]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('brand', 'brand', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jenis_konektor', 'jenis_konektor', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('konstruksi', 'konstruksi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('instalatir', 'instalatir', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_instalasi', 'tanggal_instalasi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        //$this->form_validation->set_rules('nama_odf', 'nama_odf', 'required|trim', [
        //  'required' => 'Tidak Boleh Kosong!'
        // ]);
        $this->form_validation->set_rules('port_odf', 'port_odf', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('kapasitas_tray_max', 'kapasitas_tray_max', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'FDT';
            $data['title2'] = 'Add Data';
            $data['odf'] = $this->M_Odf->index();
            $data['cluster'] = $this->M_Cluster->index();
            $data['mitra'] = $this->M_Mitra->index();
            $data['pop'] = $this->M_Pop->index();
            $data['fdt_brand'] = $this->M_Fdt->brand();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/fdt/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $id_fdt = $this->input->post('id_fdt');
            $jenis = $this->input->post('jenis');
            $jenis_konektor = $this->input->post('jenis_konektor');
            $konstruksi = $this->input->post('konstruksi');
            $brand = $this->input->post('brand');
            $koordinat = $this->input->post('koordinat');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $instalatir = $this->input->post('instalatir');
            $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));

            $nama_odf = $this->input->post('nama_odf');
            $port_odf = $this->input->post('port_odf');
            $kapasitas_tray_max = $this->input->post('kapasitas_tray_max');
            $data = array(
                'id_fdt' => $id_fdt,
                'jenis' => $jenis,
                'brand' => $brand,
                'koordinat' => $koordinat,
                'instalatir' => $instalatir,
                'tanggal_instalasi' => $tanggal_instalasi,
                'nama_odf' => $nama_odf,
                'port_odf' => $port_odf,
                'kapasitas_tray_max' => $kapasitas_tray_max,
                'jenis_konektor' => $jenis_konektor,
                'konstruksi' => $konstruksi,
                'long' => $long,
                'lat' => $lat,
            );
            //var_dump($data);
            $this->M_Fdt->tambah('fdt', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('fdt/index', 'refresh');
        }
    }
    function tambah_brand()
    {
        $nama_brand = $this->input->post('nama_brand');
        $data = array(
            'nama_brand' => $nama_brand,
        );
        $this->M_Fdt->tambah('fdt_brand', $data);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('fdt/index', 'refresh');
    }
    function get($no)
    {
        $data['fdt'] = $this->M_Fdt->get($no);
        $url = $data['fdt']['id_fdt'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('fdt/edit/' . $no . '/'  . $url_slug));
    }
    public function edit($no)
    {
        $data['title'] = 'FDT';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fdt'] = $this->M_Fdt->get($no);
        $data['odf'] = $this->M_Odf->index();
        $data['fdt_brand'] = $this->M_Fdt->brand();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/fdt/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function detail($no)
    {
        $data['title'] = 'FDT';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fdt'] = $this->M_Fdt->get($no);
        $no = $data['fdt']['no'];
        $data['fat'] = $this->M_Fdt->fat($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/fdt/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $no = $this->input->post('no');
        $id_fdt = $this->input->post('id_fdt');
        $jenis = $this->input->post('jenis');
        $brand = $this->input->post('brand');
        $koordinat = $this->input->post('koordinat');
        $instalatir = $this->input->post('instalatir');
        $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));

        $nama_odf = $this->input->post('nama_odf');
        $port_odf = $this->input->post('port_odf');
        $long = $this->input->post('long');
        $lat = $this->input->post('lat');
        $jenis_konektor = $this->input->post('jenis_konektor');
        $konstruksi = $this->input->post('konstruksi');
        $data = array(
            'id_fdt' => $id_fdt ? $id_fdt : NULL,
            'jenis' => $jenis ? $jenis : NULL,
            'brand' => $brand ? $brand : NULL,
            'koordinat' => $koordinat ? $koordinat : NULL,
            'instalatir' => $instalatir ? $instalatir : NULL,
            'tanggal_instalasi' => $tanggal_instalasi ? $tanggal_instalasi : NULL,
            'nama_odf' => $nama_odf ? $nama_odf : NULL,
            'port_odf' => $port_odf ? $port_odf : NULL,
            'long' => $long ? $long : NULL,
            'lat' => $lat ? $lat : NULL,
            'konstruksi' => $konstruksi ? $konstruksi : NULL,
            'jenis_konektor' => $jenis_konektor ? $jenis_konektor : NULL,
        );
        //var_dump($data);
        $this->M_Odf->update('fdt', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('fdt/index', 'refresh');
    }

    public function hapus($no)
    {
        $data = $this->M_Fdt->get($no);
        if ($data) {
            $this->M_Fdt->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('olt/index', 'refresh');
        }
    }
}