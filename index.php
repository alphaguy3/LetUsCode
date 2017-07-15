<!doctype html>
<html lang=''>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Suez+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/common.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <title>LetUsCode</title>
  </head>
  <script type="text/javascript">
  $(function() {
  $('.lgbtn').css("display","none");
  $('#login-form-link').click(function(e) {
  $('.rgbtn').css("display","block");
  $('.lgbtn').css("display","none");
  $("#login-form").delay(100).fadeIn(100);
  $("#register-form").fadeOut(100);
  $('#register-form-link').removeClass('active');
  $(this).addClass('active');
  e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
  $('.lgbtn').css("display","block");
  $('.rgbtn').css("display","none");
  $("#register-form").delay(100).fadeIn(100);
  $("#login-form").fadeOut(100);
  $('#login-form-link').removeClass('active');
  $(this).addClass('active');
  e.preventDefault();
  });
  });
  </script>
  <body style="width:100%;">
    <div class="container-fluid no" style="width:100%;"> <!-- containerfluid-->
    
    <div class="videomain"><!-- videomain-->
  <video autoplay loop class="videoclass"><source src="assets/code.mp4" type="video/mp4"></video>
  </div><!-- videomain-->
  <div class="mainhead col-md-8 col-xs-12 col-md-offset-2"> <!--mainhead-->
  <center>
  <div class="logo"><img src="assets/logo.png" class="img-responsive" style="height:80px;"></div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-heading">
          <div class="row">
            <!--<div class="col-xs-6 tabhead">
              <a href="#" class="active" id="login-form-link">Login</a>
            </div>
            <div class="col-xs-6 tabhead">
              <a href="#" id="register-form-link">Register</a>
            </div>-->
            <div class="col-xs-6 col-xs-offset-3">
              <center><button class="btn btn-register1 rgbtn"><a href="#" id="register-form-link">Register ></a></button></center>
              <center><button class="btn btn-register1 lgbtn"><a href="#" id="login-form-link" class="active">< Login</a></button></center>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="login.php" method="post" role="form" style="display: block;">
                <div class="form-group">
                  <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-12">
                     <!-- <div class="text-center">
                        <a href="" tabindex="5" class="forgot-password" style="color:white">Forgot Password?</a>
                      </div>-->
                    </div>
                  </div>
                </div>
              </form>
              <form id="register-form" action="signup.php" method="post" role="form" style="display: none;">
              <div class="form-group">
                  <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="">
                </div>
                <div class="form-group">
                  <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                </div>
                <div class="form-group">
                  <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" name="conf_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                  <input type="number" name="contact" id="contact" tabindex="2" class="form-control" placeholder="Contact Number">
                </div>
                <div class="form-group">
                  <input type="text" name="institute" id="institute" tabindex="2" class="form-control" placeholder="Institute Name">
                </div>
                <div class="form-group">
                  <!--<div class="row">
                    <div class="col-sm-6 col-sm-offset-3">-->
                      <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                    <!--</div>
                  </div>-->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </center>
  </div><!-- mainhead -->
  </div><!-- containerfluid-->
  
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>