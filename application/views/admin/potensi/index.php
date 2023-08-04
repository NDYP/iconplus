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
                    <div class="box-tools pull-right">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <form method="POST" action="<?= base_url('potensi/search') ?>">
                                <div class="input-group input-group-sm">
                                    <input type="text" value="" name="search"
                                        class="form-control pull-right input-group input-group-sm" placeholder="Search">
                                    <span class="input-group-btn">
                                        <input class="btn bg-blue btn-flat" type='submit' name='submit'
                                            value='Cari'>Go!</input>
                                    </span>
                                </div>
                                <!-- <input type="text" value="<?= $search ?>" name="search"
                                    class="form-control pull-right input-group input-group-sm" placeholder="Search">
                                <input class="btn btn-sm btn-info" type='submit' name='submit' value='Submit'> -->
                            </form>
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
                                                style="width: 66.1719px;">Timestamp</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Callback</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($potensi as $x) : ?>
                                        <tr role="row" class="odd">
                                            <td class="dtr-control sorting_1"><?= $no++; ?></td>
                                            <td><?= $x['nik'] ?> <br> <?= $x['nama'] ?></td>
                                            <td><?= $x['no_hp'] ?> <br> <?= $x['email'] ?></td>
                                            <td><?= $x['long'] ?> <?= $x['lat'] ?></td>
                                            <!-- <td><?php if ($x['id_fat'] != NULL) : ?> <?= $x['id_fat'] ?>
                                                (<?= $x['status_pembangunan'] ?>)
                                                <?php else : ?>
                                                -
                                                <?php endif; ?></td> -->
                                            <td><?= $x['marketer'] ?> <br><?= $x['timestamp'] ?></td>
                                            <td><?= $x['tag'] ?></td>
                                            <td><?= $x['callback'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn bg-green btn-social btn-flat btn-xs"
                                                        data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                                        Pilih</button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a class="btn btn-social btn-flat btn-block btn-sm"
                                                                href="<?= base_url('potensi/spa/' . $x['no']); ?>"><span
                                                                    class="fa fa-check"></span> SPA</a>
                                                        </li>
                                                        <li>
                                                            <a class="btn btn-social btn-flat btn-block btn-sm"
                                                                href="<?= base_url('potensi/edit/' . $x['no']); ?>"><span
                                                                    class="fa fa-edit"></span> Ubah</a>
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
                <?= $pagination; ?>
            </div>
            <!-- /.box -->

            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

</section>