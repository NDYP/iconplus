<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('spa/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="post">
            <div class="box-body" data-select2-id="14">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIK
                                <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="nik" value="<?= $spa['nik']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <input name="no" value="<?= $spa['no']; ?>" type="hidden" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lengkap
                                <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="nama" value="<?= $spa['nama']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID PLN</label>
                            <input name="id_pln" value="<?= $spa['id_pln']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan Cancel
                                <?= form_error('note', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <textarea name="note" class="form-control" rows="4"
                                placeholder="Enter ..."><?= $spa['note']; ?></textarea>
                        </div>
                        <!-- /.form-group -->
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">No.HP
                                <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="no_hp" value="<?= $spa['no_hp']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email
                                <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="email" value="<?= $spa['email']; ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat
                                <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <textarea name="alamat" class="form-control" rows="5"
                                placeholder="Enter ..."><?= $spa['alamat']; ?></textarea>
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
                                    <input name="lat" value="<?= $spa['lat']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long
                                        <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?></label>
                                    <input name="long" value="<?= $spa['long']; ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat
                                <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?></label>
                            <input name="koordinat" value="POINT(<?= $spa['long'];
                                                                    echo ' ';
                                                                    echo $spa['lat']; ?>)" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        </div>

                        <div class="form-group">
                            <label>ID FAT</label>
                            <select name="id_fat" class="form-control select2" style="width: 100%;">
                                <?php foreach ($fat as $x) : ?>
                                <?php if ($spa['fat'] == $x['no']) : ?>
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
                        </div>
                        <!-- /.form-group -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Port FAT</label>
                                    <input name="port_fat" value="<?= $spa['port_fat']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jarak (meter)</label>
                                    <input name="jarak_fat" value="<?= $spa['jarak_fat']; ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
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