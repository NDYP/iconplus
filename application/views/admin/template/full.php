<!-- Main content -->
<!-- Main content -->
<section class="content">
    <?= form_open_multipart('admin/admin/tambah') ?>
    <div class="box box-default">
        <div class="box-header with-border">
            <button class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span> Kembali</button>
        </div>
        <div class="box-body" data-select2-id="14">
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-info btn-block btn-flat">Data
                        Pelanggan</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>


                    <!-- /.form-group -->

                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.SO</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.HP</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.VA</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Koordinat</label>
                        <input type="email" class="form-control" id="exampleInputEmail1"
                            placeholder="POINT(LONG[spasi]LAT)">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
                    </div>
                    <!-- /.form-group -->
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-info btn-block btn-flat">Data
                        Konektivitas</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Service</label>
                        <select name="id_agama" class="form-control select2" style="width: 100%;" data-select2-id="1"
                            tabindex="-1" aria-hidden="false">
                            <option name="id_agama" value="" data-select2-id="12">--Pilih--</option>
                            <option name="id_agama" value="1" data-select2-id="13">Hindu</option>
                            <option name="id_agama" value="2" data-select2-id="14">Buddha</option>
                            <option name="id_agama" value="3" data-select2-id="15">Islam</option>
                            <option name="id_agama" value="4" data-select2-id="16">Protestan</option>
                            <option name="id_agama" value="5" data-select2-id="17">Katolik</option>
                            <option name="id_agama" value="6" data-select2-id="18">Khonghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Biaya instalasi</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No.SPA</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SID</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SN ONT</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label>ID FAT</label>
                        <select name="id_agama" class="form-control select3" style="width: 100%;" data-select2-id="1"
                            tabindex="-1" aria-hidden="false">
                            <option name="id_agama" value="" data-select2-id="12">--Pilih--</option>
                            <option name="id_agama" value="1" data-select2-id="13">Hindu</option>
                            <option name="id_agama" value="2" data-select2-id="14">Buddha</option>
                            <option name="id_agama" value="3" data-select2-id="15">Islam</option>
                            <option name="id_agama" value="4" data-select2-id="16">Protestan</option>
                            <option name="id_agama" value="5" data-select2-id="17">Katolik</option>
                            <option name="id_agama" value="6" data-select2-id="18">Khonghucu</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Bandwith</label>
                        <select name="id_agama" class="form-control select4" style="width: 100%;" data-select2-id="1"
                            tabindex="-1" aria-hidden="false">
                            <option name="id_agama" value="" data-select2-id="12">--Pilih--</option>
                            <option name="id_agama" value="1" data-select2-id="13">Hindu</option>
                            <option name="id_agama" value="2" data-select2-id="14">Buddha</option>
                            <option name="id_agama" value="3" data-select2-id="15">Islam</option>
                            <option name="id_agama" value="4" data-select2-id="16">Protestan</option>
                            <option name="id_agama" value="5" data-select2-id="17">Katolik</option>
                            <option name="id_agama" value="6" data-select2-id="18">Khonghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Konektor ONT</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SN STB</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label>Instalatir (Mitra)</label>
                        <select name="id_agama" class="form-control select5" style="width: 100%;" data-select2-id="1"
                            tabindex="-1" aria-hidden="false">
                            <option name="id_agama" value="" data-select2-id="12">--Pilih--</option>
                            <option name="id_agama" value="1" data-select2-id="13">Hindu</option>
                            <option name="id_agama" value="2" data-select2-id="14">Buddha</option>
                            <option name="id_agama" value="3" data-select2-id="15">Islam</option>
                            <option name="id_agama" value="4" data-select2-id="16">Protestan</option>
                            <option name="id_agama" value="5" data-select2-id="17">Katolik</option>
                            <option name="id_agama" value="6" data-select2-id="18">Khonghucu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Port FAT</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Paket Tambahan</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kabel Dropcore</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Panjang Kabel</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">DBM</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Instalasi</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker">
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
            </div>

            <!-- /.row -->
        </div>
        <div class="box-footer">
            <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <?= form_close(); ?>
</section>