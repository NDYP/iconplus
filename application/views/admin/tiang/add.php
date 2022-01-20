<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('pole/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST">
            <div class="box-body" data-select2-id="14">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input name="id" value="<?= set_value('id'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('id', '<small class="text-danger pl-1">', '</small>'); ?>

                        </div>
                        <div class="form-group">
                            <label>Konstruksi</label>
                            <select name="konstruksi" class="form-control select2" style="width: 100%;">
                                <option value="" name="konstruksi">
                                    --Pilih--
                                </option>
                                <option value="Baja" <?= set_select('konstruksi', 'Baja'); ?> name="konstruksi">Baja
                                </option>
                                <option value="Besi" <?= set_select('konstruksi', 'Besi'); ?> name="konstruksi">
                                    Besi
                                </option>
                                <option value="Beton" <?= set_select('konstruksi', 'Beton'); ?> name="konstruksi">
                                    Beton
                                </option>
                            </select>
                            <?= form_error('konstruksi', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tinggi (m)</label>
                                    <input name="tinggi_tiang" value="<?= set_value('tinggi_tiang'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('tinggi_tiang', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tebal (mm)</label>
                                    <input name="tebal_tiang" value="<?= set_value('tebal_tiang'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('tebal_tiang', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="status" class="form-control select6" style="width: 100%;">
                                        <option value="" name="status">
                                            --Pilih--
                                        </option>
                                        <option value="Plan" <?= set_select('status', 'Plan'); ?> name="status">
                                            Plan
                                        </option>
                                        <option value="Operating" <?= set_select('status', 'Operating'); ?>
                                            name="status">
                                            Operating
                                        </option>
                                    </select>
                                    <?= form_error('status', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Klasifikasi</label>
                                    <select name="jenis" class="form-control select3" style="width: 100%;">
                                        <option value="" name="status">
                                            --Pilih--
                                        </option>
                                        <option value="TM" <?= set_select('jenis', 'TM'); ?> name="jenis">TM
                                        </option>
                                        <option value="TR" <?= set_select('jenis', 'TR'); ?> name="jenis">
                                            TR
                                        </option>
                                    </select>
                                    <?= form_error('jenis', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label for="exampleInputEmail1">Asset Owner</label>
                            <select name="owner" class="form-control select3" style="width: 100%;">
                                <option value="" name="owner">
                                    --Pilih--
                                </option>
                                <option value="PLN" <?= set_select('owner', 'PLN'); ?> name="owner">PLN
                                </option>
                                <option value="ICON+" <?= set_select('owner', 'ICON+'); ?> name="owner">
                                    ICON+
                                </option>
                            </select>
                            <?= form_error('owner', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pengawas (PTL)</label>
                            <input name="ptl" value="<?= set_value('ptl'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('ptl', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instalatir (Mitra Pembangunan)</label>
                                    <select name="instalatir" class="form-control select3" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($mitra as $x) : ?>
                                        <option value=<?= $x['no']; ?><?= set_select('instalatir', $x['no']); ?>
                                            name="instalatir">
                                            <?= $x['nama']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('instalatir', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Instalasi</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="tanggal_instalasi" value="<?= set_value('tanggal_instalasi'); ?>"
                                            type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <?= form_error('tanggal_instalasi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                                <!-- /.form-group -->

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long</label>
                                    <input name="long" value="<?= set_value('long'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lat</label>
                                    <input name="lat" value="<?= set_value('lat'); ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat</label>
                            <input name="koordinat" value="<?= set_value('koordinat'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
                            <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
            </div>
            <!-- /.box-body -->
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->