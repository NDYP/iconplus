<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('pop/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>
        <?= form_open_multipart('pop/ubah') ?>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ID POP</label>
                        <input name="id_pop" value="<?= $pop['id_pop'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <input name="no" value="<?= $pop['no'] ?>" type="hidden" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('id_pop', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input name="nama_pop" value="<?= $pop['nama_pop'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('nama_pop', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kota</label>
                        <input name="kota" value="<?= $pop['kota'] ?>" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('kota', '<small class="text-danger pl-1">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Long</label>
                                <input name="long" value="<?= $pop['long']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Lat</label>
                                <input name="lat" value="<?= $pop['lat']; ?>" type="text" class="form-control"
                                    id="exampleInputEmail1" placeholder="isi ...">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Koordinat</label>
                        <input name="koordinat_pop" value="POINT(<?= $pop['long'];
                                                                    echo " ";
                                                                    echo $pop['lat']; ?>)" type="text"
                            class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                        <?= form_error('koordinat_pop', '<small class="text-danger pl-1">', '</small>'); ?>
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