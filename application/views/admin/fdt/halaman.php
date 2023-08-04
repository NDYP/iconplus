<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <a class="btn btn-xs bg-green" href="<?= base_url('fdt/tambah') ?>"><span class="fa fa-plus"></span>
                        Add</a>
                    <a class="btn btn-xs bg-green" href="<?= base_url('excel/fdt') ?>"><span class="fa fa-print"></span>
                        Print</a>
                    <a class="btn btn-xs bg-green" data-toggle="modal" data-target="#modal-tambah"><span
                            class="fa fa-plus"></span>
                        Excel</a>
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <form method="POST" action="<?= base_url('fdt/search') ?>">
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
                            <a class="btn btn-xs bg-yellow pull-right" href="<?= base_url('fdt/index') ?>"><span
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
                                                style="width: 10px;">No.</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 74.3594px;">ID FDT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Jenis - Brand</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 80.7812px;">Long - Lat</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 55.1094px;">Jenis Konektor</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 41.5781px;">Nama ODF</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 41.5781px;">Port ODF</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 41.5781px;">Opsi</th>
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
                                                    <button type="button"
                                                        class="btn bg-green btn-social btn-flat btn-xs"
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
                                        <?php if (count($fdt) <= 1) { ?>
                                        <tr>
                                            <td colspan='10'>No record found.</td>
                                        </tr>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $pagination; ?>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                action="<?= base_url('fdt/tambah_brand') ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Tambah Brand FDT</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="">Brand FDT</label>
                                <input type="text" name="nama_brand" id="" class="form-control input-sm" required>
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
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                action="<?= base_url('fdt/tambah_excel') ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Input Excel ODF</h4>
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