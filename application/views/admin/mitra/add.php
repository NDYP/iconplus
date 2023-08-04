<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('mitra/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="nama" type="text" value="<?= set_value('nama'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mitra</label>
                            <select name="mitra" class="form-control select3" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <option value="IKR" <?= set_select('mitra', 'IKR'); ?> name="mitra">IKR
                                </option>
                                <option value="FEEDER" <?= set_select('mitra', 'FEEDER'); ?> name="mitra">FEEDER
                                </option>
                            </select>
                            <?= form_error('mitra', '<small class="text-danger pl-1">', '</small>'); ?>
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