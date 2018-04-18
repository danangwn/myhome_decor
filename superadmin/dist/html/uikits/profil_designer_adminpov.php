<?php 
include "../../../../core/db_connect.php";
require_once '../../../../core/init.php';

$rowid = $_GET['id_d'];
$data = mysqli_query($connect, "SELECT * FROM designer WHERE id_d=$rowid");
$query = mysqli_query($connect, "SELECT * FROM images WHERE id_designer = '$rowid' order by id_image asc");
$dat = mysqli_fetch_array($data);


                         ?>

<!DOCTYPE html>
<html>
<head>
  <title>MyHomeDecor-Admin</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="../assets/css/theme/w3.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/flat-admin.css">
</head>

<body>
  <div class="app app-default">

<!--Buat Sidebar-->
    <aside class="app-sidebar" id="sidebar">
      <div class="sidebar-header">
        <a class="sidebar-brand" href="index.php"><span class="highlight">MyHomeDecor</span>Admin</a>
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

<!--Buat Navbar-->
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
        <li class="navbar-title">Designer's Portofolio</li>

      </ul>
    </div>
  </div>
</nav>

<!-- Buat Profile Portofolio-->
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body app-heading">
          <img class="profile-img" >
          <div class="app-title">
            <div class="title"><span class="highlight"><?php echo $dat['username'] ?></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

            <section id="portfolio">
              <div class="w3-container">
                  <div class="row">
                  <?php
                    while($data = mysqli_fetch_array($query))
                    {
                  ?>
                     <div class="col-md-4 col-sm-6 portfolio-item">
                      <a class="portfolio-link">
                            <div class="portfolio-hover">
                                
                            </div>
                            <?php
                            echo "<td><img src='../../../../uploads/".$data['image']."' width='500' height='500' class='img-responsive' alt=''></td>";
                            ?>
                          <div class="portfolio-caption">
                              <?php echo $data['title'];?>
                              <a href="deleteimage1.php?id_image=<?php echo $data['id_image']?>&id=<?php echo $data['id_designer']?>">delete</a>
                          </div>
                      </div>
                      <?php
                      }
                  ?>
                  </a>
                  </div>

          </section>
            <hr>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
  </div>

  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.js"></script>
  <script type="text/javascript" src="../assets/js/vendor.js"></script>
  <script type="text/javascript" src="../assets/js/app.js"></script>
</body>
</html>
