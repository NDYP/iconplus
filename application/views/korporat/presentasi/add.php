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
                                        <?= $x['nama_site'] ?> - <?= $x['produk'] . '(' . $x['bandwith'] . ')' ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('layanan', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Quotation Number *</label>
                                    <input name="quotation_number" value="<?= set_value('quotation_number'); ?>"
                                        type="text" class="form-control" id="" placeholder="">
                                    <?= form_error('quotation_number', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Quotation Date *</label>
                                            <input name="quotation_date" value="<?= set_value('quotation_date'); ?>"
                                                type="text" class="form-control" id="datepicker" placeholder="">
                                            <?= form_error('quotation_date', '<small class="text-danger pl-1">', '</small>'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Revisi</label>
                                    <textarea name="revisi" value="<?= set_value('revisi'); ?>" type="text"
                                        class="form-control" id="" placeholder=""><?= set_value('revisi'); ?></textarea>
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