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
            fat<?= $x['no']; ?> = L.marker([<?= $x['lat'] ?>, <?= $x['long'] ?>], {
                icon: L.icon({
                    iconUrl: '<?= base_url(); ?>/assets/leaflet/NewAmartaIcon/newicon/FAT_hijau.png',
                    iconSize: [15, 15],
                })
            }).bindTooltip('<?= json_encode($x['id_fat']); ?>').bindPopup(
                'ID FAT: <?= json_encode($x['id_fat']); ?> <br> Kapasitas Port idle: <?= $x['port_idle'] ?> <br> Koordinat: <?= $x['long'] . ' ' . $x['lat'] ?>  <br> OLT: <?= json_encode($x['olt']); ?> <br> POP: <?= json_encode($x['id_pop']); ?><br> FDT: <?= json_encode($x['id_fdt']); ?> <br> <br> <a class="btn btn-xs bg-green" href="<?= base_url('fat/detail/' . $x['no']); ?>" target="_blank"> <span class="fa fa-eye"></span> Lihat Port Idle</a>'
            );
            <?php endforeach; ?>
            fat_layer = L.layerGroup([
                <?php foreach ($fatmap as $x) : ?> fat<?= $x['no'], "," ?> <?php endforeach; ?>
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

            // var marker = new L.marker([-2.222097, 113.907722], {
            //     draggable: true,
            //     autoPan: true
            // }).bindPopup(
            //     'asd'
            // ).addTo(map);

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
                // 'FAT Plan': fatongoing_layer,
                // 'FAT Proses Pembangunan': fatproses_layer,
                // 'Pelanggan Aktif': pel_eks_layer,
                // 'Pelanggan SPA Open': pel_open_layer,
                // 'Calon Pelanggan (Potensi)': pel_pot_layer,
                // 'POLE': pole_layer,
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

            // var myMarker = L.marker((-2.222097, 113.907722), {
            //         draggable: true
            //     }).addTo(map)
            //     .bindPopup("You are within ").openPopup();

            var myMarker = new L.marker([-2.222097, 113.907722], {
                draggable: true,
                autoPan: true
            }).addTo(map);

            myMarker.on("dragend", function(e) {
                var newCoords = e.target.getLatLng().toString();
                myMarker.bindPopup("New Coords: " + newCoords).openPopup();
            });

        }
        </script>
    </div>

</section>