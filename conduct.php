<?php
session_start();
require_once('function.php');
 require_once('curl_class.php');
 checkuser();
$userid = $_SESSION['id']; 
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
    <link rel="stylesheet" href="css/conduct.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/material.min.js"></script>
    <script type="text/javascript">

   
   
   function getlivecontests()
   {
      var user = '<?php echo $userid ;?>';
       $.post("getlivecontests.php",
        {
           userid  : user
        },
        function(data)
        {
             //console.log(data);
             var ans    = jQuery.parseJSON(data);
             var length = ans.length;
             var i = 0;
             var innerhtml = "";
             for(i=0;i<length;i++)
             {
              if(ans[i]['started']==1)
                   innerhtml +=  "<div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\"> <div class=\"col-xs-9 no\" style=\"padding:15px\">  <h4 class=\"list-group-item-heading hdd4\">"+ans[i]["name"]+"</h4>  <p class=\"list-group-item-text\">"+ans[i]["description"]+"</p> </div> <div class=\"col-xs-1 delcol no\">  <center><button class=\"btn delbtn\"><i class=\"fa fa-close\"></i></button></center> </div>  <div class=\"col-xs-2  enterdiv\">   <center><a href=\"#\">Enter <i class=\"fa fa-arrow-right\"></i></a></center></div></div>   <div class=\"col-xs-2  enterdiv\">   <center>Running</center></div></div>";
              else
                   innerhtml +=  "<div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\"> <div class=\"col-xs-9 no\" style=\"padding:15px\">  <h4 class=\"list-group-item-heading hdd4\">"+ans[i]["name"]+"</h4>  <p class=\"list-group-item-text\">"+ans[i]["description"]+"</p> </div> <div class=\"col-xs-1 delcol no\">  <center><button class=\"btn delbtn\"><i class=\"fa fa-close\"></i></button></center> </div>  <div class=\"col-xs-2  enterdiv\">   <center><a href=\"#\">Enter <i class=\"fa fa-arrow-right\"></i></a></center></div>   <div class=\"col-xs-2  enterdiv\">   <center>Start</center></div></div>";
             } 
             document.getElementById('livecontests').innerHTML = innerhtml;
        });
   }





  function getupcomingcontests()
  {
    var user = '<?php echo $userid ;?>';
    $.post("getupcomingcontests.php",
    {
         userid   : user
    },
    function(data)
    {
        var ans = jQuery.parseJSON(data);
        var length = ans.length;
        var i=0;
        var innerhtml = "";
        for(i=0;i<length;i++)
        {
          innerhtml += "<div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\"><div class=\"col-xs-8 no\" style=\"padding:15px\"> <h4 class=\"list-group-item-heading hdd4\">"+ans[i]['name']+"</h4>  <p class=\"list-group-item-text\">"+ans[i]['description']+"</p></div><div class=\"col-xs-1 editcol no\"> <center><button class=\"btn editbtn\"><i class=\"fa fa-pencil\"></i></button></center></div> <div class=\"col-xs-1 delcol no\"> <center><button class=\"btn delbtn\"><i class=\"fa fa-close\"></i></button></center>   </div>      <div class=\"col-xs-2  startsatdiv\">        <center><div class=\"col-xs-12 no\"><center><p style=\"font-size:18px\"><b>Date:</b></p></center></div><div class=\"col-xs-12 no\"><p>"+ans[i]['date']+"</p></div></center>      </div>    </div>";
        }
        document.getElementById('upcomingcontests').innerHTML = innerhtml ;
    });
  }


  
  function gettodayscontests()
  {
    var user = '<?php echo $userid ;?>';
    $.post("gettodayscontests.php",
    {
         userid   : user
    },
    function(data)
    {
        var ans = jQuery.parseJSON(data);
        var length = ans.length;
        var i=0;
        var innerhtml = "";
        for(i=0;i<length;i++)
        {
          innerhtml += "<div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\"><div class=\"col-xs-8 no\" style=\"padding:15px\"> <h4 class=\"list-group-item-heading hdd4\">"+ans[i]['name']+"</h4>  <p class=\"list-group-item-text\">"+ans[i]['description']+"</p></div><div class=\"col-xs-1 editcol no\"> <center><button class=\"btn editbtn\"><i class=\"fa fa-pencil\"></i></button></center></div> <div class=\"col-xs-1 delcol no\"> <center><button class=\"btn delbtn\"><i class=\"fa fa-close\"></i></button></center>   </div>      <div class=\"col-xs-2  startsatdiv\">        <center><div class=\"col-xs-12 no\"><center><p style=\"font-size:18px\"><b>Start</b></p></center></div></center>  </div>  </div>";
        }
        document.getElementById('todayscontests').innerHTML = innerhtml ;
    });
  }



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
          <li class="active"><a href="dashboard.php"><i class="fa fa-cog"></i><span class="nav-label">Conduct Contest</span></a></li>
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
      




     <!-- LIST OF CONTESTS  -->
  
