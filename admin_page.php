<?php 
 
$localhost = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$dbname = "myhome_decor"; 
 
// create connection 
$connect = new mysqli($localhost, $username, $password, $dbname); 
$sql = mysqli_query($connect, "SELECT * FROM designer");
$sql1 = mysqli_query($connect, "SELECT * FROM client");
 
// check connection 
if($connect->connect_error) {
    die("connection failed : " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
 
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
 
<div class="manageMember">CLIENT
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($data = mysqli_fetch_array($sql1)){
                ?>
                <tr>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['last_name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                </tr>
                <?php
            }
          ?>
          </tbody>
    </table>
</div>
<br>
<br>

<div class="manageMember">DESIGNER
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($data = mysqli_fetch_array($sql)){
                ?>
                <tr>
                <td><a href="designer_admin.php?id=<?php echo $data['id_d'] ?>"><?php echo $data['username']; ?></a></td>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['last_name']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['contact']; ?></td>
                </tr>
                <?php
            }
          ?>
          </tbody>
    </table>
</div>

 
</body>
</html>