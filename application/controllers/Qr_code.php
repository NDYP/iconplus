<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qr_code extends CI_Controller
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
        require 'vendor/vendor/autoload.php'; // load folder vendor/autoload
        $qrCode = new Endroid\QrCode\QrCode('xxxx'); // mengambil data kode siswa sebagai data  QR code
        $qrCode->writeFile('./assets/foto/' . 'xx' . '.png'); // direktori untuk menyimpan gambar QR code
    }
}