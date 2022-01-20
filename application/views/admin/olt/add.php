<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('olt/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('olt/tambah') ?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hostname</label>
                        <input name="hostname" value="<?= set_value('hostname'); ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('hostname', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">SN</label>
                        <input name="sn_olt" value="<?= set_value('sn_olt'); ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <!--<?= form_error('sn_olt', '<small class="text-danger pl-1">', '</small>'); ?>-->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <select name="brand" class="form-control select3" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <?php foreach ($olt_brand as $x) : ?>
                            <option value=<?= $x['no']; ?><?= set_select('brand', $x['no']); ?> name="brand">
                                <?= $x['nama_brand']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('brand', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <select name="type" class="form-control select2" style="width: 100%;">
                            <option value="" name="status">
                                --Pilih--
                            </option>
                            <option value="Indoor" <?= set_select('type', 'New'); ?> name="type">Indoor
                            </option>
                            <option value="Outdoor" <?= set_select('type', 'Existing'); ?> name="type">Outdoor
                            </option>
                        </select>
                        <?= form_error('type', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kapasitas Pon Max</label>
                        <input name="kapasitas_pon_max" value="<?= set_value('kapasitas_pon_max'); ?>" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('kapasitas_pon_max', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kapasitas Pon Terpasang</label>
                        <input name="kapasitas_pon_terpasang" value="<?= set_value('kapasitas_pon_terpasang'); ?>"
                            type="text" class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('kapasitas_pon_terpasang', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" class="form-control select2" style="width: 100%;">
                            <option value="" name="status">
                                --Pilih--
                            </option>
                            <option value="New" <?= set_select('status', 'New'); ?> name="status">New
                            </option>
                            <option value="Existing" <?= set_select('status', 'Existing'); ?> name="status">Existing
                            </option>
                        </select>
                        <?= form_error('status', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Instalatir (Mitra)</label>
                        <select name="instalatir" class="form-control select3" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <?php foreach ($mitra as $x) : ?>
                            <option value=<?= $x['no']; ?><?= set_select('instalatir', $x['no']); ?> name="instalatir">
                                <?= $x['nama']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('instalatir', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Instalasi</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input name="tanggal_instalasi" value="<?= set_value('tanggal_instalasi'); ?>" type="text"
                                class="form-control pull-right" id="datepicker">
                        </div>
                        <?= form_error('tanggal_instalasi', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID POP</label>
                        <select name="id_pop" class="form-control select2" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <?php foreach ($pop as $x) : ?>
                            <option value=<?= $x['no']; ?><?= set_select('id_pop', $x['no']); ?> name="id_pop">
                                <?= $x['id_pop']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('id_pop', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
        </div>
        <?= form_close(); ?>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->