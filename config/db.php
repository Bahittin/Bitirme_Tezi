
<?php


$servername = "localhost";
 $username = "root";
$password = "password";
$databasename="veritabani_ismi";

try {
   $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo 'bağlantı kuruldu';
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }


?>
