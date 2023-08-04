<!-- Main content -->
<section class="content container-fluid">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('korporat/touchpoint/tambah') ?>" class="btn btn-social btn btn-sm bg-blue"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Customer</th>
                                <th style="text-align: center;">Tempat</th>
                                <th style="text-align: center;">Metode</th>
                                <th style="text-align: center;">Topik</th>
                                <th style="text-align: center;">Next Contact</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($touchpoint as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td><?= $x['nama_customer'] ?>
                                </td>
                                <td><?= $x['tempat'] ?> (<?= date('d-m-Y', strtotime($x['tanggal'])); ?>)
                                </td>
                                <td>
                                    <?= $x['metode'] ?>
                                </td>
                                <td>
                                    <?= $x['topik'] ?>
                                </td>
                                <td>
                                    <?= $x['tindak_lanjut']; ?>
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('korporat/touchpoint/edit/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('korporat/touchpoint/hapus/' . $x['no']); ?>"
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
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</section>
<!-- /.content -->