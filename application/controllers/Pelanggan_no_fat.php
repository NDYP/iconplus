<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_no_fat extends CI_Controller
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
        $this->load->model('M_Pelanggan_no_fat');
        $this->load->model('M_Potensi');
        login();
    }
    public function index($rowno = 0)
    {
        $this->session->unset_userdata('search');

        $user_session =
            ($this->session->userdata('akses') == 'Sales Internal' ||
                $this->session->userdata('akses') == 'Sales Eksternal' ||
                $this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'Aktivasi Retail');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }

        // Row per page
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->M_Pelanggan_no_fat->index()->num_rows();

        // Get  records
        $index = $this->M_Pelanggan_no_fat->halaman($rowno, $rowperpage);

        // Pagination Configuration
        $config['base_url'] = base_url('pelanggan_no_fat/index');
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        //xxx
        // $choice = $config["total_rows"] / 1000;
        $config["num_links"] = 5;

        $config['next_link']        = '»';
        $config['prev_link']        = '«';
        $config['full_tag_open']    = '<div class="box-footer clearfix"><ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']  = '</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']  = '</li>';
        // Initialize

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['pelanggan'] = $index;
        $data['row'] = $rowno;

        $data['title'] = 'Tidak Lengkap';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['cluster'] = $this->M_Cluster->index()->result_array();
        $data['fat'] = $this->M_Fat->index()->result_array();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pelanggan_no_fat/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    public function search($rowno = 0)
    {
        $user_session =
            ($this->session->userdata('akses') == 'Sales Internal' ||
                $this->session->userdata('akses') == 'Sales Eksternal' ||
                $this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'Aktivasi Retail');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }
        // Row per page
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->M_Pelanggan_no_fat->jumlah($search_text);

        // Get  records
        $index = $this->M_Pelanggan_no_fat->search($rowno, $rowperpage, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('pelanggan_no_fat/search');
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        //xxx
        // $choice = $config["total_rows"] / 1000;
        $config["num_links"] = 5;


        $config['next_link']        = '»';
        $config['prev_link']        = '«';
        $config['full_tag_open']    = '<div class="box-footer clearfix"><ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="active"><a href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']  = '</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']  = '</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']  = '</li>';
        // Initialize

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['pelanggan'] = $index;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $data['title'] = 'Pelanggan Iconnet';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['cluster'] = $this->M_Cluster->index()->result_array();
        $data['fat'] = $this->M_Fat->index()->result_array();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pelanggan_no_fat/halaman', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    function tambah()
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Asset Retail');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }

        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        // $this->form_validation->set_rules('no_va', 'no_va', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('service', 'service', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        // $this->form_validation->set_rules('biaya_instalasi', 'biaya_instalasi', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        $this->form_validation->set_rules('no_spa', 'no_spa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        // $this->form_validation->set_rules('sid', 'sid', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('sn_ont', 'sn_ont', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        $this->form_validation->set_rules('id_fat', 'id_fat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        // $this->form_validation->set_rules('bandwith', 'bandwith', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('brand', 'brand', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);


        // $this->form_validation->set_rules('sn_stb', 'sn_stb', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('instalatir', 'instalatir', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('port_fat', 'port_fat', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('jenis_kabel_dropcore', 'jenis_kabel_dropcore', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('jenis_konektor_ont', 'jenis_konektor_ont', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);

        // $this->form_validation->set_rules('panjang_kabel_dropcore', 'panjang_kabel_dropcore', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('dbm', 'dbm', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('tanggal_instalasi', 'tanggal_instalasi', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pelanggan Iconnet';
            $data['title2'] = 'Add Data';
            $data['cluster'] = $this->M_Cluster->index()->result_array();

            $data['mitra'] = $this->M_Mitra->index()->result_array();
            $data['fat'] = $this->db->get('fat')->result_array();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/pelanggan_no_fat/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $no_va = $this->input->post('no_va');
            $koordinat = $this->input->post('koordinat');
            $alamat = $this->input->post('alamat');
            $service = $this->input->post('service');
            $bandwith = $this->input->post('bandwith');
            $paket_tambahan = $this->input->post('paket_tambahan');
            $biaya_instalasi = $this->input->post('biaya_instalasi');
            $brand = $this->input->post('brand');
            $jenis_kabel_dropcore = $this->input->post('jenis_kabel_dropcore');
            $no_spa = $this->input->post('no_spa');
            $jenis_konektor_ont = $this->input->post('jenis_konektor_ont');
            $panjang_kabel_dropcore = $this->input->post('panjang_kabel_dropcore');
            $sid = $this->input->post('sid');
            $sn_stb = $this->input->post('sn_stb');
            $dbm = $this->input->post('dbm');
            $sn_ont = $this->input->post('sn_ont');
            $instalatir = $this->input->post('instalatir');
            $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));
            $id_fat = $this->input->post('id_fat');
            $port_fat = $this->input->post('port_fat');
            $lat = $this->input->post('lat');
            $long = $this->input->post('long');
            $id_pln = $this->input->post('id_pln');
            $penginput = $this->session->userdata('username');
            $data = array(
                'nik' => (!empty($nik)) ? $nik : NULL,
                'nama' => $nama,
                'email' => (!empty($email)) ? $email : NULL,
                'no_hp' => $no_hp,
                'no_va' => (!empty($no_va)) ? $no_va : NULL,
                'id_pln' => (!empty($id_pln)) ? $id_pln : NULL,
                'alamat' => (!empty($alamat)) ? $alamat : NULL,
                'service' => (!empty($service)) ? $service : NULL,
                'bandwith' => (!empty($bandwith)) ? $bandwith : NULL,
                'id_fat' => $id_fat,
                'paket_tambahan' => (!empty($paket_tambahan)) ? $paket_tambahan : NULL,
                'brand' => (!empty($brand)) ? $brand : NULL,
                'koordinat' => $koordinat,
                'lat' => $lat,
                'long' => $long,
                'instalatir' => (!empty($instalatir)) ? $instalatir : NULL,
                'tanggal_instalasi' => (!empty($tanggal_instalasi)) ? $tanggal_instalasi : NULL,
                'biaya_instalasi' => (!empty($biaya_instalasi)) ? $biaya_instalasi : NULL,
                'jenis_kabel_dropcore' => (!empty($jenis_kabel_dropcore)) ? $jenis_kabel_dropcore : NULL,
                'no_spa' => (!empty($no_spa)) ? $no_spa : NULL,
                'jenis_konektor_ont' => (!empty($jenis_konektor_ont)) ? $jenis_konektor_ont : NULL,
                'panjang_kabel_dropcore' => (!empty($panjang_kabel_dropcore)) ? $panjang_kabel_dropcore : NULL,
                'sid' => (!empty($sid)) ? $sid : NULL,
                'sn_stb' => (!empty($sn_stb)) ? $sn_stb : NULL,
                'dbm' => (!empty($dbm)) ? $dbm : NULL,
                'sn_ont' => (!empty($sn_ont)) ? $sn_ont : NULL,
                'port_fat' => (!empty($port_fat)) ? $port_fat : NULL,
                'penginput' => $penginput,
                'potensi_callback' => 4,
                'potensi_status' => 1,
                'penginput' => (!empty($penginput)) ? $penginput : NULL,
                'timestamp' => date(
                    "Y-m-d h:i:sa"
                ),
                'status' => 'SPA Closed'
            );
            //var_dump($data);
            $this->M_Fdt->tambah('pelanggan', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('pelanggan_no_fat/index', 'refresh');
        }
    }
    function get($no)
    {
        $data['pelanggan'] = $this->M_Pelanggan_no_fat->get($no);
        $url = $data['pelanggan']['nama'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('pelanggan_no_fat/edit/' . $no . '/'  . $url_slug));
    }
    public function edit($no)
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Asset Retail');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['title'] = 'Pelanggan';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['cluster'] = $this->M_Cluster->index()->result_array();
        $data['fat'] = $this->db->get('fat')->result_array();

        $data['pelanggan'] = $this->M_Pelanggan_no_fat->get($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pelanggan_no_fat/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function detail($no)
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'Sales Internal' ||
                $this->session->userdata('akses') == 'Sales Eksternal');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['title'] = 'Pelanggan Iconnet';
        $data['title2'] = 'Detail Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['pelanggan'] = $this->M_Pelanggan_no_fat->get($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pelanggan_no_fat/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $no = $_POST['no'];
        $nik = $this->input->post('nik') != "" ? $this->input->post('nik') : NULL;
        $nama = $this->input->post('nama') != "" ? $this->input->post('nama') : NULL;
        $email = $this->input->post('email') != "" ? $this->input->post('email') : NULL;
        $no_hp = $this->input->post('no_hp') != "" ? $this->input->post('no_hp') : NULL;
        $no_va = $this->input->post('no_va') != "" ? $this->input->post('no_va') : NULL;
        $id_pln = $this->input->post('id_pln') != "" ? $this->input->post('id_pln') : NULL;
        $koordinat = $this->input->post('koordinat') != "" ? $this->input->post('koordinat') : NULL;
        $alamat = $this->input->post('alamat') != "" ? $this->input->post('alamat') : NULL;
        $service = $this->input->post('service') != "" ? $this->input->post('service') : NULL;
        $bandwith = $this->input->post('bandwith') != "" ? $this->input->post('bandwith') : NULL;
        $paket_tambahan = $this->input->post('paket_tambahan') != "" ? $this->input->post('paket_tambahan') : NULL;
        $biaya_instalasi = $this->input->post('biaya_instalasi') != "" ? $this->input->post('biaya_instalasi') : NULL;
        $brand = $this->input->post('brand') != "" ? $this->input->post('brand') : NULL;
        $jenis_kabel_dropcore = $this->input->post('jenis_kabel_dropcore') != "" ? $this->input->post('jenis_kabel_dropcore') : NULL;
        $no_spa = $this->input->post('no_spa') != "" ? $this->input->post('no_spa') : NULL;
        $jenis_konektor_ont = $this->input->post('jenis_konektor_ont') != "" ? $this->input->post('jenis_konektor_ont') : NULL;
        $panjang_kabel_dropcore = $this->input->post('panjang_kabel_dropcore') != "" ? $this->input->post('panjang_kabel_dropcore') : NULL;
        $sid = $this->input->post('sid') != "" ? $this->input->post('sid') : NULL;
        $sn_stb = $this->input->post('sn_stb') != "" ? $this->input->post('sn_stb') : NULL;
        $dbm = $this->input->post('dbm') != "" ? $this->input->post('dbm') : NULL;
        $sn_ont = $this->input->post('sn_ont') != "" ? $this->input->post('sn_ont') : NULL;
        $instalatir = $this->input->post('instalatir') != "" ? $this->input->post('instalatir') : NULL;
        $tanggal_instalasi
            = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi'))) != "" ? date('Y-m-d', strtotime($this->input->post('tanggal_instalasi'))) : NULL;
        $id_fat = $this->input->post('id_fat') != "" ? $this->input->post('id_fat') : NULL;
        $port_fat = $this->input->post('port_fat') != "" ? $this->input->post('port_fat') : NULL;
        $lat = $this->input->post('lat') != "" ? $this->input->post('lat') : NULL;
        $long = $this->input->post('long') != "" ? $this->input->post('long') : NULL;
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
            'brand' => $brand,
            'koordinat' => $koordinat,
            'lat' => $lat,
            'long' => $long,
            'instalatir' => $instalatir,
            'tanggal_instalasi' => date("Y-m-d", $tanggal_instalasi),

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
            'penginput' => $penginput,
            'potensi_callback' => 4,
            'potensi_status' => 1,
            'timestamp' => date(
                "Y-m-d h:i:sa"
            ),
        );
        //var_dump($data);
        $this->M_Pelanggan_no_fat->update('pelanggan', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('pelanggan_no_fat/index', 'refresh');
    }
    public function hapus($no)
    {
        $user_session =
            ($this->session->userdata('akses') == 'Admin' ||
                $this->session->userdata('akses') == 'Asset Retail');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data = $this->M_Pelanggan_no_fat->get($no);
        if ($data) {
            $this->M_Pelanggan_no_fat->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('flash', 'Gagal Hapus Data');
            redirect('pelanggan_no_fat/index', 'refresh');
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

            $data['mitra'] = $this->M_Mitra->index()->result_array();
            $data['cluster'] = $this->M_Cluster->index()->result_array();
            $data['fat'] = $this->M_Fat->index()->result_array();
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
                'port_fat' => (!empty($port_fat)) ? $port_fat : NULL,
                'jarak_fat' => (!empty($jarak_fat)) ? $jarak_fat : NULL,
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
            redirect('pelanggan_no_fat/index');
        }
    }
}
