<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Iconnet | Kalteng</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
    <!-- bootstrap datepicker -->

    <!-- Select2 -->
    <!-- Theme style -->
    <!-- DataTables -->

    <link rel="icon" src="<?= base_url('assets/'); ?>foto/logo.png" type="image/x-icon">


    <link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet/leaflet.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet-gps/dist/leaflet-gps.src.css" />

    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" /> -->
    <!-- CSS and JS files for Search Box -->
    <!-- <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>

    <script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css"> -->

    <script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>
    <script src="<?= base_url(); ?>/assets/leaflet-gps/dist/leaflet-gps.src.js"></script>
    <!-- <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script> -->
    <!-- Load Esri Leaflet from CDN -->
    <script src="http://ismyrnow.github.io/leaflet-groupedlayercontrol/src/leaflet.groupedlayercontrol.js"></script>
    <script src="https://unpkg.com/esri-leaflet@3.0.4/dist/esri-leaflet.js"
        integrity="sha512-oUArlxr7VpoY7f/dd3ZdUL7FGOvS79nXVVQhxlg6ij4Fhdc4QID43LUFRs7abwHNJ0EYWijiN5LP2ZRR2PY4hQ=="
        crossorigin=""></script>

    <!-- Load Esri Leaflet Geocoder from CDN -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.css"
        integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
        crossorigin="">
    <script src="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.js"
        integrity="sha512-enHceDibjfw6LYtgWU03hke20nVTm+X5CRi9ity06lGQNtC9GkBNl/6LoER6XzSudGiXy++avi1EbIg9Ip4L1w=="
        crossorigin=""></script>


    <link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css" />
    <script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script>

    <!-- Drawing Map -->
    <script src="http://leaflet.github.io/Leaflet.draw/src/Leaflet.draw.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/Leaflet.Draw.Event.js"></script>
    <link rel="stylesheet" href="http://leaflet.github.io/Leaflet.draw/src/leaflet.draw.css">

    <script src="http://leaflet.github.io/Leaflet.draw/src/Toolbar.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/Tooltip.js"></script>

    <script src="http://leaflet.github.io/Leaflet.draw/src/ext/GeometryUtil.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/ext/LatLngUtil.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/ext/LineUtil.Intersect.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/ext/Polygon.Intersect.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/ext/Polyline.Intersect.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/ext/TouchEvents.js"></script>

    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/DrawToolbar.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/handler/Draw.Feature.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/handler/Draw.SimpleShape.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/handler/Draw.Polyline.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/handler/Draw.Marker.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/handler/Draw.Circle.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/handler/Draw.CircleMarker.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/handler/Draw.Polygon.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/draw/handler/Draw.Rectangle.js"></script>

    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/EditToolbar.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/handler/EditToolbar.Edit.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/handler/EditToolbar.Delete.js"></script>

    <script src="http://leaflet.github.io/Leaflet.draw/src/Control.Draw.js"></script>

    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/handler/Edit.Poly.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/handler/Edit.SimpleShape.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/handler/Edit.Rectangle.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/handler/Edit.Marker.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/handler/Edit.CircleMarker.js"></script>
    <script src="http://leaflet.github.io/Leaflet.draw/src/edit/handler/Edit.Circle.js"></script>

    <!-- Vanilla -->
    <!-- <link href="<?= base_url('assets/') ?>bower_components/vanilla/dist/vanilla-dataTables.min.css" rel="stylesheet"
        type="text/css">
    <script src="<?= base_url('assets/') ?>bower_components/vanilla/dist/vanilla-dataTables.min.js"
        type="text/javascript">
    </script> -->
    <!-- <style>
        #map {
            height: 530px;
        }
    </style> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-green layout-top-nav">

    <div class="wrapper">

        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?= base_url('') ?>" class="navbar-brand"><b>Iconnet</b>Kalteng</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?= $this->uri->segment(1) == 'beranda' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('beranda') ?>">Beranda <span class="fa fa-dashboard"></span></a>
                            </li>
                            <li class="<?= $this->uri->segment(1) == 'map' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('map') ?>">Map <span class="fa fa-map-marker"></span></a></li>
                            <?php if (
                                !($this->session->userdata('akses') == 'Sales Internal' || $this->session->userdata('akses') == 'Sales Eksternal')
                            ) : ?>
                            <li class="dropdown <?=
                                                    $this->uri->segment(1) == 'mitra' ||
                                                        $this->uri->segment(1) == 'cluster'
                                                        || $this->uri->segment(1) == 'pop'
                                                        || $this->uri->segment(1) == 'odf'
                                                        || $this->uri->segment(1) == 'fdt'
                                                        || $this->uri->segment(1) == 'fat'
                                                        || $this->uri->segment(1) == 'pelanggan'
                                                        ? 'active' : ''; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Database <span
                                        class="fa fa-database"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('mitra') ?>">Mitra Pembangunan</a></li>
                                    <li class=""><a href="<?= base_url('cluster') ?>">Cluster</a></li>
                                    <li><a href="<?= base_url('pop') ?>">POP</a></li>
                                    <li class=""><a href="<?= base_url('olt') ?>">OLT</a></li>
                                    <li><a href="<?= base_url('odf') ?>">ODF</a></li>
                                    <li class=""><a href="<?= base_url('fdt') ?>">FDT</a></li>
                                    <li><a href="<?= base_url('fat') ?>">FAT/ODP</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <li class="dropdown <?=
                                                $this->uri->segment(1) == 'potensi'
                                                    || $this->uri->segment(1) == 'spa'
                                                    || $this->uri->segment(1) == 'pelanggan'
                                                    ? 'active' : ''; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelanggan<span
                                        class="fa fa-arrow-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class=""><a href="<?= base_url('potensi') ?>">Potensi</a></li>

                                    <li class=""><a href="<?= base_url('spa') ?>">SPA</a></li>
                                    <li><a href="<?= base_url('pelanggan') ?>">SPA Closed/Pelanggan</a></li>
                                    <li><a href="<?= base_url('pelanggan_no_fat') ?>">Pelanggan Belum Lengkap</a></li>

                                </ul>
                            </li>
                            <?php if (
                                !($this->session->userdata('akses') == 'Sales Internal' || $this->session->userdata('akses') == 'Sales Eksternal')
                            ) : ?>
                            <li class="dropdown <?=
                                                    $this->uri->segment(1) == 'master' ? 'active' : ''; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Dropdown <span
                                        class="fa fa-arrow-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li class=""><a href="<?= base_url('master/olt') ?>">Brand OLT</a></li>
                                    <li class=""><a href="<?= base_url('master/fdt') ?>">Brand FDT</a></li>
                                    <li><a href="<?= base_url('master/fat') ?>">Brand FAT/ODP</a></li>
                                </ul>
                            </li>
                            <?php endif; ?>
                            <?php if (
                                !($this->session->userdata('akses') == 'Sales Internal' || $this->session->userdata('akses') == 'Sales Eksternal')
                            ) : ?>
                            <li class="<?=
                                            $this->uri->segment(1) == 'pole' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('pole/index') ?>">Pole <i class="fas fa-wifi"></i></a>
                            </li>
                            <?php endif; ?>
                            <?php if (
                                !($this->session->userdata('akses') == 'Sales Internal' || $this->session->userdata('akses') == 'Sales Eksternal')
                            ) : ?>
                            <li class="<?=
                                            $this->uri->segment(1) == 'users' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('users/index') ?>">Users <span class="fa fa-users"></span></a>
                            </li>

                            <?php endif; ?>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <?php if ($this->session->userdata('foto') == NULL) : ?>
                                    <img src="<?= base_url('assets/foto/profil.png') ?>" class="user-image"
                                        alt="User Image">
                                    <?php else : ?>
                                    <img src="<?= base_url('assets/foto/user/' . $this->session->userdata('foto')) ?>"
                                        class="user-image" alt="User Image">
                                    <?php endif; ?>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"> <?= $this->session->userdata('username') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <?php if ($this->session->userdata('foto') == NULL) : ?>
                                        <img src="<?= base_url('assets/foto/profil.png') ?>" class="img-circle"
                                            alt="User Image">
                                        <?php else : ?>
                                        <img src="<?= base_url('assets/foto/user/' . $this->session->userdata('foto')) ?>"
                                            class="img-circle" alt="User Image">
                                        <?php endif; ?>
                                        <p>
                                            <?= $this->session->userdata('username') ?> -
                                            <?= $this->session->userdata('akses') ?>
                                            <small>Member since Nov. <?= $this->session->userdata('daftar') ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= base_url('akun/index') ?>"
                                                class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= base_url('akun/logout') ?>"
                                                class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= $title; ?>
                        <small><?= $title2; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
                        <li><a href="#"> <?= $title; ?></a></li>
                        <li class="active"> <?= $title2; ?></li>
                    </ol>
                </section>