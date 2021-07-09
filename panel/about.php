<?php include('navbar.php'); ?>


<?php

#silme kodu
if (isset($_GET['dsil'])) {



    $sql = "DELETE FROM contact WHERE id=:userdel_id ";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':userdel_id', $_GET['dsil']);

    if ($stmt->execute()) {

?>
        <script>
            alert("ileti silindi");
            window.location.href = ('contact.php');
            exit;
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("ileti silinemedi");
            window.location.href = ('contact.php');
            exit;
        </script>
<?php


    }
}
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hakkında Sayfası</h1>
     
    </div>
<div class="row">
    <section class="col-lg-6 col-sm-12">
        <?php


        if (isset($_POST['kaydet'])) {


            $acontent = clean($_POST['aboutcontent']);

            $sql = "UPDATE about SET about=? WHERE id=1";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($acontent));
            header('Location: ' . $_SERVER['PHP_SELF']);
        }

        foreach ($conn->query('SELECT * from  about WHERE id="1" ') as $row) {

        ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">

                    <div id="sample">

                        <h4>
                            İçerik
                        </h4>
                        <textarea class="form-control" name="aboutcontent" required rows="15" id="pdetail" style="width: 100%">
  <?php echo $row["about"]; ?>
</textarea><br />

                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" name="kaydet" class="btn btn-info btn-lg btn-block">Gönder</button>
                </div>


            </form>
        <?php

        }

        ?>
    </section>


    <section class="col-lg-6 col-sm-12">
        <?php

        foreach ($conn->query('SELECT * from about') as $row) {

        ?>

            <blockquote><?php echo $row["about"]; ?></blockquote>

        <?php
        }

        ?>
    </section>


    </div>
</main>
</div>
</div>


<?php include('footer.php'); ?>