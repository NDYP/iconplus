<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('pole/index') ?>" class="btn btn-xs bg-blue"><span class="fa fa-arrow-left"></span>
                Kembali</a>
        </div>

        <div class="box-body">
            <div id="example1_wrapper" class="">
                <div class="row">
                    <div class="col-md-12">
                        <table id="mytable" class="dataTable nowrap" cellspacing="0" role="grid"
                            aria-describedby="example1_info" style="width:100%">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th> : </th>
                                    <td><?= $pole['id'] ?></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Konstruksi</th>
                                    <th> : </th>
                                    <td><?= $pole['konstruksi'] ?></td>
                                    <td></td>
                                    <th>Tinggi</th>
                                    <th> : </th>
                                    <td><?= $pole['tinggi_tiang'] ?></td>
                                    <td></td>
                                    <th>Tebal</th>
                                    <th> : </th>
                                    <td><?= $pole['tebal_tiang'] ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <th> : </th>
                                    <td><?= $pole['status'] ?></td>
                                    <td></td>
                                    <th>Klasifikasi</th>
                                    <th> : </th>
                                    <td><?= $pole['jenis'] ?></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Owner</th>
                                    <th> : </th>
                                    <td><?= $pole['owner'] ?></td>
                                    <td></td>
                                    <th>PTL</th>
                                    <th> : </th>
                                    <td><?= $pole['ptl'] ?></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Instalatir</th>
                                    <th> : </th>
                                    <td><?= $pole['instalatir'] ?></td>
                                    <td></td>
                                    <th>Tanggal Instalasi</th>
                                    <th> : </th>
                                    <td><?= $pole['tanggal_instalasi'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Longatitude</th>
                                    <th> : </th>
                                    <td><?= $pole['long'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Latitude</th>
                                    <th> : </th>
                                    <td><?= $pole['lat'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Koordinat</th>
                                    <th> : </th>
                                    <td>POINT(<?= $pole['long'];
                                                echo ' ';
                                                echo $pole['lat']; ?>)</td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->