<?php
   #tarih fonksiyonu
function formatDate($date){
return date('g:i a',strtotime($date));
}

#kutucuk temizle 
function clean($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function goPage($page,$message){
?>
   <script>
      alert(<?php  echo $message ?>);


      window.location.href = (<?php  echo $page ?>);
      exit;
    </script>
    <?php
}

function debug ($parameter){
   echo "<pre>";
    print_r($parameter);
    die();
  }

  ?>