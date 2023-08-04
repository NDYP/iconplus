<section class="content">
    <?= $this->session->flashdata('message'); ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-xs bg-green" href="<?= base_url('potensi/tambah') ?>"><span class="fa fa-plus"></span>
                Tambah Potensi</a>
        </div>

    </div>
    <br>
    <div class="row">

        <style>
            #map {
                height: 630px;
            }
        </style>
        <div class="col-md-12">
            <div id="map"></div>
        </div>
        <script>
            window.onload = function() {

                //   var heat = L.heatLayer([

                //     @foreach ($index as $index)
                //          	[ {{  $index  ['lat'] }}, //SENSITIVE CASE, JANGAN DIUBAH STRUKTUR BARIS KODING!
                //          	  {{  $index  ['lng'] }}, //SENSITIVE CASE, JANGAN DIUBAH STRUKTUR BARIS KODING!
                //          	  {{  $index  ['count'] }}  ], //SENSITIVE CASE, JANGAN DIUBAH STRUKTUR BARIS KODING!
                //    	@endforeach
                //   ], {
                //     radius: 25
                //   });

                var baseLayer = L.tileLayer(
                    'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: 'Map data &copy; <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
                        maxZoom: 19
                    });

                //FAT Aktif
                <?php foreach ($fatmap as $x) : ?>
                    fat<?= $x['id_fat'] ?> = L.marker([<?= $x['lat'] ?>, <?= $x['long'] ?>], {
                        icon: L.icon({
                            iconUrl: '<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/newicon/FAT_hijau.png',
                            iconSize: [15, 15],
                        })
                    }).bindTooltip('<?= $x['id_fat'] ?>').bindPopup(
                        'ID FAT: <?= $x['id_fat'] ?> <br> Kapasitas Port Max: <?= $x['kapasitas_port_terpasang'] ?> <br> Kapasitas Port Terpasang: <?= $x['kapasitas_port_max'] ?> <br> Kapasitas Port idle: <?= $x['port_idle'] ?> <br> Status Pembangunan: <?= $x['status_pembangunan'] ?> <br> Lat: <?= $x['lat'] ?> <br> Long: <?= $x['long'] ?>'
                    );
                <?php endforeach; ?>
                fat_layer = L.layerGroup([
                    <?php foreach ($fatmap as $x) : ?> fat<?= $x['id_fat'], "," ?> <?php endforeach; ?>
                ]);

                //FAT Plan
                <?php foreach ($fatongoing as $x) : ?>
                    fatongoing<?= $x['id_fat'] ?> = L.marker([<?= $x['lat'] ?>, <?= $x['long'] ?>], {
                        icon: L.icon({
                            iconUrl: '<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/newicon/FAT_merah.png',
                            iconSize: [15, 15],
                        })
                    }).bindTooltip('<?= $x['id_fat'] ?>').bindPopup(
                        'ID FAT: <?= $x['id_fat'] ?> <br> Kapasitas Port Max: <?= $x['kapasitas_port_terpasang'] ?> <br> Kapasitas Port Terpasang: <?= $x['kapasitas_port_max'] ?> <br> Status Pembangunan: <?= $x['status_pembangunan'] ?> <br> Lat: <?= $x['lat'] ?> <br> Long: <?= $x['long'] ?>'
                    );
                <?php endforeach; ?>
                fatongoing_layer = L.layerGroup([
                    <?php foreach ($fatongoing as $x) : ?> fatongoing<?= $x['id_fat'], "," ?> <?php endforeach; ?>
                ]);

                //FAT Proses pembangunan
                <?php foreach ($fatproses as $x) : ?>
                    fatproses<?= $x['id_fat'] ?> = L.marker([<?= $x['lat'] ?>, <?= $x['long'] ?>], {
                        icon: L.icon({
                            iconUrl: '<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/newicon/FAT_kuning.png',
                            iconSize: [15, 15],
                        })
                    }).bindTooltip('<?= $x['id_fat'] ?>').bindPopup(
                        'ID FAT: <?= $x['id_fat'] ?> <br> Kapasitas Port Max: <?= $x['kapasitas_port_terpasang'] ?> <br> Kapasitas Port Terpasang: <?= $x['kapasitas_port_max'] ?> <br> Status Pembangunan: <?= $x['status_pembangunan'] ?> <br> Lat: <?= $x['lat'] ?> <br> Long: <?= $x['long'] ?>'
                    );
                <?php endforeach; ?>
                fatproses_layer = L.layerGroup([
                    <?php foreach ($fatproses as $x) : ?> fatproses<?= $x['id_fat'], "," ?> <?php endforeach; ?>
                ]);

                // POLE
                <?php foreach ($polemap as $pole) : ?>
                    pole<?= $pole['no'] ?> = L.marker([<?= $pole['lat'] ?>, <?= $pole['long'] ?>], {
                        icon: L.icon({
                            iconUrl: '<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/pole.png',
                            iconSize: [15, 15],
                        })
                    }).bindPopup(
                        'ID POLE: <?= $pole['id'] ?> <br>'
                    );
                <?php endforeach; ?>
                pole_layer = L.layerGroup([
                    <?php foreach ($polemap as $pole) : ?> pole<?= $pole['no'], "," ?> <?php endforeach; ?>
                ]);

                //Pelanggan eks
                <?php foreach ($pelanggan_eks as $a) : ?>
                    eks<?= $a['no'] ?> = L.marker([<?= $a['lat'] ?>, <?= $a['long'] ?>], {
                        icon: L.icon({
                            iconUrl: '<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/newicon/Cust_Hijau.png',
                            iconSize: [15, 15],
                        })
                    }).bindPopup(
                        'No.SPA: <?= json_encode($a['no_spa']); ?> <br> SID: <?= json_encode($a['sid']); ?> <br> NIK: <?= json_encode($a['nik']); ?> <br> Nama Pelanggan: <?= json_encode($a['nama']); ?> <br> Nomor HP: <?= $a['no_hp'] ?> <br> Email : <?= $a['email'] ?> <br> Service ID: <?= $a['sid'] ?> <br> Lat: <?= $a['lat'] ?> <br> Long: <?= $a['long'] ?>'
                    );
                <?php endforeach; ?>
                pel_eks_layer = L.layerGroup([
                    <?php foreach ($pelanggan_eks as $a) : ?> eks<?= $a['no'], "," ?> <?php endforeach; ?>
                ]);

                //Pelanggan open
                <?php foreach ($pelanggan_open as $a) : ?>
                    open<?= $a['no'] ?> = L.marker([<?= $a['lat'] ?>, <?= $a['long'] ?>], {
                        icon: L.icon({
                            iconUrl: '<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/newicon/Cust_Kuning.png',
                            iconSize: [15, 15],
                        })
                    }).bindPopup(
                        'No.SPA: <?= json_encode($a['no_spa']); ?> <br> SID: <?= json_encode($a['sid']); ?> <br> NIK: <?= json_encode($a['nik']); ?> <br> Nama Pelanggan: <?= json_encode($a['nama']); ?> <br> Nomor HP: <?= $a['no_hp'] ?> <br> Email : <?= $a['email'] ?> <br> Service ID: <?= $a['sid'] ?> <br> Lat: <?= $a['lat'] ?> <br> Long: <?= $a['long'] ?>'
                    );
                <?php endforeach; ?>
                pel_open_layer = L.layerGroup([
                    <?php foreach ($pelanggan_open as $a) : ?> open<?= $a['no'], "," ?> <?php endforeach; ?>
                ]);

                //Pelanggan potensi
                <?php foreach ($pelanggan_pot as $c) : ?>
                    pot<?= $c['no'] ?> = L.marker([<?= $c['lat'] ?>, <?= $c['long'] ?>], {
                        icon: L.icon({
                            iconUrl: '<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/cust-maps.png',
                            iconSize: [20, 20],
                        })
                    }).bindPopup(
                        'NIK: <?= json_encode($c['nik']); ?> <br> Nama Pelanggan: <?= json_encode($c['nama']); ?> <br> Nomor HP: <?= $c['no_hp'] ?> <br> Email : <?= $c['email'] ?> <br> Lat: <?= $c['lat'] ?> <br> Long: <?= $c['long'] ?>'
                    );
                <?php endforeach; ?>
                pel_pot_layer = L.layerGroup([
                    <?php foreach ($pelanggan_pot as $c) : ?> pot<?= $c['no'], "," ?> <?php endforeach; ?>
                ]);

                var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                    osmAttrib =
                    'Map data &copy; <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a> &copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    osm = L.tileLayer(osmUrl, {
                        maxZoom: 19,
                        attribution: osmAttrib
                    }),
                    map = new L.Map('map', {
                        center: new L.LatLng(-2.222097, 113.907722),
                        zoom: 13,
                        //   layers: [heat]
                    }),
                    drawnItems = L.featureGroup().addTo(map);

                L.control.layers({
                    "Google Maps": L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                        attribution: 'Google Maps',
                        maxZoom: 21,
                    }).addTo(map),
                    'Open Street Map': osm,
                    "Google Satellite": L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                        attribution: 'Google Satellite',
                        maxZoom: 21
                    }),
                    "Google Terrain": L.tileLayer('https://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
                        attribution: 'Google Terrain',
                        maxZoom: 21
                    })
                }, {
                    'FAT Aktif': fat_layer,
                    'FAT Plan': fatongoing_layer,
                    'FAT Proses Pembangunan': fatproses_layer,
                    'Pelanggan Aktif': pel_eks_layer,
                    'Pelanggan SPA Open': pel_open_layer,
                    'Calon Pelanggan (Potensi)': pel_pot_layer,
                    'POLE': pole_layer,
                    // 'drawlayer': drawnItems
                }, {
                    position: 'topright',
                    collapsed: true
                }).addTo(map);

                // var basemaps = {
                //     "Google Maps": L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                //         attribution: 'Google Maps',
                //         maxZoom: 21,
                //     }).addTo(map),
                //     'Open Street Map': osm,
                //     "Google Satellite": L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                //         attribution: 'Google Satellite',
                //         maxZoom: 21
                //     }),
                //     "Google Terrain": L.tileLayer('https://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
                //         attribution: 'Google Terrain',
                //         maxZoom: 21
                //     })
                // };

                // var groupedOverlays = {
                //     "FAT": {
                //         'Aktif': fat_layer,
                //         'Ongoing Pembangunan': pel_eks_layer,
                //         'Plan': pole_layer,
                //     },
                //     "Customer/Potensi": {
                //         'Aktif': pel_eks_layer,
                //         'SPA Open': pel_pot_layer,
                //         'Potensi': pel_pot_layer,
                //     },

                //     "POLE": {
                //         'Pole': pole_layer,
                //         'Pole2': pole_layer,
                //     },
                // };

                // L.control.groupedLayers(basemaps, groupedOverlays).addTo(map);

                // map.addControl(new L.Control.Draw({
                //   edit: {
                //     featureGroup: drawnItems,
                //     poly: {
                //       allowIntersection: false
                //     }
                //   },
                //   draw: {
                //     polygon: {
                //       allowIntersection: false,
                //       showArea: true
                //     }
                //   }
                // }));

                // map.on(L.Draw.Event.CREATED, function(event) {
                //   var layer = event.layer;

                //   drawnItems.addLayer(layer);
                //   // event.layer.bindPopup('ss')
                // });   

                L.control.scale().addTo(map);

                // var legend = L.control({
                //     position: 'bottomright'
                // });

                // legend.onAdd = function(map) {

                //     var div = L.DomUtil.create('div', 'info legend'),
                //         grades = ["FAT", "Customer", "Pole"],
                //         labels = ["<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/fat-maps.png", "<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/cust-maps.png", "<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/pole.png"];

                //     // loop through our density intervals and generate a label with a colored square for each interval
                //     for (var i = 0; i <script grades.length; i++) {
                //         div.innerHTML +=
                //             grades[i] + (" <img src=" + labels[i] + " height='20' width='20'>") + '<br>';
                //     }

                //     return div;
                // };

                // legend.addTo(map);

                //  var searchControl = new L.esri.Controls.Geosearch().addTo(map);

                //         var results = new L.LayerGroup().addTo(map);

                //           searchControl.on('results', function(data){
                //             results.clearLayers();
                //             for (var i = data.results.length - 1; i >= 0; i--) {
                //               results.addLayer(L.marker(data.results[i].latlng));
                //             }
                //     });   

                //     var geocoder = L.Control.geocoder({
                //   defaultMarkGeocode: true
                // })
                //   .on('markgeocode', function(e) {
                //     var bbox = e.geocode.bbox;
                //     var poly = L.polygon([
                //       bbox.getSouthEast(),
                //       bbox.getNorthEast(),
                //       bbox.getNorthWest(),
                //       bbox.getSouthWest()
                //     ]).addTo(map);
                //     map.fitBounds(poly.getBounds());
                //   })
                //   .addTo(map);
                // L.Control.geocoder().addTo(map);

                var gps = new L.Control.Gps({
                    //autoActive:true,
                    autoCenter: true,
                    marker: new L.Marker([0, 0])
                }); //inizialize control

                gps
                    .on('gps:located', function(e) {
                        //	e.marker.bindPopup(e.latlng.toString()).openPopup()
                    })
                    .on('gps:disabled', function(e) {
                        e.marker.closePopup()
                    });

                gps.addTo(map);

                // function onLocationFound(e) {
                //     var radius = e.accuracy / 2;

                //     //Create pop-up to display location accuracy.  Location is coming from IP location or GPS receiver in mobile device
                //     L.marker(e.latlng).addTo(map)
                //         .bindPopup("You are within " + radius + " meters from this point").openPopup();

                //     //Create circle to graphically represent location accuracy
                //     L.circle(e.latlng, radius).addTo(map);
                // }

                // //Code for handling any errors that come up
                // function onLocationError(e) {
                //     alert(e.message);
                // }

                // map.on('locationfound', onLocationFound);
                // map.on('locationerror', onLocationError);

                // //Locate point and zoom to that location with a zoom level of 16
                // map.locate({
                //     setView: true,
                //     maxZoom: 16
                // });

                var searchControl = L.esri.Geocoding.geosearch({
                    position: 'topright',
                    placeholder: 'Enter an address or place or coordiante points',
                    useMapBounds: false,
                    providers: [L.esri.Geocoding.arcgisOnlineProvider({
                        apikey: "AAPKe32c3372d6cd4ecfbae2ecf3737ac1b3Cj18mNpwyQkFTPaEeTzvPeNXgGCnRewIVLsJ33v46NXL4mqjcUJbFTcaUVRIH9NN", // replace with your api key - https://developers.arcgis.com
                        nearby: {
                            lat: -33.8688,
                            lng: 151.2093
                        }
                    })]
                }).addTo(map);

                L.control.polylineMeasure().addTo(map);

                var results = L.layerGroup().addTo(map);

                searchControl.on('results', function(data) {
                    results.clearLayers();
                    for (var i = data.results.length - 1; i >= 0; i--) {
                        results.addLayer(L.marker(data.results[i].latlng));
                    }
                });

                var popup = L.popup();

                function onMapClick(e) {
                    popup
                        .setLatLng(e.latlng)
                        .setContent("You clicked the map at " + e.latlng.toString())
                        .openOn(map);
                }
                map.on('contextmenu', onMapClick);

            }
        </script>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form" action="<?= base_url('potensi/tambah') ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Tambah Potensi</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <label class="">Plan ID FAT/ODP</label>
                                <select name="id_fat" class="form-control select2" style="width: 100%;">
                                    <option value="">
                                        --Pilih--
                                    </option>
                                    <?php foreach ($fat as $x) : ?>
                                        <option value=<?= $x['no']; ?><?= set_select('id_fat', $x['no']); ?> name="id_fat">
                                            ID FAT : <?= $x['id_fat']; ?> - IDLE : <?= $x['port_idle']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <br>
                            <div class="col-xs-6">
                                <label class="">NIK</label>
                                <input type="text" name="nik" id="" class="form-control input-sm" required>
                            </div>
                            <br>
                            <div class="col-xs-12">
                                <label class="">Nama Lengkap</label>
                                <input type="text" name="nama" id="" class="form-control input-sm" required>
                            </div>
                            <br>
                            <div class="col-xs-6">
                                <label class="">No.Hp/WA</label>
                                <input type="text" name="no_hp" id="" class="form-control input-sm" required>
                            </div>
                            <br>
                            <div class="col-xs-6">
                                <label class="">Email</label>
                                <input type="text" name="email" id="" class="form-control input-sm" required>
                            </div>
                            <br>
                            <div class="col-xs-12">
                                <label class="">Alamat</label>
                                <input type="text" name="alamat" id="" class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-12">
                                <label class="">Mitra/PIC Marketer</label>
                                <input type="text" name="marketer" id="" class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-6">
                                <label class="">Long</label>
                                <input type="text" name="long" id="" class="form-control input-sm" required>
                            </div>
                            <div class="col-xs-6">
                                <label class="">Lat</label>
                                <input type="text" name="lat" id="" class="form-control input-sm" required>
                            </div>
                            <br>
                            <div class="col-xs-6">
                                <label class="">Koordinat</label>
                                <input type="text" name="koordinat" id="" class="form-control input-sm" required placeholder="POINT(LONG[spasi]LAT)">
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
    </div>
</section>