<?php
include('../config/db.php');
if (isset($_POST['sendcomment'])) {

    $id = $_POST['userid'];
    $nickname = $_POST['nickname'];
    $comment = $_POST['comment'];
    $currentDateTime = date('Y-m-d ');

    // Get all the submitted data from the form
    $sql = "INSERT INTO comments(id,asker_id,nickname,message,post_date) VALUES (NULL,?,?,?,?)";
    // Now let's move the uploaded image into the folder: image
    $conn->prepare($sql)->execute([$id, $nickname, $comment,$currentDateTime]);
    header("Location: soldiers.php  ");
  }


?>