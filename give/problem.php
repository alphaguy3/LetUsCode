<!doctype html>
<html lang=''>
  <head>
  <?php
  require_once('function.php');
  require_once('curl_class.php');
  session_start();
  $problem_id = 10;
  $user_id = 2;
  $sql = "SELECT * FROM problem WHERE id='$problem_id' ";
  $con = con();
  $res = $con->query($sql);
  while($arr = $res->fetch_array())
  {
    $name         = $arr['name'];
    $statement    = $arr['statement'];
    $constraints  = $arr['constraints'];
    $time_limit   = $arr['time_limit'];
    $source_limit = $arr['source_limit'];
    $demo_input   = $arr['demo_input'];
    $demo_output  = $arr['demo_output'];

  }
  
 ?>

    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/problem.css">
    <script src="js/jquery-3.1.0.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap-material-datetimepicker.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/editor/check.js"></script>
    <script src="js/editor/ace.js"></script>
    <script type="text/javascript">
    </script>
    <script type="text/javascript">
     var test = 0;
     var flag ;
     
    </script>
    <title>LetUsCode</title>
  </head>
  <script type="text/javascript">
  


  
function b()
{
  a();
  $('#start').click();
}


function a(){
    
    var editor = ace.edit("editor");
    var x=$('#doc').val();
    //console.log(x);
    
    if(x=='C')
     {
      $.post("findautosavedfile.php",
                 {
                  user_id     :  <?php echo $user_id;?>,
                  problem_id  :  <?php echo $problem_id?>,
                  lang       :   x,
                 },
                 function(data)
                 {
                 // console.log(data);
                      var ans = jQuery.parseJSON(data);
                      if(ans[0]['code']=="NA")
                            editor.setValue("#include <stdio.h>\nint main(){\n...\nreturn 0;\n}");
                      else
                      {
                          flag = ans[0]['code'];
                         editor.setValue(flag);
                      }
                 });
      
      editor.session.setMode("ace/mode/c_cpp");
     }
   else if(x=='CPP')
     {
      $.post("findautosavedfile.php",
                 {
                  user_id     :  <?php echo $user_id;?>,
                  problem_id  :  <?php echo $problem_id;?>,
                  lang        :   x,
                 },
                 function(data)
                 {
                 // console.log(data);
                      var ans = jQuery.parseJSON(data);
                      if(ans[0]['code']=="NA")
                            editor.setValue("new code here1");
                      else
                      {
                          flag = ans[0]['code'];
                         editor.setValue(flag);
                      }
                 });
      
      editor.session.setMode("ace/mode/c_cpp");
     }
     else if(x=='JAVA')
     {
      $.post("findautosavedfile.php",
                 {
                  user_id     :  <?php echo $user_id;?>,
                  problem_id  :  <?php echo $problem_id;?>,
                  lang       :   x,
                 },
                 function(data)
                 {
                 // console.log(data);
                      var ans = jQuery.parseJSON(data);
                      if(ans[0]['code']=="NA")
                            editor.setValue("new code here2");
                      else
                      {
                          flag = ans[0]['code'];
                         editor.setValue(flag);
                      }
                 });
      
      editor.session.setMode("ace/mode/java");
     }
     else
    if(x=='PYTHON')
     {
      $.post("findautosavedfile.php",
                 {
                  user_id     :  <?php echo $user_id;?>,
                  problem_id  :  <?php echo $problem_id;?>,
                  lang       :    x,
                 },
                 function(data)
                 {
                 // console.log(data);
                      var ans = jQuery.parseJSON(data);
                      if(ans[0]['code']=="NA")
                            editor.setValue("new code here3");
                      else
                      {
                          flag = ans[0]['code'];
                         editor.setValue(flag);
                      }
                 });
      
      editor.session.setMode("ace/mode/python");
     }

     
    var code = editor.getValue();       
   // console.log(code);
    editor.setTheme("ace/theme/monokai");
    }

  </script>

  <body style="width:100%;" onload = a();>
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
              <div class="col-md-12 col-xs-12"><center><h4 class="nom" style="margin-top:10%;color:#813DA1">Overall Rank</h4></center></div>
              <div class="col-md-12 col-xs-12"><center><h4>45/100</h4></center></div>
            </div>
          </div>
        </div>
      </div>
      </div><!-- profileinfo-->
      
      </div><!-- profiletab-->
      <div class="row rightcontainer"><!-- right container-->
      










