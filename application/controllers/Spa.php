<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spa extends CI_Controller
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
        $this->load->model('M_Potensi');
        $this->load->model('M_Pelanggan');
        login();
        $user_session =
            ($this->session->userdata('akses') == 'Aktivasi Retail' ||
                $this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Sales Internal' ||
                $this->session->userdata('akses') == 'Asset Retail');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function index()
    {
        $data['title'] = 'SPA Iconnet';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fat'] = $this->M_Fat->index();
        if ($this->session->userdata('akses') == 'Sales Eksternal' or $this->session->userdata('akses') == 'Sales Eksternal') {
            $data['spa'] = $this->M_Potensi->spa_sales();
        } else {
            $data['spa'] = $this->M_Potensi->spa();
        }
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/spa/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    function get($no)
    {
        $data['spa'] = $this->M_Pelanggan->get($no);
        $url = $data['spa']['nama'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('spa/edit/' . $no . '/'  . $url_slug));
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('sid', 'sid', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('brand', 'brand', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sn_ont', 'sn_ont', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sn_stb', 'sn_stb', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('panjang_kabel_dropcore', 'panjang_kabel_dropcore', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('tanggal_instalasi', 'tanggal_instalasi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'SPA';
            $data['title2'] = 'Closed';
            $data['mitra'] = $this->M_Mitra->index();
            $data['cluster'] = $this->M_Cluster->index();
            $data['fat'] = $this->M_Fat->index();
            $data['spa'] = $this->M_Pelanggan->get($no);
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/spa/edit', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $no = $this->input->post('no');

            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $no_va = $this->input->post('no_va');
            $id_pln = $this->input->post('id_pln');
            $koordinat = $this->input->post('koordinat');
            $alamat = $this->input->post('alamat');
            $no_spa = $this->input->post('no_spa');
            $lat = $this->input->post('lat');
            $long = $this->input->post('long');

            $service = $this->input->post('service');
            $bandwith = $this->input->post('bandwith');
            $paket_tambahan = $this->input->post('paket_tambahan');
            $biaya_instalasi = $this->input->post('biaya_instalasi');
            $id_fat = $this->input->post('id_fat');
            $port_fat = $this->input->post('port_fat');
            $jarak_fat = $this->input->post('jarak_fat');

            $brand = $this->input->post('brand');
            $jenis_kabel_dropcore = $this->input->post('jenis_kabel_dropcore');
            $jenis_konektor_ont = $this->input->post('jenis_konektor_ont');
            $panjang_kabel_dropcore = $this->input->post('panjang_kabel_dropcore');
            $sid = $this->input->post('sid');
            $sn_stb = $this->input->post('sn_stb');
            $dbm = $this->input->post('dbm');
            $sn_ont = $this->input->post('sn_ont');
            $instalatir = $this->input->post('instalatir');
            $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));
            $penginput = $this->session->userdata('username');
            $data = array(
                'nik' => $nik,
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $no_hp,
                'id_pln' => $id_pln,
                'no_va' => $no_va,
                'alamat' => $alamat,
                'service' => $service,
                'bandwith' => $bandwith,
                'jarak_fat' => $jarak_fat,
                'id_fat' => $id_fat,
                'paket_tambahan' => $paket_tambahan,
                'brand' => $brand,
                'koordinat' => $koordinat,
                'lat' => $lat,
                'long' => $long,
                'instalatir' => $instalatir,
                'tanggal_instalasi' => $tanggal_instalasi,
                'biaya_instalasi' => $biaya_instalasi,
                'jenis_kabel_dropcore' => $jenis_kabel_dropcore,
                'no_spa' => $no_spa,
                'jenis_konektor_ont' => $jenis_konektor_ont,
                'panjang_kabel_dropcore' => $panjang_kabel_dropcore,
                'sid' => $sid,
                'sn_stb' => $sn_stb,
                'dbm' => $dbm,
                'sn_ont' => $sn_ont,
                'port_fat' => $port_fat,
                'status' => 'SPA Closed',
                'penginput' => $penginput,
                'timestamp' => date(
                    "Y-m-d h:i:sa"
                ),
            );
            //var_dump($data);

            $this->M_Pelanggan->update('pelanggan', $data, array('no' => $no));
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('spa/index', 'refresh');
        }
    }
    public function cancel($no)
    {
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('note', 'note', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {

            $data['mitra'] = $this->M_Mitra->index();
            $data['cluster'] = $this->M_Cluster->index();
            $data['fat'] = $this->M_Fat->index();
            $data['spa'] = $this->M_Pelanggan->get($no);
            $data['title'] = $data['spa']['penginput'];
            $data['title2'] = $data['spa']['timestamp'];
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/spa/cancel', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $no = $this->input->post('no');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $id_pln = $this->input->post('id_pln');
            $alamat = $this->input->post('alamat');

            $id_fat = $this->input->post('id_fat');
            $port_fat = $this->input->post('port_fat');
            $jarak_fat = $this->input->post('jarak_fat');

            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $koordinat = $this->input->post('koordinat');
            $note = $this->input->post('note');
            $penginput = $this->session->userdata('username');

            $data = array(
                'id_fat' => $id_fat,

                'id_pln' => $id_pln,
                'nik' => $nik,
                'nama' => $nama,
                'email' => $email,
                'no_hp' => $no_hp,

                'alamat' => $alamat,
                'long' => $long,
                'lat' => $lat,
                'koordinat' => $koordinat,

                'port_fat' => $port_fat,
                'jarak_fat' => $jarak_fat,

                'penginput' => $penginput,
                'timestamp' => date(
                    "Y-m-d h:i:sa"
                ),
                'note' => $note,
                'status' => 'SPA Cancel'
            );
            //var_dump($data);
            $this->M_Potensi->update('pelanggan', $data, array('no' => $no));
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('spa/index');
        }
    }
    public function hapus($no)
    {
        $data = $this->M_Potensi->get($no);
        if ($data) {
            $this->M_Potensi->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}