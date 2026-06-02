<div class="row">

    <div class="col-sm-8">
        <div id="map" style="width: 100%; height: 100vh;"></div>
    </div>

    <div class="col-sm-4">
        <div class="row">
            <?php
                if (session()->getFlashdata('pesan')){
                    echo '<div class="alert alert-success">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
            ?>
            <?php $error = validation_errors() ?>
            <?php echo form_open_multipart('Lokasi/insertData') ?>
            <div class= "form-group">
                <label>Nama Lokasi</label>
                <input class="form-control" name="nama_lokasi">
                <p class="text-danger"><?=  isset($errors['nama_lokasi'])==isset($errors['nama_lokasi'])? validation_show_error('nama_lokasi') : '' ?></p>
            </div>
            <div class= "form-group">
                <label>Alamat Lokasi</label>
                <input class="form-control" name="alamat_lokasi">
                <p class="text-danger"><?=  isset($errors['alamat_lokasi'])==isset($errors['alamat_lokasi'])? validation_show_error('alamat_lokasi') : '' ?></p>
            </div>

            <div class= "form-group">
                <label>Latitude</label>
                <input class="form-control" name="latitude" id="Latitude">
                <p class="text-danger"><?=  isset($errors['latitude'])==isset($errors['latitude'])? validation_show_error('latitude') : '' ?></p>
            </div>
            <div class= "form-group">
                <label>Longitude</label>
                <input class="form-control" name="longitude" id="Longitude">
                <p class="text-danger"><?=  isset($errors['longitude'])==isset($errors['longitude'])? validation_show_error('longitude') : '' ?></p>
            </div>
            <div class= "form-group">
                <label>Foto Lokasi</label>
                <input type="file" class="form-control" name="foto_lokasi" accept="image/*">
                <p class="text-danger"><?=  isset($errors['foto_lokasi'])==isset($errors['foto_lokasi'])? validation_show_error('foto_lokasi') : '' ?></p>
            </div> 
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-success">Reset</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

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

    var map = L.map('map', {
	center: [-0.30500984771006817, 100.36954696550531],
	zoom: 17,
	layers: [streets]
});

const baseLayers = {
        "Streets": streets,
        "Dark": dark,
        "Satellite": satellite
    };

    const layerControl = L.control.layers(baseLayers,null, {collapsed:false}).addTo(map);

    var latinput = document.querySelector("[name=latitude]");
    var lnginput = document.querySelector("[name=longitude]");
    var posisi = document.querySelector("[name=posisi]");
    var curLocation = [-0.30500984771006817, 100.36954696550531];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation,{
        draggable: true,
    });

    //mengambil titik koordinat pada saat marker dipindahkan
    marker.on('dragend', function(e){
        var posisition = marker.getLatLng();
        marker.setLatLng (posisition,{
            curLocation,
        }).bindPopup(posisition).update();
        $("#Latitude").val(posisition.lat);
        $("#Longitude").val(posisition.lng);
        $("#Posisi").val(posisition.lat+ ', ' +posisition.lng);
    });

    //mengambil titik koordinat pada saat map di klik
    map.on('click', function(e){
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker){
            marker = L.marker(e.latlng).addTo(map);
        }else{
            marker.setLatLng (e.latlng);
        }
        latinput.value = lat;
        lnginput.value = lng;
        posisi.value = lat+ ', ' +lng;
    });

    map.addLayer(marker);
</script>