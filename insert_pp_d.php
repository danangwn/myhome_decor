<?php

include "core/db_connect.php";
require_once 'core/init.php';

$userdata = getUserDataByUserId_d($_SESSION['id_d']);
$user = $userdata['id_d'];
$tmp = $_FILES['image']['tmp_name'];
$foto_size = $_FILES["image"]["size"];
$info = getimagesize($tmp);
if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)&& ($info[2] !== IMAGETYPE_JPG)) {?>
  <script language="javascript">alert("Not an Image");</script>
  <script>document.location.href='inputarticle.php';</script>
  <?php
}
else{ 
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$newpict = $user.time().'.jpg';
// Set path folder tempat menyimpan fotonya
$path = "uploads/profile".$newpict;
// Proses upload
if($foto_size < 1000000){
if(move_uploaded_file($tmp, $path)){
  $sql_buat = "UPDATE designer SET image = '$newpict' WHERE id_d = $user";
  if (mysqli_query($connect, $sql_buat)){
?>
      <script language="javascript">alert("Input Successful");</script>
      <script>document.location.href='profil_designer.php';</script>
    
    <?php
  }
  else{
?>
    <script language="javascript">alert("Input Failed");</script>
    <script>document.location.href='profil_designer.php';</script>
    <?php
  }
  }
  else{
  echo "Sorry picture cant upload.";
  echo "<br><a href='profil_client.php'>Back to Form</a>";
} 
}
else{
  echo "Sorry picture too big.";
  }
}
  mysqli_close($connect);
  
?>