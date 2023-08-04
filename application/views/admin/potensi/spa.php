<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('potensi/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST">
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
                            <label for="exampleInputEmail1">NIK
                                <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="nik" value="<?= $potensi['nik']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <input name="no" value="<?= $potensi['no']; ?>" type="hidden" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap
                                <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="nama" value="<?= $potensi['nama']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
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
                            <label for="exampleInputEmail1">No.HP
                                <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="no_hp" value="<?= $potensi['no_hp']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email
                                <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="email" value="<?= $potensi['email']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook</label>
                                    <input name="facebook" value="<?= $potensi['facebook']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instagram</label>
                                    <input name="instagram" value="<?= $potensi['instagram']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                        </div>

                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat
                                <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <textarea name="alamat" class="form-control" rows="5"
                                placeholder="Enter ..."><?= $potensi['alamat']; ?></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lat
                                        <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?></label>
                                    <input name="lat" value="<?= $potensi['lat']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long
                                        <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?></label>
                                    <input name="long" value="<?= $potensi['long']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat
                                <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="koordinat" value="POINT(<?= $potensi['long'];
                                                                    echo ' ';
                                                                    echo $potensi['lat']; ?>)" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">

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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Service</label>
                                    <select name="service" class="form-control select2" style="width: 100%;">
                                        <option value="ICONNET"
                                            <?php if ($potensi['service'] === 'ICONNET') echo 'selected="selected"'; ?>
                                            name="bandwith">ICONNET
                                        </option>
                                        <option value="ICONNET BIZ"
                                            <?php if ($potensi['service'] === 'ICONNET BIZ') echo 'selected="selected"'; ?>
                                            name="bandwith">ICONNET BIZ
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            </div>
                        </div>


                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Biaya instalasi
                            </label>
                            <input name="biaya_instalasi" value="<?= $potensi['biaya_instalasi']; ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Paket Tambahan
                            </label>
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
                                    <?= $x['id_fat']; ?>
                                    (<?= $x['status_pembangunan'] ?>)
                                    <?php if ($x['port_idle'] != 0) {
                                                echo ' - idle : ', $x['port_idle'];
                                            } ?></option>
                                <?php else : ?>
                                <option name="id_fat" value="<?= $x['no']; ?>"><?= $x['id_fat']; ?>
                                    (<?= $x['status_pembangunan'] ?>)
                                    <?php if ($x['port_idle'] != 0) {
                                                echo ' - idle : ', $x['port_idle'];
                                            } ?>
                                </option>
                                <?php endif; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Port FAT</label>
                                    <input name="port_fat" value="<?= $potensi['port_fat']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jarak (meter)</label>
                                    <input name="jarak_fat" value="<?= $potensi['jarak_fat']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
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