<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cluster extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Cluster');
        $this->load->model('M_Mitra');
        login();
        $user_session =

            ($this->session->userdata('akses') == 'Asset Retail' ||
                $this->session->userdata('akses') == 'HAR' ||
                $this->session->userdata('akses') == 'Admin');
        if (!$user_session) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function index()
    {
        $data['title'] = 'Cluster';
        $data['title2'] = 'Index Data';
        $data['cluster'] = $this->M_Cluster->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/cluster/index', $data);
        //$this->load->view('admin/map/index');
        $this->load->view('admin/template/footer2', $data);
    }
    function get($no)
    {
        $data['cluster'] = $this->M_Cluster->get($no);
        $url = $data['cluster']['nama_cluster'];
        $url_slug = url_title(convert_accented_characters($url), 'dash', TRUE);
        redirect(base_url('cluster/edit/' . $no . '/'  . $url_slug));
    }
    function tambah()
    {
        $this->form_validation->set_rules('no_pa', 'no_pa', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('nama_cluster', 'nama_cluster', 'required|trim|is_unique[cluster.nama_cluster]', [
            'required' => 'Tidak Boleh Kosong!',
            'is_unique' => 'Telah Terdaftar'
        ]);
        $this->form_validation->set_rules('no_io', 'no_io', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('ppi_date', 'ppi_date', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('target_ppi_date', 'target_ppi_date', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('instalatir', 'instalatir', 'required|trim', [
            'required' => 'Tempat Tidak Boleh Kosong!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Cluster';
            $data['title2'] = 'Add Data';
            $data['mitra'] = $this->M_Mitra->index();
            $this->load->view('admin/template/header1', $data);
            $this->load->view('admin/cluster/add', $data);
            $this->load->view('admin/template/footer2', $data);
        } else {

            $nama_cluster = $this->input->post('nama_cluster');
            $no_pa = $this->input->post('no_pa');
            $no_io = $this->input->post('no_io');
            $ppi_date =
                date('Y-m-d', strtotime($this->input->post('ppi_date')));
            $target_ppi_date =
                date('Y-m-d', strtotime($this->input->post('target_ppi_date')));
            $instalatir = $this->input->post('instalatir');

            $data = array(
                'nama_cluster' => $nama_cluster,
                'no_pa' => $no_pa,
                'no_io' => $no_io,
                'ppi_date' => date('Y-m-d', strtotime($ppi_date)),
                'target_ppi_date' => date('Y-m-d', strtotime($target_ppi_date)),
                'instalatir' => $instalatir,
            );
            //var_dump($data);
            $this->M_Cluster->tambah('cluster', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('cluster/index', 'refresh');
        }
    }
    public function edit($no)
    {

        $data['title'] = 'Cluster';
        $data['title2'] = 'Index Data';
        $data['cluster'] = $this->M_Cluster->get($no);
        $data['mitra'] = $this->M_Mitra->index();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/cluster/edit', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function detail($no)
    {
        $data['title'] = 'Cluster';
        $data['title2'] = 'Index Data';
        $data['cluster'] = $this->M_Cluster->get($no);
        $data['mitra'] = $this->M_Mitra->index();
        $no = $data['cluster']['no'];
        $data['fat'] =
            $this->M_Cluster->fat($no);
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/cluster/detail', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    function ubah()
    {
        $no = $this->input->post('no');
        $nama_cluster = $this->input->post('nama_cluster');
        $no_pa = $this->input->post('no_pa');
        $no_io = $this->input->post('no_io');
        $ppi_date = date('Y-m-d', strtotime($this->input->post('ppi_date')));
        $target_ppi_date = $this->input->post('target_ppi_date');

        $instalatir = $this->input->post('instalatir');
        $tanggal = date('Y-m-d', strtotime($target_ppi_date));
        $data = array(
            'nama_cluster' => $nama_cluster ? $nama_cluster : NULL,
            'no_pa' => $no_pa ? $no_pa : NULL,
            'no_io' => $no_io ? $no_io : NULL,
            'ppi_date' => $ppi_date ? $ppi_date : NULL,
            'target_ppi_date' => $tanggal ? $tanggal : NULL,
            'instalatir' => $instalatir ? $instalatir : NULL,
        );
        $this->M_Cluster->update('cluster', $data, array('no' => $no));
        $this->session->set_flashdata('flash', 'diupdate');
        redirect('cluster/index', 'refresh');
    }

    public function hapus($no)
    {

        $data = $this->M_Cluster->get($no);
        if ($data) {
            $this->M_Cluster->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('cluster/index', 'refresh');
        }
    }
}