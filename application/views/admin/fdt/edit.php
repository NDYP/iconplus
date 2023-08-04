<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('fdt/index'); ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('fdt/ubah') ?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID FDT</label>
                        <input name="id_fdt" value="<?= $fdt['id_fdt']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input name="no" value="<?= $fdt['no']; ?>" type="hidden" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('id_fdt', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <select name="brand" class="form-control select2" style="width: 100%;">
                            <?php foreach ($fdt_brand as $x) : ?>
                            <?php if ($fdt['brand'] == $x['no']) : ?>
                            <option name="brand" value="<?= $x['no']; ?>" selected>
                                <?= $x['nama_brand']; ?></option>
                            <?php else : ?>
                            <option name="brand" value="<?= $x['no']; ?>"><?= $x['nama_brand']; ?></option>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('brand', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis</label>
                        <select name="jenis" class="form-control select6" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <option value="Polemount"
                                <?php if ($fdt['jenis'] === 'Polemount') echo 'selected="selected"'; ?>
                                <?= set_select('jenis', 'Polemount'); ?> name="jenis">
                                Polemount
                            </option>
                            <option value="Knockdown"
                                <?php if ($fdt['jenis'] === 'Knockdown') echo 'selected="selected"'; ?>
                                <?= set_select('jenis', 'Knockdown'); ?> name="jenis">
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
                        <select name="konstruksi" class="form-control select5" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <option value="Metal"
                                <?php if ($fdt['konstruksi'] === 'Metal') echo 'selected="selected"'; ?>
                                <?= set_select('konstruksi', 'Metal'); ?> name="konstruksi">
                                Metal
                            </option>
                            <option value="Fiber"
                                <?php if ($fdt['konstruksi'] === 'Fiber') echo 'selected="selected"'; ?>
                                <?= set_select('konstruksi', 'Fiber'); ?> name="konstruksi">
                                Fiber
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
                                <input name="long" value="<?= $fdt['long']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                                <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lat</label>
                                <input name="lat" value="<?= $fdt['lat']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                                <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Koordinat</label>
                        <input name="koordinat" value="POINT(<?= $fdt['long'];
                                                                echo " ";
                                                                echo $fdt['lat']; ?>)" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
                        <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- /.form-group -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kapasitas Tray Max</label>
                        <input name="kapasitas_tray_max" value="<?= $fdt['kapasitas_tray_max']; ?>" type="text"
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
                            <option value="UPC"
                                <?php if ($fdt['jenis_konektor'] === 'UPC') echo 'selected="selected"'; ?>
                                name="jenis_konektor">UPC
                            </option>
                            <option value="APC"
                                <?php if ($fdt['jenis_konektor'] === 'APC') echo 'selected="selected"'; ?>
                                name="jenis_konektor">APC
                            </option>
                        </select>
                        <?= form_error('jenis_konektor', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Instalatir (Mitra)</label>
                        <select name="instalatir" class="form-control select2" style="width: 100%;">
                            <?php foreach ($mitra as $x) : ?>
                            <?php if ($fdt['instalatir'] == $x['no']) : ?>
                            <option name="instalatir" value="<?= $x['no']; ?>" selected>
                                <?= $x['nama']; ?></option>
                            <?php else : ?>
                            <option name="instalatir" value="<?= $x['no']; ?>"><?= $x['nama']; ?></option>
                            <?php endif; ?>
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
                            <?php foreach ($odf as $x) : ?>
                            <?php if ($fdt['nama_odf'] == $x['no']) : ?>
                            <option value=<?= $x['no']; ?><?= set_select('nama_odf', $x['no']); ?> name="nama_odf"
                                selected>
                                <?= $x['nama_odf']; ?> - <?= $x['nama_cluster']; ?> - <?= $x['hostname_oltx']; ?>
                            </option>
                            <?php else : ?>
                            <option value=<?= $x['no']; ?><?= set_select('nama_odf', $x['no']); ?> name="nama_odf">
                                <?= $x['nama_odf']; ?> - <?= $x['nama_cluster']; ?> - <?= $x['hostname_oltx']; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                        </select>
                        <?= form_error('nama_odf', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Port ODF</label>
                        <input name="port_odf" value="<?= $fdt['port_odf']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
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
                            <input name="tanggal_instalasi" value="<?= $fdt['tanggal_instalasi']; ?>" type="text"
                                class="form-control pull-right" id="datepicker">
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
        <?= form_close(); ?>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->