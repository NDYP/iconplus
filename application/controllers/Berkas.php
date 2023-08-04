<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('M_Berkas');
        $this->load->model('M_Cluster');
        login();
    }
    public function index()
    {
        $data['title'] = 'Single Line';
        $data['title2'] = 'Index Berkas';

        $data['berkas'] = $this->M_Berkas->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/berkas/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }

    function tambah($no)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Single Line';
            $data['title2'] = 'Add Berkas';
            $data['cluster'] = $this->M_Cluster->get($no);
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/berkas/tambah', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {
            $config['upload_path']          = './assets/file/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 3000;
            $config['file_name'] = $_POST['nama'];
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $nama = $_POST['nama'];
                $cluster = $_POST['cluster'];
                $penginput = $this->session->userdata('username');
                $x = $this->upload->data();
                $file = $x['file_name'];
                $data = array(
                    'nama' => $nama,
                    'cluster' => $cluster,
                    'file' => $file,
                    'penginput' => $penginput,
                    'timestamp' => date(
                        "Y-m-d h:i:sa"
                    ),
                );
                //var_dump($data);
                $this->M_Berkas->tambah('berkas', $data);
                $this->session->set_flashdata('flash', 'ditambah');
                redirect('cluster/index', 'refresh');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }


    public function hapus($no)
    {
        $data = $this->M_Berkas->get($no);
        if ($data) {
            $this->M_Berkas->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('flash', 'Gagal Hapus Data');
            redirect('berkas/index', 'refresh');
        }
    }
}