<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('korporat/layanan/index') ?>" class="btn btn-social btn-sm bg-blue"><span
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
                                    <input name="nama" value="<?= $layanan['nama']; ?>" type="text" class="form-control"
                                        id="" placeholder="">
                                    <input name="no" value="<?= $layanan['no']; ?>" type="hidden" class="form-control"
                                        id="" placeholder="">

                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Long *</label>
                                            <input name="long" value="<?= $layanan['long']; ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Lat *</label>
                                            <input name="lat" value="<?= $layanan['lat']; ?>" type="text"
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
                                        value="<?= 'POINT(' . $layanan['long'] . ' ' . $layanan['lat'] . ')'; ?>"
                                        type="text" class="form-control" id="" placeholder="POINT(long spasi lat)">
                                    <?= form_error('koordinat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Customer</label>
                                <select name="customer" class="form-control select2" style="width: 100%;">
                                    <option value="">
                                        --Pilih--
                                    </option>
                                    <?php foreach ($customer as $x) : ?>
                                    <?php if ($layanan['customer'] == $x['no']) :  ?>
                                    <option value=<?= $x['no']; ?> name="customer" selected>
                                        <?= $x['nama']; ?> </option>
                                    <?php else : ?>
                                    <option value=<?= $x['no']; ?> name="customer">
                                        <?= $x['nama']; ?>
                                        <?php endif; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('customer', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <label for="">PIC</label>
                                <select name="pic" class="form-control select2" style="width: 100%;">
                                    <option value="">
                                        --Pilih--
                                    </option>
                                    <?php foreach ($pic as $x) : ?>
                                    <?php if ($layanan['pic'] == $x['no']) :  ?>
                                    <option value=<?= $x['no']; ?> name="pic" selected>
                                        <?= $x['nama']; ?>
                                        <?php else : ?>
                                    <option value=<?= $x['no']; ?> name="pic">
                                        <?= $x['nama']; ?>
                                        <?php endif; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('pic', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Pelanggan PLN *</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>
                                                <input type="radio" name="pelanggan_pln" class="minimal" selected
                                                    value="Ya"
                                                    <?php if ($layanan['pelanggan_pln'] === 'Ya') echo 'checked'; ?>>
                                            </label>
                                            Ya
                                        </div>
                                        <div class="col-md-4">
                                            <label>
                                                <input type="radio" name="pelanggan_pln" class="minimal" value="Tidak"
                                                    <?php if ($layanan['pelanggan_pln'] === 'Tidak') echo 'checked'; ?>>
                                            </label> Tidak
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="callout callout-info">
                            <center><b>Layanan Existing</b></center>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nama Layanan</label>
                                    <input name="layanan" value="<?= $layanan['layanan']; ?>" type="text"
                                        class="form-control" id="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Provider</label>
                                            <input name="provider" value="<?= $layanan['provider']; ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Bandwith</label>
                                            <input name="bandwith" value="<?= $layanan['bandwith']; ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Biaya</label>
                                            <input name="biaya" value="<?= $layanan['biaya']; ?>" type="text"
                                                class="form-control" id="" placeholder="">
                                            <?= form_error('biaya', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Estimasi Kontrak</label>
                                            <input name="estimasi_kontrak" value="<?= $layanan['estimasi_kontrak']; ?>"
                                                type="text" class="form-control" id="datepicker" placeholder="">
                                        </div>
                                    </div>
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