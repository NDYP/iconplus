<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('olt/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('olt/ubah') ?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hostname</label>
                        <input name="hostname" value="<?= $olt['hostname'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input name="no" value="<?= $olt['no'] ?>" type="hidden" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">SN</label>
                        <input name="sn_olt" value="<?= $olt['sn_olt'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <select name="brand" class="form-control select3" style="width: 100%;">
                            <?php foreach ($olt_brand as $x) : ?>
                            <?php if ($olt['brand'] == $x['no']) : ?>
                            <option name="brand" value="<?= $x['no']; ?>" selected>
                                <?= $x['nama_brand']; ?></option>
                            <?php else : ?>
                            <option name="brand" value="<?= $x['no']; ?>"><?= $x['nama_brand']; ?></option>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type</label>
                        <select name="type" class="form-control select2" style="width: 100%;">
                            <option name="type" value="Indoor"
                                <?php if ($olt['type'] === 'Indoor') echo 'selected="selected"'; ?>>
                                Indoor</option>
                            <option name="type" value="Outdoor"
                                <?php if ($olt['type'] === 'Outdoor') echo 'selected="selected"'; ?>>
                                Outdoor</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kapasitas Pon Max</label>
                        <input name="kapasitas_pon_max" value="<?= $olt['kapasitas_pon_max'] ?>" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kapasitas Pon Terpasang</label>
                        <input name="kapasitas_pon_terpasang" value="<?= $olt['kapasitas_pon_terpasang'] ?>" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status</label>
                        <select name="status" class="form-control select2" style="width: 100%;">
                            <option name="status" value="Existing"
                                <?php if ($olt['status'] === 'Existing') echo 'selected="selected"'; ?>>
                                Existing</option>
                            <option name="status" value="New"
                                <?php if ($olt['status'] === 'New') echo 'selected="selected"'; ?>>
                                New</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Instalatir (Mitra)</label>
                        <select name="instalatir" class="form-control select3" style="width: 100%;">
                            <?php foreach ($mitra as $x) : ?>
                            <?php if ($olt['instalatir'] == $x['no']) : ?>
                            <option name="instalatir" value="<?= $x['no']; ?>" selected>
                                <?= $x['nama']; ?></option>
                            <?php else : ?>
                            <option name="instalatir" value="<?= $x['no']; ?>"><?= $x['nama']; ?></option>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Instalasi</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input name="tanggal_instalasi" value="<?= $olt['tanggal_instalasi'] ?>" type="text"
                                class="form-control pull-right" id="datepicker">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID POP</label>
                        <select name="id_pop" class="form-control select3" style="width: 100%;">
                            <?php foreach ($pop as $x) : ?>
                            <?php if ($olt['id_pop'] == $x['no']) : ?>
                            <option name="id_pop" value="<?= $x['no']; ?>" selected>
                                <?= $x['id_pop']; ?></option>
                            <?php else : ?>
                            <option value="<?= $x['no']; ?>" name="id_pop">
                                <?= $x['id_pop']; ?>
                            </option>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
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