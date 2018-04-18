<?php
include "core/db_connect.php";
require_once 'core/init.php';

if(not_logged_in_d() === TRUE) {
  header('location: login.php');
}

$userdata = getUserDataByUserId_d($_SESSION['id_d']);
  $id = $userdata['id_d'];
  $query = mysqli_query($connect, "SELECT * FROM images WHERE id_designer = '$id' Order by id_image desc");
  $query_komentator = mysqli_query($connect, "SELECT * FROM client JOIN comment WHERE id = id_client AND id_designer = '$id' ORDER BY id_comment DESC");

  if($_POST) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];


  if($fname == "") {
    echo " * First Name is Required <br />";
  }

  if($lname == "") {
    echo " * Last Name is Required <br />";
  }

  if($fname && $lname) {
    $user_exists = client_exists_by_id_d($_SESSION['id_d'], $fname);
    if($user_exists === TRUE) {
      echo "Name already exists <br /> ";
    } else {
      if(updateName_d($_SESSION['id_d']) === TRUE) {
        echo "Successfully Updated <br />";
      } else {
        echo "Error while updating the information";
      }
    }
  }

}
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
                            <a href="profil_client.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                         <?php if (!$userdata['image']) {
                            echo "<img src='uploads/default.jpg' style='width:100% alt='Avatar'>";
                          }
                          else {
                         echo "<img src='uploads/profile".$userdata['image']."' style='width:100%' alt='Avatar'>";
                         }?>

        </div>
        <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-block w3-teal" style="width:100%"><i class="fa fa-camera"></i> Insert Profile Pic</button>
        <br>
        <!-- Ini Kolom Kontak, Lokasi, Rating segala macem -->
        <div class="w3-container">
        <div class="col-lg-12">
        <div id="id02" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

                <div class="w3-center"><br>
                    <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                </div>

                <form class="w3-container" action="insert_pp_d.php" method="post" enctype="multipart/form-data">
            <div class="w3-section">
              <label><b>Attachment</b></label>
              <p><form ><input type="file" name="image" id="fileToUpload"></form></p>
              <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
             <input type="submit" value="Upload Image" name="submit" class="w3-button w3-teal w3-right">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

          </div>
            </div>

          </form>



            </div>
        </div>
        </div>
        <div class="intro-text">
            <h1 class="name">
              <?php echo $userdata['first_name']; ?> <?php echo $userdata['last_name']; ?>
              <button type="button" id="buttoneditprofile" class="btn btn-info text w3-teal" data-toggle="collapse" data-target="#editprofile">
                <i class="fa fa-pencil"></i>
              </button>
            </h1>
            <div id="editprofile" class="collapse">
            <br>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" class="login-form" method="post">
                  <label><b>First Name</b></label><br>
                  <input type="text" name="fname" value="<?php if($_POST) { echo $_POST['fname'];
                } else
                {echo $userdata['first_name'];
                } ?>"><br>
                  <label><b>Last Name</b></label><br>
                  <input type="text" name="lname" value="<?php if($_POST) { echo $_POST['lname'];
                } else {echo $userdata['last_name'];
                } ?>"><br><br>
                  <button type="submit" class="btn w3-teal w3-center">Confirm</button><br><br>
                </form>
                <br>
            </div>

          </div>
		      <h2><a href="#about"><i class="fa fa-certificate fa-fw w3-margin-right w3-large w3-text-teal"></i>About me</a></h2>
          <hr>

          <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
              <td><h3><a href="changepassword.php">Ganti Password</a></h3></td>
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
      		<!-- Upload Button -->
      		<p>
      		<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-teal w3-large" style="margin-left:610px"><i class="fa fa-camera"></i> UPLOAD</button>
      		<div id="id01" class="w3-modal">
      			<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      				<div class="w3-center"><br>
      					<span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      				</div>
      				<form class="w3-container" action="inputprocessarticle.php" method="post" enctype="multipart/form-data">
                <div class="w3-section">
                  <label><b>Attachment</b></label>
                  <p><form ><input type="file" name="image" id="fileToUpload"></form></p>
                  <label><b>Image Title</b></label>
                  <p><input type="text" name="title" placeholder="Title"></p>
                  <label><b>Description</b></label>
                  <textarea class="w3-input w3-border" type="text" placeholder="Enter Description" name="text" required> </textarea>
                  <label><b>Category</b></label>
                  <br>
                  <div class="radio">
                    <label class="checkbox-inline"><input type="radio" value="ruang_keluarga" name="category">Ruang Keluarga</label>
                    <label class="checkbox-inline"><input type="radio" value="ruang_kerja" name="category">Ruang Kerja</label>
                    <label class="checkbox-inline"><input type="radio" value="kamar_mandi" name="category">Kamar Mandi</label>
                    <label class="checkbox-inline"><input type="radio" value="kamar_tidur" name="category">Kamar Tidur</label>
                  </div>
                  <div class="radio">
                    <label class="checkbox-inline"><input type="radio" value="ruang_tamu" name="category">Ruang Tamu</label>
                    <label class="checkbox-inline"><input type="radio" value="dapur" name="category">Dapur</label>
                    <label class="checkbox-inline"><input type="radio" value="taman" name="category">Taman</label>
                    <label class="checkbox-inline"><input type="radio" value="ruang_makan" name="category">Ruang Makan</label>
                  </div>
                  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                 <input type="submit" value="Upload Image" name="submit" class="w3-button w3-teal w3-right">
                <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>

              </div>
                </div>

              </form>



      			</div>
      		</div>
      		</p>

          <!-- Buat Portofolio-->
          <!-- Portfolio Grid Section -->
          <section id="portfolio">
              <div class="w3-container">
                  <div class="row">
                  <?php
                    while($data = mysqli_fetch_array($query))
                    {
                  ?>
                     <div class="col-md-4 col-sm-6 portfolio-item">
                      <a href="tampilan_portofolio_d.php?p_id=<?php echo $data['title']?>&id=<?php echo $data['id_designer']?>" class="portfolio-link">
                            <div class="portfolio-hover">
                                
                            </div>
                            <?php
                            echo "<td><img src='uploads/".$data['image']."' width='500' height='500' class='img-responsive' alt=''></td>";
                            ?>
                          <div class="portfolio-caption">
                              <h3><?php echo $data['title'];?></h3>
                              <a href="deleteimage.php?id_image=<?php echo $data['id_image']?>">delete</a>
                          </div>
                      </div>
                      <?php
                      }
                  ?>
                  </a>
                  </div>

          </section>

      		<!-- Pagination -->
      		<hr>
      </div>

      <!-- Buat About-->
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom" id="about">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>About Me</h2>
              <div class="w3-container">
                <h4 class="w3-text-teal">
                  <div class="intro-text">
                  <h1 class="name">
                  <h4><?php echo $userdata['about']; ?></h4>
                    <button type="button" id="buttoneditprofile" class="btn btn-info text w3-teal" data-toggle="collapse" data-target="#editabout">
                      <i class="fa fa-pencil"></i>
                    </button>
                </h1>
                <div id="editabout" class="collapse">
            <br>
                    <form action="about_post.php" class="login-form" method="post">
                      <label><b>About</b></label><br>
                        <textarea name="about" value="<?php if($_POST) { echo $_POST['about'];
                      } else
                      {echo $userdata['about'];
                      } ?>"></textarea><br>
            <br>
                        <button type="submit" class="btn w3-teal w3-center">Confirm</button><br><br>
                    </form>
            <br>
                </div>

          </div>
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

      <!-- Buat contact-->
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom" id="contact">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>My Contact</h2>
        <h4 class="w3-text-teal"><i class="fa fa-envelope fa-fw w3-margin-right"></i>
        <div class="intro-text">
            <h3 class="name">
              <?php echo $userdata['email']; ?>
              <button type="button" id="buttoneditprofile" class="btn btn-info text w3-teal" data-toggle="collapse" data-target="#editemail">
                <i class="fa fa-pencil"></i>
              </button>
            </h1>
            <div id="editemail" class="collapse">
            <br>
                <form action="setting_email.php" class="login-form" method="post">
                  <label><b>Email</b></label><br>
                  <input type="text" name="email" value="<?php if($_POST) { echo $_POST['email'];
                } else
                {echo $userdata['email'];
                } ?>"><br>
                  <br>
                  <button type="submit" class="btn w3-teal w3-center">Confirm</button><br><br>
                </form>
                <br>
            </div>

          </div>
        <h4 class="w3-text-teal"><i class="fa fa-phone fa-fw w3-margin-right"></i>
        <div class="intro-text">
            <h3 class="name">
              <?php echo $userdata['contact']; ?>
              <button type="button" id="buttoneditprofile" class="btn btn-info text w3-teal" data-toggle="collapse" data-target="#editcontact">
                <i class="fa fa-pencil"></i>
              </button>
            </h1>
            <div id="editcontact" class="collapse">
            <br>
                <form action="setting_contact.php" class="login-form" method="post">
                  <label><b>Contact</b></label><br>
                  <input type="text" name="contact" value="<?php if($_POST) { echo $_POST['contact'];
                } else
                {echo $userdata['contact'];
                } ?>"><br>
                  <br>
                  <button type="submit" class="btn w3-teal w3-center">Confirm</button><br><br>
                </form>
                <br>
            </div>

          </div>
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
