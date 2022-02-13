<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('cluster/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="mytable" class="table table-striped dataTable" role="grid"
                        aria-describedby="example1_info">
                        <tbody>
                            <tr>
                                <th>Nama Cluster</th>
                                <th> : </th>
                                <td><?= $cluster['nama_cluster'] ?></td>
                                <td></td>
                                <th>No IO</th>
                                <th> : </th>
                                <td><?= $cluster['no_io'] ?></td>
                                <td></td>
                                <th>Target PPI</th>
                                <th> : </th>
                                <td><?= $cluster['target_ppi_date'] ?></td>
                            </tr>
                            <tr>
                                <th>No PA</th>
                                <th> : </th>
                                <td><?= $cluster['no_pa'] ?></td>
                                <td></td>
                                <th>Tanggal PPI</th>
                                <th> : </th>
                                <td><?= $cluster['ppi_date'] ?></td>
                                <td></td>
                                <th>Instalatir</th>
                                <th> : </th>
                                <td><?= $cluster['nama_instalatir'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <h3 class="text-center"><u>FAT yang terhubung</u></h3>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example3" class="table table-bordered table-striped dataTable nowrap" cellspacing="0"
                        role="grid" aria-describedby="example1_info" style="width:100%">
                        <thead>
                            <tr role="row">
                                <th style="width: 10px;" rowspan="">No.</th>
                                <th style="width: 10px;">ID FAT</th>
                                <th style="width: 55.1094px;">Status</th>
                                <th style="width: 80.7812px;">Port Max <br>
                                    Port Terpasang</th>
                                <th style="width: 55.1094px;">Port idle</th>
                                <th style="width: 41.5781px;">Long - Lat</th>
                                <th style="width: 41.5781px;">Power out</th>
                                <th style="width: 41.5781px;">FDT</th>
                                <th style="width: 41.5781px;">Jarak</th>
                                <th style="width: 41.5781px;">Timestamp</th>
                                <th style="width: 41.5781px;">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($fat as $x) : ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?= $no++; ?></td>
                                <td class="sorting_1"><?= $x['id_fat'] ?></td>
                                <td><?= $x['status_pembangunan'] ?></td>
                                <td>
                                    <?php if ($x['kapasitas_port_max'] == NULL) : ?>
                                    <?= '-' ?> <br>
                                    <?= $x['kapasitas_port_terpasang'] ?>
                                    <?php else : ?>
                                    <?= $x['kapasitas_port_max'] ?> <br>
                                    <?= $x['kapasitas_port_terpasang'] ?>
                                    <?php endif; ?>
                                </td>

                                <td><?= $x['port_idle'] ?></td>
                                <td><?= $x['long'] ?> <br> <?= $x['lat'] ?>
                                </td>
                                <td>
                                    <?php if ($x['power_out'] == NULL) : ?>
                                    <?= '-' ?>
                                    <?php else : ?>
                                    <?= $x['power_out'] ?>
                                    <?php endif; ?>
                                </td>
                                <td><?= $x['id_fdt'] ?></td>
                                <td><?= (int)$x['jarak'] ?> m</td>
                                <td><?= $x['penginput'] ?> <br> <?= $x['timestamp'] ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-green btn-social btn-flat btn-xs"
                                            data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                            Pilih</button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="<?= base_url('fat/detail/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-list-ol"></i>Detail</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('fat/edit/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm"><i
                                                        class="fa fa-edit"></i>Ubah</a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('fat/hapus/' . $x['no']); ?>"
                                                    class="btn btn-social btn-flat btn-block btn-sm tombol-hapus"><i
                                                        class="fa fa-trash-o"></i> Hapus</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->