<section class="content">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-xs bg-green" href="<?= base_url('users/tambah') ?>"><span
                            class="fa fa-plus"></span>
                        Add</a>
                    <a class="btn btn-xs bg-green" href="<?= base_url('') ?>"><span class="fa fa-print"></span>
                        Print</a>
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <form method="POST" action="<?= base_url('users/search') ?>">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search"
                                        class="form-control pull-right input-group input-group-sm" placeholder="Search">
                                    <span class="input-group-btn">
                                        <input class="btn bg-blue btn-flat" type='submit' name='submit'
                                            value='Cari'>Go!</input>
                                    </span>
                                </div>
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
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Akses</th>
                                            <th>Daftar</th>
                                            <th>Terakhir Login</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($user as $x) : ?>
                                        <?php if ($x['akses'] != 'Admin') : ?>
                                        <tr role="row" class="odd">
                                            <td><?= $no++ ?></td>
                                            <td><?= $x['nama'] ?></td>
                                            <td><?= $x['username'] ?></td>
                                            <td><?= $x['akses'] ?> - <?= $x['nama_mitra'] ?></td>
                                            <td><?= $x['daftar'] ?></td>
                                            <td><?= $x['login'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn bg-green btn-social btn-flat btn-xs"
                                                        data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                                        Pilih</button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <?php if ($x['foto']) : ?>
                                                            <a src="<?= base_url('assets/foto/user/' . $x['foto']); ?>"
                                                                href="<?= base_url('assets/foto/user/' . $x['foto']); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-image"></i>Foto</a>
                                                            <?php else : ?>
                                                            <a src="<?= base_url('assets/foto/profil.png'); ?>"
                                                                href="<?= base_url('assets/foto/profil.png'); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-image"></i>Foto</a>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url('users/edit/' . $x['no']); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-eye"></i>Lihat</a>
                                                        </li>
                                                        <li>
                                                            <a class="tombol-hapus btn btn-social btn-flat btn-block btn-sm"
                                                                id="tombol-hapus"
                                                                href="<?= base_url('users/hapus/' . $x['no']); ?>"><i
                                                                    class="fa fa-trash-o"></i>
                                                                Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php if (count($user) <= 1) { ?>
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
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('user/tambah_brand') ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Tambah Brand OLT</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="">Brand OLT</label>
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
</section>