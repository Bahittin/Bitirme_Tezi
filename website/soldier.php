<?php include('header.php'); ?>


<main>
  <section class="container mt-2">
    <div class="row">
      <!-- sol yarım-->
      <div class="col-md-6 col-sm-12 bg-light ">
        <!-- profil -->

        <?php
        //getting id from url
        $id = $_GET['id'];


        //selecting data associated with this particular id
        $sql = "SELECT * FROM soldier WHERE id=:id";
        $query = $conn->prepare($sql);
        $query->execute(array('id' => $id));
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          $name = $row['ad_soyad'];
          $d_tarihi = $row['d_tarihi'];
          $rutbe = $row['rutbe'];
          $filename =  $row['fotograf'];
        }
        ?>
        <div class="profil  row  pt-2 pb-2 ">
          <div class="col-sm-6 col-md-4">
            <img src="<?php echo '../soldier_images/' . $filename; ?>" alt="" class="img-rounded img-responsive" style="width: 180px;height: 180px;" />
          </div>
          <div class="col-sm-6 col-md-8">
            <h4> Ad-Soyad:<?php echo   $name; ?> </h4>
            <small>Rütbe:<?php echo $rutbe; ?>
            </small>
            <p>
             Doğum tarihi:<?php echo $d_tarihi; ?>
            </p>

          </div>
        </div>

        <!-- profil son -->
        <!-- biyografi -->
        <div class="profil row mt-2">
          <h1 class="text-center">Biyografi</h1>
          <article>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived
            not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
            with the release of Letraset sheets containing
            Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
          </article>
        </div>
        <!-- biyografi son -->
      </div>
      <!-- sol yarım son -->

      <!-- sağ yarım-->
      <div class="col-md-6 col-sm-12 bg-light ">
        <h3 class="text-center">Yorumlar</h3>
        <!-- comment board-->
        <div class="col-md-12 " style=" 
            max-height: 200px;
            overflow: scroll;">


          <!-- comment -->
          <?php
          //getting id from url
          $id = $_GET['id'];


          //selecting data associated with this particular id
          $sql = "SELECT * FROM comments WHERE asker_id=:id";
          $query = $conn->prepare($sql);
          $query->execute(array('id' => $id));

          while ($drow = $query->fetch(PDO::FETCH_ASSOC)) :
          ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <strong><?php echo $drow['nickname']; ?></strong> <span class="text-muted"><?php echo  $drow['post_date']; ?></span>
              </div>
              <div class="panel-body">
                <?php echo  $drow['message']; ?>
              </div><!-- /panel-body -->
            </div><!-- /panel panel-default -->
            <!-- comment -->
          <?php endwhile; ?>
        </div>


        <!-- comment board-->
        <!-- comment box -->
        <div class="card">
          <div class="card-body">
            <form action="comment_add.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="email" class="form-label">Kullanıcı adı veya email(yukarıda yorumunuz ve kimliğiniz gözükecektir)</label>
                <input type="text" class="form-control" name="nickname" id="email" placeholder="name@example.com">
              </div>
              <div class="mb-3">
                <label for="comment" class="form-label">Yorumunuz</label>
                <textarea class="form-control" name="comment" id="comment" rows="1"></textarea>
              </div>
              <div class="mb-3">
                <input type="hidden" id="custId" name="userid" value="<?php echo $_GET['id']; ?> ">
                <input type="submit" name="sendcomment" value="Yorumu Gönder" name="submit" class="btn btn-primary ">
              </div>

            </form>
          </div>

        </div>
        <!-- comment box -->

      </div>
      <!-- sağ yarım son -->
    </div>
  </section>
</main>
<?php include('footer.php'); ?>