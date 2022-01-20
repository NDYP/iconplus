<!-- Main content -->
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <a class="btn btn-xs bg-blue" href="<?= base_url('cluster/index') ?>"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Cluster</label>
                            <input value="<?= set_value('nama_cluster'); ?>" name="nama_cluster" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('nama_cluster', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor PA</label>
                            <input value="<?= set_value('no_pa'); ?>" name="no_pa" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('no_pa', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor IO</label>
                            <input value="<?= set_value('no_io'); ?>" name="no_io" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('no_io', '<small class="text-danger pl-1">', '</small>'); ?>
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
                                <input value="<?= set_value('ppi_date'); ?>" type="text" name="ppi_date"
                                    class="form-control pull-right" id="datepicker">
                            </div>
                            <?= form_error('ppi_date', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Target PPI</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input value="<?= set_value('target_ppi_date'); ?>" name="target_ppi_date" type="text"
                                    class="form-control pull-right" id="datepicker1">
                            </div>
                            <?= form_error('target_ppi_date', '<small class="text-danger pl-1">', '</small>'); ?>
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
                                <option value=<?= $x['no']; ?><?= set_select('instalatir', $x['no']); ?>
                                    name="instalatir">
                                    <?= $x['nama']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('instalatir', '<small class="text-danger pl-1">', '</small>'); ?>
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