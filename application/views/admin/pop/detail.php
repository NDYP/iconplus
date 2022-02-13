<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('pop/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="mytable" class=" table table-bordered table-striped dataTable nowrap" cellspacing="0"
                        role="grid" aria-describedby="example1_info" style="width:100%">
                        <tbody>
                            <tr>
                                <th>ID POP</th>
                                <th> : </th>
                                <td><?= $pop['id_pop'] ?></td>
                                <td></td>
                                <th>Long</th>
                                <th> : </th>
                                <td><?= $pop['long'] ?></td>

                            </tr>
                            <tr>
                                <th>Nama POP</th>
                                <th> : </th>
                                <td><?= $pop['nama_pop'] ?></td>
                                <td></td>
                                <th>Lat</th>
                                <th> : </th>
                                <td><?= $pop['lat'] ?></td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <th> : </th>
                                <td><?= $pop['kota'] ?></td>
                                <td></td>
                                <th>Koordinat</th>
                                <th> : </th>
                                <td><?= $pop['lat'];
                                    echo ' ';
                                    echo $pop['long']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <h3 class="text-center"><u>OLT yang terhubung</u></h3>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example3" class="table table-bordered table-striped dataTable nowrap" cellspacing="0"
                        role="grid" aria-describedby="example1_info" style="width:100%">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 10px;">No.</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 74.3594px;">Hostname</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">SN
                                    <br> Brand - Type
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Kapasitas Pon Max <br>
                                    Kapasitas Pon Terpasang</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Instalatir</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">ID
                                    POP</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($olt as $x) : ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?= $no++ ?></td>
                                <td class="sorting_1"><?= $x['hostname'] ?></td>
                                <td><?= $x['sn_olt'] ?> <br> <?= $x['nama_brand'] ?> -<?= $x['type'] ?></td>
                                <td><?= $x['kapasitas_pon_max'] ?> <br>
                                    <?= $x['kapasitas_pon_terpasang'] ?></td>
                                <td><?= $x['nama_instalatir'] ?> <br>
                                    <?= $x['tanggal_instalasi'] ?></td>
                                <td><?= $x['pop'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('olt/detail/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-list-ol"></i>Detail</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('olt/edit/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('olt/hapus/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
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