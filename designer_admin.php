<?php 
$localhost = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "myhome_decor";


$connect = new mysqli($localhost, $username, $password, $dbname);
$rowid = $_GET['id'];
$data = mysqli_query($connect, "SELECT * FROM designer WHERE id_d=$rowid");
$query = mysqli_query($connect, "SELECT * FROM images WHERE id_designer = '$rowid'");
$dat = mysqli_fetch_array($data);


                         ?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD</title>
 
    <style type="text/css">
        .manageMember {
            width: 50%;
            margin: auto;
        }
 
        table {
            width: 100%;
            margin-top: 20px;
        }
 
    </style>
 
</head>
<body>
<div class="manageMember">POST
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Images</th>
                <th>Text</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                <td><?php echo $data['title']; ?></a></td>
                <?php
                         echo "<td><img src='uploads/".$data['image']."' width='10%' height='10%' class='img-responsive' alt=''></td>";
                         ?>
                <td><?php echo $data['text']; ?></td>
                </tr>
                <?php
            }
          ?>
          </tbody>
    </table>
</div>

 
</body>
</html>