<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Olt');
        $this->load->model('M_Fdt');
        $this->load->model('M_Fdt');
        $this->load->model('M_Fat');
        login();
        $user_session =
            ($this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR' ||
                $this->session->userdata('akses') == 'Aktivasi Retail' ||
                $this->session->userdata('akses') == 'Admin');

        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function fat($rowno = 0)
    {
        $this->session->unset_userdata('search');
        // Row per page
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->M_Fat->brand()->num_rows();

        // Get  records
        $index = $this->M_Fat->halaman_fat($rowno, $rowperpage);
        // Pagination Configuration
        $config['base_url'] = base_url('brand/fat');
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
        $data['fat'] = $index;
        $data['row'] = $rowno;

        $data['title'] = 'FAT';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index();
        // $data['cluster'] = $this->M_Cluster->index();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/fat', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($index);
    }
    public function search_fat($rowno = 0)
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
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->M_Fat->jumlah_fat($search_text);

        // Get  records
        $index = $this->M_Fat->search_fat($rowno, $rowperpage, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('master/search_fat');
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
        $data['fat'] = $index;
        $data['row'] = $rowno;
        $data['search'] = $search_text;


        $data['title'] = 'FAT';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index();
        // $data['cluster'] = $this->M_Cluster->index();
        // $data['fat'] = $this->M_Fat->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/halaman_fat', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($data['pagination']);
    }

    public function fdt($rowno = 0)
    {
        $this->session->unset_userdata('search');
        // Row per page
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->M_Fdt->brand()->num_rows();

        // Get  records
        $index = $this->M_Fdt->halaman_fdt($rowno, $rowperpage);
        // Pagination Configuration
        $config['base_url'] = base_url('brand/fdt');
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
        $data['fdt'] = $index;
        $data['row'] = $rowno;

        $data['title'] = 'FDT';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index();
        // $data['cluster'] = $this->M_Cluster->index();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/fdt', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($index);
    }
    public function search_fdt($rowno = 0)
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
        $rowperpage = 10;
        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->M_Fdt->jumlah_fdt($search_text);

        // Get  records
        $index = $this->M_Fdt->search_fdt($rowno, $rowperpage, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('master/search_fdt');
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
        $data['fdt'] = $index;
        $data['row'] = $rowno;
        $data['search'] = $search_text;


        $data['title'] = 'FDT';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index();
        // $data['cluster'] = $this->M_Cluster->index();
        // $data['fat'] = $this->M_Fat->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/halaman_fdt', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($data['pagination']);
    }
    public function olt($rowno = 0)
    {
        $this->session->unset_userdata('search');
        // Row per page
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->M_Olt->brand()->num_rows();

        // Get  records
        $index = $this->M_Olt->halaman_olt($rowno, $rowperpage);
        // Pagination Configuration
        $config['base_url'] = base_url('brand/olt');
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
        $data['olt'] = $index;
        $data['row'] = $rowno;

        $data['title'] = 'OLT';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index();
        // $data['cluster'] = $this->M_Cluster->index();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/olt', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($index);
    }
    public function search_olt($rowno = 0)
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
        $rowperpage = 10;

        // Row position
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }
        // All records count
        $allcount = $this->M_Olt->jumlah_olt($search_text);

        // Get  records
        $index = $this->M_Olt->search_olt($rowno, $rowperpage, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('master/search_olt');
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
        $data['olt'] = $index;
        $data['row'] = $rowno;
        $data['search'] = $search_text;


        $data['title'] = 'OLT';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index();
        // $data['cluster'] = $this->M_Cluster->index();
        // $data['fat'] = $this->M_Fat->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/halaman_olt', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($data['pagination']);
    }

    // public function fat()
    // {
    //     $data['title'] = 'Dropdown Brand FAT';
    //     $data['title2'] = 'Index Data';
    //     $data['fat'] = $this->M_Fat->brand();
    //     $this->load->view('admin/template/header1', $data);
    //     $this->load->view('admin/brand/fat', $data);
    //     $this->load->view('admin/template/footer2', $data);
    // }
    // public function fdt()
    // {
    //     $data['title'] = 'Dropdown Brand FDT';
    //     $data['title2'] = 'Index Data';
    //     $data['fdt'] = $this->M_Fdt->brand();
    //     $this->load->view('admin/template/header1', $data);
    //     $this->load->view('admin/brand/fdt', $data);
    //     $this->load->view('admin/template/footer2', $data);
    // }
    // public function olt()
    // {
    //     $data['title'] = 'Dropdown Brand OLT';
    //     $data['title2'] = 'Index Data';
    //     $data['olt'] = $this->M_Olt->brand();
    //     $this->load->view('admin/template/header1', $data);
    //     $this->load->view('admin/brand/olt', $data);
    //     $this->load->view('admin/template/footer2', $data);
    // }
    function tambah_fat()
    {
        $nama_brand = $this->input->post('nama_brand');
        $data = array(
            'nama_brand' => $nama_brand,
        );
        $this->M_Fat->tambah('fat_brand', $data);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('master/fat', 'refresh');
    }
    function tambah_fdt()
    {
        $nama_brand = $this->input->post('nama_brand');
        $data = array(
            'nama_brand' => $nama_brand,
        );
        $this->M_Fat->tambah('fdt_brand', $data);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('master/fdt', 'refresh');
    }
    function tambah_olt()
    {
        $nama_brand = $this->input->post('nama_brand');
        $data = array(
            'nama_brand' => $nama_brand,
        );
        $this->M_Fat->tambah('olt_brand', $data);
        $this->session->set_flashdata('flash', 'ditambah');
        redirect('master/olt', 'refresh');
    }
    function ubah_fat()
    {
        $no = $this->input->post('no');
        $nama_brand = $this->input->post('nama_brand');

        $data = array(
            'nama_brand' => $nama_brand,
        );
        //var_dump($data);
        $this->M_Fat->update('fat_brand', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('master/fat', 'refresh');
    }
    function ubah_fdt()
    {
        $no = $this->input->post('no');
        $nama_brand = $this->input->post('nama_brand');

        $data = array(
            'nama_brand' => $nama_brand,
        );
        //var_dump($data);
        $this->M_Fat->update('fdt_brand', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('master/fdt', 'refresh');
    }
    function ubah_olt()
    {
        $no = $this->input->post('no');
        $nama_brand = $this->input->post('nama_brand');

        $data = array(
            'nama_brand' => $nama_brand,
        );
        //var_dump($data);
        $this->M_Fat->update('olt_brand', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('master/olt', 'refresh');
    }
    public function hapus_fat($no)
    {
        $data = $this->db->get_where('fat_brand', array('no' => $no))->row_array();
        if ($data) {
            $this->M_Fat->hapus_brand($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function hapus_fdt($no)
    {
        $data = $this->db->get_where('fdt_brand', array('no' => $no))->row_array();
        if ($data) {
            $this->M_Fdt->hapus_brand($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function hapus_olt($no)
    {
        $data = $this->db->get_where('olt_brand', array('no' => $no))->row_array();
        if ($data) {
            $this->M_Olt->hapus_brand($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}