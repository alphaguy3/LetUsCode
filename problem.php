<!doctype html>
<html lang=''>
  <head>
  <script src="js/jquery-3.1.0.min.js"></script>
  <?php
  session_start();
  require_once('function.php');
  require_once('curl_class.php');
  $user_id = $_SESSION['id'];
  $userid = $user_id;
  $contestid = $_GET['cid'];
  
  $contest_id=$_GET['cid'];
$query="SELECT * From `mcq` where contest_id='$contest_id'";
$con=con();
$res=$con->query($query);
$there=$res->num_rows;
$query="SELECT * from `done_till` where `contest_id`='$contest_id'and `user_id`='$user_id' and `type`='mcq'";
$res=$con->query($query);
$arr=$res->fetch_array();
$done=$arr['page'];
if($done<$there)
header("location:mcq.php?cid=$contest_id");

$con = con();
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



$query="SELECT * From `subjective` where contest_id='$contest_id'";
$con=con();
$res=$con->query($query);
$there=$res->num_rows;
$query="SELECT * from `done_till` where `contest_id`='$contest_id'and `user_id`='$user_id' and `type`='sub'";
$res=$con->query($query);
$arr=$res->fetch_array();
$done=$arr['page'];
if($done<$there)
header("location:subjective.php?cid=$contest_id");

  $sql = "select * from contest where id='$contestid'";
