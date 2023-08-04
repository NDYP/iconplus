<!-- Main content -->
<section class="content container-fluid">
    <?php if ($this->session->has_userdata('message')) : ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fa fa-ban"></i> <?= $this->session->flashdata('message'); ?>!
    </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url('korporat/rab/tambah') ?>" class="btn btn-social btn btn-sm bg-blue"><i
                            class="fa fa-user-plus"></i>
                        Tambah</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped" style="width: 100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Site dan Layanan</th>
                                <th style="text-align: center;">Biaya</th>
                                <th style="text-align: center;">Estimasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rab as $x) : ?>
                            <tr>
                                <td>
                                    <?= $no++ ?>
                                </td>
                                <td><?= $x['nama_site'] ?> - <?= $x['produk'] . ' (' . $x['bandwith'] . ')' ?>
                                </td>
                                <td> <?= "Rp " . number_format($x['biaya'], 2, ',', '.'); ?>
                                </td>
                                <td>
                                    <?= date('d-m-Y', strtotime($x['estimasi'])); ?>
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">

                                            <li>
                                                <a href="<?= base_url('korporat/layanan/edit/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('korporat/layanan/hapus/' . $x['no']); ?>"
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