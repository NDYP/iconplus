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
                                        class="form-control" id="" placeholder="" readonly>
                                    <input name="no" value="<?= $customer['no']; ?>" type="hidden" class="form-control"
                                        id="" placeholder="">
                                    <?= form_error('nama', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Sektor</label>
                                <select name="segment" class="form-control select2" style="width: 100%;" readonly>
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
                                        class="form-control" id="" placeholder="" readonly>
                                    <?= form_error('afiliasi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alamat *</label>
                                    <input name="alamat" value="<?= $customer['alamat']; ?>" type="text"
                                        class="form-control" id="" placeholder="" readonly>
                                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Long *</label>
                                            <input name="long" value="<?= $customer['long']; ?>" type="text"
                                                class="form-control" id="" placeholder="" readonly>
                                            <?= form_error('long', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Lat *</label>
                                            <input name="lat" value="<?= $customer['lat']; ?>" type="text"
                                                class="form-control" id="" placeholder="" readonly>
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
                                        type="text" class="form-control" id="" placeholder="POINT(long spasi lat)"
                                        readonly>
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
                                                    <?php if ($customer['pelanggan_pln'] === 'Ya') echo 'checked'; ?>
                                                    readonly>
                                            </label>
                                            Ya
                                        </div>
                                        <div class="col-md-4">
                                            <label>
                                                <input type="radio" name="pelanggan_pln" class="minimal" value="Tidak"
                                                    <?php if ($customer['pelanggan_pln'] === 'Tidak') echo 'checked'; ?>
                                                    readonly>
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
                                        name="tanggal" class="form-control pull-right" id="datepicker" readonly>
                                </div>
                                <?= form_error('tanggal', '<small class="text-danger pl-1">', '</small>'); ?>

                            </div>
                        </div>
                        <br>
                        <div class="callout callout-info">
                            <center><b>PIC</b></center>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example" class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Jabatan</th>
                                            <th style="text-align: center;">Email</th>
                                            <th style="text-align: center;">Kontak</th>
                                            <th style="text-align: center;">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pic as $x) : ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td><?= $x['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $x['jabatan'] ?>
                                            </td>
                                            <td>
                                                <?= $x['email'] ?>
                                            </td>
                                            <td>
                                                <?= $x['kontak']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('pic/hapus/' . $x['no']); ?>"
                                                    class="btn btn-social-icon btn-xs btn-danger tombol-hapus"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <div class="callout callout-info">
                            <center><b>Sites</b></center>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No.</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Long</th>

                                            <th style="text-align: center;">PIC</th>
                                            <th style="text-align: center;">Layanana</th>
                                            <th style="text-align: center;">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($site as $x) : ?>
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                            </td>
                                            <td><?= $x['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $x['long'] . ', ' . $x['lat'] ?>
                                            </td>

                                            <td>
                                                <?= $x['pic'] ?>
                                            </td>
                                            <td>
                                                <?= $x['layanan'] . ' (' . $x['provider'] . ' ' . $x['bandwith'] . ')'; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="<?= base_url('site/hapus/' . $x['no']); ?>"
                                                    class="btn btn-social-icon btn-xs btn-danger tombol-hapus"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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