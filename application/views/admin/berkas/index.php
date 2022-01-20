<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-xs bg-green" href="<?= base_url('berkas/tambah') ?>"><span
                            class="fa fa-plus"></span>
                        Add</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="" class="table table-bordered table-striped dataTable nowrap" cellspacing="0"
                                    role="grid" aria-describedby="example1_info" style="width:100%">
                                    <thead>
                                        <tr role="row">
                                            <th rowspan="">No.</th>
                                            <th>Berkas</th>
                                            <th>Penginput</th>
                                            <th>Timestamp</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($berkas as $x) : ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $no++ ?></td>
                                            <td class="sorting_1">
                                                <a src="<?= base_url('assets/file/' . $x['file']); ?>"
                                                    href="<?= base_url('assets/file/' . $x['file']); ?>">
                                                    <?= $x['nama'] ?>.pdf</a>
                                            </td>
                                            <td class="sorting_1"><?= $x['penginput'] ?></td>
                                            <td class="sorting_1"><?= $x['timestamp'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn bg-green btn-social btn-flat btn-xs"
                                                        data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                                        Pilih</button>
                                                    <ul class="dropdown-menu" role="menu">

                                                        <li>
                                                            <a href="<?= base_url('berkas/hapus/' . $x['no']); ?>"
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
            </div>
            <!-- /.box -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

</section>