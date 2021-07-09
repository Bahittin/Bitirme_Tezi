<?php include('../config/db.php');

include('../utilities/displayerror.php');
include('../utilities/utility.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="" />
  <meta name="author" content="Bahittin Zateri" />
  <link rel="shortcut icon" href="static/img/favicon.ico">
  <title>Şehitler Anıtı</title>


  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/product/" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


  <!-- Custom styles for this template -->
  <link href="static/product.css" rel="stylesheet" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark menucolor sticky-top" aria-label="Tenth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="static/img/azerbaijan.png" width="25px" />Şehitler Anıtı</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Anasayfa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="about.php">Hakkımızda
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="soldiers.php">Askerlerin Listesi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="contact.php">İletişim</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>