<?php

include "core/db_connect.php";
require_once 'core/init.php';

    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;

        //$raw_results = mysqli_query($connect, "SELECT * FROM images
            //WHERE (`title` LIKE '%".$query."%')") or die(mysqli_error());

        $designer = mysqli_query($connect, "SELECT * FROM designer JOIN images WHERE title LIKE '%".$query."%' AND id_d = id_designer order by id_image desc" );
    // you can set minimum length of the query if you want
?>

<!DOCTYPE html>
<html>
<title>MyHomeDecor</title>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="rating.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Bootstrap-->
    <!-- Bootstrap Core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Theme CSS -->
      <link href="css/clean-blog.css" rel="stylesheet">

      <!-- Custom Fonts -->
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <style>
  body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
  </style>
</head>

<body>
<!-- Top menu -->

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
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                        <li>

                    <form class="navbar-form" role="search" action="search_result.php">
                      <div class="input-group add-on">
                        <input class="form-control" placeholder="Search" name="query" id="srch-term" type="text">
                        <div class="input-group-btn">
                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                      </div>
                    </form>
                </li>
                            <li>
                                <a href="login.php" target="_blank" class="page-scroll">LOGIN</a>
                            </li>
                            <li>
                                <a href="register.php" target="_blank" class="page-scroll">SIGN UP</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>

<!-- Page Container -->
<div class="w3-main w3-content" style="max-width:100%">
  <!-- Portfolio Grid Section -->
  <section id="portfolio" class="bg-light-gray">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 text-center">
                  <h2 class="section-heading">Hasil Pencarian untuk</h2>
                  <h3 class="section-subheading text-muted"><?php 
                  echo $query;
                  ?></h3>
                  <hr>
              </div>
          </div>
          
                         
        <?php 
            if(strlen($query) >= $min_length){
                if(mysqli_num_rows($designer) > 0){ // if one or more rows are returned do following
        ?>     
          <div class="row">
          <?php
                    while($results = mysqli_fetch_array($designer)){
            ?>
                   <div class="col-md-4 col-sm-6 portfolio-item">
                  <a href="tampilan_portofolio.php?p_id=<?php echo $results['title']?>&id=<?php echo $results['id_d']?>" class="portfolio-link">
                        <div class="portfolio-hover">
                            
                      </div>
                      
                      <?php
                      echo "<td><img src='uploads/".$results['image']."' width='500' height='500' class='img-responsive' alt=''></td>";
                      ?>
                      
                  </a>
                  <div class="portfolio-caption">
                      <h4><?php echo $results['title'];?></h4>
                      <a href="profil_designer_notloggedinpov.php?rowid=<?php echo $results['id_d'] ?>"> <?php echo $results['first_name'];?> <?php echo $results['last_name'];?></a>
                  </div>
              </div>
              <?php
              }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
       
              ?>
          </div>
      </div>

      <!-- Pagination -->
  </section>




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
<script src="js/clean-blog.min.js"></script>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>

