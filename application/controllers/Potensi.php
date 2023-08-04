<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Potensi extends CI_Controller
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
            ($this->session->userdata('akses') == 'Sales Internal' ||
                $this->session->userdata('akses') == 'Sales Eksternal' ||
                $this->session->userdata('akses') == 'Admin');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function index($rowno = 0)
    {
        $this->session->unset_userdata('search');
        // Row per page
        $rowperpage = 10;
        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        };
        if (
            $this->session->userdata('akses') == 'Sales Eksternal'
            or $this->session->userdata('akses') == 'Sales Internal'
        ) {
            // All records count
            $allcount = $this->M_Potensi->indexsales()->num_rows();
            // Get  records
            $index = $this->M_Potensi->halamansales($rowno, $rowperpage);
        } elseif ($this->session->userdata('akses') == 'Admin') {
            $allcount = $this->M_Potensi->index()->num_rows();
            // Get  records
            $index = $this->M_Potensi->halaman($rowno, $rowperpage);
        }

        // Pagination Configuration
        $config['base_url'] = base_url('potensi/index');
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

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
        $data['potensi'] = $index;
        $data['row'] = $rowno;
        $data['title'] = 'Potensi';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['cluster'] = $this->M_Cluster->index()->result_array();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/potensi/index', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function search($rowno = 0)
    {
        // Row per page
        $rowperpage = 10;


        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }



        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        if ($this->session->userdata('akses') == 'Sales Eksternal' or $this->session->userdata('akses') == 'Sales Internal') {
            // All records count
            $allcount = $this->M_Potensi->jumlahsales($search_text);
            // Get  records
            $index = $this->M_Potensi->searchsales($rowno, $rowperpage, $search_text);
        } else {
            // All records count
            $allcount = $this->M_Potensi->jumlah($search_text);
            // Get  records
            $index = $this->M_Potensi->search($rowno, $rowperpage, $search_text);
        }

        // Pagination Configuration
        $config['base_url'] = base_url('potensi/search');
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

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
        $data['potensi'] = $index;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $data['title'] = 'Potensi';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['cluster'] = $this->M_Cluster->index()->result_array();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/potensi/halaman', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function tambah()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('id_pln', 'id_pln', 'required|trim|is_unique[pelanggan.id_pln]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'ID yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim|numeric|is_unique[pelanggan.no_hp]', [
            'required' => 'Tidak Boleh Kosong!',
            'numeric' => 'Tidak boleh ada karakter!',
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
        $this->form_validation->set_rules('potensi_status', 'potensi_status', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('potensi_callback', 'potensi_callback', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        // $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);
        // $this->form_validation->set_rules('id_fat', 'id_fat', 'required|trim', [
        //     'required' => 'Tidak Boleh Kosong!'
        // ]);


        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Potensi';
            $data['title2'] = 'Add Data';
            $data['cluster'] = $this->M_Cluster->index()->result_array();
            $data['mitra'] = $this->M_Mitra->index()->result_array();
            $data['fat'] = $this->M_Fat->index()->result_array();
            $data['status'] = $this->db->get('potensi_status')->result_array();
            $data['callback'] = $this->db->get('potensi_callback')->result_array();
            $data['status_selected'] = '';
            $data['callback_selected'] = '';
            // $data['potensi'] = $this->M_Potensi->index()->result_array();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/potensi/add', $data);
            //$this->load->view('admin/map/index');
            $this->load->view('admin/template/footer2', $data);
        } else {
            $nik = $this->input->post('nik');
            $nama = ucwords($this->input->post('nama'));
            $email = $this->input->post('email');
            $koordinat = $this->input->post('koordinat');
            $alamat = $this->input->post('alamat');
            $id_pln = $this->input->post('id_pln');
            $no_hp = $this->input->post('no_hp');
            // $id_fat = $this->input->post('id_fat');
            $lat = $this->input->post('lat');
            $long = $this->input->post('long');
            $koordinat = $this->input->post('koordinat');

            $marketer = $this->session->userdata('username');
            // $port_fat = $this->input->post('port_fat');
            // $jarak_fat = $this->input->post('jarak_fat');
            $instagram =
                $this->input->post('instagram');
            $facebook =
                $this->input->post('facebook');
            $stamp = date('Y-m-d');
            $penginput = $this->session->userdata('username');
            $potensi_status =
                $this->input->post('potensi_status');
            $potensi_callback =
                $this->input->post('potensi_callback');
            $data = array(
                'nik' => (!empty($nik)) ? $nik : NULL,
                'nama' => $nama,
                'email' => (!empty($email)) ? $email : NULL,
                'alamat' => (!empty($alamat)) ? $alamat : NULL,
                'no_hp' => $no_hp,
                //'service' => $service,
                //'bandwith' => $bandwith,
                'id_fat' => (!empty($id_fat)) ? $id_fat : NULL,
                'koordinat' => $koordinat,
                'lat' => $lat,
                'long' => $long,
                'koordinat' => $koordinat,
                'id_pln' => (!empty($id_pln)) ? $id_pln : NULL,

                'timestamp' => $stamp,
                'port_fat' => (!empty($port_fat)) ? $port_fat : NULL,
                'jarak_fat' => (!empty($jarak_fat)) ? $jarak_fat : NULL,
                'status' => 'Potensi',


                'penginput' => $penginput,
                'marketer' => $marketer,
                'instagram' => (!empty($instagram)) ? $instagram : NULL,
                'facebook' => (!empty($facebook)) ? $facebook : NULL,
                'potensi_status' => (!empty($potensi_status)) ? $potensi_status : NULL,
                'potensi_callback' => (!empty($potensi_callback)) ? $potensi_callback : NULL,
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

            $data['mitra'] = $this->M_Mitra->index()->result_array();
            $data['cluster'] = $this->M_Cluster->index()->result_array();
            $data['fat'] = $this->M_Fat->index()->result_array();
            // $data['potensi'] = $this->M_Potensi->get($no);
            $data['potensi'] = $this->db->get_where('pelanggan', array('no' => $no))->row_array();
            $potensi_status = $data['potensi']['potensi_status'];

            $data['status'] = $this->db->get('potensi_status')->result_array();
            $data['callback'] = $this->db->get('potensi_callback')->result_array();

            $data['selected'] = $this->M_Pelanggan->status_potensi($potensi_status);
            $data['title'] = $data['potensi']['penginput'];
            $data['title2'] = $data['potensi']['timestamp'];
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/potensi/edit', $data);
            $this->load->view('admin/template/footer2', $data);
            // var_dump($data['selected']);
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
            // $marketer = $_POST['marketer'];
            $penginput = $this->session->userdata('username');

            $instagram =
                $this->input->post('instagram');
            $facebook
                = $this->input->post('facebook');
            $potensi_status =
                $this->input->post('potensi_status');
            $potensi_callback =
                $this->input->post('potensi_callback');
            $data = array(
                // 'id_fat' => (!empty($id_fat)) ? $id_fat : NULL,
                'id_pln' => (!empty($id_pln)) ? $id_pln : NULL,
                'nik' => (!empty($nik)) ? $nik : NULL,
                'nama' => (!empty($nama)) ? $nama : NULL,
                'email' => (!empty($email)) ? $email : NULL,
                'no_hp' => (!empty($no_hp)) ? $no_hp : NULL,
                'alamat' => (!empty($alamat)) ? $alamat : NULL,
                'long' => (!empty($long)) ? $long : NULL,
                'lat' => (!empty($lat)) ? $lat : NULL,
                'koordinat' => (!empty($koordinat)) ? $koordinat : NULL,
                // 'marketer' => (!empty($jenis)) ? $jenis : NULL,
                // 'port_fat' => (!empty($port_fat)) ? $port_fat : NULL,
                // 'jarak_fat' => (!empty($jarak_fat)) ? $jarak_fat : NULL,
                'penginput' => (!empty($penginput)) ? $penginput : NULL,
                // 'timestamp' => date(
                //     "Y-m-d h:i:sa"
                // ),
                'instagram' => (!empty($instagram)) ? $instagram : NULL,
                'facebook' => (!empty($facebook)) ? $facebook : NULL,
                'potensi_status' => (!empty($potensi_status)) ? $potensi_status : NULL,
                'potensi_callback' => (!empty($potensi_callback)) ? $potensi_callback : NULL,
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
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['cluster'] = $this->M_Cluster->index()->result_array();
        $data['fat'] = $this->M_Fat->index()->result_array();
        $data['potensi'] = $this->M_Potensi->get($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/potensi/status', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function spa($no)
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
            $data['title'] = 'Potensi';
            $data['title2'] = 'Up SPA Data';
            $data['mitra'] = $this->M_Mitra->index()->result_array();
            $data['cluster'] = $this->M_Cluster->index()->result_array();
            $data['fat'] = $this->M_Fat->index()->result_array();
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
                'no_va' => (!empty($no_va)) ? $no_va : NULL,
                'alamat' => $alamat,
                'service' => $service,
                'bandwith' => $bandwith,
                'id_fat' => $id_fat,
                'paket_tambahan' => (!empty($paket_tambahan)) ? $paket_tambahan : NULL,
                'biaya_instalasi' => (!empty($biaya_instalasi)) ? $biaya_instalasi : NULL,
                'no_spa' => $no_spa, 'penginput' => $penginput,
                'timestamp' => date(
                    "Y-m-d h:i:sa"
                ),
                'long' => $long,
                'lat' => $lat,
                'koordinat' => $koordinat,
                'port_fat' => (!empty($port_fat)) ? $port_fat : NULL,
                'jarak_fat' => (!empty($jarak_fat)) ? $jarak_fat : NULL,
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
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['fat'] = $this->db->get('fat');
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