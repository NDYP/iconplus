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
                                    <input name="nama" value="<?= $customer['nama']; ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <input name="no" value="<?= $customer['no']; ?>" type="hidden" class="form-control"
                                        id="" placeholder="">
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
                                        <?= set_select('segment', 'Banking and finance'); ?>
                                        <?php if ($customer['segment'] === 'Banking and finance') echo 'selected'; ?>>
                                        Banking and finance
                                    </option>
                                    <option value="Mining" <?= set_select('segment', 'Mining'); ?>
                                        <?php if ($customer['segment'] === 'Mining') echo 'selected'; ?>>
                                        Mining
                                    </option>
                                    <option value="Energy and utility"
                                        <?= set_select('segment', 'Energy and utility'); ?>
                                        <?php if ($customer['segment'] === 'Energy and utility') echo 'selected'; ?>>
                                        Energy and utility
                                    </option>
                                    <option value="Government" <?= set_select('segment', 'Government'); ?>
                                        <?php if ($customer['segment'] === 'Government') echo 'selected'; ?>>
                                        Government
                                    </option>
                                    <option value="Hospitality" <?= set_select('segment', 'Hospitality'); ?>
                                        <?php if ($customer['segment'] === 'Hospitality') echo 'selected'; ?>>
                                        Hospitality
                                    </option>
                                    <option value="Telco operator" <?= set_select('segment', 'Telco operator'); ?>
                                        <?php if ($customer['segment'] === 'Telco operator') echo 'selected'; ?>>
                                        Telco operator
                                    </option>
                                    <option value="Agrobisnis" <?= set_select('segment', 'Agrobisnis'); ?>
                                        <?php if ($customer['segment'] === 'Agrobisnis') echo 'selected'; ?>>
                                        Agrobisnis
                                    </option>
                                </select>
                                <?= form_error('segment', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Afiliasi/Group/Dll</label>
                                    <input name="afiliasi" value="<?= $customer['afiliasi']; ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('afiliasi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat *</label>
                                    <input name="alamat" value="<?= $customer['alamat']; ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Long *</label>
                                            <input name="long" value="<?= $customer['long']; ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Lat *</label>
                                            <input name="lat" value="<?= $customer['lat']; ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('lat', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Koordinat *</label>
                                    <input name="koordinat"
                                        value="<?= 'POINT(' . $customer['long'] . ' ' . $customer['long'] . ')'; ?>"
                                        type="text" class="form-control" id="" placeholder="POINT(long spasi lat)">
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
                                                <input type="radio" name="pelanggan_pln" class="minimal" selected
                                                    value="Ya"
                                                    <?php if ($customer['pelanggan_pln'] === 'Ya') echo 'checked'; ?>>
                                            </label>
                                            Ya
                                        </div>
                                        <div class="col-md-4">
                                            <label>
                                                <input type="radio" name="pelanggan_pln" class="minimal" value="Tidak"
                                                    <?php if ($customer['pelanggan_pln'] === 'Tidak') echo 'checked'; ?>>
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
                                    <input type="text" value="<?= date('d-m-Y', strtotime($customer['tanggal'])); ?>"
                                        name="tanggal" class="form-control pull-right" id="datepicker">
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