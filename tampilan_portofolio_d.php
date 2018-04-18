<?php
    include "core/db_connect.php";
    require_once 'core/init.php';
    $userdata = getUserDataByUserId_d($_SESSION['id_d']);
    $p_id = $_GET['p_id'];
    $id = $_GET['id'];


    $album = mysqli_query($connect, "SELECT * FROM images WHERE title = '$p_id' AND id_designer = '$id'");
    $data1 = mysqli_fetch_array($album);


?>


<!DOCTYPE html>
<html>
<title>MyHomeDecor</title>
<!-- Native -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="author" content="">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Bootstrap-->
  <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <link href="css/w3.css" rel="stylesheet">
    <link href="css/rating.css" rel="stylesheet">
    <link href="css/rateme.css" rel="stylesheet">
    <link href="css/cobacoba.css" rel="stylesheet">
    <link href="css/testimonial.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>

<body>

  <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php"></i> MyHomeDecor</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
              <li>

                                  <form class="navbar-form" role="search" action="search_result_d.php">
                                    <div class="input-group add-on">
                                      <input class="form-control" placeholder="Search" name="query" id="srch-term" type="text">
                                        <div class="input-group-btn">
                                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                  </form>
                              </li>
              <a>
                <?php echo $userdata['username']; ?>
              </a>
                  <li>
                      <a class="dropdown-toggle" data-toggle="dropdown">
                                   <?php if (!$userdata['image']) {
                            echo "<img src='uploads/default.jpg' class='w3-circle w3-hover-opacity' style='width:25px;height:25px'>";
                          }
                          else {
                         echo "<img src='uploads/profile".$userdata['image']."' style='width:25px;height:25px' class='w3-circle w3-hover-opacity'>";
                         }?>
                      </a>
                      <ul class="dropdown-menu dropdown-user" style="font-family: "Raleway", sans-serif">
                        <li>
                          <a href="profil_designer.php"><i class="fa fa-user fa-fw"></i> <h3>User Profile</h3></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                      </ul>
                  </li>
              </ul>
          </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- Page Container -->
<div class="w3-content w3-main" style="max-width:1250px;margin-top:80px;margin-left:300px">

  <!-- The Grid -->
  <div class="w3-row-padding">


    <!-- Right Column -->
    <div class="w3-threequarter">
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-teal w3-padding-16 text-center"><?php echo $data1['title']; ?></h2>

      <!-- Buat Portofolio-->
          <div class="row">
            <div class="col-lg-12">
              <div class="modal-body">
              <!-- Project Details Go Here -->
                <p><?php echo $data1['text']; ?>
                </p>
                <?php 
                echo "<img class='img-responsive img-centered' src='uploads/".$data1['image']."' width='100%' height='100%'>";
                  while ($data = mysqli_fetch_array($album)) {
                    echo "<img class='img-responsive img-centered' src='uploads/".$data['image']."' width='100%' height='100%'>";
                    
                  }

                 ?>
              </div>
            </div>
          </div>
      </div>

    <!-- End Right Column -->
    </div>
  <!-- End Grid -->
  </div>
<!-- End Page Container -->
</div>

<!-- Footer -->
<footer class="text-center" style="max-width:100%">
    <div class="footer-above">
        <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2 text-center">
                  <h2 class="section-heading" style="color:white">Let's Get In Touch!</h2>
                  <p>Kami akan senang mendengar feedback dan masukan dari Anda</p>
              </div>
              <div class="col-lg-4 col-lg-offset-2 text-center">
                  <i class="fa fa-phone fa-3x sr-contact"></i>
                  <p>123-456-6789</p>
              </div>
              <div class="col-lg-4 text-center">
                  <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                  <p><a href="mailto:your-email@your-domain.com">myhomedecor@gmail.com</a></p>
              </div>
            </div>
            <h4>You Can Follow Us Too</h4>
            <ul class="list-inline">
                <li>
                    <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a>
                </li>
                <li>
                    <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
        </div>
</footer>

  <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>




</body>
</html>

Contact GitHub 