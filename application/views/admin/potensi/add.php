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

                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID PLN</label>
                            <input name="id_pln" value="<?= set_value('id_pln'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIK</label>
                            <input name="nik" value="<?= set_value('nik'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="">
                            <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input name="nama" value="<?= set_value('nama'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="">
                            <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No.HP</label>
                            <input name="no_hp" value="<?= set_value('no_hp'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="">
                            <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Facebook</label>
                                    <input name="facebook" value="<?= set_value('facebook'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Instagram</label>
                                    <input name="instagram" value="<?= set_value('instagram'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="">
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" value="<?= set_value('email'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="">
                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea name="alamat" class="form-control" value="<?= set_value('alamat'); ?>" rows="5"
                                placeholder=""></textarea>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lat</label>
                                    <input name="lat" value="<?= set_value('lat'); ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="">
                                    <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long</label>
                                    <input name="long" value="<?= set_value('long'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="">
                                    <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>ID FAT</label>
                            <select name="id_fat" class="form-control select2" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <option value="" <?= set_select('id_fat', ''); ?>>
                                    Belum diketahui
                                </option>
                                <?php foreach ($fat as $x) : ?>
                                <option value=<?= $x['no']; ?><?= set_select('id_fat', $x['no']); ?> name="id_fat">
                                    <?= $x['id_fat']; ?> (<?= $x['status_pembangunan'] ?>)
                                    <?php if ($x['port_idle'] != 0) {
                                            echo ' - idle : ', $x['port_idle'];
                                        } ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Port FAT</label>
                            <input name="port_fat" value="<?= set_value('port_fat'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jarak FAT</label>
                            <input name="jarak_fat" class="form-control" value="<?= set_value('jarak_fat'); ?>" rows="4"
                                placeholder=""></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat</label>
                            <input name="koordinat" value="<?= set_value('koordinat'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
                            <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
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