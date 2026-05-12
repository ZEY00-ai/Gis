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
        center: [-0.5058663323618535, 100.77887727962566],
        zoom: 17,
        layers: [streets] // Layer default yang ditampilkan saat peta dimuat
});

const baseLayers = {
	'Streets': streets,
	'Dark': dark,
	'Satellite': satellite
};
const layerControl =   L.control.layers(baseLayers,null, {collapsed: false}).addTo(map);

L.polyline ([
    [-0.5060024452866239, 100.77852821908623],
    [-0.510261625674781, 100.77978349290522],
    [-0.5084163388234624, 100.78148937782353],
    [-0.5059488032566694, 100.78232622702872],
    [-0.5047472203797547, 100.78333473760935],
    [-0.5033525256331269, 100.78160739500792],
    [-0.5032774266700242, 100.78140354711775],
    [-0.5007884323019651, 100.7767579611453],
    [-0.5060024452866239, 100.77852821908623]
], {
    color   : 'red',
    weight  : 6,
})
.bindPopup("<img src='<?= base_url('image/road.png') ?>' width ='50px'<br>"+
"<b>Jalan PSDKU</b><br>"+
"Lebar : 6 meter <br>")
.addTo(map);
</script>