<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Akun');
        header('Cache-Control: no-cache,must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0,false');
        header('Pragma: no-cache');
    }
    function index()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Nama Pengguna Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kata Sandi Tidak Boleh Kosong!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Page';
            $this->load->view('admin/akun/login', $data);
        } else {
            $this->auth();
        }
    }
    function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->M_Akun->auth($username);
        if ($data = $cek->row_array()) {
            if (($password == $data['password'])) {
                $all = [
                    'no' => $data['no'],
                    'username' => $data['username'],
                    'password' => $data['password'],
                    'foto' => $data['foto'],
                    'akses' => $data['akses'],
                    'login' => $data['login'],
                    'daftar' => $data['daftar'],
                    'nama' => $data['nama'],
                    'wa' => $data['wa'],
                    'telegram' => $data['telegram'],
                    'email' => $data['email'],
                ];
                $this->session->set_userdata($all);
                redirect('beranda/index', 'refresh');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('login/index');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Tidak Terdaftar</div>');
            redirect('login/index');
        }
    }
}