<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-xs bg-green" href="<?= base_url('excel/spa') ?>"><span class="fa fa-print"></span>
                        Print</a>
                    <div class="box-tools pull-right">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <form method="POST" action="<?= base_url('spa/search') ?>">
                                <div class="input-group input-group-sm">
                                    <input type="text" value="" name="search"
                                        class="form-control pull-right input-group input-group-sm" placeholder="Search">
                                    <span class="input-group-btn">
                                        <input class="btn bg-blue btn-flat" type='submit' name='submit'
                                            value='Cari'>Go!</input>
                                    </span>
                                </div>
                                <!-- <input type="text" value="<?= $search ?>" name="search"
                                    class="form-control pull-right input-group input-group-sm" placeholder="Search">
                                <input class="btn btn-sm btn-info" type='submit' name='submit' value='Submit'> -->
                            </form>

                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example3" class="table table-bordered table-striped dataTable nowrap"
                                    cellspacing="0" role="grid" aria-describedby="example1_info" style="width:100%">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 5px;">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Identitas</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Kontak
                                            </th>
                                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Alamat
                                            </th> -->
                                            <th class="sorting" tabindex="0" aria-controls="example1">Long - LAT
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Plan FAT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Timestamp</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 66.1719px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($spa as $x) : ?>
                                        <tr role="row" class="odd">
                                            <td class="dtr-control sorting_1"><?= $no++ ?></td>
                                            <td><?= $x['nama'] ?> <br><?= $x['nik'] ?> </td>
                                            <td><?= $x['no_hp'] ?> <br>
                                                <?= $x['email'] ?> </td>
                                            <!-- <td><?= $x['alamat'] ?></td> -->
                                            <td><?= $x['long'] ?> <?= $x['lat'] ?></td>
                                            <td><?= $x['id_fat'] ?>
                                            </td>
                                            <td><?= $x['penginput'] ?> <br> <?= $x['timestamp'] ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-xs bg-green btn-flat"
                                                    href="<?= base_url('spa/get/' . $x['no']) ?>"><span
                                                        class="fa fa-check"></span> Close</a>
                                                <a class="btn btn-xs bg-green btn-flat"
                                                    href="<?= base_url('spa/cancel/' . $x['no']) ?>"><span
                                                        class="fa fa-close"></span> Cancel</a>

                                                <a class="tombol-hapus btn btn-xs bg-green btn-flat"
                                                    href="<?= base_url('spa/hapus/' . $x['no']); ?>"><span
                                                        class="fa fa-trash-o"></span>
                                                    Hapus</a>

                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <?= $pagination; ?>
            </div>
            <!-- /.box -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

    <?php $no = 0;
    foreach ($spa as $z) : ?>
    <div class="modal fade" id="modal-no<?= $z['no']; ?>">
        <div class="modal-dialog">
            <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                action="<?= base_url('spa/ubah') ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">SPA</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <label class="">Status</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option value="">
                                        --Pilih--
                                    </option>
                                    <option value="SPA Closed" <?= set_select('status', 'SPA Closed'); ?> name="status">
                                        SPA Closed
                                    </option>
                                    <option value="SPA Cancel" <?= set_select('status', 'SPA Cancel'); ?> name="status">
                                        SPA Cancel
                                    </option>
                                </select>
                            </div>
                            <div class="col-xs-8">
                                <label class="">Plan ID FAT/ODP</label>
                                <select name="id_fat" class="form-control select2" style="width: 100%;">
                                    <?php foreach ($fat as $x) : ?>
                                    <?php if ($z['id_fat'] == $x['no']) :  ?>
                                    <option value=<?= $x['no']; ?><?= set_select('id_fat', $x['no']); ?> name="id_fat"
                                        selected>
                                        ID FAT : <?= $x['id_fat']; ?> - Port idle : <?= $x['port_idle']; ?>
                                        <?php else : ?>
                                    <option value=<?= $x['no']; ?><?= set_select('id_fat', $x['no']); ?> name="id_fat">
                                        ID FAT : <?= $x['id_fat']; ?> - Port idle : <?= $x['port_idle']; ?>
                                        <?php endif; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <br>
                            <div class="col-xs-4">
                                <label class="">NO.SPA</label>
                                <input type="text" name="no_spa" value="<?= $z['no_spa'] ?>" id=""
                                    class="form-control input-sm" required>
                                <input type="hidden" name="no" value="<?= $z['no'] ?>" id=""
                                    class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-4">
                                <label class="">NO.SO</label>
                                <input type="text" name="no_so" value="<?= $z['no_so'] ?>" id=""
                                    class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-4">
                                <label class="">NO.VA</label>
                                <input type="text" name="no_va" value="<?= $z['no_va'] ?>" id=""
                                    class="form-control input-sm" required>
                            </div>

                            <div class="col-xs-4">
                                <label class="">Brand</label>
                                <input type="text" name="brand" id="" class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-4">
                                <label class="">SN ONT</label>
                                <input type="text" name="sn_ont" id="" class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-4">
                                <label class="">SN STB</label>
                                <input type="text" name="sn_stb" id="" class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-4">
                                <label class="">Jenis Konektor ONT</label>
                                <select name="jenis_konektor_ont" class="form-control select2" style="width: 100%;">
                                    <option value="" name="jenis_konektor_ont">
                                        --Pilih--
                                    </option>
                                    <option value="UPC" <?= set_select('jenis_konektor_ont', 'UPC'); ?>
                                        name="jenis_konektor_ont">UPC
                                    </option>
                                    <option value="APC" <?= set_select('jenis_konektor_ont', 'APC'); ?>
                                        name="jenis_konektor_ont">APC
                                    </option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <label class="">Jenis Konektor Dropcore</label>
                                <select name="jenis_kabel_dropcore" class="form-control select2" style="width: 100%;">
                                    <option value="" name="jenis_kabel_dropcore">
                                        --Pilih--
                                    </option>
                                    <option value="UPC-UPC" <?= set_select('jenis_kabel_dropcore', 'UPC-UPC'); ?>
                                        name="jenis_kabel_dropcore">UPC-UPC
                                    </option>
                                    <option value="APC-APC" <?= set_select('jenis_kabel_dropcore', 'APC-APC'); ?>
                                        name="jenis_kabel_dropcore">APC-APC
                                    </option>
                                    <option value="APC-UPC(Hybrid)"
                                        <?= set_select('jenis_kabel_dropcore', 'APC-UPC(Hybrid)'); ?>
                                        name="jenis_kabel_dropcore">APC-UPC(Hybrid)
                                    </option>
                                    <?= form_error('jenis_kabel_dropcore', '<small class="text-danger pl-1">', '</small>'); ?>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <label class="">Panjang (meter)</label>
                                <input type="text" name="panjang_kabel_dropcore" id="" class="form-control input-sm"
                                    required>
                            </div>
                            <div class="col-xs-4">
                                <label class="">Link Budget</label>
                                <input type="text" name="dbm" id="" class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-4">
                                <label class="">Instalatir</label>
                                <select name="instalatir" class="form-control select2" style="width: 100%;">
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
                            </div>
                            <div class="col-xs-4">
                                <label class="">Tanggal instalatir</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="tanggal_instalasi" value="<?= set_value('tanggal_instalasi'); ?>"
                                        type="text" class="form-control pull-right" id="datepicker">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <label class="">Port FAT</label>
                                <input type="text" name="port_fat" id="" class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-3">
                                <label class="">SID</label>
                                <input type="text" name="sid" value="<?= $z['sid'] ?>" id=""
                                    class="form-control input-sm" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <?php endforeach; ?>
</section>