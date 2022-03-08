<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('fdt/index'); ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID FDT</label>
                            <input name="id_fdt" value="<?= set_value('id_fdt'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('id_fdt', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand</label>
                            <select name="brand" class="form-control select2" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($fdt_brand as $x) : ?>
                                <option value=<?= $x['no']; ?><?= set_select('brand', $x['no']); ?> name="brand">
                                    <?= $x['nama_brand']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('brand', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>
                            <select name="jenis" class="form-control select2" style="width: 100%;">
                                <option value="" name="konstruksi">
                                    --Pilih--
                                </option>
                                <option value="Polemount" <?= set_select('jenis', 'Polemount'); ?> name="Polemount">
                                    Polemount
                                </option>
                                <option value="Knockdown" <?= set_select('jenis', 'Knockdown'); ?> name="Knockdown">
                                    Knockdown
                                </option>
                            </select>
                            <?= form_error('jenis', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Konstruksi</label>
                            <select name="konstruksi" class="form-control select2" style="width: 100%;">
                                <option value="" name="konstruksi">
                                    --Pilih--
                                </option>
                                <option value="Metal" <?= set_select('konstruksi', 'Metal'); ?> name="konstruksi">Metal
                                </option>
                                <option value="Fiber" <?= set_select('konstruksi', 'Fiber'); ?> name="konstruksi">Fiber
                                </option>
                            </select>
                            <?= form_error('konstruksi', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat</label>
                            <input name="koordinat" value="<?= set_value('koordinat'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
                            <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <!-- /.form-group -->
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kapasitas Tray Max</label>
                            <input name="kapasitas_tray_max" value="<?= set_value('kapasitas_tray_max'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('kapasitas_tray_max', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Konektor</label>
                            <select name="jenis_konektor" class="form-control select2" style="width: 100%;">
                                <option value="" name="jenis_konektor">
                                    --Pilih--
                                </option>
                                <option value="UPC" <?= set_select('jenis_konektor', 'UPC'); ?> name="jenis_konektor">
                                    UPC
                                </option>
                                <option value="APC" <?= set_select('jenis_konektor', 'APC'); ?> name="jenis_konektor">
                                    APC
                                </option>
                            </select>
                            <?= form_error('jenis_konektor', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Instalatir (Mitra)</label>
                            <select name="instalatir" class="form-control select2" style="width: 100%;">
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

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama ODF</label>
                            <select name="nama_odf" class="form-control select3" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($odf as $x) : ?>
                                <option value=<?= $x['no']; ?><?= set_select('nama_odf', $x['no']); ?> name="nama_odf">
                                    <?= $x['nama_odf']; ?> - <?= $x['nama_cluster']; ?> - <?= $x['hostname_oltx']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <!--<?= form_error('nama_odf', '<small class="text-danger pl-1">', '</small>'); ?>-->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Port ODF</label>
                            <input name="port_odf" value="<?= set_value('port_odf'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('port_odf', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
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
            </div>
            <div class="box-footer">
                <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->