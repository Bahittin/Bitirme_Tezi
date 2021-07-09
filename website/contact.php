<?php include('header.php'); ?>

<?php

#mesaj ekleme kodu
if (isset($_POST['record'])) {
  #kullanıcıdan gelen veriler
  $usermail = clean($_POST['email']);
  $message = clean($_POST['message']);

  $query = "INSERT INTO contact (id, email, message) VALUES (NULL, ' $usermail', ' $message');";
  if ($conn->query($query) == TRUE) {
    header('Location: ' . $_SERVER['PHP_SELF']);
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} ?>
<main>
  <div class="container " style="margin-top: 90px;">
    <div class="row">
      <div class="col-sm-6  bg-light">
        <form class="form-signin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="card ">
            <div class="card-header">
              <h4 class="">İletişim Formu</h4>
            </div>
            <div class="row mt-0">
              <div class="col-md-12 ">

                <p>Sorularınız fikirleriniz ve geri bildirim için aşağıdaki formu kullanabilirsiniz</p>
              </div>
            </div>
            <div class="form-group row mb-3">
              <div class="col-md-12 mb-0">
                <p class="mb-1">Email</p> <input id="e-mail" type="email" placeholder="Mailinizi girin" name="email" class="form-control input-box rm-border">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12 mb-2">
                <p class="mb-1">Mesajınız</p> <textarea id="message" type="text" placeholder="Mesajınızı girin" name="message" class="form-control input-box rm-border"></textarea>
              </div>
            </div>
            <div class="form-group row justify-content-center mb-0">
              <div class="col-md-12 px-3">

                <input type="submit" name="record" value="Gönder" class="btn btn-block btn-success rm-border">
                <br>
              </div>
            </div>
          </div>
        </form>

      </div>
      <div class="col-sm-6">
        <div id="mapid" style="width: 600px; height: 400px;"></div>
      </div>

    </div>
  </div>


  <script>
    var mymap = L.map('mapid').setView([36.2127,36.1361], 12);

    L.tileLayer(
      'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
      }).addTo(mymap);

    L.marker([36.2127,36.1361]).addTo(mymap)
      .bindPopup("Hatay ").openPopup();



    var popup = L.popup();
  </script>
</main>
<?php include('footer.php'); ?>