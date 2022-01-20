<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('mitra/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('mitra/ubah') ?>
        <div class="box-body">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="nama" type="text" value="<?= $mitra['nama'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input name="no" type="hidden" value="<?= $mitra['no'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mitra</label>
                        <select name="mitra" class="form-control select3" style="width: 100%;">
                            <option name="mitra" value="IKR"
                                <?php if ($mitra['mitra'] === 'IKR' || $mitra['mitra'] === 'IKR') echo 'selected="selected"'; ?>>
                                IKR</option>
                            <option name="mitra" value="FEEDER"
                                <?php if ($mitra['mitra'] === 'FEEDER' || $mitra['mitra'] === 'Feeder') echo 'selected="selected"'; ?>>
                                FEEDER</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
        </div>
        <?= form_close(); ?>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->