$con = con();
$res = $con->query($sql);
$arr = $res->fetch_array();
$duration = $arr['duration'];
if($arr['start']=='0')
{
  echo "<script>alert('The Contest Has Not Been Started');location.href='dashboard.php';</script>" ;
  die();
}
if($arr['finish']=='1')
{
  echo "<script>alert('The Contest Has Ended');location.href='dashboard.php';</script>" ;
  die();
}
$query="SELECT * From `problem` where contest_id='$contestid'";
$con=con();
$res=$con->query($query);
$all_qus=Array();
while($arr=$res->fetch_array())
{
     array_push($all_qus,$arr['id']);
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
   function endtest()
   {
         var userid = '<?php echo $user_id;?>';
         var contestid = '<?php echo $contestid;?>';
         $.post('endtest.php',
         {
           userid : userid,
           contestid : contestid
         },
         function(data)
         {
            if(data=="success"){
            alert('Thanks For Taking The Contest');
            location.href = "feedback.php?cid="+contestid;}
         });
   }

    function full(){
var docElm = document.documentElement;
if (docElm.requestFullscreen) {
    docElm.requestFullscreen();
}
else if (docElm.mozRequestFullScreen) {
    docElm.mozRequestFullScreen();
}
else if (docElm.webkitRequestFullScreen) {
    docElm.webkitRequestFullScreen();
}
  $('#full').css('display','none');
  $('#hide').css('display','block');
  $('.leftpanel').css('height','800px');
}
    </script>
  <script type="text/javascript">
   
    function get(){
      $.post('getcomment.php',{
        cid:'<?php echo $contestid;?>',
        uid:'<?php echo $user_id;?>',
        pid:document.getElementById('hiddendiv').innerHTML
      },
        function(data){
          document.getElementById('cdiv').innerHTML=data;
         }
      );
    }
    function com(){
      var text = document.getElementById('commenttext').value;
      $.post('addcomment.php',{
        cid:'<?php echo $contestid;?>',
        uid:'<?php echo $user_id;?>',
        pid:document.getElementById('hiddendiv').innerHTML,
        text:text
        
      },
        function(data){
          if(data == 'success')
            alert("Comment Added Successfully!!");
          else
            alert(data);
        }
      );
      document.getElementById('commenttext').value = "";
    }

function setdisplay(id)
{

  document.getElementById('hiddendiv').innerHTML = id;
  var problemid = id;
  $.post("getproblem.php",
  {
    problemid : problemid
  },
  function(data)
  {
        console.log(data);
        var ans = jQuery.parseJSON(data);
        document.getElementById('name').innerHTML = "<i class=\"fa fa-star\"></i> "+ans[0]['name'];
        document.getElementById('statement').innerHTML = ans[0]['statement'];
        document.getElementById('input').innerHTML = ans[0]['demo_input'];
        document.getElementById('output').innerHTML = ans[0]['demo_output'];
        document.getElementById('constraints').innerHTML = ans[0]['constraints'];
        document.getElementById('timelimit').innerHTML = ans[0]['time_limit'];
        document.getElementById('sourcelimit').innerHTML = ans[0]['source_limit'];
        var x=ans[0]['img'];
        if(x==1)
        {
          var location="all_files/images/"+ans[0]['img_url'];
          //console.log(location);
          document.getElementById('sourcelimit').innerHTML ="<div class=\"col-sm-4 col-sm-offset-4\" ><center><img src="+location+" class=\"img-responsive\" style=\"height:200px;\"></center></div>";
        }

  });
}
  
function b()
{
  a();
  $('#start').click();
}


function a(){
    
    var editor = ace.edit("editor");
    var x=$('#doc').val();
    if(x=='C')
     {
      $.post("findautosavedfile.php",
                 {
                  user_id     :  '<?php echo $user_id;?>',
                  problem_id  :  document.getElementById('hiddendiv').innerHTML,
                  lang       :   x,
                 },
                 function(data)
                 {
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
                  problem_id  :  document.getElementById('hiddendiv').innerHTML,
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
                  problem_id  :  document.getElementById('hiddendiv').innerHTML,
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
                  problem_id  :  document.getElementById('hiddendiv').innerHTML,
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
        <?php
          foreach($all_qus as $key=>$val)
          {
            echo "<input id=\"problem\" style=\"display:none\" value=".$val.">";
          $query="SELECT `name` from `problem` where `id`='$val'";
          $res=$con->query($query);
          while($arr=$res->fetch_array())
         echo "<li id='$val' onclick=\"setdisplay($val);\" class=\"\"><a href=\"#\"><span class=\"nav-label\">".$arr['name']."</span></a></li> "  ;
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
              <div class="col-md-12 col-xs-12 name nom"><h4 class="nom" style="margin-top:15%;"><?php echo getusername($_SESSION['id']);?></h4></div>
              <div class="col-md-12 col-xs-12 email"><p><?php echo getemail($_SESSION['id']);?></p></div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-xs-3 no" style="border:1px solid #B168D4;float:right">
          <div class="col-md-3 col-xs-3 no" style="background:#B168D4;">
            <i class="fa fa-star ic"></i>
          </div>
          <div class="col-md-9 col-xs-9 no">
            <div class="col-md-12 no rankdiv">
              <div class="col-md-6 col-xs-6"><center><h4 class="nom" style="margin-top:10%;color:#813DA1">Remaining Time</h4></center></div>
              <div class="col-md-6 col-xs-6"><center><h4 id="remainingtime"></h4></center></div>
              <div class="col-sm-12"><center><button onclick="endtest();"  class="btn btn-danger">End Test</button></center></div>
            </div>
          </div>
        </div>
      </div>
      </div><!-- profileinfo-->
      
      </div><!-- profiletab-->
      <div class="row rightcontainer"><!-- right container-->
      








<div class="col-sm-12" style="margin-top:5%;">
  <center>
    <button id="full"  style="display:none" onclick="full()" class="btn btn-info">Start Coding</button>
  </center>
</div>


<div class="col-xs-12" id="hide">
<div class="col-xs-12 contestdiv" style="padding-left:0"><!-- contest div-->
<div class="col-md-12 col-xs-12 livecontest"><!-- live-->
<div id="hiddendiv" style="visibility:hidden"></div>
<div class="col-xs-12"><h4 class="hd4live" id="name"></h4></div>
<div class="col-xs-12 well"><!-- prob statement-->
  <p class="probstate" id="statement"></p>

  <h5 class="hdd4"><b>Input</b></h5>
  <p class="probstate" id="input"></p>
  <h5 class="hdd4"><b>Output</b></h5>
  <p class="probstate" id="output"></p>
  <!--<h5 class="hdd4"><b>Subtasks</b></h5>
  <p class="probstate">
    <ul>
      <li><p class="probstate"><?php // echo $subtask; ?></p></li>
    </ul>
  </p>-->

  <h5 class="hdd4"><b>Constraints</b></h5>
  <p class="probstate">
    <ul>
      <li><p class="probstate" id="constraints"></p></li>
    </ul>
  </p>

  <h5 class="hdd4"><b>Time Limit</b></h5>
  <p class="probstate" id="timelimit"></p>

  <h5 class="hdd4"><b>Source Limit</b></h5>
  <p class="probstate" id="sourcelimit"></p>
  <div class="col-sm-12" id="img">
    <!--<div class="col-sm-4 col-sm-offset-4" ><center><img src="assets/thumb1.jpg" class="img-responsive" style="height:200px;"></center></div>-->
  </div>
</div><!-- prob statement-->
<div class="row">
<div class="col-xs-6"><!-- editor-->
  <select id="doc" onChange="a();">
        <option value="C">C</option>
        <option value="CPP">C++</option>
        <option value="JAVA">Java</option>
        <option value="PYTHON">Python</option>
  </select>
  <pre id="editor"></pre>

  <div class="col-sm-12">
    <center><button onclick="submit();" class="btn btn-info">Submit Code</button></center>    
  </div>
  </div><!-- editor-->

  <div class="col-xs-6"><!-- compile div-->
    <div id="compilation_status" class="col-sm-12">
        <div class="col-sm-12"><h3>Compilation Status</h3></div>
        <div class="col-sm-9"><p>Your Compilation Status Views Here </p></div> 
        <div id="status" class="col-sm-3"></div>
    </div>
    <div class="col-sm-12" style="margin-top:2%"><textarea name="custom" id="custom" placeholder="Enter Custom Testcases" rows="5" cols="67"></textarea>
    </div>
    <div class="col-sm-12"><center><button onclick="compile();" class="btn btn-danger">Compile</button></center></div>
    <div id="autosave" class="col-sm-12">
      <center><h4 class="hdd4" id="autosaveh4">Auto Saved</h4></center>
    </div>
  </div><!-- compile div-->
  
  </div>
</div><!--live-->
</div><!-- contest div-->



      
     
     


<div class="col-sm-12 comment"><!--comments-->

          <div class="col-sm-12"><h4 class="hd4live"><i class="fa fa-star"></i> Comments</h4></div>

          <div id="cdiv" class="col-sm-12 cdiv">

          

          </div>


      </div><!--comments-->

      <div class="col-sm-12 addcomment"><!--addcomment-->
        <div class="col-sm-12"><h4 class="hd4live"><i class="fa fa-reply"></i> Add Comment</h4></div>
        <formx class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-12">
                <textarea class="form-control" id="commenttext" rows="10" cols="57" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-4 col-sm-push-4">
                <center><button class="btn btn-info" onclick="com();">Submit</button></center>
              </div>
            </div>
          </formx>
      </div><!--addcomment-->
      </div>








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
        var problem_id  =  document.getElementById('hiddendiv').innerHTML;
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
          document.getElementById('autosaveh4').innerHTML="Auto Saved";
          else
          console.log('auto saved failed');
          
        }
        );
      },
      10000);
     setInterval(function()
       {
        document.getElementById('autosaveh4').innerHTML="";
       },2000);
          });


