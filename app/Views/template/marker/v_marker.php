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
        center: [-0.22082853502666525, 100.40538900251312],
        zoom: 17,
        layers: [streets] // Layer default yang ditampilkan saat peta dimuat
    });

    const baseLayers = {
	'Streets': streets,
	'Dark': dark,
	'Satellite': satellite
    };
    const layerControl =   L.control.layers(baseLayers,null, {collapsed: false}).addTo(map);

    const marker1= L.icon({
        iconUrl: '<?= base_url('image/rumahsaya.png') ?>',
        iconSize: [50, 50],
    })

    L.marker([-0.22082853502666525, 100.40538900251312], {icon: marker1}).addTo(map)
        .bindPopup("<img src='<?= base_url('image/rumahsaya.png') ?>' width='250px' <br>" +
        "<b> IPDN </b><br>"+
        "Negeri di atas awan <br>"+
        "Jalan Raya <br> ")
    .addTo(map);
</script>