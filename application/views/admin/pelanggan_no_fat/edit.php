<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('pelanggan/index') ?>" class="btn btn-xs bg-blue"><span
                    class="fa fa-arrow-left"></span> Kembali</a>
        </div>
        <?= form_open_multipart('pelanggan_no_fat/ubah') ?>
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
                        <input name="nik" value="<?= $pelanggan['nik']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input name="no" value="<?= $pelanggan['no']; ?>" type="hidden" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input name="nama" value="<?= $pelanggan['nama']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" value="<?= $pelanggan['email']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID PLN</label>
                        <input name="id_pln" value="<?= $pelanggan['id_pln']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                    <!-- /.form-group -->
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">

                    <div class="form-group">
                        <label for="exampleInputEmail1">No.HP</label>
                        <input name="no_hp" value="<?= $pelanggan['no_hp']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.VA</label>
                        <input name="no_va" value="<?= $pelanggan['no_va']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('no_va', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Koordinat</label>
                        <input name="koordinat" value="POINT(<?= $pelanggan['long'];
                                                                echo " ";
                                                                echo $pelanggan['lat']; ?>)" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lat</label>
                                <input name="lat" value="<?= $pelanggan['lat']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                                <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Long</label>
                                <input name="long" value="<?= $pelanggan['long']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                                <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="4"
                            placeholder="Enter ..."><?= $pelanggan['alamat']; ?></textarea>
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
                            <option value="">
                                --Pilih--
                            </option>
                            <option value="ICONNET"
                                <?php if ($pelanggan['service'] === 'ICONNET') echo 'selected="selected"'; ?>
                                name="bandwith">ICONNET
                            </option>
                            <option value="ICONNET Biz"
                                <?php if ($pelanggan['service'] === 'ICONNET Biz') echo 'selected="selected"'; ?>
                                name="bandwith">ICONNET Biz
                            </option>
                        </select>
                        <?= form_error('service', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Biaya instalasi</label>
                        <input name="biaya_instalasi" value="<?= $pelanggan['biaya_instalasi']; ?>" type="text" class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('biaya_instalasi', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.SPA</label>
                        <input name="no_spa" value="<?= $pelanggan['no_spa']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('no_spa', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SID</label>
                        <input name="sid" value="<?= $pelanggan['sid']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('sid', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SN ONT</label>
                        <input name="sn_ont" value="<?= $pelanggan['sn_ont']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('sn_ont', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>ID FAT</label>
                        <select name="id_fat" class="form-control select2" style="width: 100%;">
                            <?php foreach ($fat as $x) : ?>
                            <?php if ($pelanggan['fat'] == $x['no']) : ?>
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
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Bandwith</label>
                        <select name="bandwith" class="form-control select2" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <option value="5 MBPS"
                                <?php if ($pelanggan['bandwith'] === '5 MBPS') echo 'selected="selected"'; ?>
                                name="bandwith">5 MBPS
                            </option>
                            <option value="10 MBPS"
                                <?php if ($pelanggan['bandwith'] === '10 MBPS') echo 'selected="selected"'; ?>
                                name="bandwith">10 MBPS
                            </option>
                            <option value="20 MBPS"
                                <?php if ($pelanggan['bandwith'] === '20 MBPS') echo 'selected="selected"'; ?>
                                name="bandwith">20 MBPS
                            </option>
                            <option value="50 MBPS"
                                <?php if ($pelanggan['bandwith'] === '50 MBPS') echo 'selected="selected"'; ?>
                                name="bandwith">50 MBPS
                            </option>
                            <option value="100 MBPS"
                                <?php if ($pelanggan['bandwith'] === '100 MBPS') echo 'selected="selected"'; ?>
                                name="bandwith">100 MBPS
                            </option>
                        </select>
                        <?= form_error('bandwith', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <input name="brand" value="<?= $pelanggan['brand']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('brand', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Konektor ONT</label>
                        <select name="jenis_konektor_ont" class="form-control select2" style="width: 100%;">
                            <option value="" name="jenis_konektor_ont">
                                --Pilih--
                            </option>
                            <option value="UPC"
                                <?php if ($pelanggan['jenis_konektor_ont'] === 'UPC') echo 'selected="selected"'; ?>
                                name="jenis_konektor_ont">UPC
                            </option>
                            <option value="APC"
                                <?php if ($pelanggan['jenis_konektor_ont'] === 'APC') echo 'selected="selected"'; ?>
                                name="jenis_konektor_ont">APC
                            </option>
                        </select>
                        <?= form_error('jenis_konektor_ont', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">SN STB</label>
                        <input name="sn_stb" value="<?= $pelanggan['sn_stb']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('sn_stb', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div> -->
                    <div class="form-group">
                        <label>Instalatir (Mitra)</label>
                        <select name="instalatir" class="form-control select2" style="width: 100%;">
                            <?php foreach ($mitra as $x) : ?>
                            <?php if ($pelanggan['instalatir'] == $x['no']) : ?>
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">Port FAT</label>
                        <input name="port_fat" value="<?= $pelanggan['port_fat']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('port_fat', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Paket Tambahan</label>
                        <input name="paket_tambahan" value="<?= $pelanggan['paket_tambahan']; ?>" type="text" class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kabel Dropcore</label>
                        <select name="jenis_kabel_dropcore" class="form-control select2" style="width: 100%;">
                            <option value="" name="jenis_kabel_dropcore">
                                --Pilih--
                            </option>
                            <option value="UPC-UPC" <?php if ($pelanggan['jenis_kabel_dropcore'] === 'UPC-UPC') echo 'selected="selected"'; ?> <?= set_select('jenis_kabel_dropcore', 'UPC-UPC'); ?> name="jenis_kabel_dropcore">
                                UPC-UPC
                            </option>
                            <option value="APC-APC" <?php if ($pelanggan['jenis_kabel_dropcore'] === 'APC-APC') echo 'selected="selected"'; ?> <?= set_select('jenis_kabel_dropcore', 'APC-APC'); ?> name="jenis_kabel_dropcore">
                                APC-APC
                            </option>
                            <option value="APC-UPC(Hybrid)" <?php if ($pelanggan['jenis_kabel_dropcore'] === 'APC-UPC(Hybrid)') echo 'selected="selected"'; ?> <?= set_select('jenis_kabel_dropcore', 'APC-UPC(Hybrid)'); ?> name="jenis_kabel_dropcore">APC-UPC(Hybrid)
                            </option>
                            <?= form_error('jenis_kabel_dropcore', '<small class="text-danger pl-1">', '</small>'); ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Panjang Kabel</label>
                        <input name="panjang_kabel_dropcore" value="<?= $pelanggan['panjang_kabel_dropcore']; ?>"
                            type="text" class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('panjang_kabel_dropcore', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Link Budget (dbm)</label>
                        <input name="dbm" value="<?= $pelanggan['dbm']; ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Instalasi</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input name="tanggal_instalasi"
                                value="<?= date('d-m-Y', strtotime($pelanggan['tanggal_instalasi'])); ?>" type="text"
                                class="form-control pull-right" id="datepicker">
                        </div>
                        <?= form_error('tanggal_instalasi', '<small class="text-danger pl-1">', '</small>'); ?>
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