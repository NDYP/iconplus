<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pic extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Korporat_Pic');
    }
    public function index()
    {
        $data['title'] = 'Customer/Potensi';
        $data['title2'] = 'Index';
        $data['customer'] = $this->M_Korporat_Pic->index();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/customer/index', $data);
        $this->load->view('korporat/template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('pelanggan_pln', 'pelanggan_pln', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('segment', 'segment', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Customer';
            $data['title2'] = 'Add';
            $data['customer'] = $this->M_Korporat_Pic->index();
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/customer/add', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $koordinat = $this->input->post('koordinat');
            $tanggal = $this->input->post('tanggal');
            $pelanggan_pln = $this->input->post('pelanggan_pln');
            $segment = $this->input->post('segment');
            $afiliasi = $this->input->post('afiliasi');
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'long' => $long,
                'lat' => $lat,
                'koordinat' => $koordinat,
                'tanggal' => date('Y-m-d', strtotime($tanggal)),
                'pelanggan_pln' => $pelanggan_pln,
                'segment' => $segment,
                'afiliasi' => $afiliasi,
            );
            $this->M_Korporat_Pic->tambah('korporat_customer', $data);
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('korporat/customer/index', 'refresh');
            // var_dump($data);
        }
    }
    function pic($no)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('kontak', 'kontak', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Customer';
            $data['title2'] = 'Add';
            $data['customer'] = $this->M_Korporat_Pic->index();
            $data['no'] = $no;
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/customer/pic', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $jabatan = $this->input->post('jabatan');
            $kontak = $this->input->post('kontak');
            $email = $this->input->post('email');
            $customer = $this->input->post('customer');
            $data = array(
                'nama' => $nama,
                'jabatan' => $jabatan,
                'kontak' => $kontak,
                'email' => $email,
                'customer' => $customer
            );
            $this->M_Korporat_Pic->tambah('korporat_pic', $data);
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('korporat/customer/index', 'refresh');
            // var_dump($data);
        }
    }
    function site($no)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('pelanggan_pln', 'pelanggan_pln', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('pic', 'pic', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Customer';
            $data['title2'] = 'Add';
            $data['customer'] = $this->M_Korporat_Pic->index();
            $data['no'] = $no;
            $data['pic'] = $this->db->get_where('korporat_pic', array('customer' => $no))->result_array();

            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/customer/site', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $koordinat = $this->input->post('koordinat');
            $pelanggan_pln = $this->input->post('pelanggan_pln');
            $customer = $this->input->post('customer');
            $pic = $this->input->post('pic');
            $data = array(
                'nama' => $nama,
                'long' => $long,
                'lat' => $lat,
                'koordinat' => $koordinat,
                'pelanggan_pln' => $pelanggan_pln,
                'customer' => $customer,
                'pic' => $pic,
            );
            $this->M_Korporat_Pic->tambah('site', $data);
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('korporat/customer/index', 'refresh');
            // var_dump($data);
        }
    }
    function detail($no)
    {
        $data['title'] = 'Customer';
        $data['title2'] = 'Detail';
        $data['customer'] = $this->M_Korporat_Pic->get($no);
        $data['pic'] = $this->db->get_where('korporat_pic', array('customer' => $no))->result_array();
        $data['site'] = $this->db->get_where('korporat_site', array('customer' => $no))->result_array();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/customer/detail', $data);
        $this->load->view('korporat/template/footer', $data);
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('long', 'long', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('lat', 'lat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('koordinat', 'koordinat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('pelanggan_pln', 'pelanggan_pln', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('segment', 'segment', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Customer';
            $data['title2'] = 'Add';
            $data['customer'] = $this->M_Korporat_Pic->get($no);
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/customer/edit', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $no = $this->input->post('no');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $long = $this->input->post('long');
            $lat = $this->input->post('lat');
            $koordinat = $this->input->post('koordinat');
            $tanggal = $this->input->post('tanggal');
            $pelanggan_pln = $this->input->post('pelanggan_pln');
            $segment = $this->input->post('segment');
            $afiliasi = $this->input->post('afiliasi');
            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'long' => $long,
                'lat' => $lat,
                'koordinat' => $koordinat,
                'tanggal' => date('Y-m-d', strtotime($tanggal)),
                'pelanggan_pln' => $pelanggan_pln,
                'segment' => $segment,
                'afiliasi' => $afiliasi,
            );
            $this->M_Korporat_Pic->update('korporat_customer', $data, array('no' => $no));
            $this->session->set_flashdata('korporat_success', 'Berhasil tambah data');
            redirect('korporat/customer/index', 'refresh');
            // var_dump($data);
        }
    }
    public function hapus($no)
    {
        $data = $this->M_Korporat_Pic->get($no);
        if ($data) {
            $this->M_Korporat_Pic->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect('fat/index', 'refresh');
        }
    }
    function check()
    {
        $tahun_akademik = $this->input->post('tahun_akademik'); // get first name
        $semester = $this->input->post('semester'); // get last name
        $check = $this->db->get_where('customer', array('tahun_akademik' => $tahun_akademik, 'semester' => $semester), 1);
        $num = $check->num_rows();
        if ($num > 0) {
            $this->form_validation->set_message('check', 'Tahun ajaran sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}