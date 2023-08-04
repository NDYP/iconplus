<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a class="btn btn-xs bg-blue" href="<?= base_url('cluster/index') ?>"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('cluster/ubah') ?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Cluster</label>
                        <input value="<?= $cluster['no'] ?>" name="no" type="hidden" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input value="<?= $cluster['nama_cluster'] ?>" name="nama_cluster" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor PA
                            <?= form_error('no_pa', '<small class="text-danger pl-1">', '</small>'); ?></label>
                        <textarea name="no_pa" class="form-control" rows="4"
                            placeholder="Enter ..."><?= $cluster['no_pa']; ?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor IO</label>
                        <input value="<?= $cluster['no_io'] ?>" name="no_io" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal PPI</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input value="<?= $cluster['ppi_date'] ?>" type="text" name="ppi_date"
                                class="form-control pull-right" id="datepicker">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Target PPI</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input value="<?= $cluster['target_ppi_date'] ?>" name="target_ppi_date" type="text"
                                class="form-control pull-right" id="datepicker1">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Instalatir</label>
                        <select name="instalatir" class="form-control select3" style="width: 100%;">
                            <option value="">
                                --Pilih--
                            </option>
                            <?php foreach ($mitra as $x) : ?>
                            <?php if ($cluster['instalatir'] == $x['no']) : ?>
                            <option name="instalatir" value="<?= $x['no']; ?>" selected>
                                <?= $x['nama']; ?></option>
                            <?php else : ?>
                            <option name="instalatir" value="<?= $x['no']; ?>"><?= $x['nama']; ?></option>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <div class="box-footer">
            <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
        </div>
        <?= form_close(); ?>
        <!-- /.box -->
    </div>
</section>
<!-- /.content -->