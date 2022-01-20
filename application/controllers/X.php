<?php
defined('BASEPATH') or exit('No direct script access allowed');

class X extends CI_Controller
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
        login();
    }
    public function index()
    {
        $data['title'] = 'Potensi';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['cluster'] = $this->M_Cluster->index();
        $data['fat'] = $this->M_Fat->index();
        // if ($this->session->userdata('akses') == 'Admin') {
        $data['potensi'] = $this->M_Potensi->index();
        //} elseif ($this->session->userdata('akses') == 'Sales Internal' or $this->session->userdata('akses') == 'Sales Eksternal') {
        //$data['potensi'] = $this->M_Potensi->index_sales();
        // }
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/potensi/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }

    function tambah()
    {
        $this->form_validation->set_rules('nik', 'nik', 'required|trim|is_unique[pelanggan.nik]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'NIK yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Hanya format lat'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim|numeric', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Hanya format long'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_fat', 'id_fat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Potensi';
            $data['title2'] = 'Add Data';
            $data['cluster'] = $this->M_Cluster->index();
            $data['mitra'] = $this->M_Mitra->index();
            $data['fat'] = $this->M_Fat->index();
            $data['fat'] = $this->M_Fat->index();
            $data['potensi'] = $this->M_Potensi->index();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/potensi/add', $data);
            //$this->load->view('admin/map/index');
            $this->load->view('admin/template/footer2', $data);
        } else {
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $koordinat = $this->input->post('koordinat');
            $alamat = $this->input->post('alamat');
            $id_pln = $this->input->post('id_pln');
            $no_hp = $this->input->post('no_hp');
            $id_fat = $this->input->post('id_fat');
            $lat = $this->input->post('lat');
            $long = $this->input->post('long');
            $koordinat = $this->input->post('koordinat');

            $marketer = $this->session->userdata('username');
            $port_fat = $this->input->post('port_fat');
            $jarak_fat = $this->input->post('jarak_fat');
            $instagram = $_POST['instagram'];
            $facebook = $_POST['facebook'];


            $stamp = date('Y-m-d');
            $penginput = $this->session->userdata('username');
            $data = array(
                'nik' => $nik,
                'nama' => $nama,
                'email' => $email,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                //'service' => $service,
                //'bandwith' => $bandwith,
                'id_fat' => $id_fat,
                'koordinat' => $koordinat,
                'lat' => $lat,
                'long' => $long,
                'koordinat' => $koordinat,
                'id_pln' => $id_pln,

                'timestamp' => $stamp,
                'port_fat' => $port_fat,
                'jarak_fat' => $jarak_fat,
                'status' => 'Potensi',


                'penginput' => $penginput,
                'marketer' => $marketer,
                'instagram' => $instagram,
                'facebook' => $facebook,
            );
            //var_dump($data);
            $this->M_Fdt->tambah('pelanggan', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('potensi/index');
        }
    }
    function get($no)
    {
        $data['potensi'] = $this->M_Potensi->get($no);
        $url = $data['potensi']['nama'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('potensi/edit/' . $no . '/'  . $url_slug));
    }
    public function edit($no)
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
        if ($this->form_validation->run() == FALSE) {

            $data['mitra'] = $this->M_Mitra->index();
            $data['cluster'] = $this->M_Cluster->index();
            $data['fat'] = $this->M_Fat->index();
            $data['potensi'] = $this->M_Potensi->get($no);
            $data['title'] = $data['potensi']['penginput'];
            $data['title2'] = $data['potensi']['timestamp'];
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/potensi/edit', $data);
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
            $marketer = $_POST['marketer'];
            $penginput = $this->session->userdata('username');

            $instagram = $_POST['instagram'];
            $facebook = $_POST['facebook'];
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
                'marketer' => $marketer,
                'port_fat' => $port_fat,
                'jarak_fat' => $jarak_fat, 'penginput' => $penginput,
                'timestamp' => date(
                    "Y-m-d h:i:sa"
                ),
                'instagram' => $instagram,
                'facebook' => $facebook,
            );
            //var_dump($data);
            $this->M_Potensi->update('pelanggan', $data, array('no' => $no));
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('potensi/index');
        }
    }
    public function status($no)
    {
        $data['title'] = 'Potensi';
        $data['title2'] = 'Up SPA Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['cluster'] = $this->M_Cluster->index();
        $data['fat'] = $this->M_Fat->index();
        $data['potensi'] = $this->M_Potensi->get($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/potensi/status', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function spa($no)
    {
        $this->form_validation->set_rules('paket_tambahan', 'jarak_fat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong atau di isi tanda -'
        ]);
        $this->form_validation->set_rules('biaya_instalasi', 'biaya_instalasi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong atau di isi 0'
        ]);
        $this->form_validation->set_rules('no_spa', 'no_spa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('no_va', 'no_va', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Potensi';
            $data['title2'] = 'Up SPA Data';
            $data['mitra'] = $this->M_Mitra->index();
            $data['cluster'] = $this->M_Cluster->index();
            $data['fat'] = $this->M_Fat->index();
            $data['potensi'] = $this->M_Potensi->get($no);
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/potensi/spa', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $no = $this->input->post('no');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $no_va = $this->input->post('no_va');
            $id_pln = $this->input->post('id_pln');
            $alamat = $this->input->post('alamat');
            $service = $this->input->post('service');
            $bandwith = $this->input->post('bandwith');
            $paket_tambahan = $this->input->post('paket_tambahan') != "" ? $this->input->post('paket_tambahan') : NULL;
            $biaya_instalasi = $this->input->post('biaya_instalasi') != "" ? $this->input->post('biaya_instalasi') : NULL;
            $no_spa = $this->input->post('no_spa');
            $id_fat = $this->input->post('id_fat');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $koordinat = $this->input->post('koordinat');
            $port_fat = $this->input->post('port_fat');
            $jarak_fat = $this->input->post('jarak_fat');
            $penginput = $this->session->userdata('username');

            $instagram = $_POST['instagram'];
            $facebook = $_POST['facebook'];
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
                'id_fat' => $id_fat,
                'paket_tambahan' => $paket_tambahan,
                'biaya_instalasi' => $biaya_instalasi,
                'no_spa' => $no_spa, 'penginput' => $penginput,
                'timestamp' => date(
                    "Y-m-d h:i:sa"
                ),
                'long' => $long,
                'lat' => $lat,
                'koordinat' => $koordinat,
                'port_fat' => $port_fat,
                'jarak_fat' => $jarak_fat,
                'status' => 'SPA',
                'instagram' => $instagram,
                'facebook' => $facebook,
            );
            //var_dump($data);
            $this->M_Potensi->update('pelanggan', $data, array('no' => $no));
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('potensi/index');
        }
    }

    public function detail($no)
    {
        $data['title'] = 'Pelanggan Iconnet';
        $data['title2'] = 'Detail Data';
        $data['mitra'] = $this->M_Mitra->index();
        $data['fat'] = $this->M_Fat->index();
        $data['potensi'] = $this->M_Potensi->get($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/potensi/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $no = $this->input->post('no');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $no_va = $this->input->post('no_va');
        $id_pln = $this->input->post('id_pln');
        $alamat = $this->input->post('alamat');
        $service = $this->input->post('service');
        $bandwith = $this->input->post('bandwith');
        $paket_tambahan = $this->input->post('paket_tambahan') != "" ? $this->input->post('paket_tambahan') : NULL;
        $biaya_instalasi = $this->input->post('biaya_instalasi') != "" ? $this->input->post('biaya_instalasi') : NULL;
        $no_spa = $this->input->post('no_spa');
        $id_fat = $this->input->post('id_fat');
        $long = $this->input->post('long');
        $lat = $this->input->post('lat');
        $koordinat = $this->input->post('koordinat');
        $port_fat = $this->input->post('port_fat');
        $jarak_fat = $this->input->post('jarak_fat');
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
            'id_fat' => $id_fat,
            'paket_tambahan' => $paket_tambahan,
            'biaya_instalasi' => $biaya_instalasi,
            'no_spa' => $no_spa, 'penginput' => $penginput,
            'timestamp' => date(
                "Y-m-d h:i:sa"
            ),
            'long' => $long,
            'lat' => $lat,
            'koordinat' => $koordinat,
            'port_fat' => $port_fat,
            'jarak_fat' => $jarak_fat,
        );
        //var_dump($data);
        $this->M_Potensi->update('pelanggan', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        $_SERVER['HTTP_REFERER'];
    }
    function ubahstatus()
    {
        $no = $this->input->post('no');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $no_va = $this->input->post('no_va');
        $id_pln = $this->input->post('id_pln');
        $alamat = $this->input->post('alamat');
        $service = $this->input->post('service');
        $bandwith = $this->input->post('bandwith');
        $paket_tambahan = $this->input->post('paket_tambahan');
        $biaya_instalasi = $this->input->post('biaya_instalasi');
        $no_spa = $this->input->post('no_spa');
        $id_fat = $this->input->post('id_fat');
        $long = $this->input->post('long');
        $lat = $this->input->post('lat');
        $koordinat = $this->input->post('koordinat');
        $status_coverage = $this->input->post('status_coverage');
        $port_fat = $this->input->post('port_fat');
        $jarak_fat = $this->input->post('jarak_fat');
        $status_coverage = $this->input->post('status_coverage');
        $stamp = date('Y-m-d');
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
            'id_fat' => $id_fat,
            'paket_tambahan' => $paket_tambahan,
            'biaya_instalasi' => $biaya_instalasi,
            'no_spa' => $no_spa,
            'penginput' => $penginput,
            'timestamp' => date(
                "Y-m-d h:i:sa"
            ),
            'long' => $long,
            'lat' => $lat,
            'koordinat' => $koordinat,
            'port_fat' => $port_fat,
            'jarak_fat' => $jarak_fat,
            'status_coverage' => $status_coverage,
        );
        //var_dump($data);
        $this->M_Potensi->update('pelanggan', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        $_SERVER['HTTP_REFERER'];
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