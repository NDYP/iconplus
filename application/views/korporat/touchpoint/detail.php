<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('korporat/presentasi/index') ?>" class="btn btn-xs bg-blue"><span
                    class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="mytable" class="table table-striped dataTable" role="grid"
                        aria-describedby="example1_info">
                        <tbody>
                            <tr>
                                <th>Site</th>
                                <th> : </th>
                                <td><?= $presentasi['nama_site'] ?></td>
                                <td></td>
                                <th>Customer</th>
                                <th> : </th>
                                <td><?= $presentasi['nama_customer'] ?></td>
                                <td></td>
                                <th>Koordinat Site</th>
                                <th> : </th>
                                <td><?= $presentasi['long_site'] . ', ' . $presentasi['lat_site'] ?></td>
                            </tr>
                            <tr>
                                <th>Sektor</th>
                                <th> : </th>
                                <td><?= $presentasi['segment'] ?></td>
                                <td></td>
                                <th>Afiliasi/Group</th>
                                <th> : </th>
                                <td><?= $presentasi['afiliasi'] ?></td>
                                <td></td>
                                <th>Site Pelanggan PLN</th>
                                <th> : </th>
                                <td><?= $presentasi['pelanggan_pln'] ?></td>
                            </tr>
                            <tr>
                                <th>Produk</th>
                                <th> : </th>
                                <td><?= $presentasi['produk'] ?></td>
                                <td></td>
                                <th>Bandwith</th>
                                <th> : </th>
                                <td><?= $presentasi['bandwith'] ?></td>
                                <td></td>
                                <th>Budget</th>
                                <th> : </th>
                                <td><?= $presentasi['budget'] ?></td>
                            </tr>
                            <tr>
                                <th>Pengadaan</th>
                                <th> : </th>
                                <td><?= $presentasi['metode_pengadaan'] ?></td>
                                <td></td>
                                <th></th>
                                <th></th>
                                <td></td>
                                <th></th>
                                <th></th>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <h3 class="text-center"><u>PIC</u></h3>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example3" class="table table-bordered table-striped dataTable nowrap" cellspacing="0"
                        role="grid" aria-describedby="example1_info" style="width:100%">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 5px;">No.</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 74.3594px;">Nama</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Jabatan</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Kontak
                                </th>
                                <th class="sorting" tabindex="0">
                                    Email</th>
                                <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Opsi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pic as $x) : ?>
                            <tr role="row" class="odd">
                                <td class="dtr-control sorting_1"><?= $no++ ?></td>
                                <td class="sorting_1"><?= $x['nama'] ?></td>
                                <td><?= $x['jabatan'] ?></td>
                                <td><?= $x['kontak'] ?> </td>
                                <td><?= $x['email'] ?> </td>
                                <!-- <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('korporat/pic/edit/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('korporat/pic/hapus/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm tombol-hapus"><i
                                                        class="fa fa-trash-o"></i> Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <h3 class="text-center"><u>Berkas</u></h3>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example3" class="table table-bordered table-striped dataTable nowrap" cellspacing="0"
                        role="grid" aria-describedby="example1_info" style="width:100%">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 5px;">No.</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 74.3594px;">Judul</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Berkas</th>

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($berkas as $x) : ?>
                            <tr role="row" class="odd">
                                <td class="dtr-control sorting_1"><?= $no++ ?></td>
                                <td class="sorting_1"><?= $x['judul'] ?></td>
                                <td><a style="text-align: center ;"
                                        href="<?= base_url('korporat/presentasi/download/' . $x['no']) ?>"><span
                                            class="fa fa-file"></span></a> </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('korporat/presentasi/hapusberkas/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm tombol-hapus"><i
                                                        class="fa fa-trash-o"></i> Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->