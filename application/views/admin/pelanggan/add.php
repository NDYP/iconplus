<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('pelanggan/index') ?>" class="btn btn-xs bg-blue"><span
                    class="fa fa-arrow-left"></span> Kembali</a>
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
                            <input name="nik" value="<?= set_value('nik'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input name="nama" value="<?= set_value('nama'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" value="<?= set_value('email'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID PLN</label>
                            <input name="id_pln" value="<?= set_value('id_pln'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleInputEmail1">No.HP</label>
                            <input name="no_hp" value="<?= set_value('no_hp'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No.VA</label>
                            <input name="no_va" value="<?= set_value('no_va'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat</label>
                            <input name="koordinat" value="<?= set_value('koordinat'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
                            <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lat</label>
                                    <input name="lat" value="<?= set_value('lat'); ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long</label>
                                    <input name="long" value="<?= set_value('long'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea name="alamat" class="form-control" value="<?= set_value('alamat'); ?>" rows="4"
                                placeholder="Enter ..."></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>

                        <!-- /.form-group -->
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-info btn-block btn-flat">Data Konektivitas</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Service</label>
                            <select name="service" class="form-control select2" style="width: 100%;">
                                <option value="" name="service">
                                    --Pilih--
                                </option>
                                <option value="ICONNET" <?= set_select('service', 'ICONNET'); ?> name="service">
                                    ICONNET
                                </option>
                                <option value="ICONNET BIZ" <?= set_select('service', 'ICONNET BIZ'); ?> name="service">
                                    ICONNET BIZ
                                </option>
                            </select>
                            <?= form_error('service', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Biaya instalasi</label>
                            <input name="biaya_instalasi" value="<?= set_value('biaya_instalasi'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No.SPA</label>
                            <input name="no_spa" value="<?= set_value('no_spa'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('no_spa', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SID</label>
                            <input name="sid" value="<?= set_value('sid'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SN ONT</label>
                            <input name="sn_ont" value="<?= set_value('sn_ont'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>ID FAT</label>
                            <select name="id_fat" class="form-control select2" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($fat as $x) : ?>
                                <option value=<?= $x['no']; ?><?= set_select('id_fat', $x['no']); ?> name="id_fat">
                                    <?= $x['id_fat']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_fat', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bandwith</label>
                            <select name="bandwith" class="form-control select2" style="width: 100%;">
                                <option value="" name="bandwith">
                                    --Pilih--
                                </option>
                                <option value="5 Mbps" <?= set_select('bandwith', '5 Mbps'); ?> name="bandwith">5 Mbps
                                </option>
                                <option value="10 Mbps" <?= set_select('bandwith', '10 Mbps'); ?> name="bandwith">10
                                    Mbps
                                </option>
                                <option value="20 Mbps" <?= set_select('bandwith', '20 Mbps'); ?> name="bandwith">20
                                    Mbps
                                </option>
                                <option value="50 Mbps" <?= set_select('bandwith', '50 Mbps'); ?> name="bandwith">50
                                    Mbps
                                </option>
                                <option value="100 Mbps" <?= set_select('bandwith', '100 Mbps'); ?> name="bandwith">100
                                    Mbps
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand</label>
                            <input name="brand" value="<?= set_value('brand'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Konektor ONT</label>
                            <select name="jenis_konektor_ont" class="form-control select2" style="width: 100%;">
                                <option value="" name="jenis_konektor_ont">
                                    --Pilih--
                                </option>
                                <option value="UPC" <?= set_select('jenis_konektor_ont', 'UPC'); ?>
                                    name="jenis_konektor_ont">UPC
                                </option>
                                <option value="APC" <?= set_select('jenis_konektor_ont', 'APC'); ?>
                                    name="jenis_konektor_ont">APC
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SN STB</label>
                            <input name="sn_stb" value="<?= set_value('sn_stb'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label>Instalatir (Mitra)</label>
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
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Port FAT</label>
                            <input name="port_fat" value="<?= set_value('port_fat'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Paket Tambahan</label>
                            <input class="form-control" name="paket_tambahan"
                                value="<?= set_value('paket_tambahan'); ?>" type="text">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Kabel Dropcore</label>
                            <select name="jenis_kabel_dropcore" class="form-control select2" style="width: 100%;">
                                <option value="" name="jenis_kabel_dropcore">
                                    --Pilih--
                                </option>
                                <option value="UPC-UPC" <?= set_select('jenis_kabel_dropcore', 'UPC-UPC'); ?>
                                    name="jenis_kabel_dropcore">UPC-UPC
                                </option>
                                <option value="APC-APC" <?= set_select('jenis_kabel_dropcore', 'APC-APC'); ?>
                                    name="jenis_kabel_dropcore">APC-APC
                                </option>
                                <option value="APC-UPC(Hybrid)"
                                    <?= set_select('jenis_kabel_dropcore', 'APC-UPC(Hybrid)'); ?>
                                    name="jenis_kabel_dropcore">APC-UPC(Hybrid)
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Panjang Kabel</label>
                            <input name="panjang_kabel_dropcore" value="<?= set_value('panjang_kabel_dropcore'); ?>"
                                type="text" class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Link Budget (dbm)</label>
                            <input name="dbm" value="<?= set_value('dbm'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Instalasi</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="tanggal_instalasi" value="<?= set_value('tanggal_instalasi'); ?>"
                                    type="text" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <!-- /.form-group -->
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