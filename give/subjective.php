<?php
session_start();
include('function.php');
$user_id=2;//***********************************  
$contest_id=11;//********************************************************************************
$query="SELECT * From `subjective` where contest_id='$contest_id'";
$con=con();
$res=$con->query($query);
$all_qus=Array();
while($arr=$res->fetch_array())
{
     array_push($all_qus,$arr['problem_id']);
}
if(sizeof($all_qus)==0)
{
  header("location:problem.php");
}
 
$query="SELECT * from `done_till` where `contest_id`='$contest_id'and `user_id`='$user_id' and `type`='sub'";
 $res=$con->query($query);
 while($arr=$res->fetch_array())
{

     $i=$arr['page'];
}
if($i>=sizeof($all_qus))
{
  header("location:problem.php");
}
$query="SELECT * from `subjective` where `problem_id`='$all_qus[$i]'";
 $res=$con->query($query);
 $problemid=$all_qus[$i];
 while($arr=$res->fetch_array())
{

     $qus=$arr['qus'];
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
    <link rel="stylesheet" href="css/subjective.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <title>LetUsCode</title>
    <script>
    var i=<?php echo $i;?>;
    //alert(i);
    var problemid = <?php echo  $problemid;?>;
    $(document).ready(function()
    {
      var qus="<?php echo $qus;?>";
      $("#qus").html(qus);
      $('#'+problemid).addClass('active');
    });
    function submit()
    {
      var contest_id="<?php echo $contest_id;?>";
      var ans=$('#ans').val();
      $.post('submitsubjective.php',
      {
           i     :  i,
           ans   :  ans,
           contest:contest_id
      },
      function(data)
      {
        var ans=jQuery.parseJSON(data);
        console.log(data);
        if(ans[0]['last']==1)
        {
          window.location="problem.php";
        }
      i=ans[0]['i'];
      $('#'+problemid).removeClass('active');
      problemid=ans[0]['id'];
      //console.log(problemid);
      $('#'+problemid).addClass('active');
      $("#qus").html(ans[0]['qus']);
      $('#ans').val('');
      });
    }
    </script>
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
        <?php
          foreach($all_qus as $key=>$val)
          {
          $query="SELECT `qus` from `subjective` where `problem_id`='$val'";
          $res=$con->query($query);
          while($arr=$res->fetch_array())
         echo " <li id='$val' class=\"\"><a><span class=\"nav-label\">".$arr['qus']."</span></a></li> "  ;
     }
        ?>
          <!--<li class=""><a href="#"></i><span class="nav-label">Problem 2</span></a></li>
          <li class=""><a href="#"></i><span class="nav-label">Problem 3</span></a></li>-->
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
        <div class="col-xs-12 well" id="qus">
          <p><i>Which of the following occurs when a transaction rereads data and finds new rows that were inserted by a command transaction since the prior read?</i></p>
        </div>
        <div class="col-xs-12">
          <formx class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="ans" rows="10" cols="57" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4 col-sm-push-4">
                <center><button class="btn btn-info" onclick="submit();">Submit</button></center>
              </div>
            </div>
          </formx>
        </div>
      </div>
      </div><!-- right container-->
      </div><!-- right panel-->
      </div><!-- mainrow-->
      </div><!-- container -->
    </body>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    
  </html>