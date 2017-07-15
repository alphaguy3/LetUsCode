<?php
session_start();
require_once('function.php');
$contestid = $_GET['cid'];
checkadmin();
////////////SET MCQS////////////////////
$con = con();
$sql = "select * from mcq where contest_id='$contestid'";
$res = $con->query($sql);
$ansmcq = "";
while($arr = $res->fetch_array())
{
   $ansmcq = $ansmcq."<div class=\"col-xs-12\">
          <div class=\"list-group\">
            <div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\">
              <div class=\"col-xs-11 no\" style=\"padding:15px\">
                <p class=\"list-group-item-text\">".$arr['qus']."</p>
              </div>
              <div class=\"col-xs-1 delcol no\">
                <center><a href=\"editmcq.php?pid=".$arr['problem_id']."\"><button class=\"btn delbtn\"><i class=\"fa fa-pencil\"></i></button></a></center>
              </div>
            </div>
          </div>
        </div>";
}


$sql = "select * from subjective where contest_id='$contestid'";
$res = $con->query($sql);
$anssub = "";
while($arr = $res->fetch_array())
{
   $anssub = $anssub."<div class=\"col-xs-12\">
          <div class=\"list-group\">
            <div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\">
              <div class=\"col-xs-11 no\" style=\"padding:15px\">
                <p class=\"list-group-item-text\">".$arr['qus']."</p>
              </div>
              <div class=\"col-xs-1 delcol no\">
                <center><a href=\"editsub.php?pid=".$arr['problem_id']."\"><button class=\"btn delbtn\"><i class=\"fa fa-pencil\"></i></button></a></center>
              </div>
            </div>
          </div>
        </div>";
}


$sql = "select * from problem where contest_id='$contestid'";
$res = $con->query($sql);
$anscoding = "";
while($arr = $res->fetch_array())
{
   $anscoding = $anscoding."<div class=\"col-xs-12\">
          <div class=\"list-group\">
            <div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\">
              <div class=\"col-xs-11 no\" style=\"padding:15px\">
                <p class=\"list-group-item-text\">".$arr['name']."</p>
              </div>
              <div class=\"col-xs-1 delcol no\">
                <center><a href=\"editcoding.php?pid=".$arr['id']."\"><button class=\"btn delbtn\"><i class=\"fa fa-pencil\"></i></button></a></center>
              </div>
            </div>
          </div>
        </div>";
}



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
    <link rel="stylesheet" href="css/editcontest.css">
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
        
      <div class="col-md-12 col-xs-12 livecontest"><!-- MCQ-->
        <div class="col-xs-12"><h4 class="hd4live"><i class="fa fa-star"></i>MCQ's</h4></div>

        <div class="col-xs-12 innermcq"><!--innermcq-->
         <?php echo $ansmcq; ?>
   <!--     <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">MCQ 1 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">MCQ 2 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">MCQ 3 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>-->

        </div><!--innermcq-->


        </div><!-- MCQ-->


        <div class="col-md-12 col-xs-12 livecontest"><!-- subjective-->
        <div class="col-xs-12"><h4 class="hd4up"><i class="fa fa-star"></i>Subjective</h4></div>

        <div class="col-xs-12 innersub"><!--innersub-->
        <?php echo $anssub ;?>
       <!-- <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">Subjective 1 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">Subjective 2 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">Subjective 3 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>-->

        </div><!--innersub-->


        </div><!-- subjective-->



         <div class="col-md-12 col-xs-12 livecontest"><!-- subjective-->
        <div class="col-xs-12"><h4 class="hd4past"><i class="fa fa-star"></i>Coding</h4></div>

        <div class="col-xs-12 innercode"><!--innercode-->
              <?php echo $anscoding ;?>
       <!-- <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">Coding 1 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">Coding 2 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xs-12">
          <div class="list-group">
            <div class="list-group-item col-xs-12 nop" style="background:lavender">
              <div class="col-xs-11 no" style="padding:15px">
                <p class="list-group-item-text">Coding 3 </p>
              </div>
              <div class="col-xs-1 delcol no">
                <center><button class="btn delbtn"><i class="fa fa-pencil"></i></button></center>
              </div>
            </div>
          </div>
        </div>-->

        </div><!--innercode-->


        </div><!-- coding-->



        <div class="col-xs-12 feedbackdiv"><!-- feedbacks-->
          <div class="col-xs-12"><h4 class="hd4up"><i class="fa fa-paper-plane"></i> Feedbacks</h4></div>
          <div class="col-xs-12 fdiv">
          <?php
            require_once('function.php');
            $con = con();
            $cid = $_GET['cid'];
            $sql = "SELECT * FROM `feedback` WHERE cid='$cid'";
            $res = $con->query($sql);
            while($arr = $res->fetch_array()){
              echo '<div class="col-xs-12 well"><p>'.$arr['text'].'</p></div>';
            }
          ?>
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