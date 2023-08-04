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
                            <input name="id" value="<?= $pole['id']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <input name="no" value="<?= $pole['no']; ?>" type="hidden" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('id', '<small class="text-danger pl-1">', '</small>'); ?>

                        </div>
                        <div class="form-group">
                            <label>Konstruksi</label>
                            <select name="konstruksi" class="form-control select2" style="width: 100%;">
                                <option value="" name="konstruksi">
                                    --Pilih--
                                </option>
                                <option value="Baja"
                                    <?php if ($pole['konstruksi'] === 'Baja') echo 'selected="selected"'; ?>
                                    <?= set_select('konstruksi', 'Baja'); ?> name="konstruksi">Baja
                                </option>
                                <option value="Besi"
                                    <?php if ($pole['konstruksi'] === 'Besi') echo 'selected="selected"'; ?>
                                    <?= set_select('konstruksi', 'Besi'); ?> name="konstruksi">
                                    Besi
                                </option>
                                <option value="Beton"
                                    <?php if ($pole['konstruksi'] === 'Beton') echo 'selected="selected"'; ?>
                                    <?= set_select('konstruksi', 'Beton'); ?> name="konstruksi">
                                    Beton
                                </option>
                            </select>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tinggi (m)</label>
                                    <input name="tinggi_tiang" value="<?= $pole['tinggi_tiang']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tebal (mm)</label>
                                    <input name="tebal_tiang" value="<?= $pole['tebal_tiang']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
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
                                        <option value="Plan"
                                            <?php if ($pole['status'] === 'Plan') echo 'selected="selected"'; ?>
                                            <?= set_select('status', 'Plan'); ?> name="status">Plan
                                        </option>
                                        <option value="Operating"
                                            <?php if ($pole['status'] === 'Operating') echo 'selected="selected"'; ?>
                                            <?= set_select('status', 'Operating'); ?> name="status">
                                            Operating
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Klasifikasi</label>
                                    <select name="jenis" class="form-control select3" style="width: 100%;">
                                        <option value="" name="status">
                                            --Pilih--
                                        </option>
                                        <option value="TM"
                                            <?php if ($pole['jenis'] === 'TM') echo 'selected="selected"'; ?>
                                            <?= set_select('jenis', 'TM'); ?> name="jenis">TM
                                        </option>
                                        <option value="TR"
                                            <?php if ($pole['jenis'] === 'TR') echo 'selected="selected"'; ?>
                                            <?= set_select('jenis', 'TR'); ?> name="jenis">
                                            TR
                                        </option>
                                    </select>
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
                                <option value="PLN" <?php if ($pole['owner'] === 'PLN') echo 'selected="selected"'; ?>
                                    <?= set_select('owner', 'PLN'); ?> name="owner">PLN
                                </option>
                                <option value="ICON+"
                                    <?php if ($pole['owner'] === 'ICON+') echo 'selected="selected"'; ?>
                                    <?= set_select('owner', 'ICON+'); ?> name="owner">
                                    ICON+
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pengawas (PTL)</label>
                            <input name="ptl" value="<?= $pole['ptl']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instalatir (Mitra)</label>
                                    <select name="instalatir" class="form-control select2" style="width: 100%;">
                                        <option value="" name="konstruksi">
                                            --Pilih--
                                        </option>
                                        <?php foreach ($mitra as $x) : ?>
                                        <?php if ($pole['instalatir'] == $x['no']) : ?>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Instalasi
                                    </label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="tanggal_instalasi" value="<?= $pole['tanggal_instalasi']; ?>"
                                            type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long</label>
                                    <input name="long" value="<?= $pole['long']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lat</label>
                                    <input name="lat" value="<?= $pole['lat']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat</label>
                            <input name="geom" value="POINT(<?= $pole['long'];
                                                            echo ' ';
                                                            echo
                                                            $pole['lat']; ?>)" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
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