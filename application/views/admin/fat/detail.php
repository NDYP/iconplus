<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('fat/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="mytable" class="table table-striped dataTable" role="grid"
                        aria-describedby="example1_info">
                        <tbody>
                            <tr>
                                <th>ID FAT</th>
                                <th> : </th>
                                <td><?= $fat['id_fat'] ?></td>
                                <td></td>
                                <th>Splitter</th>
                                <th> : </th>
                                <td><?= $fat['kapasitas_port_terpasang'] ?></td>
                                <td></td>
                                <th>ID FDT</th>
                                <th> : </th>
                                <td><?= $fat['id_fdt'] ?></td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <th> : </th>
                                <td><?= $fat['nama_brand'] ?></td>
                                <td></td>
                                <th>Kapasitas Port Max</th>
                                <th> : </th>
                                <td><?= $fat['kapasitas_port_max'] ?></td>
                                <td></td>
                                <th>Tray FDT</th>
                                <th> : </th>
                                <td><?= $fat['tray_fdt'] ?></td>
                            </tr>
                            <tr>
                                <th>Jenis</th>
                                <th> : </th>
                                <td><?= $fat['jenis'] ?></td>
                                <td></td>
                                <th>Port FDT</th>
                                <th> : </th>
                                <td><?= $fat['port_fdt'] ?></td>
                                <th></th>
                                <th>Jarak ke FDT</th>
                                <td>:</td>
                                <td><?= (int)$fat['jarak']; ?> Meter</td>
                            </tr>
                            <tr>
                                <th>Jenis Konektor</th>
                                <th> : </th>
                                <td><?= $fat['jenis_konektor'] ?></td>
                                <td></td>
                                <th>Power In</th>
                                <th> : </th>
                                <td><?= $fat['power_in'] ?></td>
                                <td></td>
                                <th>Instalatir</th>
                                <th> : </th>
                                <td><?= $fat['nama_instalatir'] ?></td>
                            </tr>

                            <tr>
                                <th>Koordinat</th>
                                <th> : </th>
                                <td><?= $fat['long'];
                                    echo ' ';
                                    echo $fat['lat']; ?></td>
                                <td></td>
                                <th>Power Out</th>
                                <th> : </th>
                                <td><?= $fat['power_out'] ?></td>
                                <td></td>
                                <th>Tanggal Instalasi</th>
                                <th> : </th>
                                <td><?= $fat['tanggal_instalasi'] ?></td>
                            </tr>

                            <tr>
                                <th>Status Pembangunan</th>
                                <th> : </th>
                                <td><?= $fat['status_pembangunan'] ?></td>
                                <td></td>
                                <th>POP</th>
                                <th> : </th>
                                <td><?= $fat['id_pop'] ?></td>
                                <td></td>
                                <th></th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Cluster</th>
                                <th> : </th>
                                <td><?= $fat['nama_cluster'] ?></td>
                                <td></td>
                                <th>OLT</th>
                                <th> : </th>
                                <td><?= $fat['olt'] ?></td>
                                <td></td>
                                <th></th>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <h3 class="text-center"><u>Pelanggan yang terhubung</u></h3>
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
                                    style="width: 74.3594px;">SID</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Biodata</th>

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Konektivitas
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1">Long - LAT
                                </th>

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    FAT</th>

                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pelanggan as $x) : ?>
                            <tr role="row" class="odd">
                                <td class="dtr-control sorting_1"><?= $no++ ?></td>
                                <td class="sorting_1"><?= $x['sid'] ?></td>
                                <td>NIK : <?= $x['nik'] ?> <br> Nama : <?= $x['nama'] ?></td>
                                <td><?= $x['service'] ?> <?= $x['bandwith'] ?>
                                </td>
                                <td><?= $x['long'] ?> <br>
                                    <?= $x['lat'] ?>
                                </td>
                                <td>ID : <?= $x['id_fat'] ?> <br>Port : <?= $x['port_fat'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('pelanggan/detail/' . $x['no_pelanggan']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-list-ol"></i>Detail</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pelanggan/edit/' . $x['no_pelanggan']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pelanggan/hapus/' . $x['no_pelanggan']); ?>"
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