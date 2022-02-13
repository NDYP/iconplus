<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('odf/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="mytable" class="table table-striped dataTable nowrap" cellspacing="0" role="grid"
                        aria-describedby="example1_info" style="width:100%">
                        <tbody>
                            <tr>
                                <th>Nama ODF</th>
                                <th> : </th>
                                <td><?= $odf['nama_odf'] ?></td>
                                <td></td>
                                <th>Instalatir</th>
                                <th> : </th>
                                <td><?= $odf['nama_instalatir'] ?></td>
                            </tr>
                            <tr>
                                <th>Kapasitas Port Max</th>
                                <th> : </th>
                                <td><?= $odf['kapasitas_port_max'] ?></td>
                                <td></td>
                                <th>Tanggal Instalasi</th>
                                <th> : </th>
                                <td><?= $odf['tanggal_instalasi'] ?></td>
                            </tr>
                            <tr>
                                <th>Rack ODF</th>
                                <th> : </th>
                                <td><?= $odf['rack_odf'] ?></td>
                                <td></td>
                                <th>Hostname OLT</th>
                                <th> : </th>
                                <td><?= $odf['hostname'] ?></td>
                            </tr>
                            <tr>
                                <th>Long</th>
                                <th> : </th>
                                <td><?= $odf['long'] ?></td>
                                <td></td>
                                <th>Port OLT</th>
                                <th> : </th>
                                <td><?= $odf['port_olt'] ?></td>
                            </tr>
                            <tr>
                                <th>Lat</th>
                                <th> : </th>
                                <td><?= $odf['lat'] ?></td>
                                <td></td>
                                <th></th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Koordinat</th>
                                <th> : </th>
                                <td><?= $odf['long'];
                                    echo ' ';
                                    echo $odf['lat']; ?></td>
                                <td></td>
                                <th></th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Cluster</th>
                                <th> : </th>
                                <td><?= $odf['nama_cluster'] ?></td>
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
            <h3 class="text-center"><u>FDT yang terhubung</u></h3>
            <div class="row">
                <div class="col-sm-12">
                    <table id="" class="table table-bordered table-striped dataTable nowrap" cellspacing="0" role="grid"
                        aria-describedby="example1_info" style="width:100%">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 10px;">No.</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 74.3594px;">ID FDT</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Jenis - Brand</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 80.7812px;">Long - Lat</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 55.1094px;">Jenis Konektor</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 41.5781px;">
                                    Nama ODF</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 41.5781px;">
                                    Port ODF</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending" style="width: 41.5781px;">
                                    Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($fdt as $x) : ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?= $no++ ?></td>
                                <td class="sorting_1"><?= $x['id_fdt'] ?></td>
                                <td><?= $x['jenis'] ?> - <?= $x['nama_brand'] ?></td>
                                <td><?= $x['long'] ?> <?= $x['lat'] ?></td>
                                <td><?= $x['jenis_konektor'] ?></td>
                                <td><?= $x['odf'] ?></td>
                                <td><?= $x['port_odf'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('fdt/detail/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-list-ol"></i>Detail</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('fdt/edit/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('fdt/hapus/' . $x['no']); ?>"
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