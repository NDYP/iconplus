<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Customer');
    }
    public function index()
    {
        $data['title'] = 'User';
        $data['title2'] = 'Index';
        $data['user'] = $this->M_User->index();
        $this->load->view('template/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('kontak', 'kontak', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'User';
            $data['title2'] = 'Add';
            $data['user'] = $this->M_User->index();
            $data['customer'] = $this->M_Customer->index();
            $this->load->view('template/header', $data);
            $this->load->view('user/add', $data);
            $this->load->view('template/footer', $data);
        } else {
            $kontak = $this->input->post('kontak');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $akses = $this->input->post('akses');
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'akses' => $akses,
                'kontak' => $kontak,
            );
            $this->M_User->tambah('user', $data);
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('user/index', 'refresh');
            // var_dump($data);
        }
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('kontak', 'kontak', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'User';
            $data['title2'] = 'Edit';
            $data['user'] = $this->M_User->index();
            $data['customer'] = $this->M_Customer->index();
            $data['user'] = $this->M_User->get($no);
            $this->load->view('template/header', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('template/footer', $data);
        } else {
            $no = $this->input->post('no');
            $kontak = $this->input->post('kontak');
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $akses = $this->input->post('akses');
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'akses' => $akses,
                'kontak' => $kontak,
            );
            $this->M_User->update('user', $data, array('no' => $no));
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('user/index', 'refresh');
            // var_dump($data);
        }
    }
    public function hapus($no)
    {
        $data = $this->M_User->get($no);
        if ($data) {
            $this->M_User->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}