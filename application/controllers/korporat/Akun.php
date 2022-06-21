<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Users');
        login();
    }
    public function index()
    {
        $data['title'] = 'Akun';
        $data['title2'] = 'Index Data';
        $data['user'] = $this->M_Users->index();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/akun/akun', $data);
        //$this->load->view('korporat/map/index');
        $this->load->view('korporat/template/footer', $data);
    }


    function ubah()
    {
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
                $no = $this->input->post('no');
                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $akses = $this->input->post('akses');
                $wa = $this->input->post('wa');
                $email = $this->input->post('email');
                $telegram = $this->input->post('telegram');
                $daftar = date('Y-m-d');
                $data = array(
                    'username' => $username,
                    'nama' => $nama,
                    'password' => $password,
                    'akses' => $akses,
                    'daftar' => $daftar,
                    'wa' => $wa,
                    'email' => $email,
                    'telegram' => $telegram,
                    'foto' => $file,
                );
                $this->M_Users->update('user', $data, array('no' => $no));
                $this->session->set_flashdata('flash', 'diupdate');
                redirect('akun/index', 'refresh');
                // print_r($data);
            } else {
                $this->session->set_flashdata('flash', 'Gagal');
                redirect('akun/index', 'refresh');
            }
        } else {

            $no = $this->input->post('no');
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $akses = $this->input->post('akses');
            $wa = $this->input->post('wa');
            $email = $this->input->post('email');
            $telegram = $this->input->post('telegram');
            $daftar = date('Y-m-d');
            $data = array(
                'username' => $username,
                'nama' => $nama,
                'password' => $password,
                'akses' => $akses,
                'daftar' => $daftar,
                'wa' => $wa,
                'email' => $email,
                'telegram' => $telegram,
            );
            $this->M_Users->update('user', $data, array('no' => $no));
            $this->session->set_flashdata('flash', 'diupdate');
            redirect('akun/index', 'refresh');
            // print_r($data);
        }
    }


    function logout()
    {
        $no = $this->session->userdata('no');
        $daftar = date('Y-m-d H:i:s');
        $data = array(
            'login' => $daftar,
        );
        $this->M_Users->update('user', $data, array('no' => $no));
        $this->session->sess_destroy();
        redirect('korporat/login/index', 'refresh');
    }
}