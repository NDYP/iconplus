<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-sm bg-green" href="<?= base_url('fdt/tambah') ?>"><span class="fa fa-plus"></span>
                        Add</a>
                    <a class="btn btn-sm bg-green" href="<?= base_url('') ?>"><span class="fa fa-print"></span>
                        Print</a>
                </div>
                 <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                            <form method="POST" action="<?= base_url('fdt/search') ?>">
                                <div class="input-group input-group-sm">
                                    <input type="text" name="search"
                                        class="form-control pull-right input-group input-group-sm" placeholder="Search">
                                    <span class="input-group-btn">
                                        <input class="btn bg-blue btn-flat" type='submit' name='submit'
                                            value='Cari'>Go!</input>
                                    </span>
                                </div>

                            </form>
                            <br>
                            <a class="btn btn-xs bg-yellow pull-right" href=""><span class="fa fa-refresh"></span>
                                Refresh</a>
                        </div>
                    </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 10px;" rowspan="">No.</th>
                                            <th style="width: 10px;">ID FAT</th>
                                            <th style="width: 80.7812px;">Kapasitas Port Max</th>
                                            <th style="width: 55.1094px;">Kapasitas Port Terpasang</th>
                                            <th style="width: 41.5781px;">Jenis Konektor</th>
                                            <th style="width: 41.5781px;">Power in</th>
                                            <th style="width: 41.5781px;">Power out</th>
                                            <th style="width: 41.5781px;">Power losses</th>
                                            <th style="width: 41.5781px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($fat as $x) : ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $no++ ?></td>
                                            <td class="sorting_1"><?= $x['id_fat'] ?></td>
                                            <td><?= $x['kapasitas_port_max'] ?></td>
                                            <td><?= $x['kapasitas_port_terpasang'] ?></td>
                                            <td><?= $x['jenis_konektor'] ?></td>
                                            <td><?= $x['power_in'] ?></td>
                                            <td><?= $x['power_out'] ?></td>
                                            <td><?= $x['power_losses'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn bg-green btn-social btn-flat btn-sm"
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
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-trash-o"></i> Hapus</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                         <?php if (count($fdt) <= 1) { ?>
                                        <tr>
                                            <td colspan='10'>No record found.</td>
                                        </tr>
                                        <?php } ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
</section>