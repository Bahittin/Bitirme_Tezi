<?php
include('../config/db.php');

session_start();


if (
    isset($_POST['login']) && !empty($_POST['username'])
    && !empty($_POST['password'])
) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
    $stmt->execute(array(':username' =>  $username, ':password' => $password));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {

        $_SESSION["username"] = $row['username'];


        echo '<script>window.location.href="index.php"</script>';
    } else {
        $message = 'şifre yok';
    }
} else {
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Anıt Girişi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
  <meta name="author" content="Bahittin Zateri" />
  <title>Anıt Proje Paneli</title>
  <link rel="shortcut icon" href="static/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: grey;
        }

        .login-form {
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            border-color: rgb(156, 150, 150);
        }
    </style>
</head>

<body>

    <div class="container ">
        <div class="row">
            <div class="col-md-4 offset-md-4 ">

                <div class="login-form bg-dark mt-4 p-4 text-white ">
                    <form class="row g-3" class="" role="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <?php if (!empty($message)) : ?>
                            <p class="text-danger"><?= $message ?></p>
                        <?php endif; ?>
                        <h4 class="text-center">Giriş Paneli</h4>
                        <div class="col-12">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="admin">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="12345">
                        </div>

                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <button type="submit" name="login" class="btn btn-success float-end">Giriş Yap</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
</body>

</html>