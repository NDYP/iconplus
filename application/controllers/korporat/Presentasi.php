<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presentasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Korporat_Layanan');
        $this->load->model('M_Korporat_Site');
        $this->load->model('M_Korporat_Presentasi');
    }
    public function index()
    {
        $data['title'] = 'Presentasi dan Negosiasi';
        $data['title2'] = 'Index';
        $data['presentasi'] = $this->M_Korporat_Presentasi->index();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/presentasi/index', $data);
        $this->load->view('korporat/template/footer', $data);
    }
    function tambah()
    {
        $this->form_validation->set_rules('layanan', 'layanan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        $this->form_validation->set_rules('quotation_date', 'quotation_date', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('quotation_number', 'quotation_number', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Presentasi dan Negosiasi';
            $data['title2'] = 'Add';
            $data['layanan'] = $this->M_Korporat_Layanan->index();
            $data['presentasi'] = $this->M_Korporat_Presentasi->index();
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/presentasi/add', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $quotation_number = $this->input->post('quotation_number');
            $layanan = $this->input->post('layanan');
            $berkas = $this->input->post('berkas');
            $revisi = $this->input->post('revisi');
            $quotation_date = $this->input->post('quotation_date');
            $data = array(
                'layanan' => $layanan,
                'berkas' => $berkas,
                'revisi' => $revisi,
                'quotation_date' => date('Y-m-d', strtotime($quotation_date)),
                'quotation_number' => $quotation_number,
            );
            $this->M_Korporat_Layanan->tambah('korporat_presentasi', $data);
            $this->session->set_flashdata('flash', 'ditambah');
            redirect('korporat/presentasi/index', 'refresh');
            // var_dump($data);
        }
    }
    public function upload($no)
    {
        $this->form_validation->set_rules('judul', 'judul', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        if (empty($_FILES['berkas']['name'])) {
            $this->form_validation->set_rules('berkas', 'berkas', 'required', [
                'required' => 'File Tidak Boleh Kosong!'
            ]);
        }

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Presentasi dan Negosiasi';
            $data['title2'] = 'Edit';
            $data['presentasi'] = $this->M_Korporat_Layanan->get($no);
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/presentasi/upload', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/korporat/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $this->input->post('judul');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('berkas')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/korporat/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 10000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];
                $no = $this->input->post('no');
                $judul = $this->input->post('judul');
                $data = array(
                    'berkas' => $file,
                    'judul' => $judul,
                    'presentasi' => $no,
                );
                $this->M_Korporat_Presentasi->tambah('korporat_berkas', $data);
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('korporat/presentasi/index', 'refresh');
                // var_dump($data);
            } else {
                $this->session->set_flashdata('info', 'Gagal tambah data');
                redirect('korporat/presentasi/index', 'refresh');
                // echo 'Yaya';
            }
        }
    }
    public function detail($no)
    {

        $data['title'] = 'Presentasi dan Negosiasi';
        $data['title2'] = 'Detail';
        $data['layanan'] = $this->M_Korporat_Layanan->index();
        $data['presentasi'] = $this->M_Korporat_Presentasi->get($no);
        $id_customer = $data['presentasi']['no_customer'];
        $data['pic'] = $this->db->get_where('korporat_pic', array('customer' => $id_customer))->result_array();
        $data['berkas'] = $this->db->get_where('korporat_berkas', array('presentasi' => $no))->result_array();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/presentasi/detail', $data);
        $this->load->view('korporat/template/footer', $data);
        // var_dump($data['berkas']);
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('layanan', 'layanan', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        $this->form_validation->set_rules('quotation_date', 'quotation_date', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('quotation_number', 'quotation_number', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Presentasi dan Negosiasi';
            $data['title2'] = 'Edit';
            $data['layanan'] = $this->M_Korporat_Layanan->index();
            $data['presentasi'] = $this->M_Korporat_Presentasi->get($no);
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/presentasi/edit', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $no = $this->input->post('no');
            $quotation_number = $this->input->post('quotation_number');
            $layanan = $this->input->post('layanan');
            $berkas = $this->input->post('berkas');
            $revisi = $this->input->post('revisi');
            $quotation_date = $this->input->post('quotation_date');
            $data = array(
                'layanan' => $layanan,
                'berkas' => $berkas,
                'revisi' => $revisi,
                'quotation_date' => date('Y-m-d', strtotime($quotation_date)),
                'quotation_number' => $quotation_number,
            );
            $this->M_Korporat_Layanan->update('korporat_presentasi', $data, array('no' => $no));
            $this->session->set_flashdata('success', 'Berhasil tambah data');
            redirect('korporat/presentasi/index', 'refresh');
            // var_dump($data);
        }
    }
    public function hapus($no)
    {
        $data = $this->M_Korporat_Presentasi->get($no);
        if ($data) {
            $this->M_Korporat_Presentasi->hapus($no);
            $this->session->set_flashdata('flash', 'dihapus');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('info', 'Gagal Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    function download($no)
    {
        $data = $this->db->get_where('korporat_berkas', ['no' => $no])->row_array();
        force_download('assets/korporat/' . $data['berkas'], NULL);
    }
    public function hapusberkas($no)
    {
        $data =
            $this->db->get_where('korporat_berkas', array('no' => $no))->row_array();
        if ($data) {
            unlink("./assets/korporat/" . $data['no']);
            $this->M_Korporat_Presentasi->hapusberkas($no);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('admin/penduduk', 'refresh');
        }
    }
}