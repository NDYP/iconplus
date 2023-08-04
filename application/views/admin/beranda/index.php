<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">MItra</span>
                    <span class="info-box-number"><?= $mitra; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-maroon"><i class="fa fa-map"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cluster</span>
                    <span class="info-box-number"><?= $cluster; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-navy"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">POP</span>
                    <span class="info-box-number"><?= $pop; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-olive"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">OLT</span>
                    <span class="info-box-number"><?= $olt; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ODF</span>
                    <span class="info-box-number"><?= $odf; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">FDT</span>
                    <span class="info-box-number"><?= $fdt; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">FAT</span>
                    <span class="info-box-number"><?= $fat; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-calculator"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">HP</span>
                    <span class="info-box-number">
                        <?php foreach ($hp as $x) : ?>
                        <?= $x['kapasitas_port_terpasang'] ?>
                        <?php endforeach; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">SPA Closed</span>
                    <span class="info-box-number"><?= $pelanggan; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Potensi</span>
                    <span class="info-box-number"><?= $potensi; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example" class="table table-bordered table-striped dataTable nowrap" cellspacing="0"
                        role="grid" aria-describedby="example1_info" style="width:100%">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 10px;">No.</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 74.3594px;">Nama Cluster</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending" style="width: 66.1719px;">HP
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending"
                                    style="width: 80.7812px;">HC
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending"
                                    style="width: 55.1094px;">TUR
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (is_array($xnxx) || is_object($xnxx)) : ?>
                            <?php $no = 1;
                                $tabel = [];
                                foreach ($xnxx as $key => $w) : ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?= $no++ ?></td>
                                <td><?= $w['nama_cluster'] ?></td>
                                <td><?= $w['hp'] ?></td>
                                <td><?= $hc[$key] ?></td>
                                <td><?= number_format(($hc[$key]  / $w['hp']) * 100, 2); ?>%</td>
                            </tr>
                            <?php
                                endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Left col -->

        <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <div class="tab-pane" id="tab_2">
                    <div class="chart-container">
                        <div class="bar-chart-container">
                            <canvas id="bar-chart" style="width: 3px;"></canvas>
                        </div>
                        <div class="bar-chart-container">
                            <canvas id="bar-chart2" style="width: 3px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ./col -->
    </div>
    <!-- /.row -->


</section>