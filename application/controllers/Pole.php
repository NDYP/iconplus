<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pole extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Pole');
        $this->load->model('M_Mitra');
        $this->load->model('M_Cluster');
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
        $allcount = $this->M_Pole->index()->num_rows();

        // Get  records
        $index = $this->M_Pole->halaman($rownomer, $rowper);
        // Pagination Configuration
        $config['base_url'] = base_url('pole/index');
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
        $data['pole'] = $index;
        $data['row'] = $rownomer;

        $data['title'] = 'POLE';
        $data['title2'] = 'Index Data';
        $data['mitra'] = $this->M_Mitra->index()->result_array();
        $data['cluster'] = $this->M_Cluster->index()->result_array();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/tiang/index', $data);
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
        $allcount = $this->M_Pole->jumlah($search_text);

        // Get  records
        $index = $this->M_Pole->search($rownomer, $rowper, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('pole/search');
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
        $data['pole'] = $index;
        $data['row'] = $rownomer;
        $data['search'] = $search_text;


        $data['title'] = 'POLE';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index()->result_array();
        // $data['cluster'] = $this->M_Cluster->index()->result_array();
        // $data['fat'] = $this->M_Fat->index()->result_array();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/tiang/halaman', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($data['pagination']);
    }



    function tambah()
    {
        $this->form_validation->set_rules('id', 'id', 'required|trim|is_unique[pole.id]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'id yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('konstruksi', 'konstruksi', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('status', 'status', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('owner', 'owner', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('ptl', 'ptl', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('instalatir', 'instalatir', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pole';
            $data['title2'] = 'Add Data';

            $data['mitra'] = $this->M_Mitra->index()->result_array();
            $data['fat'] = $this->M_Pole->index()->result_array();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/tiang/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $id = $this->input->post('id');
            $konstruksi = $this->input->post('konstruksi');
            $tinggi_tiang = $this->input->post('tinggi_tiang');
            $tebal_tiang = $this->input->post('tebal_tiang');
            $status = $this->input->post('status');
            $jenis = $this->input->post('jenis');
            $ptl = $this->input->post('ptl');
            $instalatir = $this->input->post('instalatir');
            $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $geom = $this->input->post('geom');
            $owner = $this->input->post('owner');
            $stamp = date('Y-m-d H:i:s');
            $data = array(
                'id' => $id,
                'konstruksi' => $konstruksi,
                'tinggi_tiang' => $tinggi_tiang,
                'tebal_tiang' => $tebal_tiang,
                'status' => $status,
                'jenis' => $jenis,
                'owner' => $owner,
                'ptl' => $ptl,

                'geom' => $geom,
                'long' => $long,
                'lat' => $lat,
                'long' => $long,
                'instalatir' => $instalatir,
                'tanggal_instalasi' => $tanggal_instalasi,
                'timestamp' => $stamp,
            );
            //var_dump($data);
            $this->M_Pole->tambah('pole', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('pole/index', 'refresh');
        }
    }
    function get($no)
    {
        $data['pole'] = $this->M_Pole->get($no);
        $url = $data['pole']['konstruksi'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('pole/edit/' . $no . '/'  . $url_slug));
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('id', 'id', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'pole';
            $data['title2'] = 'Edit Data';
            $data['mitra'] = $this->M_Mitra->index()->result_array();
            $data['cluster'] = $this->M_Cluster->index()->result_array();
            $data['fat'] = $this->M_Pole->index()->result_array();
            $data['pole'] = $this->M_Pole->get($no);
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/tiang/edit', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $no = $this->input->post('no');
            $id = $this->input->post('id');
            $konstruksi = $this->input->post('konstruksi');
            $tinggi_tiang = $this->input->post('tinggi_tiang');
            $tebal_tiang = $this->input->post('tebal_tiang');
            $status = $this->input->post('status');
            $jenis = $this->input->post('jenis');
            $ptl = $this->input->post('ptl');
            $instalatir = $this->input->post('instalatir');
            $tanggal_instalasi = date('Y-m-d', strtotime($this->input->post('tanggal_instalasi')));
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $geom = $this->input->post('geom');
            $owner = $this->input->post('owner');
            $stamp = date('Y-m-d H:i:s');
            $data = array(
                'id' => (!empty($id)) ? $id : NULL,
                'konstruksi' => (!empty($konstruksi)) ? $konstruksi : NULL,
                'tinggi_tiang' => (!empty($tinggi_tiang)) ? $tinggi_tiang : NULL,
                'tebal_tiang' => (!empty($tebal_tiang)) ? $tebal_tiang : NULL,
                'status' => (!empty($status)) ? $status : NULL,
                'jenis' => (!empty($jenis)) ? $jenis : NULL,
                'owner' => (!empty($owner)) ? $owner : NULL,
                'ptl' => (!empty($ptl)) ? $ptl : NULL,

                'geom' => (!empty($geom)) ? $geom : NULL,
                'long' => (!empty($long)) ? $long : NULL,
                'lat' => (!empty($lat)) ? $lat : NULL,
                'long' => (!empty($long)) ? $long : NULL,
                'instalatir' => (!empty($instalatir)) ? $instalatir : NULL,
                'tanggal_instalasi' => (!empty($tanggal_instalasi)) ? $tanggal_instalasi : NULL,
                'timestamp' => $stamp,
            );
            //var_dump($data);
            $this->M_Pole->update('pole', $data, array('no' => $no));
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('pole/index', 'refresh');
        }
    }
    public function detail($no)
    {
        $data['title'] = 'Pole Iconnet';
        $data['title2'] = 'Detail Data';
        $data['pole'] = $this->M_Pole->get($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/tiang/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function hapus($no)
    {
        $data = $this->M_Pole->get($no);
        if ($data) {
            $this->M_Pole->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('pole/index', 'refresh');
        }
    }
}