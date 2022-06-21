<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Iconnet | Icon+</title>

    <!-- Icons font CSS-->
    <link href="<?= base_url('assets_gangguan/') ?>vendor/mdi-font/css/material-design-iconic-font.min.css"
        rel="stylesheet" media="all">
    <link href="<?= base_url('assets_gangguan/') ?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet"
        media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?= base_url('assets_gangguan/') ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url('assets_gangguan/') ?>vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url('assets_gangguan/') ?>css/main.css" rel="stylesheet" media="all">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Form Gangguan</h2>
                    <form method="POST" action="">
                        <div class="input-group">
                            <?= form_error('pelanggan', '<small class="text-danger pl-1">', '</small>'); ?>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select class="form-control select2" name="pelanggan">
                                    <option name="pelanggan" disabled="disabled" selected="selected">Nama atau SID
                                        (Ketik dan pilih)
                                    </option>
                                    <?php foreach ($pelanggan as $x) : ?>
                                    <option value="<?= $x['no'] ?>" <?= set_select('pelanggan', $x['no']); ?>>
                                        <?= $x['nama'] . ' - ' . $x['sid'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Whatsapp/Telepon"
                                value="<?= set_value('kontak'); ?>" name="kontak" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <?= form_error('tanggal_gangguan', '<small class="text-danger pl-1">', '</small>'); ?>
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text"
                                        placeholder="Tanggal Gangguan" name="tanggal_gangguan" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-2">
                                <?= form_error('indikator_modem', '<small class="text-danger pl-1">', '</small>'); ?>
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select class="form-control select2" name="indikator_modem">
                                            <option disabled="disabled" selected="selected">Indikator Modem</option>
                                            <option <?= set_select('indikator_modem', 'Merah'); ?>>Merah</option>
                                            <option <?= set_select('indikator_modem', 'Hijau'); ?>>Hijau</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <?= form_error('keluhan[]', '<small class="text-danger pl-1">', '</small>'); ?>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <option disabled="disabled" selected="selected">Keluhan</option>
                                <select name="keluhan[]" class="form-control select2" name="class" multiple="multiple">
                                    <option value="Internet Lambat" <?= set_select('keluhan[]', 'Internet Lambat'); ?>>
                                        Internet Lambat</option>
                                    <option value="No Internet" <?= set_select('keluhan[]', 'No Internet'); ?>>No
                                        Internet
                                    </option>
                                    <option value="Tidak bisa browsing"
                                        <?= set_select('keluhan[]', 'Tidak bisa browsing'); ?>>Tidak bisa browsing
                                    </option>
                                    <option value="Tidak bisa akses aplikasi tertentu"
                                        <?= set_select('keluhan[]', 'Tidak bisa akses aplikasi tertentu'); ?>>Tidak bisa
                                        akses aplikasi
                                        tertentu</option>
                                    <option value="Kabel Putus" <?= set_select('keluhan[]', 'Kabel Putus'); ?>>Kabel
                                        Putus</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Keluhan Tambahan" name="info"
                                value="<?= set_value('info'); ?>">
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url('assets_gangguan/') ?>vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?= base_url('assets_gangguan/') ?>vendor/select2/select2.min.js"></script>
    <script src="<?= base_url('assets_gangguan/') ?>vendor/datepicker/moment.min.js"></script>
    <script src="<?= base_url('assets_gangguan/') ?>vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url('assets_gangguan/') ?>js/global.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
            statesave: true,
            responsive: true,
            processing: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
        })
        $('.select3').select2({
            statesave: true,
            responsive: true,
            processing: true,
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
        })
    })
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->