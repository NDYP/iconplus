<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('korporat/customer/index') ?>" class="btn btn-social btn-sm bg-blue"><span
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
                                    <label for="">Nama *</label>
                                    <input name="nama" value="<?= set_value('nama'); ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Sektor</label>
                                <select name="segment" class="form-control select2" style="width: 100%;">
                                    <option value="" <?= set_select('segment', 'Pilih'); ?>>
                                        --Pilih--
                                    </option>
                                    <option value="Banking and finance"
                                        <?= set_select('segment', 'Banking and finance'); ?>>
                                        Banking and finance
                                    </option>
                                    <option value="Mining" <?= set_select('segment', 'Mining'); ?>>
                                        Mining
                                    </option>
                                    <option value="Energy and utility"
                                        <?= set_select('segment', 'Energy and utility'); ?>>
                                        Energy and utility
                                    </option>
                                    <option value="Government" <?= set_select('segment', 'Government'); ?>>
                                        Government
                                    </option>
                                    <option value="Hospitality" <?= set_select('segment', 'Hospitality'); ?>>
                                        Hospitality
                                    </option>
                                    <option value="Telco operator" <?= set_select('segment', 'Telco operator'); ?>>
                                        Telco operator
                                    </option>
                                    <option value="Agrobisnis" <?= set_select('segment', 'Agrobisnis'); ?>>
                                        Agrobisnis
                                    </option>
                                </select>
                                <?= form_error('segment', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Afiliasi/Group/Dll</label>
                                    <input name="afiliasi" value="<?= set_value('afiliasi'); ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('afiliasi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat *</label>
                                    <input name="alamat" value="<?= set_value('alamat'); ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Long *</label>
                                            <input name="long" value="<?= set_value('long'); ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Lat *</label>
                                            <input name="lat" value="<?= set_value('lat'); ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Koordinat *</label>
                                    <input name="koordinat" value="<?= set_value('koordinat'); ?>" type="text"
                                        class="form-control" id="" placeholder="POINT(long spasi lat)">
                                    <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pelanggan PLN *</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>
                                                <input type="radio" name="pelanggan_pln" class="minimal" checked
                                                    value="Ya">
                                            </label>
                                            Ya
                                        </div>
                                        <div class="col-md-4">
                                            <label>
                                                <input type="radio" name="pelanggan_pln" class="minimal" value="Tidak">
                                            </label> Tidak
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="">Tanggal Kunjungan *</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="tanggal" class="form-control pull-right" id="datepicker">
                                </div>
                                <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>

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