<?php 
//////////////////Check if the contest has been started////////////////////
//////////////////Check That the contest is not ended//////////////////////
//////////////////Check if the user is registered//////////////////////////
  require_once('function.php');
  require_once('curl_class.php');
  //$userid    = $_GET['userid'];
  //$contestid = $_GET['contestid'];
  $userid    = 1;
  $contestid = 8; 
  $duration  = 100;  
  $con = con();
  $sql = "select * from contest where id='$contestid'";
  $res = $con->query($sql);
  while($arr=$res->fetch_array())
  {
    $duration = $arr['duration'];
  }

  $sql = "select * from time_updates where userid='$userid' and contestid='$contestid'";
  $res = $con->query($sql);
  while($arr=$res->fetch_array())
  {
    $status = $arr['finished'];
  }
  if($status=='1')
  {
    echo "<script>alert('Contest Has Ended');location.href='dashboard.php';</script>";
    die();
  }
?>
<!doctype html>
<html lang=''>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/contest.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/material.min.js"></script>
    <script type="text/javascript">
    
    </script>
    <title>LetUsCode</title>
  </head>
  <body style="width:100%;">
    <div class="container-fluid" style="background:;height:100%;">
      <div class="row mainrow"><!-- main row-->
      
      <div class="col-md-2 col-xs-12 leftpanel no"><!--left panel-->
      <div class="logo">
        <img src="assets/logo.png" class="img-responsive">
      </div>
      <nav class="navigation">
        <ul class="list-unstyled">
          <li class=""><a href="dashboard.php"><i class="fa fa-home"></i><span class="nav-label">Dashboard</span></a></li>
          <li class=""><a href="dashboard.php"><i class="fa fa-cog"></i><span class="nav-label">Conduct Contest</span></a></li>
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
              <div class="col-md-12 col-xs-12"><center><h4 class="nom" style="margin-top:10%;color:#813DA1">Remaining Time</h4></center></div>
              <div class="col-md-12 col-xs-12"><center><h4 id="remainingtime"></h4></center></div>
            </div>
          </div>
        </div>
      </div>
      </div><!-- profileinfo-->
      
      </div><!-- profiletab-->
      <div class="row rightcontainer"><!-- right container-->
      <div class="col-xs-8">
        


 

   <div class="col-xs-12 contestdiv"><!-- contest div-->
<div class="col-md-12 col-xs-12 livecontest"><!-- live-->
<div class="col-xs-12"><h4 class="hd4live"><i class="fa fa-star"></i> Softathalon Round 1</h4></div>
<div class="col-xs-12">
  <div class="col-xs-9"><center><h4 class="hdd4">Problems</h4></center></div>
  <div class="col-xs-3"><center><h4 class="hdd4">Solved </h4></center></div>
</div>
<div class="col-xs-12" style="margin-bottom:2%;">
  <div class="list-group">
    <div class="col-xs-12"><!-- individual problem -->
    <div class="list-group-item col-xs-9 nop" style="background:lavender">
      <div class="col-xs-8 no" style="padding:10px">
        <h4 class="list-group-item-heading hdd4">1. Anshul and his Samosas</h4>
      </div>
      <div class="col-xs-2 editcol no">
        <center><button class="btn editbtn"><i class="fa fa-pencil"></i></button></center>
      </div>
      <div class="col-xs-2  enterdiv">
        <center><a href="#">Solve</a></center>
      </div>
    </div>
    <div class="list-group-item col-xs-2 solveddiv" style="background:lavender">
      <div class="col-xs-12 no" style="margin-top:1%;margin-bottom:1%;">
        <center><h4 class="list-group-item-heading hdd4">23/100</h4></center>
      </div>
    </div>
    </div><!-- individual problem -->
    <div class="col-xs-12"><!-- individual problem -->
    <div class="list-group-item col-xs-9 nop" style="background:lavender">
      <div class="col-xs-8 no" style="padding:10px">
        <h4 class="list-group-item-heading hdd4">2. Maggu and his Meena</h4>
      </div>
      <div class="col-xs-2 editcol no">
        <center><button class="btn editbtn"><i class="fa fa-pencil"></i></button></center>
      </div>
      <div class="col-xs-2  enterdiv">
        <center><a href="#">Solve</a></center>
      </div>
    </div>
    <div class="list-group-item col-xs-2 solveddiv" style="background:lavender">
      <div class="col-xs-12 no" style="margin-top:1%;margin-bottom:1%;">
        <center><h4 class="list-group-item-heading hdd4">12/100</h4></center>
      </div>
    </div>
    </div><!-- individual problem -->
  </div>
</div>
</div><!-- live-->
<div class="col-xs-6 col-xs-push-3">
  <center><button class="btn btn-primary">Add Problems</button></center>
</div>
</div><!-- contest div-->

       





      </div>
      <div class="col-xs-4">
        








<div class="col-xs-12 contestdiv"><!-- contest div-->
<div class="col-md-12 col-xs-12 livecontest"><!-- live-->
<div class="col-xs-12"><h4 class="hd4up"><i class="fa fa-hourglass"></i> Leaderboard </h4></div>
<div class="col-xs-12" style="margin-bottom:2%;">
  <div class="list-group" style="overflow-y:scroll;height:380px">
    <li class="list-group-item ">1. Urjit Patel</li>
    <li class="list-group-item ">2. Urjit Patel</li>
    <li class="list-group-item ">3. Urjit Patel</li>
    <li class="list-group-item ">4. Urjit Patel</li>
    <li class="list-group-item ">5. Urjit Patel</li>
    <li class="list-group-item ">6. Urjit Patel</li>
    <li class="list-group-item ">7. Urjit Patel</li>
    <li class="list-group-item ">8. Urjit Patel</li>
    <li class="list-group-item ">9. Urjit Patel</li>
    <li class="list-group-item ">10. Urjit Patel</li>
    <li class="list-group-item ">11. Urjit Patel</li>
  </div>
</div>
</div><!--live-->
</div><!--contest div -->










        
      </div>
      </div><!-- right container-->
      </div><!-- right panel-->
      </div><!-- mainrow-->
      </div><!-- container -->
    </body>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">

 
  var SecondsTohhmmss = function(totalSeconds) {
  var hours   = Math.floor(totalSeconds / 3600);
  var minutes = Math.floor((totalSeconds - (hours * 3600)) / 60);
  var result = (hours < 10 ? "0" + hours : hours);
  result += "-" + (minutes < 10 ? "0" + minutes : minutes);
  return result;
   }
    var userid    = '<?php echo $userid;?>';
     var contestid = '<?php echo $contestid; ?>';
     var duration  = '<?php echo $duration; ?>';
     setInterval(function()
      {
        console.log('called');
        $.post("updatetime.php",
        {
           userid    :     userid,
           contestid :     contestid,
           duration  :     duration
        },
        function(data)
        {
           if(data=="over")
           {
                   alert('Contest Is Over');  
                   location.href="dashboard.php";
           }
           else
           {
                  document.getElementById('remainingtime').innerHTML = SecondsTohhmmss(duration-data);
           }
        });
      },10000); 
    </script>
  </html>