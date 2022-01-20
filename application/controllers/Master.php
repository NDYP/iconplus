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
    public function fat()
    {
        $data['title'] = 'Dropdown Brand FAT';
        $data['title2'] = 'Index Data';
        $data['fat'] = $this->M_Fat->brand();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/fat', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function fdt()
    {
        $data['title'] = 'Dropdown Brand FDT';
        $data['title2'] = 'Index Data';
        $data['fdt'] = $this->M_Fdt->brand();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/fdt', $data);
        $this->load->view('admin/template/footer2', $data);
    }
    public function olt()
    {
        $data['title'] = 'Dropdown Brand OLT';
        $data['title2'] = 'Index Data';
        $data['olt'] = $this->M_Olt->brand();
        $this->load->view('admin/template/header1', $data);
        $this->load->view('admin/brand/olt', $data);
        $this->load->view('admin/template/footer2', $data);
    }
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