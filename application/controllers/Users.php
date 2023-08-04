<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Users');
        $this->load->model('M_Fat');
        $this->load->model('M_Mitra');
        login();
        $user_session = ($this->session->userdata('akses') == 'Admin');
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
        $allcount = $this->M_Users->index()->num_rows();

        // Get  records
        $index = $this->M_Users->halaman($rownomer, $rowper);
        // Pagination Configuration
        $config['base_url'] = base_url('users/index');
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
        $data['user'] = $index;
        $data['row'] = $rownomer;

        $data['title'] = 'USER';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index()->result_array();
        // $data['cluster'] = $this->M_Cluster->index()->result_array();

        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/user/index', $data);
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
        $allcount = $this->M_Users->jumlah($search_text);

        // Get  records
        $index = $this->M_Users->search($rownomer, $rowper, $search_text);

        // Pagination Configuration
        $config['base_url'] = base_url('users/search');
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
        $data['user'] = $index;
        $data['row'] = $rownomer;
        $data['search'] = $search_text;


        $data['title'] = 'USER';
        $data['title2'] = 'Index Data';
        // $data['mitra'] = $this->M_Mitra->index()->result_array();
        // $data['cluster'] = $this->M_Cluster->index()->result_array();
        // $data['fat'] = $this->M_Fat->index()->result_array();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/user/halaman', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
        // var_dump($data['pagination']);
    }
    // public function index()->result_array()
    // {
    //     $data['title'] = 'Users';
    //     $data['title2'] = 'Index Data';
    //     $data['user'] = $this->M_Users->index()->result_array();
    //     $data['mitra'] = $this->M_Mitra->index()->result_array();

    //     $this->load->view('admin/template/header1', $data);
    //     $this->load->view('admin/user/index', $data);
    //     //$this->load->view('admin/map/index');
    //     $this->load->view('admin/template/footer2', $data);
    // }

    function tambah()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Username yang sama telah terdaftar'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('akses', 'akses', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('wa', 'wa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('telegram', 'telegram', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Users';
            $data['title2'] = 'Tambah Data';
            $data['user'] = $this->M_Users->index()->result_array();
            $data['mitra'] = $this->M_Mitra->index()->result_array();

            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/user/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $config['upload_path'] = './assets/foto/user';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('username');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/user' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 3024;
                    $config['new_image'] = './assets/foto/user' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];

                    $nama = $this->input->post('nama');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $akses = $this->input->post('akses');
                    $wa = $this->input->post('wa');
                    $telegram = $this->input->post('telegram');
                    $email = $this->input->post('email');
                    $daftar = date('Y-m-d');
                    $mitra = $this->input->post('mitra');

                    $data = array(
                        'foto' => $file,
                        'nama' => $nama,
                        'username' => $username,
                        'password' => $password,
                        'akses' => $akses,
                        'daftar' => $daftar,
                        'wa' => $wa,
                        'telegram' => $telegram,
                        'email' => $email,
                        'mitra' => $mitra,

                    );
                    $this->M_Users->tambah('user', $data);
                    $this->session->set_flashdata('flash', 'ditambah');
                    redirect('users/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal');
                    redirect('users/index', 'refresh');
                }
            } else {
                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $akses = $this->input->post('akses');
                $wa = $this->input->post('wa');
                $telegram = $this->input->post('telegram');
                $email = $this->input->post('email');
                $daftar = date('Y-m-d');
                $mitra = $this->input->post('mitra');

                $data = array(
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
                    'akses' => $akses,
                    'daftar' => $daftar,
                    'wa' => $wa,
                    'telegram' => $telegram,
                    'mitra' => $mitra,
                    'email' => $email,
                );
                $this->M_Users->tambah('user', $data);
                $this->session->set_flashdata('flash', 'ditambah');
                redirect('users/index', 'refresh');
            }
        }
    }
    function get($no)
    {
        $data['user'] = $this->M_Users->get($no);
        $url = $data['user']['nama'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('user/edit/' . $no . '/'  . $url_slug));
    }

    public function detail($no)
    {
        $data['title'] = 'FAT';
        $data['title2'] = 'Edit Data';
        $data['user'] = $this->M_Users->get($no);
        $id_user = $data['user']['id_user'];
        $data['pelanggan'] = $this->M_Users->pelanggan($id_user);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/user/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function edit($no)
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('akses', 'akses', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('wa', 'wa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('telegram', 'telegram', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Users';
            $data['title2'] = 'Tambah Data';
            $data['title'] = 'Users';
            $data['title2'] = 'Edit Data';
            $data['users'] = $this->M_Users->get($no);
            $data['mitra'] = $this->M_Mitra->index()->result_array();

            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/user/edit', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $config['upload_path'] = './assets/foto/user';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = $this->input->post('username');
            $this->upload->initialize($config);
            if (!empty($_FILES['foto']['name'])) {
                if ($this->upload->do_upload('foto')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/foto/user' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 3024;
                    $config['new_image'] = './assets/foto/user' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];

                    $nama = $this->input->post('nama');
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    $akses = $this->input->post('akses');
                    $wa = $this->input->post('wa');
                    $telegram = $this->input->post('telegram');
                    $email = $this->input->post('email');
                    $daftar = date('Y-m-d');
                    $no = $this->input->post('no');
                    $mitra = $this->input->post('mitra');
                    $data = array(
                        'foto' => $file,
                        'nama' => $nama,
                        'username' => $username,
                        'password' => $password,
                        'akses' => $akses,
                        'daftar' => $daftar,
                        'wa' => $wa,
                        'telegram' => $telegram,
                        'email' => $email,
                        'mitra' => $mitra,
                    );
                    $this->M_Users->update('user', $data, array('no' => $no));
                    $this->session->set_flashdata('flash', 'ditambah');
                    redirect('users/index', 'refresh');
                } else {
                    $this->session->set_flashdata('info', 'Gagal');
                    redirect('users/index', 'refresh');
                }
            } else {
                $no = $this->input->post('no');
                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $akses = $this->input->post('akses');
                $wa = $this->input->post('wa');
                $telegram = $this->input->post('telegram');
                $email = $this->input->post('email');
                $daftar = date('Y-m-d');
                $mitra = $this->input->post('mitra');

                $data = array(
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $password,
                    'akses' => $akses,
                    'daftar' => $daftar,
                    'wa' => $wa,
                    'telegram' => $telegram,
                    'email' => $email,
                    'mitra' => $mitra,
                );
                $this->M_Users->update('user', $data, array('no' => $no));
                $this->session->set_flashdata('flash', 'diupdate');
                redirect('users/index', 'refresh');
            }
        }
    }

    public function hapus($no)
    {
        $data = $this->M_Users->get($no);
        if ($data) {
            $this->M_Users->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('user/index', 'refresh');
        }
    }
}