
<div id="map" style="width: 100%; height: 100vh;"></div>
<script>
var streets = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap & CartoDB'
    });

var dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; OpenStreetMap & CartoDB'
    });

var satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles © Esri'
    });

const map = L.map('map', {
	center: [-0.3306648294884924, 99.88939542391378],
	zoom: 10,
	layers: [streets]
});

const baseLayers = {
	'Street': streets,
	'Dark': dark,
	'Satellite': satellite
};
const layerControl = L.control.layers(baseLayers, null, { collapsed:false }).addTo(map);
//icon marker
const gedung=L.icon({
    iconUrl: '<?= base_url('gambar/gedung.png') ?>',
    iconSize: [45, 45],

});
//pemetaan lokasi
<?php foreach ($lokasi as $key => $value) {?>
L.marker([<?= $value['latitude'] ?>, <?= $value['longitude'] ?>],{
        icon: gedung
    })
.bindPopup('<img src="<?= base_url('foto/' . $value['foto_lokasi']) ?>" width="150px"><br>' +
    '<b><?= $value['nama_lokasi'] ?></b><br>' +
    'Alamat : <?= $value['alamat_lokasi'] ?><br>')
    .addTo(map);
<?php } ?>
</script>
