<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
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
        $this->load->model('M_Spa');
        login();
        $user_session =
            ($this->session->userdata('akses') == 'Aktivasi Retail' ||
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
        }

        // Get  records
        $allcount = $this->M_Potensi->spa()->num_rows();
        $index = $this->M_Potensi->halamanspa($rowno, $rowperpage);



        // Pagination Configuration
        $config['base_url'] = base_url('spa/index');
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
        $data['spa'] = $index;
        $data['row'] = $rowno;
        $data['title'] = 'SPA Iconnet';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        // if ($this->session->userdata('akses') == 'Sales Eksternal' or $this->session->userdata('akses') == 'Sales Eksternal') {
        //     $data['spa'] = $this->M_Potensi->spa_sales();
        // } else {
        //     $data['spa'] = $this->M_Potensi->spa();
        // }
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/spa/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    public function search($rowno = 0)
    {
        // Row per page
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
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

        // All records count
        $allcount = $this->M_Potensi->jumlahspa($search_text);
        // Get  records
        $index = $this->M_Potensi->searchspa($rowno, $rowperpage, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('spa/search');
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
        $data['spa'] = $index;
        $data['row'] = $rowno;
        $data['search'] = $search_text;

        $data['title'] = 'SPA Iconnet';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        // if ($this->session->userdata('akses') == 'Sales Eksternal' or $this->session->userdata('akses') == 'Sales Eksternal') {
        //     $data['spa'] = $this->M_Potensi->spa_sales();
        // } else {
        //     $data['spa'] = $this->M_Potensi->spa();
        // }
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/spa/halaman', $data);
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
        $this->form_validation->set_rules('no_spa', 'no_spa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('sn_ont', 'sn_ont', 'required|trim', [
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
            $data['mitra'] = $this->M_Mitra->index()->result_array();
            $data['cluster'] = $this->M_Cluster->index()->result_array();
            $data['fat'] = $this->M_Fat->index()->result_array();
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
                'no_va' => (!empty($no_va)) ? $no_va : NULL,
                'alamat' => $alamat,
                'service' => $service,
                'bandwith' => $bandwith,
                'jarak_fat' => (!empty($jarak_fat)) ? $jarak_fat : NULL,
                'id_fat' => $id_fat,
                'paket_tambahan' => $paket_tambahan,
                'brand' => $brand,
                'koordinat' => $koordinat,
                'lat' => $lat,
                'long' => $long,
                'instalatir' => $instalatir,
                'tanggal_instalasi' => $tanggal_instalasi,
                'biaya_instalasi' => (!empty($biaya_instalasi)) ? $biaya_instalasi : NULL,
                'jenis_kabel_dropcore' => $jenis_kabel_dropcore,
                'no_spa' => $no_spa,
                'jenis_konektor_ont' => $jenis_konektor_ont,
                'panjang_kabel_dropcore' => $panjang_kabel_dropcore,
                'sid' => $sid,
                'sn_stb' => (!empty($sn_stb)) ? $sn_stb : NULL,
                'dbm' => (!empty($dbm)) ? $dbm : NULL,
                'sn_ont' => $sn_ont,
                'port_fat' => (!empty($port_fat)) ? $port_fat : NULL,
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
            redirect('spa/index');
        }
    }
    public function hapus($no)
    {
        $data = $this->M_Spa->get($no);
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