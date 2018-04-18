<?php 
include '../../../../core/db_connect.php';
$designer = mysqli_query($connect, "SELECT * FROM designer");




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
          <li class="active">
            <a href="designer.php">
              <div class="icon">
                <i class="fa fa-paint-brush" aria-hidden="true"></i>
              </div>
              <div class="title">Designers</div>
            </a>
          </li>
          <li>
            <a href="./client.php">
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
            <li class="navbar-title">Designers</li>
          </ul>
        </div>
      </div>
    </nav>

  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          Designer's Datatable
        </div>
        <div class="card-body no-padding">
          <table class="datatable table table-striped primary" cellspacing="0" width="100%">
              <thead>
                  <tr>
                      <th>Username</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Contact Number</th>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
              <?php while($data = mysqli_fetch_array($designer)){?>
                  <tr>
                      <td><a href="profil_designer_adminpov.php?id_d=<?php echo $data['id_d']?>"><?php echo $data['username'] ?></td>
                      <td><?php echo $data['first_name'] ?></td>
                      <td><?php echo $data['last_name'] ?></td>
                      <td><?php echo $data['email'] ?></td>
                      <td><?php echo $data['contact'] ?></td>
                      <td>
                        <div>
                          <a href="updatedesigner.php?id_c=<?php echo $data['id_d']?>">
                          Edit
                          </a>
                        </div>
                        
                      <td><a href="deletedesigner.php?id_c=<?php echo $data['id_d']?>">delete</a></td>
                  <tr>
                  <?php
                  }
                  ?>
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
