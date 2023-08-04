<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('potensi/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="post">
            <div class="box-body" data-select2-id="14">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mitra/PIC Marketer</label>
                            <input name="marketer" value="<?= $potensi['marketer']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ..." disabled>
                            <input name="marketer" value="<?= $potensi['marketer']; ?>" type="hidden"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>
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
                            <input name="note" value="<?= $potensi['id_pln']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <?php if ($potensi['status'] == 'SPA Cancel') : ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan Cancel
                                <?= form_error('note', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <textarea name="note" class="form-control" rows="4"
                                placeholder="Enter ..."><?= $potensi['note']; ?></textarea>
                        </div>
                        <?php endif; ?>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat
                                <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <textarea name="alamat" class="form-control" rows="4"
                                placeholder="Enter ..."><?= $potensi['alamat']; ?></textarea>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
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

                        <!-- <div class="form-group">
                            <label>ID FAT</label>
                            <select name="id_fat" class="form-control select2" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <option value="" <?= set_select('id_fat', ''); ?>>
                                    Belum diketahui
                                </option>
                                <?php foreach ($fat as $x) : ?>
                                <?php if ($potensi['id_fat'] == $x['no']) : ?>

                                <option name="id_fat" value="<?= $x['no']; ?>" selected>
                                    <?= $x['id_fat']; ?> (<?= $x['status_pembangunan'] ?>)
                                    <?php if ($x['port_idle'] != 0) {
                                            echo ' - idle : ', $x['port_idle'];
                                        } ?>
                                </option>
                                <?php else : ?>

                                <option name="id_fat" value="<?= $x['no']; ?>"><?= $x['id_fat']; ?>
                                    (<?= $x['status_pembangunan'] ?>)
                                    <?php if ($x['port_idle'] != 0) {
                                            echo ' - idle : ', $x['port_idle'];
                                        } ?></option>
                                <?php endif; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->
                        <!-- /.form-group -->
                        <!-- <div class="row">
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

                        </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select id="x" name="potensi_status" class="form-control select2"
                                        style="width: 100%;">
                                        <option name="potensi_status" value="">Tidak Ada</option>
                                        <?php foreach ($status as $x) : ?>
                                        <option name="potensi_status"
                                            <?= $selected['id_potensi_status'] == $x['no'] ? 'selected="selected"' : '' ?>
                                            value="<?= $x['no']; ?>">
                                            <?= $x['tag']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Callback</label>
                                    <select id="y" name="potensi_callback" class="form-control select2"
                                        style="width: 100%;">
                                        <option name="potensi_callback" value="">Tidak Ada</option>

                                        <?php foreach ($callback as $x) : ?>
                                        <option name="potensi_callback"
                                            <?= $selected['id_potensi_callback'] == $x['no'] ? 'selected="selected"' : '' ?>
                                            value="<?= $x['no']; ?>" class="<?= $x['potensi_status']; ?>">
                                            <?= $x['callback']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
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
        </form>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->