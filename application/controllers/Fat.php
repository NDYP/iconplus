<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fat extends CI_Controller
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

        $this->load->model('M_Fat');
        login();
    }
    public function index()
    {
        $data['title'] = 'FAT';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['cluster'] = $this->M_Cluster->index();
        $data['fat'] = $this->M_Fat->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/fat/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }

    function tambah()
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin'
                || $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->form_validation->set_rules('id_fat', 'id_fat', 'required|trim|is_unique[fat.id_fat]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('status_pembangunan', 'status_pembangunan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('brand', 'brand', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Harus Numeric!',
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Harus Numeric!',
        ]);
        $this->form_validation->set_rules('jenis_konektor', 'jenis_konektor', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('instalatir', 'instalatir', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_instalasi', 'tanggal_instalasi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_fdt', 'id_fdt', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('kapasitas_port_max', 'kapasitas_port_max', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('kapasitas_port_terpasang', 'kapasitas_port_terpasang', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('power_in', 'power_in', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('power_out', 'power_out', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tray_fdt', 'tray_fdt', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('port_fdt', 'port_fdt', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'FAT';
            $data['title2'] = 'Add Data';
            $data['fdt'] = $this->M_Fdt->index();
            $data['cluster'] = $this->M_Cluster->index();
            $data['mitra'] = $this->M_Mitra->index();
            $data['pop'] = $this->M_Pop->index();

            $data['fat_brand'] = $this->M_Fat->brand();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/fat/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $id_fat = $this->input->post('id_fat');
            $brand = $this->input->post('brand');
            $jenis = $this->input->post('jenis');
            $koordinat = $this->input->post('koordinat');
            $kapasitas_port_max = $this->input->post('kapasitas_port_max');
            $kapasitas_port_terpasang = $this->input->post('kapasitas_port_terpasang');
            $jenis_konektor = $this->input->post('jenis_konektor');
            $power_in = $this->input->post('power_in');
            $power_out = $this->input->post('power_out');
            $power_losses = $this->input->post('power_losses');
            $instalatir = $this->input->post('instalatir');
            $tray_fdt = $this->input->post('tray_fdt');
            $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));

            $id_fdt = $this->input->post('id_fdt');
            $port_fdt = $this->input->post('port_fdt');
            $status_pembangunan = $this->input->post('status_pembangunan');
            $lat = $this->input->post('lat');
            $id_fdt = $this->input->post('id_fdt');
            $long = $this->input->post('long');
            $cluster = $this->input->post('cluster');
            $penginput = $this->session->userdata('username');

            $data = array(
                'id_fat' => $id_fat,
                'jenis' => $jenis,
                'brand' => $brand,
                'koordinat' => $koordinat,
                'lat' => $lat,
                'long' => $long,
                'instalatir' => $instalatir,
                'tanggal_instalasi' => $tanggal_instalasi,
                'id_fdt' => $id_fdt,
                'port_fdt' => $port_fdt,
                'kapasitas_port_max' => $kapasitas_port_max,
                'jenis_konektor' => $jenis_konektor,
                'kapasitas_port_terpasang' => $kapasitas_port_terpasang,

                'power_in' => $power_in,
                'power_out' => $power_out,
                'power_losses' => $power_losses,
                'tray_fdt' => $tray_fdt,
                'status_pembangunan' => $status_pembangunan,
                'cluster' => $cluster,
                'penginput' => $penginput,
                'timestamp' => date(
                    "Y-m-d h:i:sa"
                ),
            );
            //var_dump($data);
            $this->M_Fdt->tambah('fat', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('fat/index', 'refresh');
        }
    }
    function tambah_brand()
    {
        $nama_brand = $this->input->post('nama_brand');
        $data = array(
            'nama_brand' => $nama_brand,
        );
        $this->M_Fat->tambah('fat_brand', $data);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('fat/index', 'refresh');
    }
    function get($no)
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin'
                || $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['fat'] = $this->M_Fat->get($no);
        $url = $data['fat']['id_fat'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('fat/edit/' . $no . '/'  . $url_slug));
    }
    public function edit($no)
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin'
                || $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['title'] = 'FAT';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fat'] = $this->M_Fat->get($no);
        $data['fdt'] = $this->M_Fdt->index();
        $data['cluster'] = $this->M_Cluster->index();
        $data['fat_brand'] = $this->M_Fat->brand();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/fat/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function detail($no)
    {
        $data['title'] = 'FAT';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fat'] = $this->M_Fat->get($no);
        $no = $data['fat']['no'];
        $data['pelanggan'] = $this->M_Fat->pelanggan($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/fat/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin'
                || $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $no = $this->input->post('no');
        $id_fat = $this->input->post('id_fat');
        $brand = $this->input->post('brand');
        $jenis = $this->input->post('jenis');
        $koordinat = $this->input->post('koordinat');
        $kapasitas_port_max = $this->input->post('kapasitas_port_max');
        $kapasitas_port_terpasang = $this->input->post('kapasitas_port_terpasang');
        $jenis_konektor = $this->input->post('jenis_konektor');
        $power_in = $this->input->post('power_in');
        $power_out = $this->input->post('power_out');
        $instalatir = $this->input->post('instalatir');
        $tray_fdt = $this->input->post('tray_fdt');
        $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));

        $id_fdt = $this->input->post('id_fdt');
        $port_fdt = $this->input->post('port_fdt');
        $status_pembangunan = $this->input->post('status_pembangunan');
        $lat = $this->input->post('lat');
        $long = $this->input->post('long');
        $cluster = $this->input->post('cluster');
        $penginput = $this->session->userdata('username');

        $data = array(
            'id_fat' => $id_fat,
            'jenis' => (!empty($jenis)) ? $jenis : NULL,
            'brand' => (!empty($brand)) ? $brand : NULL,
            'koordinat' => (!empty($koordinat)) ? $koordinat : NULL,
            'lat' => (!empty($lat)) ? $lat : NULL,
            'long' => (!empty($long)) ? $long : NULL,
            'instalatir' => (!empty($instalatir)) ? $instalatir : NULL,
            'tanggal_instalasi' => (!empty($tanggal_instalasi)) ? $tanggal_instalasi : NULL,
            'id_fdt' => (!empty($id_fdt)) ? $id_fdt : NULL,
            'port_fdt' => (!empty($port_fdt)) ? $port_fdt : NULL,
            'kapasitas_port_max' => (!empty($kapasitas_port_max)) ? $kapasitas_port_max : NULL,
            'jenis_konektor' => (!empty($jenis_konektor)) ? $jenis_konektor : NULL,
            'kapasitas_port_terpasang' => (!empty($kapasitas_port_terpasang)) ? $kapasitas_port_terpasang : NULL,
            'power_in' => (!empty($power_in)) ? $power_in : NULL,
            'power_out' => (!empty($power_out)) ? $power_out : NULL,
            'tray_fdt' => (!empty($tray_fdt)) ? $tray_fdt : NULL,
            'status_pembangunan' => (!empty($status_pembangunan)) ? $status_pembangunan : NULL,
            'cluster' => (!empty($cluster)) ? $cluster : NULL,
            'penginput' => $penginput,
            'timestamp' => date(
                "Y-m-d h:i:sa"
            ),
        );
        //var_dump($data);
        $this->M_Odf->update('fat', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('fat/index', 'refresh');
    }

    public function hapus($no)
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin'
                || $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data = $this->M_Fat->get($no);
        if ($data) {
            $this->M_Fat->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('fat/index', 'refresh');
        }
    }
}