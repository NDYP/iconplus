<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('users/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama lengkap</label>
                            <input name="nama" value="<?= $users['nama'] ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <input name="no" value="<?= $users['no'] ?>" type="hidden" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Whatsapp</label>
                                    <input name="wa" value="<?= $users['wa'] ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('wa', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telegram</label>
                                    <input name="telegram" value="<?= $users['telegram'] ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('telegram', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Username</label>
                                    <input name="username" value="<?= $users['username'] ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input name="password" value="<?= $users['password'] ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" value="<?= $users['email'] ?>" type="email" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mitra</label>
                            <select name="mitra" class="form-control select3" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($mitra as $x) : ?>
                                <?php if ($users['no_mitra'] == $x['no']) : ?>
                                <option name="mitra" value="<?= $x['no']; ?>" selected>
                                    <?= $x['nama']; ?></option>
                                <?php else : ?>
                                <option name="mitra" value="<?= $x['no']; ?>"><?= $x['nama']; ?></option>
                                <?php endif; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Akses</label>
                            <select name="akses" class="form-control select2" style="width: 100%;">
                                <option value="" name="akses">
                                    --Pilih--
                                </option>
                                <option <?php if ($users['akses'] === 'Sales Internal') echo 'selected="selected"'; ?>
                                    value="Sales Internal" <?= set_select('akses', 'Sales Internal'); ?> name="akses">
                                    Sales Internal
                                </option>
                                <option <?php if ($users['akses'] === 'Sales Eksternal') echo 'selected="selected"'; ?>
                                    value="Sales Eksternal" <?= set_select('akses', 'Sales Eksternal'); ?> name="akses">
                                    Sales Eksternal
                                </option>
                                <option <?php if ($users['akses'] === 'Aktivasi Retail') echo 'selected="selected"'; ?>
                                    value="Aktivasi Retail" <?= set_select('akses', 'Aktivasi Retail'); ?> name="akses">
                                    Aktivasi Retail
                                </option>
                                <option <?php if ($users['akses'] === 'Asset Retail') echo 'selected="selected"'; ?>
                                    value="Asset Retail" <?= set_select('akses', 'Asset Retail'); ?> name="akses">
                                    Asset
                                    Retail
                                </option>
                                <option <?php if ($users['akses'] === 'HAR') echo 'selected="selected"'; ?> value="HAR"
                                    <?= set_select('akses', 'HAR'); ?> name="akses">
                                    HAR
                                </option>
                            </select>
                            <?= form_error('akses', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="col-sm-12">
                            <?php if ($users['foto'] == NULL) : ?>
                            <img class="profile-user-img img-responsive left"
                                src="<?= base_url('assets/foto/profil.png'); ?>" alt=""
                                style="width: auto;max-height: 250px;max-width: 200px; vertical-align: left;">
                            <?php else : ?>
                            <img class="profile-user-img img-responsive left"
                                src="<?= base_url('assets/foto/user/' . $users['foto']) ?>"
                                style="width: auto;max-height: 250px;max-width: 200px; vertical-align: left;">
                            <?php endif; ?>
                        </div>
                        <br>
                        <p class=" text-red text-center"><b>*Kosongkan jika tidak ingin diubah*</b>
                        </p>
                        <div class="col-sm-12">
                            <input class="form-control input-sm" type="file" class="" id="file" name="foto">
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