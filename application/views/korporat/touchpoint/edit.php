<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('korporat/presentasi/index') ?>" class="btn btn-social btn-sm bg-blue"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <br>
                    <h3 style="text-align : center"> Keterangan * : Offline boleh kosong</h3>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Customer *</label>
                                <select name="customer" class="form-control select2" style="width: 100%;">
                                    <option value="">
                                        --Pilih--
                                    </option>
                                    <?php foreach ($customer as $x) : ?>
                                    <?php if ($touchpoint['customer'] == $x['no']) :  ?>
                                    <option value=<?= $x['no']; ?> name="customer" selected>
                                        <?= $x['nama']; ?> </option>
                                    <?php else : ?>
                                    <option value=<?= $x['no']; ?> name="customer">
                                        <?= $x['nama']; ?>
                                    </option>
                                    <?php endif; ?>

                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('customer', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tempat *</label>
                                    <input name="tempat" value="<?= $touchpoint['tempat']; ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('tempat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal *</label>
                                            <input name="tanggal"
                                                value="<?= date('d-m-Y', strtotime($touchpoint['tanggal'])); ?>"
                                                type="text" class="form-control" id="datepicker" placeholder="">
                                            <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Metode *</label>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>
                                                        <input type="radio" name="metode" class="minimal" checked
                                                            value="Online">
                                                    </label>
                                                    Online
                                                </div>
                                                <div class="col-md-4">
                                                    <label>
                                                        <input type="radio" name="metode" class="minimal"
                                                            value="Offline">
                                                    </label> Offline
                                                </div>
                                            </div>
                                            <?= form_error('metode', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Topik</label>
                                    <input name="topik" value="<?= $touchpoint['topik']; ?>" type="text"
                                        class="form-control" id="" placeholder=""></input>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Hasil</label>
                                    <textarea name="hasil" value="<?= $touchpoint['hasil']; ?>" type="text"
                                        class="form-control" id="" placeholder=""><?= set_value('hasil'); ?></textarea>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6"><label for="">Status</label>
                                        <select name="status" class="form-control select2" style="width: 100%;">
                                            <option value="" <?= set_select('status', 'Pilih'); ?>>
                                                --Pilih--
                                            </option>
                                            <option value="Hijau" <?= set_select('status', 'Hijau'); ?>>
                                                Hijau
                                            </option>
                                            <option value="Kuning" <?= set_select('status', 'Kuning'); ?>>
                                                Kuning
                                            </option>
                                            <option value="Merah" <?= set_select('status', 'Merah'); ?>>
                                                Merah
                                            </option>
                                        </select>
                                        <?= form_error('status', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Rencana Tindak Lanjut *</label>
                                            <input name="tindak_lanjut"
                                                value="<?= date('d-m-Y', strtotime($touchpoint['tindak_lanjut'])); ?>"
                                                type="text" class="form-control" id="datepicker1" placeholder="">
                                            <?= form_error('tindak_lanjut', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Dokumentasi</label>
                                    <img style="width: 350px;"
                                        src="<?= base_url('assets/korporat/dokumentasi/' . $touchpoint['dokumentasi']); ?>"
                                        alt="">
                                    <input name="dokumentasi" value="<?= set_value('dokumentasi'); ?>" type="file"
                                        class="form-control" id="datepicker" placeholder="">
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