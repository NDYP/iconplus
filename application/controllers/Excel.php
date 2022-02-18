<?php
defined('BASEPATH') or exit('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Cluster');
        $this->load->model('M_Mitra');
        $this->load->model('M_Pop');
        $this->load->model('M_Olt');
        $this->load->model('M_Odf');
        $this->load->model('M_Fdt');
        $this->load->model('M_Fat');
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Potensi');
        login();
    }
    public function cluster()
    {
        $index = $this->M_Cluster->index()->result_array();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama Cluster')
            ->setCellValue('C1', 'Nomor PA')
            ->setCellValue('D1', 'Nomor IO')
            ->setCellValue('E1', 'Tanggal PPI')
            ->setCellValue('F1', 'Tanggal PPI')
            ->setCellValue('G1', 'Mitra Instalatir');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['nama_cluster'])
                ->setCellValue('C' . $kolom, $x['no_pa'])
                ->setCellValue('D' . $kolom, $x['no_io'])
                ->setCellValue('E' . $kolom, date('j F Y', strtotime($x['ppi_date'])))
                ->setCellValue('F' . $kolom, date('j F Y', strtotime($x['target_ppi_date'])))
                ->setCellValue('G' . $kolom, $x['nama_instalatir']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Cluster.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function mitra()
    {
        $index = $this->M_Mitra->index()->result_array();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama')
            ->setCellValue('C1', 'Mitra');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['nama'])
                ->setCellValue('C' . $kolom, $x['mitra']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Mitra.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function pop()
    {
        $index = $this->M_Pop->index()->result_array();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID POP')
            ->setCellValue('C1', 'Nama POP')
            ->setCellValue('D1', 'Long')
            ->setCellValue('E1', 'Lat')
            ->setCellValue('F1', 'Kota');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['id_pop'])
                ->setCellValue('C' . $kolom, $x['nama_pop'])
                ->setCellValue('D' . $kolom, $x['long'])
                ->setCellValue('E' . $kolom, $x['lat'])
                ->setCellValue('F' . $kolom, $x['kota']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data POP.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function olt()
    {
        $index = $this->M_Olt->index()->result_array();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Hostaname')
            ->setCellValue('C1', 'SN')
            ->setCellValue('D1', 'Brand')
            ->setCellValue('E1', 'Type')
            ->setCellValue('F1', 'Status')
            ->setCellValue('G1', 'Mitra Instalatir')
            ->setCellValue('H1', 'Tanggal Instalasi')
            ->setCellValue('I1', 'ID POP');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['hostname'])
                ->setCellValue('C' . $kolom, $x['sn_olt'])
                ->setCellValue('D' . $kolom, $x['nama_brand'])
                ->setCellValue('E' . $kolom, $x['type'])
                ->setCellValue('F' . $kolom, $x['status'])
                ->setCellValue('G' . $kolom, $x['nama_instalatir'])
                ->setCellValue('H' . $kolom, date('Y-m-d', strtotime($x['tanggal_instalasi'])))
                ->setCellValue('I' . $kolom, $x['pop']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data OLT.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function odf()
    {
        $index = $this->M_Odf->index()->result_array();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nama ODF')
            ->setCellValue('C1', 'Kapasitas Port Max')
            ->setCellValue('D1', 'Rack ODF')
            ->setCellValue('E1', 'Long')
            ->setCellValue('F1', 'Lat')
            ->setCellValue('G1', 'Instalatir')
            ->setCellValue('H1', 'Tanggal Instalasi')
            ->setCellValue(
                'I1',
                'HOstname OLT'
            )
            ->setCellValue('J1', 'Port OLT');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['nama_odf'])
                ->setCellValue('C' . $kolom, $x['kapasitas_port_max'])
                ->setCellValue('D' . $kolom, $x['rack_odf'])
                ->setCellValue('E' . $kolom, $x['long'])
                ->setCellValue('F' . $kolom, $x['lat'])
                ->setCellValue('G' . $kolom, $x['nama_instalatir'])
                ->setCellValue('H' . $kolom, date('j F Y', strtotime($x['tanggal_instalasi'])))
                ->setCellValue('I' . $kolom, $x['hostname_oltx'])
                ->setCellValue('J' . $kolom, $x['port_olt']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data ODF.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function fdt()
    {
        $index = $this->M_Fdt->index()->result_array();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID FDT')
            ->setCellValue('C1', 'Brand')
            ->setCellValue('D1', 'Jenis/Type')
            ->setCellValue('E1', 'Konstruksi')
            ->setCellValue('F1', 'Long')
            ->setCellValue('G1', 'Lat')
            ->setCellValue('H1', 'Kapasitas Tray Max')
            ->setCellValue(
                'I1',
                'Jenis Konektor'
            )
            ->setCellValue('J1', 'Instalatir')
            ->setCellValue('K1', 'Tanggal Instalasi')
            ->setCellValue(
                'L1',
                'Nama ODF'
            )
            ->setCellValue('M1', 'Port ODF');

        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['id_fdt'])
                ->setCellValue('C' . $kolom, $x['nama_brand'])
                ->setCellValue('D' . $kolom, $x['jenis'])
                ->setCellValue('E' . $kolom, $x['konstruksi'])
                ->setCellValue('F' . $kolom, $x['long'])
                ->setCellValue('G' . $kolom, $x['lat'])
                ->setCellValue('H' . $kolom, $x['kapasitas_tray_max'])
                ->setCellValue('I' . $kolom, $x['jenis_konektor'])
                ->setCellValue('J' . $kolom, $x['nama_instalatir'])
                ->setCellValue('K' . $kolom, date('j F Y', strtotime($x['tanggal_instalasi'])))
                ->setCellValue('L' . $kolom, $x['odf'])
                ->setCellValue('M' . $kolom, $x['port_odf']);
            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data FDT.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function fat()
    {
        $index = $this->M_Fat->index()->result_array();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'ID FAT')
            ->setCellValue('C1', 'Brand')
            ->setCellValue('D1', 'Jenis/Type')
            ->setCellValue('E1', 'Jenis Konektor')
            ->setCellValue('F1', 'Long')
            ->setCellValue('G1', 'Lat')
            ->setCellValue('H1', 'Status Pembangunan')
            ->setCellValue(
                'I1',
                'Kapasitas Port Max'
            )
            ->setCellValue('J1', 'Kapasitas Port Terpasang')
            ->setCellValue(
                'K1',
                'Power Out'
            )
            ->setCellValue('L1', 'ID FDT')
            ->setCellValue('M1', 'Tray FDT')
            ->setCellValue('N1', 'Port FDT')
            ->setCellValue('O1', 'Instalatir FDT')
            ->setCellValue('P1', 'Tanggal Instalasi')
            ->setCellValue('Q1', 'POP')
            ->setCellValue('R1', 'OLT');


        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['id_fat'])
                ->setCellValue('C' . $kolom, $x['nama_brand'])
                ->setCellValue('D' . $kolom, $x['jenis'])
                ->setCellValue('E' . $kolom, $x['jenis_konektor'])
                ->setCellValue('F' . $kolom, $x['long'])
                ->setCellValue('G' . $kolom, $x['lat'])
                ->setCellValue('H' . $kolom, $x['status_pembangunan'])
                ->setCellValue('I' . $kolom, $x['kapasitas_port_max'])
                ->setCellValue('J' . $kolom, $x['kapasitas_port_terpasang'])
                ->setCellValue('K' . $kolom, $x['power_out'])
                ->setCellValue('L' . $kolom, $x['id_fdt'])
                ->setCellValue('M' . $kolom, $x['tray_fdt'])
                ->setCellValue('N' . $kolom, $x['port_fdt'])
                ->setCellValue('O' . $kolom, $x['nama_instalatir'])
                ->setCellValue('P' . $kolom, date('j F Y', strtotime($x['tanggal_instalasi'])))
                ->setCellValue('Q' . $kolom, $x['id_pop'])
                ->setCellValue('R' . $kolom, $x['hostname']);

            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data FAT.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function pelanggan()
    {
        $index = $this->M_Pelanggan->index()->result_array();

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('C1', 'No. VA')
            ->setCellValue('D1', 'NIK')
            ->setCellValue('E1', 'Nama')
            ->setCellValue('F1', 'Email')
            ->setCellValue('G1', 'Telepon')
            ->setCellValue('H1', 'Long')
            ->setCellValue('I1', 'Lat')
            ->setCellValue('J1', 'Service')
            ->setCellValue('K1', 'No. SPA')
            ->setCellValue('L1', 'SID')
            ->setCellValue('M1', 'SN ONT')
            ->setCellValue('N1', 'Bandwith')
            ->setCellValue('O1', 'Brand')
            ->setCellValue('P1', 'Jenis Konektor ONT')
            ->setCellValue('Q1', 'SN STB')
            ->setCellValue('R1', 'Mitra Instalasi')
            ->setCellValue('S1', 'Tanggal Instalasi')
            ->setCellValue('T1', 'Paket Tambahan')
            ->setCellValue('U1', 'Jenis Kabel Dropcore')
            ->setCellValue('V1', 'Link Budget')
            ->setCellValue('W1', 'ID FAT')
            ->setCellValue('X1', 'Port Fat')
            ->setCellValue('Y1', 'OLT')
            ->setCellValue('Z1', 'POP');


        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('C' . $kolom, $x['no_va'])
                ->setCellValue('D' . $kolom, $x['nik'])
                ->setCellValue('E' . $kolom, $x['nama'])
                ->setCellValue('F' . $kolom, $x['email'])
                ->setCellValue('G' . $kolom, $x['no_hp'])
                ->setCellValue('H' . $kolom, $x['long'])
                ->setCellValue('I' . $kolom, $x['lat'])
                ->setCellValue('J' . $kolom, $x['service'])
                ->setCellValue('K' . $kolom, $x['no_spa'])
                ->setCellValue('L' . $kolom, $x['sid'])
                ->setCellValue('M' . $kolom, $x['sn_ont'])
                ->setCellValue('N' . $kolom, $x['bandwith'])
                ->setCellValue('O' . $kolom, $x['jenis_konektor_ont'])
                ->setCellValue('P' . $kolom, $x['sn_stb'])
                ->setCellValue('Q' . $kolom, $x['instalatir'])
                ->setCellValue('R' . $kolom, date('j F Y', strtotime($x['tanggal_instalasi'])))
                ->setCellValue('S' . $kolom, $x['paket_tambahan'])
                ->setCellValue('T' . $kolom, $x['jenis_kabel_dropcore'])
                ->setCellValue('U' . $kolom, $x['panjang_kabel_dropcore'])
                ->setCellValue('V' . $kolom, $x['dbm'])
                ->setCellValue('W' . $kolom, $x['id_fat'])
                ->setCellValue('X' . $kolom, $x['port_fat'])
                ->setCellValue('Y' . $kolom, $x['hostname'])
                ->setCellValue('Z' . $kolom, $x['id_pop']);
            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Pelanggan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function potensi()
    {

        if (
            $this->session->userdata('akses') == 'Sales Eksternal'
            or $this->session->userdata('akses') == 'Sales Internal'
        ) {
            $index = $this->M_Potensi->indexsales()->result_array();
        } else {
            $index = $this->M_Potensi->index()->result_array();
        }
        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Marketer')
            ->setCellValue('C1', 'NIK')
            ->setCellValue('D1', 'Nama')
            ->setCellValue('E1', 'ID PLN')
            ->setCellValue('F1', 'No.HP')
            ->setCellValue('G1', 'Email')
            ->setCellValue('H1', 'Facebook')
            ->setCellValue('I1', 'instagram')
            ->setCellValue('J1', 'Alamat')
            ->setCellValue('K1', 'Lat')
            ->setCellValue('L1', 'Long')
            ->setCellValue('M1', 'FAT')
            ->setCellValue('N1', 'PORT')
            ->setCellValue('O1', 'Panjang DW')
            ->setCellValue('P1', 'stamp');


        $kolom = 2;
        $nomor = 1;
        foreach ($index as $x) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $x['marketer'])
                ->setCellValue('C' . $kolom, $x['nik'])
                ->setCellValue('D' . $kolom, $x['nama'])
                ->setCellValue('E' . $kolom, $x['id_pln'])
                ->setCellValue('F' . $kolom, $x['no_hp'])
                ->setCellValue('G' . $kolom, $x['email'])
                ->setCellValue('H' . $kolom, $x['facebook'])
                ->setCellValue('I' . $kolom, $x['instagram'])
                ->setCellValue('J' . $kolom, $x['alamat'])
                ->setCellValue('K' . $kolom, $x['lat'])
                ->setCellValue('L' . $kolom, $x['long'])
                ->setCellValue('M' . $kolom, $x['id_fat'])
                ->setCellValue('N' . $kolom, $x['port_fat'])
                ->setCellValue('O' . $kolom, $x['jarak_fat'])
                ->setCellValue('P' . $kolom, $x['timestamp']);
            $kolom++;
            $nomor++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Data Potensi.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}