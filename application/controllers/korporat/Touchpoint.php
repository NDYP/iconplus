<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Touchpoint extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Korporat_Touchpoint');
        $this->load->model('M_Korporat_Customer');
    }
    public function index()
    {
        $data['title'] = 'Presentasi dan Negosiasi';
        $data['title2'] = 'Index';
        $data['touchpoint'] = $this->M_Korporat_Touchpoint->index();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/touchpoint/index', $data);
        $this->load->view('korporat/template/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('customer', 'customer', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('tempat', 'tempat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('metode', 'metode', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        $this->form_validation->set_rules('status', 'status', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        if (empty($_FILES['dokumentasi']['name'])) {
            $this->form_validation->set_rules('dokumentasi', 'dokumentasi', 'required', [
                'required' => 'File Tidak Boleh Kosong!'
            ]);
        }

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Touchpoint';
            $data['title2'] = 'Tambah';
            $data['customer'] = $this->M_Korporat_Customer->index();

            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/touchpoint/tambah', $data);
            $this->load->view('korporat/template/footer', $data);
        } else {
            $config['upload_path'] = './assets/korporat/dokumentasi/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = $this->input->post('dokumentasi');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('dokumentasi')) {
                $gbr = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/korporat/dokumentasi/' . $gbr['file_name'];
                $config['maintain_ratio'] = FALSE;
                $config['overwrite'] = TRUE;
                $config['max_size']  = 10000;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file = $gbr['file_name'];

                $customer = $this->input->post('customer');
                $tanggal = $this->input->post('tanggal');
                $tempat = $this->input->post('tempat');
                $metode = $this->input->post('metode');
                $hasil = $this->input->post('hasil');
                $tindak_lanjut = $this->input->post('tindak_lanjut');
                $topik = $this->input->post('topik');
                $status = $this->input->post('status');
                $data = array(
                    'dokumentasi' => $file,
                    'customer' => $customer,
                    'tanggal' => $tanggal,
                    'tempat' => $tempat,
                    'metode' => $metode,
                    'hasil' => $hasil,
                    'tindak_lanjut' => $tindak_lanjut,
                    'topik' => $topik,
                    'status' => $status,
                );
                $this->M_Korporat_Touchpoint->tambah('korporat_touchpoint', $data);
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('korporat/touchpoint/index', 'refresh');
                // var_dump($data);
            } else {
                $this->session->set_flashdata('info', 'Gagal tambah data');
                redirect('korporat/touchpoint/index', 'refresh');
                // echo 'Yaya';
            }
        }
    }
    public function detail($no)
    {

        $data['title'] = 'Presentasi dan Negosiasi';
        $data['title2'] = 'Detail';
        $data['layanan'] = $this->M_Korporat_Layanan->index();
        $data['touchpoint'] = $this->M_Korporat_Touchpoint->get($no);
        $id_customer = $data['touchpoint']['no_customer'];
        $data['pic'] = $this->db->get_where('korporat_pic', array('customer' => $id_customer))->result_array();
        $data['dokumentasi'] = $this->db->get_where('korporat_berkas', array('touchpoint' => $no))->result_array();
        $this->load->view('korporat/template/header', $data);
        $this->load->view('korporat/touchpoint/detail', $data);
        $this->load->view('korporat/template/footer', $data);
        // var_dump($data['dokumentasi']);
    }
    public function edit($no)
    {
        $this->form_validation->set_rules('customer', 'customer', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('tempat', 'tempat', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('metode', 'metode', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);
        $this->form_validation->set_rules('status', 'status', 'required|trim', [
            'required' => 'Tidak Boleh Kosong!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Touchpoint';
            $data['title2'] = 'Tambah';
            $data['customer'] = $this->M_Korporat_Customer->index();
            $data['touchpoint'] = $this->M_Korporat_Touchpoint->get($no);
            $this->load->view('korporat/template/header', $data);
            $this->load->view('korporat/touchpoint/edit', $data);
            $this->load->view('korporat/template/footer', $data);
            // var_dump($data['touchpoint']);
        } else {
            $no = $this->input->post('no');
            $config['upload_path'] = './assets/korporat/dokumentasi/';
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $this->input->post('dokumentasi');
            $this->upload->initialize($config);
            if (!empty($_FILES['dokumentasi']['name'])) {
                if ($this->upload->do_upload('dokumentasi')) {
                    $gbr = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/korporat/dokumentasi/' . $gbr['file_name'];
                    $config['maintain_ratio'] = FALSE;
                    $config['overwrite'] = TRUE;
                    $config['max_size']  = 10000;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $file = $gbr['file_name'];

                    $customer = $this->input->post('customer');
                    $tanggal = $this->input->post('tanggal');
                    $tempat = $this->input->post('tempat');
                    $metode = $this->input->post('metode');
                    $hasil = $this->input->post('hasil');
                    $tindak_lanjut = $this->input->post('tindak_lanjut');
                    $topik = $this->input->post('topik');
                    $status = $this->input->post('status');
                    $no = $this->input->post('no');
                    $data = array(
                        'dokumentasi' => $file,
                        'customer' => $customer,
                        'tanggal' => $tanggal,
                        'tempat' => $tempat,
                        'metode' => $metode,
                        'hasil' => $hasil,
                        'tindak_lanjut' => $tindak_lanjut,
                        'topik' => $topik,
                        'status' => $status,
                    );
                    $this->M_Korporat_Layanan->update('korporat_touchpoint', $data, array('no' => $no));
                    $this->session->set_flashdata('success', 'Berhasil tambah data');
                    redirect('korporat/touchpoint/index', 'refresh');
                    // var_dump($data);
                }
            } else {
                $customer = $this->input->post('customer');
                $tanggal = $this->input->post('tanggal');
                $tempat = $this->input->post('tempat');
                $metode = $this->input->post('metode');
                $hasil = $this->input->post('hasil');
                $tindak_lanjut = $this->input->post('tindak_lanjut');
                $topik = $this->input->post('topik');
                $status = $this->input->post('status');
                $no = $this->input->post('no');
                $data = array(
                    'customer' => $customer,
                    'tanggal' => $tanggal,
                    'tempat' => $tempat,
                    'metode' => $metode,
                    'hasil' => $hasil,
                    'tindak_lanjut' => $tindak_lanjut,
                    'topik' => $topik,
                    'status' => $status,
                );
                $this->M_Korporat_Layanan->update('korporat_touchpoint', $data, array('no' => $no));
                $this->session->set_flashdata('success', 'Berhasil tambah data');
                redirect('korporat/touchpoint/index', 'refresh');
            }
        }
    }
    public function hapus($no)
    {
        $data = $this->M_Korporat_Touchpoint->get($no);
        if ($data) {
            unlink("./assets/korporat/" . $data['no']);
            $this->M_Korporat_Touchpoint->hapus($no);
            $this->session->set_flashdata('success', 'Berhasil Hapus Data');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->session->set_flashdata('Info', 'Gagal Hapus Data');
            redirect('korporat/touchpoint/penduduk', 'refresh');
        }
    }
}