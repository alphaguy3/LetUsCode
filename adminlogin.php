<?php
session_start();
require_once('function.php');
?>
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
  <body style="width:100%;">
    <div class="container-fluid no" style="width:100%;"> <!-- containerfluid-->
    
    <div class="videomain"><!-- videomain-->
  <video autoplay loop class="videoclass"><source src="assets/code.mp4" type="video/mp4"></video>
  </div><!-- videomain-->
  <div class="mainhead col-md-8 col-xs-12 col-md-offset-2"> <!--mainhead-->
  <center>
  <div class="logo"><img src="assets/logo.png" class="img-responsive"></div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-login">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <form id="login-form" action="admin_login.php" method="post" role="form" style="display: block;">
                <div class="form-group">
                  <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
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