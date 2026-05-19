<div id="map" style="width: 100%; height:  100vh;"></div>

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
        center: [-0.2733009989610224, 100.48442111207578],
        zoom: 7,
        layers: [streets] // Layer default yang ditampilkan saat peta dimuat
});

const baseLayers = {
	'Streets': streets,
	'Dark': dark,
	'Satellite': satellite
};
const layerControl =   L.control.layers(baseLayers,null, {collapsed: false}).addTo(map);

$.getJSON ("<?= base_url('provinsi/11.geojson') ?>", function (data) {
    L.geoJson (data, {
        style: function (feature){
            return{
                color: 'red',
                fillopacity: 1.0,
            }
        }
    })
    .bindPopup("<img src='<?= base_url('gambar/aceh.jpg') ?>' width='250px'> <br>" +
    "<b>Provinsi Aceh</b><br>"+
    "Total Wilayah Kelola: 5.677.081 ha <br>" +
    "Jumlah Penduduk: 5.554.820 jiwa (2024) <br>")
.addTo(map);
});
</script>