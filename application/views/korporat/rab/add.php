<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('korporat/layanan/index') ?>" class="btn btn-social btn-sm bg-blue"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <br>
                    <h3 style="text-align : center"> Keterangan * : Tidak boleh kosong</h3>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Site *</label>
                                <select name="layanan" class="form-control select2" style="width: 100%;">
                                    <option value="">
                                        --Pilih--
                                    </option>
                                    <?php foreach ($layanan as $x) : ?>
                                    <option value="<?= $x['no'] ?>" <?= set_select('layanan', $x['no']); ?>>
                                        <?= $x['nama_site'] ?> - Budget :
                                        <?= "Rp " . number_format($x['budget'], 2, ',', '.'); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('layanan', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="">Jarak tiang terakhir (m) *</label>
                                            <input name="jarak_tiang" value="<?= set_value('jarak_tiang'); ?>"
                                                type="text" class="form-control" id="" placeholder="">
                                            <?= form_error('jarak_tiang', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Biaya penarikan *</label>
                                            <input name="harga_tiang" value="<?= set_value('harga_tiang'); ?>"
                                                type="text" class="form-control" id="" placeholder="">
                                            <?= form_error('harga_tiang', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="">Jarak JB terakhir (m) *</label>
                                            <input name="jarak_jb" value="<?= set_value('jarak_jb'); ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('jarak_jb', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Biaya penarikan *</label>
                                            <input name="harga_jb" value="<?= set_value('harga_jb'); ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('harga_jb', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Biaya izin kawasan *</label>
                                    <input name="izin_kawasan" value="<?= set_value('izin_kawasan'); ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('izin_kawasan', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Estimasi</label>
                                    <input name="estimasi" value="<?= set_value('estimasi'); ?>" type="text"
                                        class="form-control" id="datepicker" placeholder="">
                                    <?= form_error('estimasi', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button class="btn btn-social btn-sm bg-blue btn"><span class="fa fa-save"></span>
                            Simpan</button>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
<!-- /.content -->