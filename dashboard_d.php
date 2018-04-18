<?php require_once 'core/init.php';

if(not_logged_in_d() === TRUE) {
  header('location: login.php');
}

$userdata = getUserDataByUserId_d($_SESSION['id_d']);

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyHomeDecor</title>

    <!-- Native -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/w3.css" rel="stylesheet">
    <link href="css/slideshow.css" rel="stylesheet">
    <link href="css/signup.css" rel="stylesheet">
    <link href="css/searchbox.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.css" rel="stylesheet">
</head>

<body>
<!-- Top menu -->

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">MYHOMEDECOR</a>
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
    <!-- /.container-fluid -->
</nav>

<!-- Page Container -->
<div class="w3-main w3-content" style="max-width:100%">


  <!-- !Slideshow ceritanya -->

  <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">

        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img src="img/kamar/2.jpg" width=100%>
          <div class="carousel-jumbotron">
            <header>
                <div class="container">
                    <div class="intro-text">
                        <div class="intro-heading">MYHOMEDECOR</div>
                        <div class="intro-lead-in">Your Ultimate Source For Quality Decorator</div>
                    </div>
                </div>
            </header>
          </div>
            
         
          <div class="carousel-caption">
            <h3>Kamar Tidur Utama Keluarga Ratnasari </h3>
            <p>by Malina Saumnuari </p>
          </div>
        </div>

        <div class="item">
          <img src="img/kamar/1.jpg" alt="Chicago" width=100%>
          <div class="carousel-caption">
            <h3>Kamar Tidur Utama Keluarga Ratnasari </h3>
            <p>by Malina Saumnuari </p>
          </div>
        </div>

        <div class="item">
          <img src="img/kamar/3.jpg" alt="Los Angeles" width=100%>
          <div class="carousel-caption">
            <h3>Kamar Tidur Utama Keluarga Ratnasari </h3>
            <p>by Malina Saumnuari </p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->

      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
<br>
    <!--Buat Category -->
   <section class="no-padding" id="portfolio">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="section-heading">My Category</h2>
              </div>
          </div>
      </div>
            <div class="container-fluid">
                <div class="row no-gutter">
                    <div class="col-lg-3 col-sm-8">
                        <a href="category_d.php?rowid=ruang_keluarga" class="portfolio-box">
                            <img src="img/category/livingroom.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Ruang Keluarga
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <a href="category_d.php?rowid=ruang_kerja" class="portfolio-box">
                            <img src="img/category/workroom.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Ruang Kerja
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <a href="category_d.php?rowid=kamar_mandi" class="portfolio-box">
                            <img src="img/category/bathroom.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Kamar Mandi
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <a href="category_d.php?rowid=kamar_tidur" class="portfolio-box">
                            <img src="img/category/bedroom.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Kamar Tidur
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <a href="category_d.php?rowid=ruang_tamu" class="portfolio-box">
                            <img src="img/category/guesthall.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Ruang Tamu
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <a href="category_d.php?rowid=dapur" class="portfolio-box">
                            <img src="img/category/kitchen.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Dapur
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <a href="category_d.php?rowid=taman" class="portfolio-box">
                            <img src="img/category/garden.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Taman
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <a href="category_d.php?rowid=ruang_makan" class="portfolio-box">
                            <img src="img/category/diningroom.jpg" class="img-responsive" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Ruang Makan
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
  <!-- End Page Container -->
</div>

<!-- Footer -->
<footer class="text-center">
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
    </div>
</footer>

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="js/creative.min.js"> </script>
<script src="js/slideshow.js"> </script>

</body>
</html>
