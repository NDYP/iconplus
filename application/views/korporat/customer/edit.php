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
                                    <option value="Banking and financial"
                                        <?php if ($customer['segment'] === 'Banking and financial') echo 'selected'; ?>>
                                        Banking and financial
                                    </option>
                                    <option value="Cell Oprtr Provider"
                                        <?php if ($customer['segment'] === 'Cell Oprtr Provider') echo 'selected'; ?>>
                                        Cell Oprtr Provider
                                    </option>
                                    <option value=" Consultant, Contract"
                                        <?php if ($customer['segment'] === ' Consultant, Contract') echo 'selected'; ?>>
                                        Consultant, Contract
                                    </option>
                                    <option value="Data Comm Oprtr"
                                        <?php if ($customer['segment'] === 'Data Comm Oprtr') echo 'selected'; ?>>
                                        Data Comm Oprtr
                                    </option>
                                    <option value="Education"
                                        <?php if ($customer['segment'] === 'Education') echo 'selected'; ?>>
                                        Education
                                    </option>
                                    <option value="Energy Utility Mining"
                                        <?php if ($customer['segment'] === 'Energy Utility Mining') echo 'selected'; ?>>
                                        Energy Utility Mining
                                    </option>
                                    <option value="Government"
                                        <?php if ($customer['segment'] === 'Government') echo 'selected'; ?>>
                                        Government
                                    </option>
                                    <option value="Healthcare"
                                        <?php if ($customer['segment'] === 'Healthcare') echo 'selected'; ?>>
                                        Healthcare
                                    </option>
                                    <option value="Hospitality"
                                        <?php if ($customer['segment'] === 'Hospitality') echo 'selected'; ?>>
                                        Hospitality
                                    </option>
                                    <option value="Manufacture"
                                        <?php if ($customer['segment'] === 'Manufacture') echo 'selected'; ?>>
                                        Manufacture
                                    </option>
                                    <option value="Media & Entertain"
                                        <?php if ($customer['segment'] === 'Media & Entertain') echo 'selected'; ?>>
                                        Media & Entertain
                                    </option>
                                    <option value="Natural Resources"
                                        <?php if ($customer['segment'] === 'Natural Resources') echo 'selected'; ?>>
                                        Natural Resources
                                    </option>
                                    <option value="PLN Group"
                                        <?php if ($customer['segment'] === 'PLN Group') echo 'selected'; ?>>
                                        PLN Group
                                    </option>
                                    <option value="Professional Association"
                                        <?php if ($customer['segment'] === 'Professional Association') echo 'selected'; ?>>
                                        Professional Association
                                    </option>
                                    <option value="Property"
                                        <?php if ($customer['segment'] === 'Property') echo 'selected'; ?>>
                                        Property
                                    </option>
                                    <option value="Retail Distribution"
                                        <?php if ($customer['segment'] === 'Retail Distribution') echo 'selected'; ?>>
                                        Retail Distribution
                                    </option>
                                    <option value="Telecommunication"
                                        <?php if ($customer['segment'] === 'Telecommunication') echo 'selected'; ?>>
                                        Telecommunication
                                    </option>
                                    <option value="Tranportation"
                                        <?php if ($customer['segment'] === 'Tranportation') echo 'selected'; ?>>
                                        Tranportation
                                    </option>
                                    <option value="UMKM & Retail"
                                        <?php if ($customer['segment'] === 'UMKM & Retail') echo 'selected'; ?>>
                                        UMKM & Retail
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