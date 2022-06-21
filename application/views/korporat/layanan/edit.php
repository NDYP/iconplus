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
                                <label for="">Site</label>
                                <select name="site" class="form-control select2" style="width: 100%;">
                                    <option value="">
                                        --Pilih--
                                    </option>
                                    <?php foreach ($site as $x) : ?>
                                    <?php if ($layanan['site'] == $x['no']) :  ?>
                                    <option value=<?= $x['no']; ?> name="site" selected>
                                        <?= $x['nama']; ?>
                                        <?php else : ?>
                                    <option value=<?= $x['no']; ?> name="site">
                                        <?= $x['nama']; ?>
                                        <?php endif; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('site', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Produk *</label>
                                    <input name="produk" value="<?= $layanan['produk']; ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('produk', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Bandwith *</label>
                                            <input name="bandwith" value="<?= $layanan['bandwith']; ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('bandwith', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Budget *</label>
                                            <input name="budget" value="<?= $layanan['budget']; ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('budget', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Pengadaan *</label>
                                <select name="metode_pengadaan" class="form-control select2" style="width: 100%;">
                                    <option value="" <?= set_select('metode_pengadaan', 'Pilih'); ?>>
                                        --Pilih--
                                    </option>
                                    <option value="Tender" <?= set_select('metode_pengadaan', 'Tender'); ?>
                                        <?php if ($layanan['metode_pengadaan'] === 'Tender') echo 'selected'; ?>>
                                        Tender
                                    </option>
                                    <option value="E-Catalog" <?= set_select('metode_pengadaan', 'E-Catalog'); ?>
                                        <?php if ($layanan['metode_pengadaan'] === 'E-Catalog') echo 'selected'; ?>>
                                        E-Catalog
                                    </option>
                                    <option value="Pengadaan Langsung"
                                        <?= set_select('metode_pengadaan', 'Pengadaan Langsung'); ?>
                                        <?php if ($layanan['metode_pengadaan'] === 'Pengadaan Langsung') echo 'selected'; ?>>
                                        Pengadaan Langsung
                                    </option>
                                </select>
                                <?= form_error('metode_pengadaan', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Note</label>
                                    <input name="note" value="<?= $layanan['note']; ?>" type="text" class="form-control"
                                        id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Expected Delivery</label>
                                    <input name="estimasi_pengadaan" value="<?= $layanan['estimasi_pengadaan']; ?>"
                                        type="text" class="form-control" id="datepicker" placeholder="">
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