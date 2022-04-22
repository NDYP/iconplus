<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('spa/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
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
                            <label for="exampleInputEmail1">NIK</label>
                            <input name="nik" value="<?= $spa['nik']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <input name="no" value="<?= $spa['no']; ?>" type="hidden" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input name="nama" value="<?= $spa['nama']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" value="<?= $spa['email']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID PLN</label>
                            <input name="id_pln" value="<?= $spa['id_pln']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleInputEmail1">No.HP</label>
                            <input name="no_hp" value="<?= $spa['no_hp']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No.SPA</label>
                            <?= form_error('no_spa', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="no_spa" value="<?= set_value('no_spa'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">


                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No.VA</label>
                            <input name="no_va" value="<?= $spa['no_va']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long</label>
                                    <input name="long" value="<?= $spa['long']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lat</label>
                                    <input name="lat" value="<?= $spa['lat']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat</label>
                            <input name="koordinat" value="POINT(<?= $spa['long'];
                                                                    echo " ";
                                                                    echo $spa['lat'] ?>)" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="4"
                                placeholder="Enter ..."><?= $spa['alamat']; ?></textarea>
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
                            <label>ID FAT</label>
                            <select name="id_fat" class="form-control select2" style="width: 100%;">
                                <?php foreach ($fat as $x) : ?>
                                <?php if ($spa['fat'] == $x['no']) : ?>
                                <option name="id_fat" value="<?= $x['no']; ?>" selected>
                                    <?= $x['id_fat']; ?> (<?= $x['status_pembangunan'] ?>)
                                    <?php if ($x['port_idle'] != 0) {
                                                echo ' - idle : ', $x['port_idle'];
                                            } ?></option>
                                <?php else : ?>
                                <option name="id_fat" value="<?= $x['no']; ?>">
                                    <?= $x['id_fat']; ?> (<?= $x['status_pembangunan'] ?>)
                                    <?php if ($x['port_idle'] != 0) {
                                                echo ' - idle : ', $x['port_idle'];
                                            } ?></option>
                                <?php endif; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Port</label>
                                    <input name="port_fat" value="<?= $spa['port_fat']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jarak</label>
                                    <input name="jarak_fat" value="<?= $spa['jarak_fat']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Service</label>
                                    <select name="service" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <option value="ICONNET"
                                            <?php if ($spa['service'] === 'ICONNET') echo 'selected="selected"'; ?>
                                            name="bandwith">
                                            ICONNET
                                        </option>
                                        <option value="ICONNET BIZ"
                                            <?php if ($spa['service'] === 'ICONNET BIZ') echo 'selected="selected"'; ?>
                                            name="bandwith">ICONNET BIZ
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bandwith</label>
                                    <select name="bandwith" class="form-control select2" style="width: 100%;">
                                        <option value="">
                                            --Pilih--
                                        </option>
                                        <option value="5 Mbps"
                                            <?php if ($spa['bandwith'] === '5 Mbps') echo 'selected="selected"'; ?>
                                            name="bandwith">
                                            5 Mbps
                                        </option>
                                        <option value="10 Mbps"
                                            <?php if ($spa['bandwith'] === '10 Mbps') echo 'selected="selected"'; ?>
                                            name="bandwith">10 Mbps
                                        </option>
                                        <option value="20 Mbps"
                                            <?php if ($spa['bandwith'] === '20 Mbps') echo 'selected="selected"'; ?>
                                            name="bandwith">20 Mbps
                                        </option>
                                        <option value="50 Mbps"
                                            <?php if ($spa['bandwith'] === '50 Mbps') echo 'selected="selected"'; ?>
                                            name="bandwith">50 Mbps
                                        </option>
                                        <option value="100 Mbps"
                                            <?php if ($spa['bandwith'] === '100 Mbps') echo 'selected="selected"'; ?>
                                            name="bandwith">100 Mbps
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Biaya instalasi</label>
                            <input name="biaya_instalasi" value="<?= $spa['biaya_instalasi']; ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Paket Tambahan</label>
                            <input name="paket_tambahan" value="<?= $spa['paket_tambahan']; ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <!-- /.form-group -->
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-info btn-block btn-flat">Data Aktivasi</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">SID
                                <?= form_error('sid', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="sid" value="<?= $spa['id_pln']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SN ONT
                                        <?= form_error('sn_ont', '<small class="text-danger pl-1">', '</small>'); ?></label>
                                    <input name="sn_ont" value="<?= set_value('sn_ont'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SN STB</label>
                                    <input name="sn_stb" value="<?= set_value('sn_stb'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand</label>
                            <input name="brand" value="<?= $spa['brand']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Konektor ONT</label>
                                    <select name="jenis_konektor_ont" class="form-control select2" style="width: 100%;">
                                        <option value="" name="jenis_konektor_ont">
                                            --Pilih--
                                        </option>
                                        <option value="UPC"
                                            <?php if ($spa['jenis_konektor_ont'] === 'UPC') echo 'selected="selected"'; ?>
                                            name="jenis_konektor_ont">UPC
                                        </option>
                                        <option value="APC"
                                            <?php if ($spa['jenis_konektor_ont'] === 'APC') echo 'selected="selected"'; ?>
                                            name="jenis_konektor_ont">APC
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Kabel Dropcore</label>
                                    <select name="jenis_kabel_dropcore" class="form-control select2"
                                        style="width: 100%;">
                                        <option value="" name="jenis_kabel_dropcore">
                                            --Pilih--
                                        </option>
                                        <option value="UPC-UPC"
                                            <?php if ($spa['jenis_kabel_dropcore'] === 'UPC-UPC') echo 'selected="selected"'; ?>
                                            <?= set_select('jenis_kabel_dropcore', 'UPC-UPC'); ?>
                                            name="jenis_kabel_dropcore">
                                            UPC-UPC
                                        </option>
                                        <option value="APC-APC"
                                            <?php if ($spa['jenis_kabel_dropcore'] === 'APC-APC') echo 'selected="selected"'; ?>
                                            <?= set_select('jenis_kabel_dropcore', 'APC-APC'); ?>
                                            name="jenis_kabel_dropcore">
                                            APC-APC
                                        </option>
                                        <option value="APC-UPC(Hybrid)"
                                            <?php if ($spa['jenis_kabel_dropcore'] === 'APC-UPC(Hybrid)') echo 'selected="selected"'; ?>
                                            <?= set_select('jenis_kabel_dropcore', 'APC-UPC(Hybrid)'); ?>
                                            name="jenis_kabel_dropcore">APC-UPC(Hybrid)
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Panjang Kabel
                                        <?= form_error('panjang_kabel_dropcore', '<small class="text-danger pl-1">', '</small>'); ?></label>
                                    <input name="panjang_kabel_dropcore"
                                        value="<?= set_value('panjang_kabel_dropcore'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link Budget (dbm)</label>
                                    <input name="dbm" value="<?= $spa['dbm']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Instalatir (Mitra)</label>
                                    <select name="instalatir" class="form-control select2" style="width: 100%;">
                                        <?php foreach ($mitra as $x) : ?>
                                        <?php if ($spa['instalatir'] == $x['no']) : ?>
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
                                        <?= form_error('tanggal_instalasi', '<small class="text-danger pl-1">', '</small>'); ?></label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input name="tanggal_instalasi" value="<?= set_value('tanggal_instalasi'); ?>"
                                            type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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