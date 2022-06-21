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
                            <input name="nama" value="<?= set_value('nama'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Whatsapp</label>
                                    <input name="wa" value="<?= set_value('wa'); ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('wa', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telegram</label>
                                    <input name="telegram" value="<?= set_value('telegram'); ?>" type="text"
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
                                    <input name="username" value="<?= set_value('username'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input name="password" value="<?= set_value('password'); ?>" type="password"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" value="<?= set_value('email'); ?>" type="email" class="form-control"
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
                                <option value=<?= $x['no']; ?><?= set_select('mitra', $x['no']); ?> name="mitra">
                                    <?= $x['nama']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('mitra', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Akses</label>
                            <select name="akses" class="form-control select2" style="width: 100%;">
                                <option value="" name="akses">
                                    --Pilih--
                                </option>
                                <option value="Sales Internal" <?= set_select('akses', 'Korporat'); ?> name="akses">
                                    Korporat
                                </option>
                                <option value="Sales Internal" <?= set_select('akses', 'Sales Internal'); ?>
                                    name="akses">Sales Internal
                                </option>
                                <option value="Sales Eksternal" <?= set_select('akses', 'Sales Eksternal'); ?>
                                    name="akses">Sales Eksternal
                                </option>
                                <option value="Aktivasi Retail" <?= set_select('akses', 'Aktivasi Retail'); ?>
                                    name="akses">
                                    Aktivasi Retail
                                </option>
                                <option value="Asset Retail" <?= set_select('akses', 'Asset Retail'); ?> name="akses">
                                    Asset
                                    Retail
                                </option>
                                <option value="HAR" <?= set_select('akses', 'HAR'); ?> name="akses">
                                    HAR
                                </option>
                            </select>
                            <?= form_error('akses', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto</label>
                            <?= form_upload('foto'); ?>
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