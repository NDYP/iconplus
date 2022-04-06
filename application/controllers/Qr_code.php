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
        require 'vendor/vendor/autoload.php';

        $result = new Endroid\QrCode\QrCode('asasa');
        header('Content-Type: ' . $result->getContentType());
        echo $qrCode->writeString();
    }
}