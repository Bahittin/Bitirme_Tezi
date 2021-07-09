
<?php
include('../config/db.php');
if (isset($_POST['submit'])) {

  $rutbe = $_POST['rutbe'];
  $name = $_POST['asker'];
  $d_tarihi = $_POST['d_tarihi'];

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "../soldier_images/" . $filename;


  // Get all the submitted data from the form

  $sql = "INSERT INTO soldier(fotograf, rutbe, ad_soyad, d_tarihi) VALUES (?,?,?,?)";
  // Now let's move the uploaded image into the folder: image

  $didUpload = move_uploaded_file($tempname, $folder);

  if ($didUpload) {

    $conn->prepare($sql)->execute([$filename, $rutbe, $name,  $d_tarihi]);
    header("Location: soldier.php  ");
  } else {
    echo "An error occurred. Please contact the administrator.";
    header('soldier.php');
  }
}


?>