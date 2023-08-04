<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('korporat/presentasi/index') ?>" class="btn btn-social btn-sm bg-blue"><span
                            class="fa fa-list"></span>
                        Kembali</a>
                    <br>
                    <h3 style="text-align : center"> Keterangan * : Tidak boleh kosong</h3>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Judul *</label>
                                    <input name="judul" value="<?= set_value('judul'); ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <input name="no" value="<?= $presentasi['no']; ?>" type="hidden"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('judul', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Berkas</label>
                                    <input accept=".pdf" name="berkas" value="<?= set_value('berkas'); ?>" type="file"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('berkas', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button class="btn btn-social btn-sm bg-blue btn"><span class="fa fa-save"></span>
                            Simpan</button>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
<!-- /.content -->