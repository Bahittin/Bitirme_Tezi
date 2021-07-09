<?php include('header.php'); ?>

<main>
  <section id="#about" class="container">
    <div class="row text-center mt-3">
      <h1>Vatan Savaşı'nda şehit olmuş askerlerin listesi </h1>
    </div>
    <div class="row">
      <div class="col-md-2 col-sm-12">
      </div>

      <div class="col-md-8 col-sm-12 text-center ">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Fotoğraf</th>
              <th scope="col">Rütbesi</th>
              <th scope="col">Ad_Soyad</th>
              <th scope="col">Doğum Tarihi</th>
              <th scope="col">İşlemler</th>
            </tr>
          </thead>
          <tbody>
          <?php

            $query =  "SELECT *FROM soldier ORDER BY id DESC";
            $run = $conn->query($query);

            while ($row = $run->fetch()) :
            ?>

              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><img src="<?php echo "../soldier_images/" .  $row['fotograf']; ?>" width="50px"></td>
                <td><?php echo $row["rutbe"];   ?> </td>
                <td><?php echo $row["ad_soyad"];   ?></td>
                <td><?php echo $row["d_tarihi"];   ?></td>
                <td>
                  <div class='btn-group' role='group' aria-label='...'>
                    <a href="soldier.php?id=<?php echo $row['id']; ?>"><button type='button' class='btn btn-danger btn-sm'>İncele</button</a>
                     
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

    </div>
    <div class="col-md-2 col-sm-12">
    </div>

    </div>

  </section>
  <?php include('footer.php'); ?>