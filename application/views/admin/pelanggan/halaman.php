<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <a class="btn btn-xs bg-green" href="<?= base_url('pelanggan/tambah') ?>"><span
                            class="fa fa-plus"></span>
                        Add</a>
                    <a class="btn btn-xs bg-green" href="<?= base_url('excel/pelanggan') ?>"><span
                            class="fa fa-print"></span>
                        Print</a>
                    <a class="btn btn-xs bg-green" data-toggle="modal" data-target="#modal-tambah"><span
                            class="fa fa-plus"></span>
                        Excel</a>
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <form method="POST" action="<?= base_url('pelanggan/search') ?>">
                                <div class="input-group input-group-sm">
                                    <input type="text" value="<?= $search ?>" name="search"
                                        class="form-control pull-right input-group input-group-sm" placeholder="Search">
                                    <span class="input-group-btn">
                                        <input class="btn bg-blue btn-flat" type='submit' name='submit'
                                            value='Cari'>Go!</input>
                                    </span>
                                </div>

                            </form>
                            <br>
                            <a class="btn btn-xs bg-yellow pull-right" href="<?= base_url('pelanggan/index') ?>"><span
                                    class="fa fa-refresh"></span>
                                Refresh</a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example3" class="table table-bordered table-striped dataTable nowrap"
                                    cellspacing="0" role="grid" aria-describedby="example1_info" style="width:100%">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 5px;">No.</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 5px;">SPA</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Biodata</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1">Koordinat
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">FAT</th>
                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">FDT</th> -->
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">OLT</th>
                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">POP</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Timestamp</th> -->
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pelanggan as $x) : ?>
                                        <tr role="row" class="odd">
                                            <td class="dtr-control sorting_1"><?= $no++ ?></td>
                                            <td class="dtr-control sorting_1"><?= $x['no_spa']; ?></td>
                                            <td>
                                                <?= $x['nama'] ?></td>
                                            <td><?= $x['lat'] ?>,
                                                <?= $x['long'] ?>
                                            </td>
                                            <td>ID : <?= $x['id_fat'] ?> <br>Port : <?= $x['port_fat'] ?></td>
                                            <!-- <td><?= $x['id_fdt'] ?></td> -->
                                            <td><?= $x['hostname'] ?></td>
                                            <!-- <td><?= $x['id_pop'] ?></td>
                                            <td><?= $x['penginput'] ?> <br> <?= $x['tanggal_instalasi'] ?> -->
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn bg-green btn-social btn-flat btn-xs"
                                                        data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                                        Pilih</button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="<?= base_url('pelanggan/detail/' . $x['no']); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-list-ol"></i>Detail</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url('pelanggan/edit/' . $x['no']); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-edit"></i>Ubah</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url('pelanggan/hapus/' . $x['no']); ?>"
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
                </div>
                <!-- /.box-body -->
                <?= $pagination; ?>
            </div>
            <!-- /.box -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                action="<?= base_url('pelanggan/tambah_excel') ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Input Excel Pelanggan</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="">File</label>
                                <input type="file" name="excel" id="" class="form-control input-sm" required>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
</section>