<div class="col-xs-12 contestdiv" style="padding-left:0"><!-- contest div-->
<div class="col-md-12 col-xs-12 livecontest"><!-- live-->
<div class="col-xs-12"><h4 class="hd4live"><i class="fa fa-star"></i> <?php echo $name ;?></h4></div>
<div class="col-xs-12 well"><!-- prob statement-->
  <p class="probstate"><?php echo $statement; ?></p>

  <h5 class="hdd4"><b>Input</b></h5>
  <p class="probstate"><?php echo $demo_input ; ?></p>
  <h5 class="hdd4"><b>Output</b></h5>
  <p class="probstate"><?php echo $demo_output ; ?></p>
  <!--<h5 class="hdd4"><b>Subtasks</b></h5>
  <p class="probstate">
    <ul>
      <li><p class="probstate"><?php echo $subtask; ?></p></li>
    </ul>
  </p>-->

  <h5 class="hdd4"><b>Constraints</b></h5>
  <p class="probstate">
    <ul>
      <li><p class="probstate"><?php echo $constraints; ?></p></li>
    </ul>
  </p>

  <h5 class="hdd4"><b>Time Limit</b></h5>
  <p class="probstate"><?php echo $time_limit ;?></p>

  <h5 class="hdd4"><b>Source Limit</b></h5>
  <p class="probstate"><?php echo $source_limit; ?></p>

</div><!-- prob statement-->
<div class="row">
<div class="col-xs-10"><!-- editor-->
  <select id="doc" onChange="a();">
        <option value="C">C</option>
        <option value="CPP">C++</option>
        <option value="JAVA">Java</option>
        <option value="PYTHON">Python</option>
  </select>
  <pre id="editor"></pre>
<!-- editor-->
  <center>
  <button onclick="compile();">Compile</button>
  <button onclick="submit();">Submit Code</button>
  </center>
  </div>
  <div class="col-xs-4">
    <div id="compilation_status">
        <h3>Compilation Status</h3>
        <p>Your Compilation Status Views Here </p>
    </div>
  </div>
  <div id="autosave" style="align:right">
  <p>Auto</p>
  </div>
  </div>
</div><!--live-->
</div><!-- contest div-->
















      
      </div><!-- right container-->
      </div><!-- right panel-->
      </div><!-- mainrow-->
      </div><!-- container -->
    </body>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">

$(document).ready(function()
    {
     setInterval(function()
     {
      var x=$('#doc').val();
     // console.log(x);
        var editor = ace.edit("editor");
        // console.log('start1');
        var code  = editor.getValue();
        var user_id = <?php echo $user_id; ?> ;
        var problem_id = <?php echo $problem_id; ?> ;
        $.post("autosavefile.php",
        {
            userid     :   user_id,
            problemid  :   problem_id,
            code_save  :   code,
            lang       :   x,
        },
        function(data)
        {
          if(data=="success")
          document.getElementById('autosave').innerHTML="auto saved";
          else
          console.log('auto saved failed');
          
        }
        );
      },
      10000);
     setInterval(function()
       {
        document.getElementById('autosave').innerHTML="";
       },2000);
          });


function compile()
{
   alert("here");
}



function submit()
{
  var editor = ace.edit("editor");
  var lang=$('#doc').val();
  var code  = editor.getValue();
  var user_id = <?php echo $user_id; ?> ;
  var problem_id = <?php echo $problem_id; ?> ;
  var time_limit =" <?php echo $time_limit;?>";
  var source_limit="<?php echo $source_limit;?>";
  $.post("submitcode.php",
  {
            userid     :   user_id,
            problemid  :   problem_id,
            code       :   code,
            lang       :   lang,
            source_limit:  source_limit,
            time_limit :   time_limit
  },function(data)
  {
    alert(data);
  });

}
    </script>
  </html>