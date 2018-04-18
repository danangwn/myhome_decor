<?php

require_once 'core/db_connect.php';
require_once 'core/init.php';
include 'k_bathroom.php';

$userdata = getUserDataByUserId($_SESSION['id']);
$id = $userdata['id'];
$id_des = $_GET['rowid'];

if($_POST) {
    $comments = $_POST['comments'];


    $sql = "INSERT INTO comment (comments, id_client, id_designer) VALUES ('$comments', '$id', '$id_des')";
    if($connect->query($sql) === TRUE) {?>

                <script language="javascript">alert("New Record Successfully Created");</script>
                <script>document.location.href='profil_designer_clientpov.php';</script>;<?php
    } else {
        ?>

                <script language="javascript">alert("Error");</script>
                <script>document.location.href='profil_designer_clientpov.php';</script>;<?php
    }

    $connect->close();
}

?>
