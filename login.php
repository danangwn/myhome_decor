<?php require_once 'core/init.php';

if(logged_in() === TRUE) {
  header('location: index.php');
}

if (logged_in_d() === TRUE) {
  header('location: index.php');
}


?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>

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
                            <h1><strong>Welcome Back!</strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                              <h3>Login to your account</h3>
                                <p>Enter your username and password to log on:</p>
                            </div>
                            <div class="form-top-right">
                              <i class="fa fa-lock"></i>
                            </div>
                            </div>
                        <div class="form-bottom text-center">
                              <button type="button" id="buttonclient" class="btn btn-info text" data-toggle="collapse" data-target="#registerclient">Log In as Client</button>
                              <br>
                              <br>
                              <div id="registerclient" class="collapse">
                                <form role="form" action="signin.php" method="post" class="login-form">
                                  <div class="form-group">
                                    <label class="sr-only" for="username">Username</label>
                                    <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                  </div>
                                    <button type="submit" class="btn">Log In</button>
                               </form>
                              </div>
                              <br>
                <button type="button" id="buttondesigner" class="btn btn-info text" data-toggle="collapse" data-target="#registerdesigner">Log In as Designer</button>
                              <br>
                              <br>
                              <div id="registerdesigner" class="collapse">
                                <form role="form" action="signin_d.php" method="post" class="login-form">
                                  <div class="form-group">
                                    <label class="sr-only" for="username">Username</label>
                                    <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                  </div>
                                  <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                  </div>
                                    <button type="submit" class="btn">Log In</button>
                              </form>
                              </div>
                        </div>
                    </div>
                    </div>
                        <a href="index.php"><p><strong>Cancel</strong></p></a>
                </div>
            </div>
        </div>



        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
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
