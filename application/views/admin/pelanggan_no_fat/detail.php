<!-- Main content -->
<section class="content">

    <div class="box box-default">
        <div class="box-header with-border">
            <a href="<?= base_url('pelanggan_no_fat/index') ?>" class="btn btn-xs bg-blue"><span
                    class="fa fa-arrow-left"></span>
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
                                    <th> <u>
                                            <b>BIODATA</b></u></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['nik'] ?></td>
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
                                    <th>Nama</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['nama'] ?></td>
                                    <td></td>
                                    <th>No HP</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['no_hp'] ?></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>email</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['email'] ?></td>
                                    <td></td>
                                    <th>No VA</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['no_va'] ?></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['alamat'] ?></td>
                                    <td></td>
                                    <th>ID PLN</th>
                                    <th>:</th>
                                    <td><?= $pelanggan['id_pln'] ?></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Koordinat</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['long'];
                                        echo ' ';
                                        echo $pelanggan['lat']; ?></td>
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
                                    <td><?= $pelanggan['lat'] ?></td>
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
                                    <th>Longatitude</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['long'] ?></td>
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
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <th><u> <b>ONT&FAT</b></u></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td>

                                    </td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Service</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['service'] ?></td>
                                    <td></td>
                                    <th>Bandwith</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['bandwith'] ?></td>
                                    <td></td>
                                    <th>Paket Tambahan</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['paket_tambahan'] ?></td>
                                </tr>
                                <tr>
                                    <th>Biaya Instalasi</th>
                                    <th> : </th>
                                    <td><?= "Rp." . number_format($pelanggan['biaya_instalasi'], 2, ",", ".") ?></td>
                                    <td></td>
                                    <th>Brand</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['brand'] ?></td>
                                    <td></td>
                                    <th>Jenis Kabel Dropcore</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['jenis_kabel_dropcore'] ?></td>
                                </tr>
                                <tr>
                                    <th>No SPA</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['no_spa'] ?></td>
                                    <td></td>
                                    <th>Jenis Konektor ONT</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['jenis_konektor_ont'] ?></td>
                                    <td></td>
                                    <th>Panjang Kabel</th>
                                    <td>:</td>
                                    <td><?= $pelanggan['panjang_kabel_dropcore'] ?></td>
                                </tr>
                                <tr>
                                    <th>SID</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['sid'] ?></td>
                                    <td></td>
                                    <th>SN STB</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['sn_stb'] ?></td>
                                    <td></td>
                                    <th>Link Budget (dbm)</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['dbm'] ?></td>
                                </tr>
                                <tr>
                                    <th>SN ONT</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['sn_ont'] ?></td>
                                    <td></td>
                                    <th>Instalatir (Mitra)</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['nama_instalatir'] ?></td>
                                    <td></td>
                                    <th>Tanggal Instalasi</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['tanggal_instalasi'] ?></td>
                                </tr>
                                <tr>
                                    <th>
                                    </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr> </tr>
                                <tr></tr>
                                <tr></tr>
                                <tr>
                                    <th><u>
                                            <b>KONEKSI</b>
                                        </u></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>ID FAT</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['id_fat'] ?></td>
                                    <td></td>
                                    <th>Port FAT</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['port_fat'] ?></td>
                                    <td></td>
                                    <th>Cluster</th>
                                    <td>:</td>
                                    <td><?= $pelanggan['nama_cluster'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tray FDT</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['tray_fdt'] ?></td>
                                    <td></td>
                                    <th>ID FDT</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['id_fdt'] ?></td>
                                    <td></td>
                                    <th>Port FDT</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['port_fdt'] ?></td>
                                </tr>
                                <tr>
                                    <th>Nama ODF</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['nama_odf'] ?></td>
                                    <td></td>
                                    <th>Port ODF</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['port_odf'] ?></td>
                                    <td></td>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Hostname OLT</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['hostname'] ?></td>
                                    <td></td>
                                    <th>Port Olt</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['port_olt'] ?></td>
                                    <td></td>
                                    <th>ID POP</th>
                                    <th> : </th>
                                    <td><?= $pelanggan['id_pop'] ?></td>
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