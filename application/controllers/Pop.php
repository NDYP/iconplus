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
    public function index($rownomer = 0)
    {
        $this->session->unset_userdata('search');
        // Row per page
        $rowper = 10;

        // Row position
        if ($rownomer != 0) {
            $rownomer = ($rownomer - 1) * $rowper;
        }
        // All records count
        $allcount = $this->M_Pop->index()->num_rows();

        // Get  records
        $index = $this->M_Pop->halaman($rownomer, $rowper);
        // Pagination Configuration
        $config['base_url'] = base_url('pop/index');
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowper;
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
        $data['pop'] = $index;
        $data['row'] = $rownomer;

        $data['title'] = 'POP';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index()->result_array();
        // $data['cluster'] = $this->M_Cluster->index()->result_array();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pop/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($index);
    }
    public function search($rownomer = 0)
    {
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
        $rowper = 10;

        // Row position
        if ($rownomer != 0) {
            $rownomer = ($rownomer - 1) * $rowper;
        }
        // All records count
        $allcount = $this->M_Pop->jumlah($search_text);

        // Get  records
        $index = $this->M_Pop->search($rownomer, $rowper, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('pop/search');
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowper;

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
        $data['pop'] = $index;
        $data['row'] = $rownomer;
        $data['search'] = $search_text;


        $data['title'] = 'POP';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index()->result_array();
        // $data['cluster'] = $this->M_Cluster->index()->result_array();
        // $data['fat'] = $this->M_Fat->index()->result_array();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pop/halaman', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($data['pagination']);
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
            $data['pop'] = $this->M_Pop->index()->result_array();
            $data['mitra'] = $this->M_Mitra->index()->result_array();
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
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/pop/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function detail($no)
    {
        $data['title'] = 'POP';
        $data['title2'] = 'Detail Data';
        $data['pop'] = $this->M_Pop->get($no);
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        //$data['cluster'] = $this->M_Pop->index()->result_array();
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