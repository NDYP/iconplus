var wms_layers = [];


var lyr_OSMStandard_0 = new ol.layer.Tile({
    'title': 'OSM Standard',
    'type': 'base',
    'opacity': 1.000000,


    source: new ol.source.XYZ({
        attributions: ' &middot; <a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
        url: 'http://tile.openstreetmap.org/{z}/{x}/{y}.png'
    })
});
var format_pelanggan_1 = new ol.format.GeoJSON();
var features_pelanggan_1 = format_pelanggan_1.readFeatures(json_pelanggan_1, { dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857' });
var jsonSource_pelanggan_1 = new ol.source.Vector({
    url: 'http://localhost:8082/geoserver/icon/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=icon%3Apelanggan&outputFormat=application%2Fjson',
    format: new ol.format.GeoJSON()
});
jsonSource_pelanggan_1.addFeatures(features_pelanggan_1);
var lyr_pelanggan_1 = new ol.layer.Image({
    declutter: true,
    source: new ol.source.ImageWMS({
        url: 'http://localhost:8082/geoserver/icon/wms?',
        params: { 'LAYERS': 'icon:pelanggan' },
        ratio: 1,
        serverType: 'geoserver',
    }),
    style: style_pelanggan_1,
    interactive: true,
    title: 'pelanggan'
});
var format_odf_2 = new ol.format.GeoJSON();
var features_odf_2 = format_odf_2.readFeatures(json_odf_2, { dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857' });
var jsonSource_odf_2 = new ol.source.Vector({
    attributions: ' ',
});
jsonSource_odf_2.addFeatures(features_odf_2);
var lyr_odf_2 = new ol.layer.Vector({
    declutter: true,
    source: jsonSource_odf_2,
    style: style_odf_2,
    interactive: true,
    title: 'odf'
});

lyr_OSMStandard_0.setVisible(true);
lyr_pelanggan_1.setVisible(true);
lyr_odf_2.setVisible(true);
var layersList = [lyr_OSMStandard_0, lyr_pelanggan_1, lyr_odf_2];
lyr_pelanggan_1.set('fieldAliases', { 'no_so': 'no_so', 'nik': 'nik', 'nama': 'nama', 'id_pln': 'id_pln', 'no_hp': 'no_hp', 'email': 'email', 'alamat': 'alamat', 'no_va': 'no_va', 'service': 'service', 'bandwith': 'bandwith', 'paket_tambahan': 'paket_tambahan', 'biaya_instalasi': 'biaya_instalasi', 'no_spa': 'no_spa', 'sid': 'sid', 'sn_ont': 'sn_ont', 'brand': 'brand', 'jenis_konektor_ont': 'jenis_konektor_ont', 'sn_stb': 'sn_stb', 'jenis_kabel_dropcore': 'jenis_kabel_dropcore', 'panjang_kabel_dropcore': 'panjang_kabel_dropcore', 'dbm': 'dbm', 'instalatir': 'instalatir', 'tanggal_instalasi': 'tanggal_instalasi', 'id_fat': 'id_fat', 'port_fat': 'port_fat', 'no': 'no', });
lyr_odf_2.set('fieldAliases', { 'nama_odf': 'nama_odf', 'kapasitas_port_max': 'kapasitas_port_max', 'rack_odf': 'rack_odf', 'instalatir': 'instalatir', 'tanggal_instalasi': 'tanggal_instalasi', 'hostname_olt': 'hostname_olt', 'port_olt': 'port_olt', 'no': 'no', });
lyr_pelanggan_1.set('fieldImages', { 'no_so': 'TextEdit', 'nik': 'TextEdit', 'nama': 'TextEdit', 'id_pln': 'TextEdit', 'no_hp': 'TextEdit', 'email': 'TextEdit', 'alamat': 'TextEdit', 'no_va': 'TextEdit', 'service': 'TextEdit', 'bandwith': 'TextEdit', 'paket_tambahan': 'TextEdit', 'biaya_instalasi': 'TextEdit', 'no_spa': 'TextEdit', 'sid': 'TextEdit', 'sn_ont': 'TextEdit', 'brand': 'TextEdit', 'jenis_konektor_ont': 'TextEdit', 'sn_stb': 'TextEdit', 'jenis_kabel_dropcore': 'TextEdit', 'panjang_kabel_dropcore': 'Range', 'dbm': 'TextEdit', 'instalatir': 'TextEdit', 'tanggal_instalasi': 'DateTime', 'id_fat': 'TextEdit', 'port_fat': 'Range', 'no': 'TextEdit', });
lyr_odf_2.set('fieldImages', { 'nama_odf': 'TextEdit', 'kapasitas_port_max': 'Range', 'rack_odf': 'TextEdit', 'instalatir': 'TextEdit', 'tanggal_instalasi': 'DateTime', 'hostname_olt': 'TextEdit', 'port_olt': 'Range', 'no': 'TextEdit', });
lyr_pelanggan_1.set('fieldLabels', { 'no_so': 'no label', 'nik': 'no label', 'nama': 'no label', 'id_pln': 'no label', 'no_hp': 'no label', 'email': 'no label', 'alamat': 'no label', 'no_va': 'no label', 'service': 'no label', 'bandwith': 'no label', 'paket_tambahan': 'no label', 'biaya_instalasi': 'no label', 'no_spa': 'no label', 'sid': 'no label', 'sn_ont': 'no label', 'brand': 'no label', 'jenis_konektor_ont': 'no label', 'sn_stb': 'no label', 'jenis_kabel_dropcore': 'no label', 'panjang_kabel_dropcore': 'no label', 'dbm': 'no label', 'instalatir': 'no label', 'tanggal_instalasi': 'no label', 'id_fat': 'no label', 'port_fat': 'no label', 'no': 'no label', });
lyr_odf_2.set('fieldLabels', { 'nama_odf': 'no label', 'kapasitas_port_max': 'no label', 'rack_odf': 'no label', 'instalatir': 'no label', 'tanggal_instalasi': 'no label', 'hostname_olt': 'no label', 'port_olt': 'no label', 'no': 'no label', });
lyr_odf_2.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});