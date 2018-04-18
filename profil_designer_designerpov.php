<?php 
include "core/db_connect.php";
require_once 'core/init.php';


$userdata = getUserDataByUserId_d($_SESSION['id_d']);
$rowid = $_GET['rowid'];
$data = mysqli_query($connect, "SELECT * FROM designer WHERE id_d= '$rowid' ");
$query = mysqli_query($connect, "SELECT * FROM images WHERE id_designer = '$rowid' order by id_image desc");
$dat = mysqli_fetch_array($data);
$dat1 = mysqli_fetch_array($query);
$id_d = $dat1['id_designer'];
$query_komentator = mysqli_query($connect, "SELECT * FROM client JOIN comment WHERE id = id_client AND id_designer = '$rowid' ORDER BY id_comment DESC");


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
                <a>
                  <?php echo $userdata['username'];?>
                </a>
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
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (!$userdata['image']) {
                            echo "<img src='uploads/default.jpg' class='w3-circle w3-hover-opacity' style='width:25px;height:25px'>";
                          }
                          else {
                         echo "<img src='uploads/profile".$userdata['image']."' style='width:25px;height:25px' class='w3-circle w3-hover-opacity'>";
                         }?>
						            </a>
						            <ul class="dropdown-menu dropdown-user">
                          <li>
                            <a href="profil_designer.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
<div class="w3-content w3-main" style="max-width:1250px;margin-top:80px">

  <!-- The Grid -->
  <div class="w3-row-padding">

    <!-- Left Column -->
    <div class="w3-third">
      <div class="w3-white w3-text-grey w3-card-4">
        <!-- Ini Kolom Avatar -->
        <div class="w3-display-container">
        <?php
                         echo "<img src='uploads/profile".$dat['image']."' style='width:100%' alt='Avatar'>";
                         ?>
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $dat['first_name']; ?> <?php echo $dat['last_name']; ?></h2>
          </div>
        </div>
        <br>
        <!-- Ini Kolom Kontak, Lokasi, Rating segala macem -->
        <div class="w3-container">
		      <h2><a href="#about"><i class="fa fa-certificate fa-fw w3-margin-right w3-large w3-text-teal"></i>About me</a></h2>
          <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-teal w3-large" style="width:100%"><i></i>Book This Designer</button>
          <hr>
                  <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
              <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                </div>

                <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>My Contact</h2>
                <h4 class="w3-text-teal"><i class="fa fa-envelope fa-fw w3-margin-right"></i><?php echo $dat['email']; ?></h5>
                <h4 class="w3-text-teal"><i class="fa fa-phone fa-fw w3-margin-right"></i><?php echo $dat['contact']; ?></h5>
            </div>

          



            </div>
        </div>
        </div>
      </div>
      <br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>My Portofolio</h2>

      <!-- Buat Portofolio-->
      <!-- Portfolio Grid Section -->
       <section id="portfolio">
          <div class="w3-container">
              <div class="row">
              <?php
                while($dta = mysqli_fetch_array($query))
                { 
              ?>                                       
                  <div class="col-md-6 col-sm-8 portfolio-item">
                      <a href="tampilan_portofolio_d.php?p_id=<?php echo $dta['title']?>&id=<?php echo $dta['id_designer']?>" class="portfolio-link">
                        <div class="portfolio-hover">
                        </div>
                          <?php
                         echo "<td><img src='uploads/".$dta['image']."' width='500' height='500' class='img-responsive' alt=''></td>";
                         ?>
                      </a>
                      <div class="portfolio-caption">
                          <?php echo $dta['title'];?>
                      </div>
                  </div>
                  <?php
                  }
                                  ?>
                 </div>
          </div>
      </section>

  		<hr>
      </div>

      <!-- Buat About-->
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom" id="about">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>About Me</h2>
              <div class="w3-container">
                <h4 class="w3-opacity"><b>Biografi Singkat</b></h4>
                <p>Saya adalah seorang designer profesional yang telah terjun di bidang ini selama lebih dari 15 tahun. Saya juga pernah dinobatkan sebagi Designer of The Year oleh majalah nasional Interior Idaman pada tahun 2013.</p>
                <hr class="divider">
                <!--Testimonial-->
                <div class="row">
                  <!-- Team Container -->
                  <div class="w3-container w3-padding-64 w3-center" id="team">
                  <h3>What my customers said about me?</h3>
                    <div class="w3-row"><br>
                    <?php 
                    $x = 0;
                    while (($data = mysqli_fetch_array($query_komentator)) && ($x < 3)) {
                     ?> 
                     <div class="w3-third">
                        <?php
                         echo "<img src='uploads/profile".$data['image']."' style='width: 100px;height:100px' class='img-circle'>";
                         ?>
                        <h3><?php echo $data['first_name']; ?> <?php echo $data['last_name']; ?></h3>
                        <p> <?php echo $data['comments']; ?> </p>
                      </div>
                    <?php
                    $x++; 
                    } 
                    ?>
                    </div>
                  </div>
                  <!--End of Testimonial-->
                </div>
              </div>
          </div>
      <!-- Buat contact-->
        
        <hr>
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
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>




</body>
</html>