<div class="col-md-10 col-md-push-1 col-xs-12 contestdiv"><!-- contest div-->
<div class="col-md-12 col-xs-12 livecontest"><!-- live-->
<div class="col-xs-12"><h4 class="hd4live"><i class="fa fa-star"></i>Live Contests</h4></div>
<div class="col-xs-12" style="margin-bottom:2%;">
  <div class="list-group" id="livecontests">



   <!--<div class="list-group-item col-xs-12 nop" style="background:lavender">
      <div class="col-xs-9 no" style="padding:15px">
        <h4 class="list-group-item-heading hdd4">Insomnia Qualifier</h4>
        <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
      </div>
      <div class="col-xs-1 delcol no">
        <center><button class="btn delbtn"><i class="fa fa-close"></i></button></center>
      </div>
      <div class="col-xs-2  enterdiv">
        <center><a href="#">Enter <i class="fa fa-arrow-right"></i></a></center>
      </div>
    </div>



    <div class="list-group-item col-xs-12 nop" style="background:lavender">
      <div class="col-xs-9 no" style="padding:15px">
        <h4 class="list-group-item-heading hdd4">Sphinx Qualifier</h4>
        <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
      </div>
      <div class="col-xs-1 delcol no">
        <center><button class="btn delbtn"><i class="fa fa-close"></i></button></center>
      </div>
      <div class="col-xs-2  enterdiv">
        <center><a href="#">Enter <i class="fa fa-arrow-right"></i></a></center>
      </div>
    </div> -->



  </div>
</div>
</div><!-- live-->
<div class="col-md-12 col-xs-12 livecontest"><!-- Upcoming-->
<div class="col-xs-12"><h4 class="hd4up"><i class="fa fa-paper-plane"></i> Upcoming Contest</h4></div>
<div class="col-xs-12" style="margin-bottom:2%;">
  <div class="list-group" id="upcomingcontests">



    <!-- <div class="list-group-item col-xs-12 nop" style="background:lavender">
      <div class="col-xs-8 no" style="padding:15px">
        <h4 class="list-group-item-heading hdd4">Insomnia Qualifier</h4>
        <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
      </div>
      <div class="col-xs-1 editcol no">
        <center><button class="btn editbtn"><i class="fa fa-pencil"></i></button></center>
      </div>
      <div class="col-xs-1 delcol no">
        <center><button class="btn delbtn"><i class="fa fa-close"></i></button></center>
      </div>
      <div class="col-xs-2  startsatdiv">
        <center><div class="col-xs-12 no"><center><p style="font-size:18px"><b>Date:</b></p></center></div><div class="col-xs-12 no"><p>31/10/16</p></div></center>
      </div>
    </div>



    <div class="list-group-item col-xs-12 nop" style="background:lavender">
      <div class="col-xs-8 no" style="padding:15px">
        <h4 class="list-group-item-heading hdd4">Sphinx Qualifier</h4>
        <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
      </div>
      <div class="col-xs-1 editcol no">
        <center><button class="btn editbtn"><i class="fa fa-pencil"></i></button></center>
      </div>
      <div class="col-xs-1 delcol no">
        <center><button class="btn delbtn"><i class="fa fa-close"></i></button></center>
      </div>
      <div class="col-xs-2  startsatdiv">
        <center><div class="col-xs-12 no"><center><p style="font-size:18px"><b>Date:</b></p></center></div><div class="col-xs-12 no"><p>31/10/16</p></div></center>
      </div>
    </div> -->
  </div>
