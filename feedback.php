<?php
require_once('function.php');
$cid = $_GET['cid'];

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
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/feedback.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <title>LetUsCode</title>
  </head>
  <body style="width:100%;">
    <div class="container-fluid" style="background:purple;height:100%;">
      <div class="row mainrow"><!-- main row-->
      
      <div class="col-md-2 col-xs-12 leftpanel no"><!--left panel-->
      <div class="logo">
        <img src="assets/logo.png" class="img-responsive">
      </div>
      <nav class="navigation">
        <ul class="list-unstyled">
          <li class="active"><a href="dashboard.php"><i class="fa fa-home"></i><span class="nav-label">Dashboard</span></a></li>
          <li class=""><a href="conduct.php"><i class="fa fa-cog"></i><span class="nav-label">Conduct Contest</span></a></li>
          <li class=""><a href="dashboard.php"><i class="fa fa-power-off"></i><span class="nav-label">Logout</span></a></li>
        </ul>
      </nav>
      </div><!--left panel-->
      
      <div class="col-md-10 col-md-offset-2 col-xs-12 rightpanel" style=""><!-- right panel-->
      
      <div class="col-md-12 col-xs-12 profiletab"><!-- profiletab-->
      <div class="col-md-12 col-xs-12 profileinfo"><!-- profileinfo-->
      <div class="row profilerow">
        <div class="col-md-3 col-xs-4 profileimgdiv">
          <div class="row">
            <div class="col-md-4 col-xs-4 no imgd"><span><img src="assets/thumb1.jpg" class="img"></span></div>
            <div class="col-md-7 col-xs-7 col-md-offset-1 col-xs-offset-1 no">
              <div class="col-md-12 col-xs-12 name nom"><h4 class="nom" style="margin-top:15%;">urjit patel</h4></div>
              <div class="col-md-12 col-xs-12 email"><p>urjit1596@gmail.com</p></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-3 no" style="border:1px solid #B168D4;float:right">
          <div class="col-md-3 col-xs-3 no" style="background:#B168D4;">
            <i class="fa fa-star ic"></i>
          </div>
          <div class="col-md-9 col-xs-9 no">
            <div class="col-md-12 no rankdiv">
              <div class="col-md-12 col-xs-12"><center><h4 class="nom" style="margin-top:10%;color:#813DA1">Overall Rank</h4></center></div>
              <div class="col-md-12 col-xs-12"><center><h4>45/100</h4></center></div>
            </div>
          </div>
        </div>
      </div>
      </div><!-- profileinfo-->
      
      </div><!-- profiletab-->

      <div class="row rightcontainer"><!-- right container-->
      <div class="col-xs-12">
        <div class="col-sm-12">
          <center><h1 class="hd4">Feedback</h1></center>
        </div>
        <div class="col-xs-12">
        <form class="form-horizontal" method="post" action="insertfeed.php">
          <div class="form-group">
            <div class="col-sm-12">
              <textarea class="form-control" name="feedback" id="feedback" rows="6" cols="57" required></textarea>
            </div>
          </div>
          <input type="text" name="cid" value="<?php echo $cid;?>" style="display:none">
          <div class="form-group">
            <div class="col-sm-4 col-sm-push-4">
              <center><button class="btn btn-live">Submit</button></center>
            </div>
          </div>
        </form>
        </div>
        
      </div>
      </div>
      </div><!-- right container-->
      </div><!-- right panel-->
      </div><!-- mainrow-->
      </div><!-- container -->
    </body>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    
  </html>