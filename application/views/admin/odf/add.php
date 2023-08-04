<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('odf/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <form action="" method="POST">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama ODF</label>
                            <input name="nama_odf" value="<?= set_value('nama_odf'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('nama_odf', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kapasitas Port Max</label>
                            <input name="kapasitas_port_max" value="<?= set_value('kapasitas_port_max'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('kapasitas_port_max', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rack ODF</label>
                            <input name="rack_odf" value="<?= set_value('rack_odf'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('rack_odf', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Long</label>
                                    <input name="long" value="<?= set_value('long'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lat</label>
                                    <input name="lat" value="<?= set_value('lat'); ?>" type="text" class="form-control"
                                        id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Koordinat</label>
                            <input name="koordinat" value="<?= set_value('koordinat'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
                            <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                        <!-- /.form-group -->
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hostname OLT</label>
                            <select name="hostname_olt" class="form-control select3" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($olt as $x) : ?>
                                <option value=<?= $x['no']; ?><?= set_select('hostname_olt', $x['no']); ?>
                                    name="hostname_olt">
                                    <?= $x['hostname']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('hostname_olt', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Port OLT</label>
                            <input name="port_olt" value="<?= set_value('port_olt'); ?>" type="text"
                                class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                            <?= form_error('port_olt', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Instalasi</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="tanggal_instalasi" value="<?= set_value('tanggal_instalasi'); ?>"
                                    type="text" class="form-control pull-right" id="datepicker">
                            </div>
                            <?= form_error('tanggal_instalasi', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cluster</label>
                            <select name="cluster" class="form-control select3" style="width: 100%;">
                                <option value="">
                                    --Pilih--
                                </option>
                                <?php foreach ($cluster as $x) : ?>
                                <option value=<?= $x['no']; ?><?= set_select('cluster', $x['no']); ?>>
                                    <?= $x['nama_cluster']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- /.form-group -->
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