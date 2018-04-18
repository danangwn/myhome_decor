<?php 
    include'../../../../core/db_connect.php';
    $idpost = $_GET['id_c'];
    $query = mysqli_query($connect,"SELECT * FROM client WHERE id = '$idpost'");
    $data = mysqli_fetch_array($query);
if($_POST) {
  $idp = $_GET['id_c'];
  $username = $_POST['username'];
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email = $_POST['email'];
  $sql = "UPDATE client SET username = '$username', first_name = '$fname', last_name = '$lname', email = '$email' WHERE id = '$idpost'";
  $query = $connect->query($sql);?>

  <script language="javascript">alert("Berhasil Edit!");</script>
  <script>document.location.href='client.php';</script>
<?php }
?>



<!DOCTYPE html>
<html>
<head>
  <title>MyHomeDecor - Admin</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/yellow.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/theme/w3.css">

</head>
<body>
  <div class="app app-default">

    <aside class="app-sidebar" id="sidebar">
      <div class="sidebar-header">
        <a class="sidebar-brand" href="../index.php"><span class="highlight">MyHomeDecor</span>Admin</a>
        <button type="button" class="sidebar-toggle">
          <i class="fa fa-times"></i>
        </button>
      </div>
      <div class="sidebar-menu">
        <ul class="sidebar-nav">
          <li>
            <a href="../index.php">
              <div class="icon">
                <i class="fa fa-tasks" aria-hidden="true"></i>
              </div>
              <div class="title">Dashboard</div>
            </a>
          </li>
          <li>
            <a href="./designer.php">
              <div class="icon">
                <i class="fa fa-paint-brush" aria-hidden="true"></i>
              </div>
              <div class="title">Designers</div>
            </a>
          </li>
          <li class="active">
            <a href="client.php">
              <div class="icon">
                <i class="fa fa-suitcase" aria-hidden="true"></i>
              </div>
              <div class="title">Client</div>
            </a>
          </li>
        </ul>
      </div>

      <div class="sidebar-footer">
        <ul class="menu">
          <li>
            <a href="/" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-cogs" aria-hidden="true"></i>
            </a>
          </li>
          <li><a href="#"><span class="flag-icon flag-icon-th flag-icon-squared"></span></a></li>
        </ul>
      </div>
    </aside>

    <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
      <div class="dropdown-background">
        <div class="bg"></div>
      </div>
      <div class="dropdown-container">
        {{list}}
      </div>
    </script>
    <div class="app-container">

      <nav class="navbar navbar-default" id="navbar">
      <div class="container-fluid">
        <div class="navbar-collapse collapse in">
          <ul class="nav navbar-nav navbar-mobile">
            <li>
              <button type="button" class="sidebar-toggle">
                <i class="fa fa-bars"></i>
              </button>
            </li>
            <li class="logo">
              <a class="navbar-brand" href="#"><span class="highlight">MyHomeDecor</span> Admin</a>
            </li>
            <li>
              <button type="button" class="navbar-toggle">
                <img class="profile-img" src="./assets/images/Fadhlan.jpg">
              </button>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-left">
            <li class="navbar-title">Dashboard</li>
            <li class="navbar-search hidden-sm">
              <input id="search" type="text" placeholder="Search..">
              <button class="btn-search"><i class="fa fa-search"></i></button>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          Client's Datatable
        </div>
        <div class="card-body no-padding">
          <table class="datatable table table-striped primary" cellspacing="0" width="100%">
              <tbody>
                  <tr>
                      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    <label><b>Username</b></label><br>
                                    <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" required><br>
                                    <label><b>First Name</b></label><br>
                                    <input type="text" class="form-control" name="first_name" value="<?php echo $data['first_name']; ?>" required><br>
                                    <label><b>Last Name</b></label><br>
                                    <input type="text" class="form-control" name="last_name" value="<?php echo $data['last_name']; ?>" required><br>
                                    <label><b>Email</b></label><br>
                                    <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" required><br>
                                    <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-success">Save changes</button>
                              </div>
                                </form>
                  <tr>

              </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>

  <script type="text/javascript" src="../assets/js/vendor.js"></script>
  <script type="text/javascript" src="../assets/js/app.js"></script>

</body>
</html>
