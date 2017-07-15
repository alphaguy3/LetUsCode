<?php
session_start();
require_once('function.php');
 require_once('curl_class.php');
 checkadmin();
//$userid = $_SESSION['id'];
$problemid = $_GET['pid'];
//$userid = $_SESSION['id'];
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
 <link rel="stylesheet" href="css/add_problems.css">
 <script src="js/jquery-3.1.0.min.js"></script>
 <title>LetUsCode</title>
 <script src="jquery-3.1.0.js"></script>

 <script>
  var contestid;
  $(document).ready(function()
  {
    var problemid = '<?php echo $problemid;?>';
   $.post('getdetails.php',
   {
       problemid   :    problemid,
       type        :    "mcq"
   },
   function(data)
   {
      var ans = jQuery.parseJSON(data);
      contestid = ans['contestid'];
      document.getElementById('qus_mcq').value = ans['qus_mcq'];
      document.getElementById('op1').value = ans['op1'];
      document.getElementById('op2').value = ans['op2'];
      document.getElementById('op3').value = ans['op3'];
      document.getElementById('op4').value = ans['op4'];
      document.getElementById('ans').value = ans['ans'];
   });
 });
     
     function update()
     {
      var problemid = '<?php echo $problemid;?>';
      var type="mcq";
     var qus_mcq = document.getElementById('qus_mcq').value ;
     var op1 = document.getElementById('op1').value  ;
     var op2 =  document.getElementById('op2').value ;
      var op3 = document.getElementById('op3').value ;  
      var op4 = document.getElementById('op4').value ;
      //var ans = document.getElementById('ans').value ;
      $.post('updatedetails.php',
      {
            problemid  :  problemid ,
            type:type,
            qus_mcq :qus_mcq,
            op1:op1,
            op2:op2,
            op3:op3,
            op4:op4,
            //ans:ans
      },
      function(data)
      {
        alert('Updated Succesfully');
        window.location="editcontest.php?cid="+contestid;
      }) 
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
                  
                    
<div class="col-xs-12 codeformdiv" id="mcq1"><!--mcq-->
<formx class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label no">Problem Statement :</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="qus_mcq" rows="2" cols="57" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Option A: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="op1" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Option B: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="op2" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Option C: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="op3" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Option D: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="op4" required>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label no">Answer: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ans" required placeholder="Enter Correct Option">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-4 col-sm-push-4">
      <center><button class="btn btn-danger" onclick="update();">Update</button></center>
    </div>
  </div>
</formx>
</div><!-- mcq -->
                </div><!-- right container-->


          </div><!-- right panel-->


        </div><!-- mainrow-->

    </div><!-- container -->

</body>
   <script src="bootstrap/js/bootstrap.min.js"></script>
  
  
</html>