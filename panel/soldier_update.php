<?php include('navbar.php'); ?>

<?php
// including the database connection file

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['update'])) {
    $id = $_POST['id'];


    $rutbe = $_POST['rutbe'];
    $name = $_POST['ad_soyad'];
    $d_tarihi = $_POST['d_tarihi'];


    // checking empty fields
    if (empty($rutbe) || empty($name) || empty($d_tarihi)) {

        if (empty($rutbe)) {
            echo "<font color='red'>Rütbe field is empty.</font><br/>";
        }

        if (empty($name)) {
            echo "<font color='red'>Ad Soyad field is empty.</font><br/>";
        }

        if (empty($d_tarihi)) {
            echo "<font color='red'>Tarih field is empty.</font><br/>";
        }
    } else {
        //updating the table


        $sql = "UPDATE soldier SET " . (empty($_FILES) ? "" : "fotograf=:foto,") . "rutbe=:rutbe,ad_soyad=:name,d_tarihi=:tarih WHERE  id=:id";
        $query = $conn->prepare($sql);

        $query->bindparam(':id', $id);
        $query->bindparam(':rutbe', $rutbe);
        $query->bindparam(':name', $name);
        $query->bindparam(':tarih', $d_tarihi);

        $stmt = $conn->query("SELECT * FROM soldier WHERE id=" . $id);
        $oldfile = $stmt->fetch();
        if (!empty($_FILES)) {
            // Eski görseli sil
            unlink('../soldier_images/' . $oldfile['fotograf']);
            // Yeni görseli yükle
            $filename = $_FILES["uploadfile"]["name"];
            $tempname = $_FILES["uploadfile"]["tmp_name"];
            $folder = "../soldier_images/" . $filename;
            $query->bindparam(':foto', $filename);
            move_uploaded_file($tempname, $folder);
        }
        $query->execute();

        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));

        //redirectig to the display page. In our case, it is index.php
        header("Location: soldier.php");
    }
}
?>
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

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Güncelleme Sayfası</h1>
   
    </div>

    <a href="soldier.php">Home</a>
    <br /><br />
        <form name="form1" method="post" action="soldier_update.php" enctype="multipart/form-data">

            <div class="mb-3">
                <img src="<?php echo '../soldier_images/' . $filename; ?>" width="100px" heigth="100px">
                <label for="formFile" class="form-label"> fotoğraf </label>
                <input type="file" name="uploadfile" class="form-control" value="" id="formFile" />
            </div>
            <div class="mb-3">
                <label for="rutbe" class="form-label">Rütbe</label>
                <input type="text" name="rutbe" value="<?php echo $rutbe; ?>" class="form-control" id="rutbe">
            </div>
            <div class="mb-3">
                <label for="asker" class="form-label">Asker İsmi</label>
                <input type="text" name="ad_soyad" value="<?php echo   $name; ?>" class="form-control" id="asker">
            </div>
            <div class="mb-3">
                <label for="borndate" class="form-label">Doğum Tarihi</label>
                <input type="date" type="date" name="d_tarihi" value="<?php echo $d_tarihi; ?>" class="form-control" id="borndate">
            </div>
            <div class="mb-3">
                <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                <input type="submit" name="update" value="Askeri Güncelle" Güncelle class=" btn btn-primary ">
</div>
</form>
</main>
</div>
</div>

        <?php include('footer.php'); ?>