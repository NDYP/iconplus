<!-- Main content -->
<section class="content container-fluid">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('korporat/customer/tambah') ?>" class="btn btn-social btn btn-sm bg-blue"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Nama PT/CV/Dll</th>
                                <th style="text-align: center;">Sektor</th>
                                <th style="text-align: center;">Sales</th>
                                <th style="text-align: center;">Tanggal</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($customer as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td><?= $x['nama'] ?>
                                </td>
                                <td>
                                    <?= $x['segment'] ?>
                                </td>
                                <td>
                                    <?= $x['nama_sales'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <?= date('d-m-Y', strtotime($x['tanggal'])); ?>
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('korporat/customer/pic/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-plus"></i>PIC</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('korporat/customer/site/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-plus"></i>Site</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('korporat/customer/detail/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-list-ol"></i>Detail</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('korporat/customer/edit/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('korporat/customer/hapus/' . $x['no']); ?>"
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