</div>
</div><!-- Upcoming-->











<div class="col-md-12 col-xs-12 livecontest"><!-- Todays-->
<div class="col-xs-12"><h4 class="hd4up"><i class="fa fa-paper-plane"></i>Todays Contests</h4></div>
<div class="col-xs-12" style="margin-bottom:2%;">
  <div class="list-group" id="todayscontests">



    <!-- <div class="list-group-item col-xs-12 nop" style="background:lavender">
      <div class="col-xs-8 no" style="padding:15px">
        <h4 class="list-group-item-heading hdd4">Insomnia Qualifier</h4>
        <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
      </div>
      <div class="col-xs-1 editcol no">
        <center><button class="btn editbtn"><i class="fa fa-pencil"></i></button></center>
      </div>
      <div class="col-xs-1 delcol no">
        <center><button class="btn delbtn"><i class="fa fa-close"></i></button></center>
      </div>
      <div class="col-xs-2  startsatdiv">
        <center><div class="col-xs-12 no"><center><p style="font-size:18px"><b>Date:</b></p></center></div><div class="col-xs-12 no"><p>31/10/16</p></div></center>
      </div>
    </div>



    <div class="list-group-item col-xs-12 nop" style="background:lavender">
      <div class="col-xs-8 no" style="padding:15px">
        <h4 class="list-group-item-heading hdd4">Sphinx Qualifier</h4>
        <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
      </div>
      <div class="col-xs-1 editcol no">
        <center><button class="btn editbtn"><i class="fa fa-pencil"></i></button></center>
      </div>
      <div class="col-xs-1 delcol no">
        <center><button class="btn delbtn"><i class="fa fa-close"></i></button></center>
      </div>
      <div class="col-xs-2  startsatdiv">
        <center><div class="col-xs-12 no"><center><p style="font-size:18px"><b>Date:</b></p></center></div><div class="col-xs-12 no"><p>31/10/16</p></div></center>
      </div>
    </div> -->
  </div>
</div>
</div><!-- Todays Contests-->
















<div class="col-xs-6 col-xs-push-3">
  <center><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseform" aria-expanded="false" aria-controls="collapseform">Create Contest</button></center>
</div>
</div><!-- contest div-->







   <!-- GET LIVE CONTESTS END -->








      <!--   Create Test Form -->
      <div class="collapse" id="collapseform" style="background:#f5f5f5">
  <div class="col-xs-12 codeformdiv"><!-- codeformdiv-->
  
  <form class="form-horizontal" method="post" action="add_contest.php">
    
    <div class="col-xs-12">
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Contest Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="contestname" name="contestname" required>
        </div>
      </div>
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Setter Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="settername" name="settername" required>
        </div>
      </div>
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Tester Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="testername" name="testername" required>
        </div>
      </div>
    </div>
    <div class="form-group col-xs-12">
      <label class="col-sm-1 control-label no">Description: </label>
      <div class="col-sm-11">
        <textarea class="form-control" id="description" name="description" rows="15" cols="100" required></textarea>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Date: </label>
        <div class="col-sm-10">
          <input type="date" class="form-control floating-label" id="date"  name="date"required>
        </div>
      </div>
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">Start Time: </label>
        <div class="col-sm-10">
          <input type="time" class="form-control floating-label" id="starttime"  name="starttime" required>
        </div>
      </div>
      <div class="form-group col-xs-4">
        <label class="col-sm-2 control-label no">End Time: </label>
        <div class="col-sm-10">
          <input type="time" class="form-control floating-label" id="endtime" name="endtime" required>
        </div>
      </div>
    </div>
    <div class="col-sm-12">
      <center><button class="btn btn-danger" type="submit" value="submit">Create</button></center>
    </div>
    </form>

</div><!-- codeformdiv-->
</div>












      
      </div><!-- right container-->
      </div><!-- right panel-->
      </div><!-- mainrow-->
      </div><!-- container -->
    </body>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    setInterval(getlivecontests(),2000);
    setInterval(getupcomingcontests(),2000);
    setInterval(gettodayscontests(),2000);
    </script>
  </html>