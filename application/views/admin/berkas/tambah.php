<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('berkas/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama File</label>
                            <input name="nama" value="<?= set_value('nama'); ?>" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <input name="cluster" value="<?= $cluster['no']; ?>" type="hidden" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">File PDF</label>
                            <input name="file" type="file" class="form-control" id="exampleInputEmail1"
                                placeholder="isi ...">
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