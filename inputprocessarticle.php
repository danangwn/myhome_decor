<?php

include "core/db_connect.php";
require_once 'core/init.php';

error_reporting(E_PARSE);
$userdata = getUserDataByUserId_d($_SESSION['id_d']);
$id = $userdata['id_d'];
$title = $_POST['title'];
$text = $_POST['text'];
$category = $_POST['category'];

$pict = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
$foto_size = $_FILES["image"]["size"];
$info = getimagesize($tmp);
if (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG) && ($info[2] !== IMAGETYPE_JPG)) {?>
  <script language="javascript">alert("Not an Image");</script>
  <script>document.location.href='profil_designer.php';</script>
  <?php
}
else{ 
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$newpict = $title.time().'.jpg';
// Set path folder tempat menyimpan fotonya
$path = "uploads/".$newpict;
// Proses upload
if($foto_size < 1000000){
if(move_uploaded_file($tmp, $path)){
  $sql_buat = "INSERT INTO images(id_image, image, id_designer, text, title, category) VALUE ('','$newpict','$id', '$text', '$title', '$category')";
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
  echo "<br><a href='profil_designer.php'>Back to Form</a>";
} 
}
else{
  echo "Sorry picture too big.";
  }
}
  mysqli_close($connect);
  
?>