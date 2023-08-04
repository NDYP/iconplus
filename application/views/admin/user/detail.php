<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('olt/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="mytable" class="table table-bordered table-striped dataTable nowrap" cellspacing="0"
                        role="grid" aria-describedby="example1_info" style="width:100%">
                        <tbody>
                            <tr>
                                <th>Hostname</th>
                                <th> : </th>
                                <td><?= $olt['hostname'] ?></td>
                                <td></td>
                                <th>Kapasitas Pon Max</th>
                                <th> : </th>
                                <td><?= $olt['kapasitas_pon_max'] ?></td>
                            </tr>
                            <tr>
                                <th>SN</th>
                                <th> : </th>
                                <td><?= $olt['sn_olt'] ?></td>
                                <td></td>
                                <th>Kapasitas Pon Terpasang</th>
                                <th> : </th>
                                <td><?= $olt['kapasitas_pon_terpasang'] ?></td>
                            </tr>
                            <tr>
                                <th>Brand</th>
                                <th> : </th>
                                <td><?= $olt['brand'] ?></td>
                                <td></td>
                                <th>Instalatir</th>
                                <th> : </th>
                                <td><?= $olt['instalatir'] ?></td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <th> : </th>
                                <td><?= $olt['type'] ?></td>
                                <td></td>
                                <th>Tanggal Instalasi</th>
                                <th> : </th>
                                <td><?= $olt['tanggal_instalasi'] ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <th> : </th>
                                <td><?= $olt['status'] ?></td>
                                <td></td>
                                <th>ID POP</th>
                                <th> : </th>
                                <td><?= $olt['id_pop'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <h3 class="text-center"><u>ODF yang terhubung</u></h3>
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
                                    style="width: 74.3594px;">Nama ODF</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Kapasitas Port Max</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Rack ODF</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Instalatir</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Tanggal Instalasi</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Hostname OLT</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Port OLT</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">
                                    Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($odf as $x) : ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?= $no++ ?></td>
                                <td class="sorting_1"><?= $x['nama_odf'] ?></td>
                                <td><?= $x['kapasitas_port_max'] ?></td>
                                <td><?= $x['rack_odf'] ?></td>
                                <td><?= $x['instalatir'] ?></td>
                                <td><?= $x['tanggal_instalasi'] ?></td>
                                <td><?= $x['hostname_olt'] ?></td>
                                <td><?= $x['port_olt'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('odf/detail/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-list-ol"></i>Detail</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('odf/edit/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('odf/hapus/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-trash-o"></i> Hapus</a>
                                            </li>
                                        </ul>
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