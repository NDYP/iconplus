<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-xs bg-green" href="<?= base_url('potensi/tambah') ?>"><span
                            class="fa fa-plus"></span> Add</a>
                    <a class="btn btn-xs bg-green" href="<?= base_url('excel/potensi') ?>"><span
                            class="fa fa-print"></span>
                        Print</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="table" class="table table-bordered table-striped dataTable nowrap"
                                    cellspacing="0" role="grid" aria-describedby="example1_info" style="width:100%">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 5px;">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Identitas</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Kontak
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1">Long - LAT
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Plan FAT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Timestamp</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($potensi as $x) : ?>
                                        <tr role="row" class="odd">
                                            <td class="dtr-control sorting_1"><?= $no++ ?></td>
                                            <td><?= $x['nik'] ?> <br> <?= $x['nama'] ?></td>
                                            <td><?= $x['no_hp'] ?> <br> <?= $x['email'] ?></td>
                                            <td><?= $x['long'] ?> <?= $x['lat'] ?></td>
                                            <td><?= $x['id_fat'] ?> (<?= $x['status_pembangunan'] ?>)</td>
                                            <td><?= $x['status'] ?></td>
                                            <td><?= $x['penginput'] ?> <br><?= $x['timestamp'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn bg-green btn-social btn-flat btn-xs"
                                                        data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                                        Pilih</button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <?php if ($x['status_pembangunan'] == 'Ready for sale') : ?>
                                                            <a class="btn btn-social btn-flat btn-block btn-sm"
                                                                href="<?= base_url('potensi/spa/' . $x['no']); ?>"><span
                                                                    class="fa fa-check"></span> SPA</a>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                            <a class="btn btn-social btn-flat btn-block btn-sm"
                                                                href="<?= base_url('potensi/edit/' . $x['no']); ?>"><span
                                                                    class="fa fa-eye"></span> Lihat</a>
                                                        </li>
                                                        <li>
                                                            <a class="tombol-hapus btn btn-social btn-flat btn-block btn-sm"
                                                                href="<?= base_url('potensi/hapus/' . $x['no']); ?>"><span
                                                                    class="fa fa-trash-o"></span> Hapus</a>
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
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

</section>