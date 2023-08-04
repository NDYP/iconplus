<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('fat/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID FAT</label>
                            <input name="id_fat" value="<?= set_value('id_fat'); ?>" type=" text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('id_fat', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand</label>
                            <select name="brand" class="form-control select2" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($fat_brand as $x) : ?>
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
                            <select name="jenis" class="form-control select6" style="width: 100%;">
                                <option value="" name="jenis">
                                    --Pilih--
                                </option>
                                <option value="SOLID" <?= set_select('jenis', 'SOLID'); ?> name="jenis">SOLID
                                </option>
                                <option value="NON SOLID" <?= set_select('jenis', 'NON SOLID'); ?> name="jenis">
                                    NON SOLID
                                </option>
                            </select>
                            <?= form_error('jenis', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status Pembangunan</label>
                            <select name="status_pembangunan" class="form-control select2" style="width: 100%;">
                                <option value="" name="status_pembangunan">
                                    --Pilih--
                                </option>
                                <option value="Ready for sale"
                                    <?= set_select('status_pembangunan', 'Ready for sale'); ?>
                                    name="status_pembangunan">
                                    Ready for sale
                                </option>
                                <option value="Plan/Ongoing" <?= set_select('status_pembangunan', 'Plan/Ongoing'); ?>
                                    name="status_pembangunan">
                                    Plan/Ongoing
                                </option>
                                <option value="Plan/Ongoing"
                                    <?= set_select('status_pembangunan', 'Proses pembangunan'); ?>
                                    name="status_pembangunan">
                                    Proses pembangunan
                                </option>
                            </select>
                            <?= form_error('status_pembangunan', '<small class="text-danger pl-1">', '</small>'); ?>
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
                            <label for="exampleInputEmail1">Splitter</label>
                            <input name="kapasitas_port_terpasang" value="<?= set_value('kapasitas_port_terpasang'); ?>"
                                type="text" class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('kapasitas_port_terpasang', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kapasitas Port Max</label>
                            <input name="kapasitas_port_max" value="<?= set_value('kapasitas_port_max'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
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
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Power in</label>
                            <input name="power_in" value="<?= set_value('power_in'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Power Out</label>
                            <input name="power_out" value="<?= set_value('power_out'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID FDT</label>
                            <select name="id_fdt" class="form-control select3" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($fdt as $x) : ?>
                                <option value=<?= $x['no']; ?><?= set_select('id_fdt', $x['no']); ?> name="id_fdt">
                                    <?= $x['id_fdt']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tray FDT</label>
                            <input name="tray_fdt" value="<?= set_value('tray_fdt'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Port FDT</label>
                            <input type="text" name="port_fdt" value="<?= set_value('port_fdt'); ?>"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
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
                                <option value=<?= $x['no']; ?><?= set_select('instalatir', $x['no']); ?>
                                    name="instalatir">
                                    <?= $x['nama']; ?>
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
                                <input name="tanggal_instalasi" value="<?= set_value('tanggal_instalasi'); ?>"
                                    type="text" class="form-control pull-right" id="datepicker">
                            </div>
                            <?= form_error('tanggal_instalasi', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cluster</label>
                            <select name="cluster" class="form-control select3" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($cluster as $x) : ?>
                                <option value=<?= $x['no']; ?><?= set_select('cluster', $x['no']); ?>>
                                    <?= $x['nama_cluster']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">OLT</label>
                            <input name="olt" value="<?= set_value('olt'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
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