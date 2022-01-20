<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('potensi/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('potensi/ubahstatus') ?>
        <div class="box-body" data-select2-id="14">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-info btn-block btn-flat">Data Pelanggan</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input name="nik" value="<?= $potensi['nik']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input name="no" value="<?= $potensi['no']; ?>" type="hidden" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input name="nama" value="<?= $potensi['nama']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID PLN</label>
                        <input name="id_pln" value="<?= $potensi['id_pln']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                    <!-- /.form-group -->
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.HP</label>
                        <input name="no_hp" value="<?= $potensi['no_hp']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" value="<?= $potensi['email']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="4"
                            placeholder="Enter ..."><?= $potensi['alamat']; ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lat</label>
                                <input name="lat" value="<?= $potensi['lat']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                                <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Long</label>
                                <input name="long" value="<?= $potensi['long']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                                <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Koordinat</label>
                        <input name="koordinat" value="POINT(<?= $potensi['long'];
                                                                echo ' ';
                                                                echo $potensi['lat']; ?>)" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Status FAT</label>
                        <select name="status_coverage" class="form-control select2" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <option value="Lanjut SPA"
                                <?php if ($potensi['status_coverage'] === 'Lanjut SPA') echo 'selected="selected"'; ?>
                                name="status_coverage">
                                Lanjut SPA
                            </option>
                            <option value="Pending (Desain)"
                                <?php if ($potensi['status_coverage'] === 'Pending (Desain)') echo 'selected="selected"'; ?>
                                name="status_coverage">
                                Pending (Desain)
                            </option>
                            <option value="Pending (Pembangunan)"
                                <?php if ($potensi['status_coverage'] === 'Pending (Pembangunan)') echo 'selected="selected"'; ?>
                                name="status_coverage">
                                Pending (Pembangunan)
                            </option>
                        </select>
                        <?= form_error('status_coverage', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- /.form-group -->
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-info btn-block btn-flat">Data SPA</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.SPA</label>
                        <input name="no_spa" value="<?= $potensi['no_spa']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.VA</label>
                        <input name="no_va" value="<?= $potensi['no_va']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Service</label>
                        <select name="service" class="form-control select2" style="width: 100%;">
                            <option value="Iconnet"
                                <?php if ($potensi['service'] === 'Iconnet') echo 'selected="selected"'; ?>
                                name="bandwith">Iconnet
                            </option>
                            <option value="Iconnet Biz"
                                <?php if ($potensi['service'] === 'Iconnet Biz') echo 'selected="selected"'; ?>
                                name="bandwith">Iconnet Biz
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bandwith</label>
                        <select name="bandwith" class="form-control select2" style="width: 100%;">
                            <option value="5 Mbps"
                                <?php if ($potensi['bandwith'] === '5 Mbps') echo 'selected="selected"'; ?>
                                name="bandwith">5 Mbps
                            </option>
                            <option value="10 Mbps"
                                <?php if ($potensi['bandwith'] === '10 Mbps') echo 'selected="selected"'; ?>
                                name="bandwith">10 Mbps
                            </option>
                            <option value="20 Mbps"
                                <?php if ($potensi['bandwith'] === '20 Mbps') echo 'selected="selected"'; ?>
                                name="bandwith">20 Mbps
                            </option>
                            <option value="50 Mbps"
                                <?php if ($potensi['bandwith'] === '50 Mbps') echo 'selected="selected"'; ?>
                                name="bandwith">50 Mbps
                            </option>
                            <option value="100 Mbps"
                                <?php if ($potensi['bandwith'] === '100 Mbps') echo 'selected="selected"'; ?>
                                name="bandwith">100 Mbps
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya instalasi</label>
                        <input name="biaya_instalasi" value="<?= $potensi['biaya_instalasi']; ?>" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Paket Tambahan</label>
                        <input name="paket_tambahan" value="<?= $potensi['paket_tambahan']; ?>" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>ID FAT</label>
                        <select name="id_fat" class="form-control select2" style="width: 100%;">
                            <?php foreach ($fat as $x) : ?>
                            <?php if ($potensi['fat'] == $x['no']) : ?>
                            <option name="id_fat" value="<?= $x['no']; ?>" selected>
                                <?= $x['id_fat']; ?></option>
                            <?php else : ?>
                            <option name="id_fat" value="<?= $x['no']; ?>"><?= $x['id_fat']; ?></option>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Port FAT</label>
                        <input name="port_fat" value="<?= $potensi['port_fat']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jarak (meter)</label>
                        <input name="jarak_fat" value="<?= $potensi['jarak_fat']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <div class="box-footer">
            <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
        </div>
        <!-- /.box-body -->
        <?= form_close(); ?>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->