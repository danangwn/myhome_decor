<?php require_once 'core/init.php';

if(not_logged_in() === TRUE) {
  header('location: login.php');
}

$userdata = getUserDataByUserId($_SESSION['id']);

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
    $user_exists = client_exists_by_id($_SESSION['id'], $fname);
    if($user_exists === TRUE) {
      echo "Name already exists <br /> ";
    } else {
      if(updateName($_SESSION['id']) === TRUE) {
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
<link rel="stylesheet" href="css/upload.css">
<!--Bootstrap-->
	<!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <link href="css/w3.css" rel="stylesheet">

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
                <ul class="nav navbar-nav navbar-right"
                <a>
                    <?php echo $userdata['username']  ?>
                </a>
                <li>

                                  <form class="navbar-form" role="search" action="search_result_c.php">
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
<header>
    <div class="container" id="maincontent" tabindex="-1">
      <div class="row">
        <div class="col-lg-12">
                         <?php if (!$userdata['image']) {
                            echo "<img src='uploads/default.jpg' class='w3-circle w3-hover-opacity' style='width:400px;height:400px'>";
                          }
                          else {
                         echo "<img src='uploads/profile".$userdata['image']."' style='width:400px;height:400px' class='w3-circle'>";
                         }?>
          <form action="insert_pp.php" method="post" enctype="multipart/form-data">
				  <div class="form-bottom text-center">
            <button type="button" id="buttoneditphoto" class="btn btn-info text w3-teal" data-toggle="collapse" data-target="#editphotoprofile">Change Profile Photo</button>
            <div id="editphotoprofile" class="collapse">
    					<input class="marginUpload" id="uploadFile" placeholder="Pilih File..." disabled="disabled" />
    					<div class="fileUpload btn w3-teal">
      					<span>Upload</span>
      					<input id="uploadBtn" type="file" name="image" class="upload" />
    					</div>
    					<button type="submit" class="btn w3-teal">Submit</button>
  				  </div>
				  </div>
          </form>

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
          <div class="intro-text">
            <h1 class="name">
            <button type="button" id="buttoneditprofile" class="btn btn-info text w3-teal" data-toggle="collapse" data-target="#editpassword">
                <i class="fa fa-pencil">Change Password</i>
              </button>
            </h1>
            <div id="editpassword" class="collapse">
            <br>
                  <form action="changepassword_c.php" method="POST" class="login-form">
                    <label>Current Password</label><br>
                    <input type="password" name="currentpassword" autocomplete="off" placeholder="Current Password"><br>
                    <label>New Password</label><br>
                    <input type="password" name="password" autocomplete="off" placeholder="New Password"><br>
                    <label>Conform Password</label><br>
                    <input type="password" name="conformpassword" autocomplete="off" placeholder="Confrom Password"><br>
                    <br>
                    <button type="submit" class="btn w3-teal w3-center">Confirm</button><br><br>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</header>

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
	<script>
	document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
	};
	</script>

</body>
</html>

