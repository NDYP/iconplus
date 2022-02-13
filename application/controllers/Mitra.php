<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Cluster');
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
        $allcount = $this->M_Mitra->index()->num_rows();

        // Get  records
        $index = $this->M_Mitra->halaman($rownomer, $rowper);
        // Pagination Configuration
        $config['base_url'] = base_url('mitra/index');
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
        $data['mitra'] = $index;
        $data['row'] = $rownomer;

        $data['title'] = 'MITRA';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index();
        // $data['cluster'] = $this->M_Cluster->index();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/mitra/index', $data);
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
        $allcount = $this->M_Mitra->jumlah($search_text);

        // Get  records
        $index = $this->M_Mitra->search($rownomer, $rowper, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('mitra/search');
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
        $data['mitra'] = $index;
        $data['row'] = $rownomer;
        $data['search'] = $search_text;


        $data['title'] = 'MITRA';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index();
        // $data['cluster'] = $this->M_Cluster->index();
        // $data['fat'] = $this->M_Fat->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/mitra/halaman', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($data['pagination']);
    }








    function get($no)
    {
        $data['mitra'] = $this->M_Mitra->get($no);
        $url = $data['mitra']['nama'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('mitra/edit/' . $no . '/'  . $url_slug));
    }
    function tambah()
    {
        $this->form_validation->set_rules('mitra', 'mitra', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim|is_unique[mitra_pembangunan.nama]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Nama yang sama telah terdaftar'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Mitra Pembangunan';
            $data['title2'] = 'Add Data';
            $data['mitra'] = $this->M_Mitra->index();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/mitra/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $nama = $this->input->post('nama');
            $mitra = $this->input->post('mitra');

            $data = array(
                'nama' => $nama,
                'mitra' => $mitra,
            );
            $this->M_Cluster->tambah('mitra_pembangunan', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('mitra/index', 'refresh');
        }
    }
    public function edit($no)
    {
        $data['title'] = 'Mitra Pembangunan';
        $data['title2'] = 'Edit Data';
        $data['mitra'] = $this->M_Mitra->get($no);
        //$data['cluster'] = $this->M_Cluster->index();
        //$nama_mitra = $data['mitra']['nama'];
        //$data['fat'] =
        //$this->M_Cluster->fat($nama_mitra);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/mitra/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $no = $this->input->post('no');
        $nama = $this->input->post('nama');
        $mitra = $this->input->post('mitra');
        $data = array(
            'nama' => $nama,
            'mitra' => $mitra,
        );
        $this->M_Mitra->update('mitra_pembangunan', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('mitra/index', 'refresh');
    }

    public function hapus($no)
    {
        $data = $this->M_Mitra->get($no);
        if ($data) {
            $this->M_Mitra->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('flash', 'Gagal Hapus Data');
            redirect('mitra/index', 'refresh');
        }
    }
}