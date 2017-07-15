<?php
 session_start();
 require_once('function.php');
 require_once('curl_class.php');
 checkuser();
 $userid = $_SESSION['id']; 
 //$userid = 3;
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
    <link rel="stylesheet" href="js/chart/jquery.jqplot.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/chart/jquery.jqplot.js"></script>
    <script src="js/chart/plugins/jqplot.barRenderer.js"></script>
    <script type="text/javascript" src="js/chart/plugins/jqplot.highlighter.js"></script>
    <script type="text/javascript" src="js/chart/plugins/jqplot.cursor.js"></script>
    <script type="text/javascript" src="js/chart/plugins/jqplot.pointLabels.js"></script>
    <script type="text/javascript" src="js/chart/plugins/jqplot.categoryAxisRenderer.js"></script>
    <title>LetUsCode</title>
    <script type='text/javascript'>


      function getlivecontests()
      {
        console.log('called');
         $.get("getlivecontestsforusers.php",
          function(data)
          {
                var ans = jQuery.parseJSON(data);
                var length = ans.length;
                var i = 0;
                var innerhtml = "";
                for(i=0;i<length;i++)
                {
                    innerhtml += "<div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\"><div class=\"col-xs-9 no\" style=\"padding:15px\"><h4 class=\"list-group-item-heading hdd4\">"+ans[i]['name']+"</h4><p class=\"list-group-item-text\">"+ans[i]['description']+"</p></div><div class=\"col-xs-3  enterdiv\"><center><a href=\"entertest.php?cid="+ans[i]['id']+"\">Enter<i class=\"fa fa-arrow-right\"></i></a></center></div></div>";
                }
                document.getElementById('livecontests').innerHTML = innerhtml;

          });
      }




       function getupcomingcontests()
      {
         $.get("getupcomingcontestforusers.php",
          function(data)
          {
                var ans = jQuery.parseJSON(data);
                var length = ans.length;
                var i = 0;
                var innerhtml = "";
                for(i=0;i<length;i++)
                {
                    innerhtml += "<div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\"><div class=\"col-xs-9 no\" style=\"padding:15px\"><h4 class=\"list-group-item-heading hdd4\">"+ans[i]['name']+"</h4><p class=\"list-group-item-text\">"+ans[i]['description']+"</p></div><div class=\"col-xs-3  startsatdiv\"><center><div class=\"col-xs-12 no\"><center><p style='font-size:18px'><b>Date:</b></p></center></div><div class='col-xs-12 no'><p>"+ans[i]['date']+"</p></div></center></div></div>";
                }
                document.getElementById('upcomingcontests').innerHTML = innerhtml;

          });
      }


     

         function getpastcontests()
      {
         $.get("getpastcontestsforusers.php",
          function(data)
          {
                var ans = jQuery.parseJSON(data);
                var length = ans.length;
                var i = 0;
                var innerhtml = "";
                for(i=0;i<length;i++)
                {
                    innerhtml += "<div class=\"list-group-item col-xs-12 nop\" style=\"background:lavender\"><div class=\"col-xs-9 no\" style=\"padding:15px\"><h4 class=\"list-group-item-heading hdd4\">"+ans[i]['name']+"</h4><p class=\"list-group-item-text\">"+ans[i]['description']+"</p></div><a href=\"#\"><div class=\"col-xs-3  viewdiv\"><center><a href='leaderboard.php?cid="+ans[i]['contest']+"'>LeaderBoard</a></center></div></a></div>";
                }
                document.getElementById('pastcontests').innerHTML = innerhtml;

          });
      }


    </script>
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
          <li class="active"><a href="dashboard.php"><i class="fa fa-home"></i><span class="nav-label">Dashboard</span></a></li>
          <li class=""><a href="admin_logout.php"><i class="fa fa-power-off"></i><span class="nav-label">Logout</span></a></li>
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
              <div class="col-md-12 col-xs-12 name nom"><h4 class="nom" style="margin-top:15%;"><?php echo getusername($_SESSION['id']);?></h4></div>
              <div class="col-md-12 col-xs-12 email"><p><?php echo getemail($_SESSION['id']);?></p></div>
            </div>
          </div>
        </div>
        <!--<div class="col-md-3 col-xs-3 no" style="border:1px solid #B168D4;float:right">
          <div class="col-md-3 col-xs-3 no" style="background:#B168D4;">
            <i class="fa fa-star ic"></i>
          </div>
          <div class="col-md-9 col-xs-9 no">
            <div class="col-md-12 no rankdiv">
              <div class="col-md-12 col-xs-12"><center><h4 class="nom" style="margin-top:10%;color:#813DA1">Overall Rank</h4></center></div>
              <div class="col-md-12 col-xs-12"><center><h4>45/100</h4></center></div>
            </div>
          </div>
        </div>-->
      </div>
      </div><!-- profileinfo-->
      
      </div><!-- profiletab-->
      <div class="row rightcontainer"><!-- right container-->
      <div class="col-md-6 col-xs-12 contestdiv"><!-- contest div-->
      
      <div class="col-md-12 col-xs-12 livecontest"><!-- live-->
      <div class="col-xs-12"><h4 class="hd4live"><i class="fa fa-star"></i> Live Contest</h4></div>
      <div class="col-xs-12" style="margin-bottom:2%;">
       

        <div class="list-group" id="livecontests">
         

          <!--<div class="list-group-item col-xs-12 nop" style="background:lavender">
            <div class="col-xs-9 no" style="padding:15px">
              <h4 class="list-group-item-heading hdd4">Insomnia Qualifier</h4>
              <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
            </div>
            <div class="col-xs-3  enterdiv">
              <center><a href="#">Enter <i class="fa fa-arrow-right"></i></a></center>
            </div>
         

          </div>
          <div class="list-group-item col-xs-12 nop" style="background:lavender">
            <div class="col-xs-9 no" style="padding:15px">
              <h4 class="list-group-item-heading hdd4">Sphinx Qualifier</h4>
              <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
            </div>
            <div class="col-xs-3  enterdiv">
              <center><a href="#">Enter <i class="fa fa-arrow-right"></i></a></center>
            </div>
         

          </div>-->
        

        </div>
      

      </div>
      </div><!-- live-->
      <div class="col-md-12 col-xs-12 livecontest"><!-- Upcoming-->
      <div class="col-xs-12"><h4 class="hd4up"><i class="fa fa-paper-plane"></i> Upcoming Contest</h4></div>
      <div class="col-xs-12" style="margin-bottom:2%;">


        <div class="list-group" id="upcomingcontests">
      

        <!--  <div class="list-group-item col-xs-12 nop" style="background:lavender">
            <div class="col-xs-9 no" style="padding:15px">
              <h4 class="list-group-item-heading hdd4">Insomnia Qualifier</h4>
              <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
            </div>
            <div class="col-xs-3  startsatdiv">
              <center><div class="col-xs-12 no"><center><p style="font-size:18px"><b>Date:</b></p></center></div><div class="col-xs-12 no"><p>27/09/16</p></div></center>
            </div>
          </div>
      

          <div class="list-group-item col-xs-12 nop" style="background:lavender">
            <div class="col-xs-9 no" style="padding:15px">
              <h4 class="list-group-item-heading hdd4">Sphinx Qualifier</h4>
              <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
            </div>
            <div class="col-xs-3  startsatdiv">
              <center><div class="col-xs-12 no"><center><p style="font-size:18px"><b>Date:</b></p></center></div><div class="col-xs-12 no"><p>31/10/16</p></div></center>
            </div>
          </div>-->
      


        </div>
      
      </div>
      </div><!-- Upcoming-->
      <div class="col-md-12 col-xs-12 livecontest"><!-- Past-->
      <div class="col-xs-12"><h4 class="hd4past"><i class="fa fa-hourglass"></i> Past Contest</h4></div>
      <div class="col-xs-12" style="margin-bottom:2%;">
       

        <div class="list-group" id="pastcontests">

        <!--  <div class="list-group-item col-xs-12 nop" style="background:lavender">
            <div class="col-xs-9 no" style="padding:15px">
              <h4 class="list-group-item-heading hdd4">Insomnia Qualifier</h4>
              <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
            </div>
            <div class="col-xs-3  viewdiv">
              <center><a href="#">View <i class="fa fa-arrow-right"></i></a></center>
            </div>
          </div>


          <div class="list-group-item col-xs-12 nop" style="background:lavender">
            <div class="col-xs-9 no" style="padding:15px">
              <h4 class="list-group-item-heading hdd4">Sphinx Qualifier</h4>
              <p class="list-group-item-text">Avishkar's most awaited event is here.</p>
            </div>
            <div class="col-xs-3  viewdiv">
              <center><a href="#">View <i class="fa fa-arrow-right"></i></a></center>
            </div>
          </div>-->


        </div>
      </div>
      </div><!-- Past-->
      </div><!-- contest div-->
      <div class="col-md-5 col-xs-12 chartdiv"><!-- chartdiv-->
      <div id="chart1" style="height:400px; "></div>
      <div id="chart2" style="height:400px; "></div>
      </div><!-- chartdiv-->
      </div><!-- right container-->
      </div><!-- right panel-->
      </div><!-- mainrow-->
      </div><!-- container -->
    </body>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    var line1 = [['C', 4],['C++', 6],['JAVA', 2],['Python', 5],['Ruby', 6]];
    
    $('#chart1').jqplot([line1], {
    title:'No of Successfull Submissions',
    seriesDefaults:{
    renderer:$.jqplot.BarRenderer,
    rendererOptions: {
    // Set the varyBarColor option to true to use different colors for each bar.
    // The default series colors are used.
    varyBarColor: true
    }
    },
    axes:{
    xaxis:{
    renderer: $.jqplot.CategoryAxisRenderer
    }
    }
    });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
    // Our data renderer function, returns an array of the form:
    // [[[x1, sin(x1)], [x2, sin(x2)], ...]]
    var sineRenderer = function() {
    var data = [[]];
    for (var i=0; i<13; i+=0.5) {
    data[0].push([i, Math.sin(i)]);
    }
    return data;
    };
    
    // we have an empty data array here, but use the "dataRenderer"
    // option to tell the plot to get data from our renderer.
    var plot1 = $.jqplot('chart2',[],{
    title: 'Sine Data Renderer',
    dataRenderer: sineRenderer
    });
    });
     $(document).ready(function()
     {
      getlivecontests();
      getupcomingcontests();
      getpastcontests();
     })
    setInterval(getlivecontests,3000);
    setInterval(getupcomingcontests,3000);
    setInterval(getpastcontests,3000);
    </script>
    
  </html>