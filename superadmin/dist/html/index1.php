<?php 
include '../../../core/db_connect.php';
$image = mysqli_query($connect, "SELECT * FROM images");
$count_image = mysqli_num_rows($image);
$designer = mysqli_query($connect, "SELECT * FROM designer");
$count_designer = mysqli_num_rows($designer);
$client = mysqli_query($connect, "SELECT * FROM client");
$count_client = mysqli_num_rows($client);



?>

<!DOCTYPE html>
<html>
<head>
  <title>MyHomeDecor - Admin</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

  <!-- Theme -->
  
</head>
<body>
  <div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="index.php"><span class="highlight">MyHomeDecor</span>Admin</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="active">
        <a href="index.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li>
        <a href="./uikits/designer.php">
          <div class="icon">
            <i class="fa fa-paint-brush" aria-hidden="true"></i>
          </div>
          <div class="title">Designers</div>
        </a>
      </li>
      <li>
        <a href="./uikits/client.php">
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
        </li>
        <li class="dropdown notification danger">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <div class="icon"><i class="fa fa-bell" aria-hidden="true"></i></div>
            <div class="title">System Notifications</div>
            <div class="count">10</div>
          </a>
          <div class="dropdown-menu">
            <ul>
              <li class="dropdown-header">Notification</li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">8</span>
                  <div class="message">
                    <div class="content">
                      <div class="title">New Order</div>
                      <div class="description">$400 total</div>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">14</span>
                  Inbox
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="badge badge-danger pull-right">5</span>
                  Issues Report
                </a>
              </li>
              <li class="dropdown-footer">
                <a href="#">View All <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="dropdown profile">
          <a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
            <img class="profile-img" src="./assets/images/Fadhlan.jpg">
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username">Fadhlan P</h4>
            </div>
            <ul class="action">
              <li>
                <a href="#">
                  Profile
                </a>
              </li>
              <li>
                <a href="login.php">
                  Logout
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a href="uikits/images.php" class="card card-banner card-green-light">
  <div class="card-body">
    <i class="icon fa fa-picture-o fa-4x"></i>
    <div class="content">
      <div class="title">Portofolio Uploaded</div>
      <div class="value"><span class="sign"></span><?php echo $count_image; ?></div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a href="uikits/designer.php" class="card card-banner card-blue-light">
  <div class="card-body">
    <i class="icon fa fa-paint-brush fa-4x"></i>
    <div class="content">
      <div class="title">Designer</div>
      <div class="value"><span class="sign"></span><?php echo $count_designer; ?></div>
    </div>
  </div>
</a>

  </div>
  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
      <a href="uikits/client.php" class="card card-banner card-yellow-light">
  <div class="card-body">
    <i class="icon fa fa-suitcase fa-4x"></i>
    <div class="content">
      <div class="title">Client</div>
      <div class="value"><span class="sign"></span><?php echo $count_client; ?></div>
    </div>
  </div>
</a>

  </div>
</div>


</div>
  <footer class="app-footer">
  <div class="row">
    <div class="col-xs-12">
      <div class="footer-copyright">
        Copyright © 2016 MyHomeDecor Co,Ltd.
      </div>
    </div>
  </div>
</footer>
</div>

  </div>

  <script type="text/javascript" src="./assets/js/vendor.js"></script>
  <script type="text/javascript" src="./assets/js/app.js"></script>

</body>
</html>
