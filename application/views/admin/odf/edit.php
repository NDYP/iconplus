<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('odf/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('odf/ubah') ?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama ODF</label>
                        <input name="nama_odf" value="<?= $odf['nama_odf'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input name="no" value="<?= $odf['no'] ?>" type="hidden" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('nama_odf', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kapasitas Port Max</label>
                        <input name="kapasitas_port_max" value="<?= $odf['kapasitas_port_max'] ?>" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('kapasitas_port_max', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Rack ODF</label>
                        <input name="rack_odf" value="<?= $odf['rack_odf'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
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
                                <input name="long" value="<?= $odf['long']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lat</label>
                                <input name="lat" value="<?= $odf['lat']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Koordinat</label>
                        <input name="koordinat" value="POINT(<?= $odf['long'];
                                                                echo " ";
                                                                echo $odf['lat']; ?>)" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="POINT(LONG[spasi]LAT)">
                        <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Instalatir</label>
                        <select name="instalatir" class="form-control select3" style="width: 100%;">
                            <?php foreach ($mitra as $x) : ?>
                            <?php if ($odf['instalatir'] == $x['no']) : ?>
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

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hostname OLT</label>
                        <select name="hostname_olt" class="form-control select3" style="width: 100%;">
                            <?php foreach ($olt as $x) : ?>
                            <?php if ($odf['hostname_olt'] == $x['no']) : ?>
                            <option name="hostname_olt" value="<?= $x['no']; ?>" selected>
                                <?= $x['hostname']; ?></option>
                            <?php else : ?>
                            <option name="hostname_olt" value="<?= $x['no']; ?>"><?= $x['hostname']; ?></option>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Port OLT</label>
                        <input name="port_olt" value="<?= $odf['port_olt'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
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
                            <input name="tanggal_instalasi" value="<?= $odf['tanggal_instalasi'] ?>" type="text"
                                class="form-control pull-right" id="datepicker">
                            <?= form_error('tanggal_instalasi', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Cluster</label>
                        <select name="cluster" class="form-control select3" style="width: 100%;">
                            <?php foreach ($cluster as $x) : ?>
                            <?php if ($odf['cluster'] == $x['no']) : ?>
                            <option name="cluster" value="<?= $x['no']; ?>" selected>
                                <?= $x['nama_cluster']; ?></option>
                            <?php else : ?>
                            <option name="cluster" value="<?= $x['no']; ?>"><?= $x['nama_cluster']; ?>
                            </option>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- /.form-group -->
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
    </div>
    <!-- /.box-body -->
    <?= form_close(); ?>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->