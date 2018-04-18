<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
    		body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
    	</style>
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Apa yang Ingin Anda Peroleh dari Situs Kami?</strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">

                        <div class="form-top text-center">
							  <h3> <font color="white"> "Saya ingin mencari Desainer untuk mendekorasi rumah saya"</font></h3>
                              <button type="button" id="buttonclient" class="btn btn-info text" data-toggle="collapse" data-target="#registerclient">Sign Up as Client</button>
                              <br>
                              <br>
                              <div id="registerclient" class="collapse">
                                <form role="form" action="signup.php" method="post" class="login-form">
                                  <div class="form-group">
                                    <label class="sr-only" for="fname">First Name</label>
                                    <input type="text" name="fname" placeholder="First Name..." class="form-username form-control" id="form-username" autocomplete="off"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="lname">Last Name</label>
                                    <input type="text" name="lname" placeholder="Last Name..." class="form-username form-control" id="form-username" autocomplete="off"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="username">Username</label>
                                    <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username" autocomplete="off"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="email">EmaiL</label>
                                    <input type="email" name="email" placeholder="Email..." class="form-username form-control" id="form-username" autocomplete="off"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" autocomplete="off">
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="cpassword">Retype Password</label>
                                    <input type="password" name="cpassword" placeholder="Retype Password..." class="form-password form-control" id="form-password" autocomplete="off">
                                  </div>
                                    <button type="submit" class="btn">Sign Up</button>
                               </div>
                               </form>
                               
							<h3><font color="white">"Saya ingin mencari Klien yang membutuhkan jasa dekorasi rumah"</font></h3>
                             <button type="button" id="buttondesigner" class="btn btn-info text" data-toggle="collapse" data-target="#registerdesigner">Sign Up as Designer</button>
                              <br>
                              <br>
                              
                              <div id="registerdesigner" class="collapse">
                                <form role="form" action="signup_d.php" method="post" class="login-form">
                                  <div class="form-group">
                                    <label class="sr-only" for="fname">First Name</label>
                                    <input type="text" name="fname" placeholder="First Name..." class="form-username form-control" id="form-username"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="lname">Last Name</label>
                                    <input type="text" name="lname" placeholder="Last Name..." class="form-username form-control" id="form-username"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="username">Username</label>
                                    <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="email">EmaiL</label>
                                    <input type="email" name="email" placeholder="Email..." class="form-username form-control" id="form-username"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="contact">Phone Number</label>
                                    <input type="text" name="contact" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Phone Number..." class="form-username form-control" id="form-username"/>
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="cpassword">Retype Password</label>
                                    <input type="password" name="cpassword" placeholder="Retype Password..." class="form-password form-control" id="form-password">
                                  </div>
                                    <button type="submit" class="btn">Sign Up</button>
                              </div>

                              </form>

                        		</div>
		                    </div>
                        </div>
                        <a href="index.php" class="forgot-password">Cancel</a>
                    </div>
                </div>
            </div>

        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scriptsregister.js"></script>
        <script>
        $(document).ready(function(){
          $('#buttonclient').click(function () {
             if (buttondesigner.disabled==false){
                 buttondesigner.disabled = true;
             }
             else {
             buttondesigner.disabled = false ;
             }
          });
          $('#buttondesigner').click(function () {
             if (buttonclient.disabled==false){
                 buttonclient.disabled = true;
             }
             else {
             buttonclient.disabled = false ;
             }
          });
        });
</script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
