<?php include('navbar.php'); ?>


<?php


if (isset($_GET['dsil'])) {

  $sql = "DELETE FROM soldier WHERE id=:userdel_id ";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':userdel_id', $_GET['dsil']);

  $old = $conn->query("SELECT * FROM soldier WHERE id=" . $_GET['dsil']);
  $oldfile = $old->fetch();
  unlink('../soldier_images/' . $oldfile['fotograf']);


  if ($stmt->execute()) {

    goPage('soldier.php', 'ileti silindi');
  } else {
    goPage('soldier.php', 'ileti silinmedi');
  }
}


?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="container">
    <div class="row">
      <!-- askerlerin listesi -->
      <div class="col-md-6">
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
                    <a href="soldier_update.php?id=<?php echo $row['id']; ?>"><button type='button' class='btn btn-danger btn-sm'>edit</button</a>
                        <a href="?dsil=<?php echo $row['id']; ?>"><button type='button' class='btn btn-danger btn-sm'>sil</button></a>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>

          </tbody>
        </table>

      </div>
      <!-- askerlerin listesi -->
      <!-- askerler ekleme paneli -->
      <div class="col-md-6">
        <div class="card mt-3">
          <div class="card-body">
            <h3 class="text-center">Asker Ekleme</h3>
            <form action="soldier_add.php" method="post" enctype="multipart/form-data">

              <div class="mb-3">
                <label for="formFile" class="form-label"> fotoğraf </label>
                <input type="file" name="uploadfile" class="form-control" value="" id="formFile" />
              </div>
              <div class="mb-3">
                <label for="rutbe" class="form-label">Rütbe</label>
                <input type="text" placeholder="rutbe" name="rutbe" class="form-control" id="rutbe">
              </div>
              <div class="mb-3">
                <label for="asker" class="form-label">Asker İsmi</label>
                <input type="text" placeholder="asker" name="asker" class="form-control" id="asker">
              </div>
              <div class="mb-3">
                <label for="borndate" class="form-label">Doğum Tarihi</label>
                <input type="date" placeholder="d_tarihi" name="d_tarihi" class="form-control" id="borndate">
              </div>
              <div class="mb-3">
                <input type="submit" value="Asker Yükle" name="submit" class="btn btn-primary ">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- askerlerin ekleme paneli -->
    </div>

  </div>
</main>
</div>
</div>


<?php include('footer.php'); ?>