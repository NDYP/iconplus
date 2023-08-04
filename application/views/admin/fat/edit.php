<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('fat/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('fat/ubah') ?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID FAT</label>
                        <input name="id_fat" value="<?= $fat['id_fat']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input name="no" value="<?= $fat['no']; ?>" type="hidden" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <select name="brand" class="form-control select2" style="width: 100%;">
                            <?php foreach ($fat_brand as $x) : ?>
                            <?php if ($fat['brand'] == $x['no']) : ?>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis</label>
                        <select name="jenis" class="form-control select6" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <option value="SOLID" <?php if ($fat['jenis'] === 'SOLID') echo 'selected="selected"'; ?>
                                name="jenis">SOLID
                            </option>
                            <option value="NON SOLID"
                                <?php if ($fat['jenis'] === 'NON SOLID') echo 'selected="selected"'; ?> name="jenis">
                                Non Solid
                            </option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status Pembangunan</label>
                        <select name="status_pembangunan" class="form-control select5" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <option value="Ready for sale"
                                <?php if ($fat['status_pembangunan'] === 'Ready for sale') echo 'selected="selected"'; ?>
                                <?= set_select('status_pembangunan', 'Ready for sale'); ?> name="status_pembangunan">
                                Ready for sale
                            </option>
                            <option value="Plan/Ongoing"
                                <?php if ($fat['status_pembangunan'] === 'Plan/Ongoing') echo 'selected="selected"'; ?>
                                <?= set_select('status_pembangunan', 'Plan/Ongoing'); ?> name="status_pembangunan">
                                Plan/Ongoing
                            </option>
                            <option value="Proses Pembangunan"
                                <?php if ($fat['status_pembangunan'] === 'Proses pembangunan') echo 'selected="selected"'; ?>
                                <?= set_select('status_pembangunan', 'Proses pembangunan'); ?>
                                name="status_pembangunan">
                                Proses pembangunan
                            </option>
                            <option value="FULL"
                                <?php if ($fat['status_pembangunan'] === 'FULL') echo 'selected="selected"'; ?>
                                <?= set_select('status_pembangunan', 'FULL'); ?> name="status_pembangunan">
                                FULL
                            </option>
                        </select>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Long</label>
                                <input name="long" value="<?= $fat['long']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                                <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lat</label>
                                <input name="lat" value="<?= $fat['lat']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                                <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.form-group -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Koordinat</label>
                        <input name="koordinat" value="POINT(<?= $fat['long'];
                                                                echo " ";
                                                                echo $fat['lat']; ?>)" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
                    </div>
                    <!-- /.form-group -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Splitter</label>
                        <input name="kapasitas_port_terpasang" value="<?= $fat['kapasitas_port_terpasang']; ?>"
                            type="text" class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kapasitas Port Max</label>
                        <input name="kapasitas_port_max" value="<?= $fat['kapasitas_port_max']; ?>" type="text"
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
                            <option value="UPC"
                                <?php if ($fat['jenis_konektor'] === 'UPC') echo 'selected="selected"'; ?>
                                name="jenis_konektor">UPC
                            </option>
                            <option value="APC"
                                <?php if ($fat['jenis_konektor'] === 'APC') echo 'selected="selected"'; ?>
                                name="jenis_konektor">APC
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Power in</label>
                        <input name="power_in" value="<?= $fat['power_in']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('power_in', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Power Out</label>
                        <input name="power_out" value="<?= $fat['power_out']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('power_out', '<small class="text-danger pl-1">', '</small>'); ?>
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
                            <?php if ($fat['no_fdt'] == $x['no']) :  ?>
                            <option value=<?= $x['no']; ?> name="id_fdt" selected>
                                <?= $x['id_fdt']; ?>
                                <?php else : ?>
                            <option value=<?= $x['no']; ?> name="id_fdt">
                                <?= $x['id_fdt']; ?>
                                <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tray FDT</label>
                        <input name="tray_fdt" value="<?= $fat['tray_fdt']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Port FDT</label>
                        <input type="text" name="port_fdt" value="<?= $fat['port_fdt']; ?>" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
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
                            <?php if ($fat['instalatir'] == $x['no']) : ?>
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
                            <input name="tanggal_instalasi" value="<?= $fat['tanggal_instalasi']; ?>" type="text"
                                class="form-control pull-right" id="datepicker">
                        </div>
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
                            <?php if ($fat['cluster'] == $x['no']) :  ?>
                            <option value=<?= $x['no']; ?><?= set_select('cluster', $x['no']); ?> name="cluster"
                                selected>
                                <?= $x['nama_cluster']; ?>
                                <?php else : ?>
                            <option value=<?= $x['no']; ?><?= set_select('cluster', $x['no']); ?> name="cluster">
                                <?= $x['nama_cluster']; ?>
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
                        <label for="exampleInputEmail1">OLT</label>
                        <input name="olt" value="<?= $fat['olt']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
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