<?php $this->load->view('backend/tema/Header'); ?>
<section class="content page-calendar">
    <div class="container-fluid">
      <div class="block-header">
        <h2>Titik Pantau</h2>
      </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-t-20">
                    <div class="body">
                      <form class="" action="<?php echo site_url('backend/pantau/add'); ?>" method="post">
                        <div class="form-group">
                          <div class="form-line">
                              <b>Lokasi</b>
                              <input type="text" class="form-control" name="lokasi" placeholder="nama lokasi" required>
                          </div>
                      </div>
                      <div class="form-group drop-custum">
                        <b>Jenis</b>
                          <select name="jenis" class="form-control show-tick" required>
                              <option value="1">Pelanggaran Perda</option>
                              <option value="2">Gangguan Tibum Tranmas</option>
                              <option value="3">Kerawanan Sosial</option>
                          </select>
                      </div>
                      <div class="form-group drop-custum">
                        <b>Zona</b>
                          <select name="zona" class="form-control show-tick" required>
                              <option value="tinggi">Zona Merah (Skala Tinggi)</option>
                              <option value="sedang">Zona Biru (Skala Menengah)</option>
                              <option value="rendah">Zona Kuning (Skala Rendah)</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <div class="form-line">
                            <b>Keterangan</b>
                            <input type="text" class="form-control" name="keterangan" placeholder="keterangan" required>
                        </div>
                    </div>
                      <div class="form-group">
                          <div class="form-line">
                              <b>Titik Koordinat</b>
                              <input type="text" class="form-control" name="koordinat" readonly placeholder="Titik Koordinat" id="koordinat" required>
                          </div>
                      </div>
                      <div id="map-canvas" style="height: 400px; width: 100%;"></div>
                      <div class="form-group">
                        <button class="btn btn-info btn-raised">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
      </div>
</section>

<script>
function initMap() {
  var depok = {lat: -6.4328061, lng: 106.806266};
  var map = new google.maps.Map(
  document.getElementById('map-canvas'), {zoom: 11.5, center: depok});
  var marker = new google.maps.Marker({position: 0, map: map});

  google.maps.event.addListener(map, 'click', function( event ){
    // alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
      marker.setPosition(event.latLng);
    $('#koordinat').val(event.latLng.lat()+","+event.latLng.lng());

  });
}
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd9y51NHJatP8XlzDnG7Yf8owDzSithT4&callback=initMap">
  </script>


<?php $this->load->view('backend/tema/Footer'); ?>
