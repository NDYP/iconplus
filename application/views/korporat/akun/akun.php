<!-- Main content -->
<section class="content">
    <div class="row">
        <form enctype="multipart/form-data" role="form" action="<?= base_url('korporat/akun/ubah'); ?>" method="post"
            class="form-horizontal">
            <div class="col-md-4">
                <div class="box ">
                    <div class="box-body box-profile">
                        <div class="col-sm-12">
                            <?php if ($this->session->userdata('foto') == NULL) : ?>
                            <img class="profile-user-img img-responsive"
                                src="<?= base_url('assets/foto/profil.png'); ?>" alt="Logo"
                                style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                            <?php else : ?>
                            <img class="profile-user-img img-responsive"
                                src="<?= base_url('assets/foto/user/' . $this->session->userdata('foto')) ?>"
                                style="width: auto;max-height: 250px;max-width: 200px; vertical-align: middle;">
                            <?php endif; ?>
                        </div>
                        <br>
                        <p class=" text-red text-center"><b>*Kosongkan jika tidak ingin diubah*</b>
                        </p>
                        <div class="col-sm-12">
                            <input class="form-control input-sm" type="file" class="" id="file" name="foto">
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (left) -->
            <div class="col-md-8">
                <!-- general form elements -->
                <!-- /.box -->
                <div class="box ">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="">Nama Lengkap</label>
                                <input name="nama" value="<?= $this->session->userdata('nama'); ?>"
                                    class="form-control input-sm">
                            </div>
                            <div class="col-xs-4">
                                <label for="">Username</label>
                                <input name="no" value="<?= $this->session->userdata('no') ?>" type="hidden"
                                    class="form-control input-sm">
                                <input name="username" value="<?= $this->session->userdata('username'); ?>"
                                    class="form-control input-sm" readonly>
                                <input name="akses" value="<?= $this->session->userdata('akses'); ?>"
                                    class="form-control input-sm" type="hidden">
                            </div>
                            <div class="col-xs-4">
                                <label for="">Password</label>
                                <input name="password" value="<?= $this->session->userdata('password') ?>" type="text"
                                    class="form-control input-sm">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="">WA</label>
                                <input name="wa" value="<?= $this->session->userdata('wa'); ?>"
                                    class="form-control input-sm">
                            </div>
                            <div class="col-xs-4">
                                <label for="">Telegram</label>
                                <input name="telegram" value="<?= $this->session->userdata('telegram'); ?>"
                                    class="form-control input-sm">
                            </div>
                            <div class="col-xs-4">
                                <label for="">Email</label>
                                <input name="email" value="<?= $this->session->userdata('email') ?>" type="text"
                                    class="form-control input-sm">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn bg-blue btn-xs"><i class="fa fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </form>
    </div>
    <!-- /.row --
</section>