function compile()
{
  if(document.getElementById('custom').value=="")
  {
    alert('Enter Custom TestCases');
    return ;
  }
  var editor = ace.edit("editor");
  var lang=$('#doc').val();
  var code  = editor.getValue();
  var user_id = <?php echo $user_id; ?> ;
  var problem_id  =  document.getElementById('hiddendiv').innerHTML;
  var time_limit   =     document.getElementById('timelimit').innerHTML;
  var source_limit =  document.getElementById('sourcelimit').innerHTML;
  var input = document.getElementById('custom').value;
  console.log(input);
   $.post("testcode.php",
  {
            userid     :   user_id,
            input     :    input,
            problemid  :   problem_id,
            code       :   code,
            lang       :   lang,
            source_limit:  source_limit,
            time_limit :   time_limit
  },function(data)
  {
    document.getElementById('custom').value="";
    document.getElementById('status').innerHTML = data;
  });
}



function submit()
{
  var editor = ace.edit("editor");
  var lang=$('#doc').val();
  var code  = editor.getValue();
  var user_id = <?php echo $user_id; ?> ;
  var problem_id  =  document.getElementById('hiddendiv').innerHTML;
  var time_limit   =     document.getElementById('timelimit').innerHTML;
  var source_limit =  document.getElementById('sourcelimit').innerHTML;
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
    document.getElementById('status').innerHTML = data;
  });

}
  
  $(document).ready(function(){
       setInterval(get,3000);
  });
    
    </script>
    <?php 
          echo "<script>$(document).ready(setdisplay($all_qus[0]))</script>";
    ?>
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
      <script>
$(document).ready(function(){
       var error=0;
        var userid    = '<?php echo $userid;?>';
     var contestid = '<?php echo $contestid; ?>';
        $(document).keyup(function(event) {
        if (event.which == '122'||event.which == '27'){
          error++;
            alert('This incident will be reported');
            $.post("../error.php",
            {
                error  : error,
                contest : contestid,
                userid  : userid
            },
            function(data)
            {
               console.log(data);
            });
            //console.log(error);
            event.preventDefault();
         }
    });
      });

$(document).ready(function()
{ 
      var start=1;
      if(start==1)
      {
        $('#full').css('display','block');
        $('#hide').css('display','none');
        start=2;
      }
});
</script>
<script>
$(document).ready(function(){
       var error=0;
        var userid    = '<?php echo $userid;?>';
     var contestid = '<?php echo $contestid; ?>';
        $(document).keyup(function(event) {
        if (event.which == '122'||event.which == '27'){
          error++;
            alert('This incident will be reported');
            $.post("error.php",
            {
                error  : error,
                contest : contestid,
                userid  : userid
            },
            function(data)
            {
               console.log(data);
            });
            //console.log(error);
            event.preventDefault();
         }
    });
      });
</script>

  </html>