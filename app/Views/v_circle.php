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

L.circle([-0.5058663323618535, 100.77887727962566],{
    radius  :100,
    color   :'red',
    fillColor:'#f03',
    fillOpacity: 0.5,
})
    .bindPopup("PSDKU")
    .addTo(map);

</script>