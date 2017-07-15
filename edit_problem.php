<?php
session_start();
  require_once('function.php');
  require_once('curl_class.php');
  $con = con();
  $problem_name = "harhi";
  $sql = "SELECT * FROM problem WHERE name = '$problem_name'";
  $res = $con->query($sql);
  while($arr = $res->fetch_array())
  {
    $description  = $arr['statement'];
    $time_limit   = $arr['time_limit'];
    $source_limit = $arr['source_limit'];
    $constraints  = $arr['constraints'];
    $demo_input   = $arr['demo_input'];
    $demo_output  = $arr['demo_output'];
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
 <link rel="stylesheet" href="css/add_problems.css">
 <script src="js/jquery-3.1.0.min.js"></script>
 <title>LetUsCode</title>
 <script src="jquery-3.1.0.js"></script>
 <script>

function edit()
{ 
   $.post('upload_edited.php',
   {
     name         : document.getElementById('probname').value,
     description  : document.getElementById('description').value,
     constraints  : document.getElementById('constraints').value,
     timelimit    : document.getElementById('timelimit').value,
     sourcelimit  : document.getElementById('sourcelimit').value,
     demoinput    : document.getElementById('demoinput').value,
     demooutput   : document.getElementById('demooutput').value,
   },
   function(data)
   {
    if(data=="success")
    {
     alert('Successfully Edited');
    }
    else
    {
     alert("Error In Editing");
    }
   });
}



/*function addsubtask()
{
var marks = document.getElementById('subtasks');
var mark = $(marks).find('input:text');
var len_marks = mark.length;
var no_elements = len_marks;
if(mark[len_marks-1].value=="")
{
  alert('Enter Marks');
  return false;
}
var conf = confirm("Are you sure you want to add the subtask. You cant undo it later");
if(conf==false)
  return false;
var files = document.getElementById('subtasks');
var s = $(files).find('input:file');
var len_file = s.length;
var file = s[len_file-1].files[0]
if (file) {
var reader = new FileReader();
reader.addEventListener('load', function() {
  var subtask_input = String(this.result);





     $.post("uploadsubtask.php",
              {
                      contestid    : 11,
                      problemname  : document.getElementById('probname').value,
                      subtaskno    : no_elements,
                      subtask      : subtask_input,
                      sourcelimit  : parseInt(document.getElementById('sourcelimit').value)

              },
              function(data)
              {
                if(data=="success")
                {
                   alert("SubTask Added Successfully");
                   s[len_file-1].setAttribute('disabled',true);
                   var buttons = $('#subtasks button');
                   var len_button = buttons.length;
                   var i;
                  for(i=0;i<len_button;i++)
                    {
                      mark[i].setAttribute('disabled','true');
                      buttons[i].setAttribute('disabled',true);
                    }

       $('#subtasks').append("<div class=\"col-xs-12\" style=\"background:lavender;padding:2%;\" id=\"individualsubtasks\">                                <label class=\"col-sm-2 control-label\">Upload Subtask file:</label>                                <div class=\"col-sm-3\">                                  <input type=\"file\" id=\"subtaskfile\" required style=\"width:140%;\">                                </div>                                <label class=\"col-sm-2 control-label\">Marks: </label>                                <div class=\"col-sm-4\">                                  <input type=\"text\" class=\"form-control\" class=\"marks\" required style=\"width:100%;\">                                </div>                                <div class=\"col-xs-12\"><center><button class=\"btn btn-danger\" onclick=\"addsubtask();\">Add +</button></center></div>                              </div>");
                }
                else
                {
                  alert(data);
                  //alert("Error uploading subtask.Please Try Again");
                }
              }
              );






});
reader.readAsText(file);
}
else
{
  alert('Please upload a file');
  return false;
}



       


              
            
}*/

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

                    <div class="col-xs-12 codeformdiv">
                          
                    <formx class="form-horizontal">

                      <div class="col-xs-6" id="form"> 
                        <div class="form-group">
                        <label class="col-sm-2 control-label no">Problem Name:</label>
                        <div class="col-sm-10" >
                          <input type="text" class="form-control" id="probname" value = '<?php echo $problem_name ;?>' disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Description: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="5" cols="57" id="description" value = '<?php echo $description ;?>' required><?php echo $description ;?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" ">Constraints: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="2" cols="57" id="constraints" value = '<?php echo $constraints ;?>' required><?php echo $constraints ;?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Demo Input: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="2" cols="57" id="demoinput" value = '<?php echo $demo_input ;?>' required><?php echo $demo_input ;?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Demo Output: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="2"  id="demooutput" cols="57" value = '<?php echo $demo_output ;?>' required><?php echo $demo_output ;?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Time Limit:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="timelimit" value = '<?php echo $time_limit ;?>' required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Source Limit:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="sourcelimit" value = '<?php echo $source_limit ;?>' required>
                        </div>
                      </div>
                      <button onclick="edit();">EDIT</button>
                       <!--<div class="form-group">
                        <label class="col-sm-2 control-label no">Source File:</label>
                        <div class="col-sm-6" id="source_file">
                          <input type="file" class="" id="sourcefile" required>
                        </div>
                        <div class="col-sm-4" >
                          <button id="uploadsource" class="btn btn-danger" onclick="upload_source();">Upload +</button>
                        </div>
                      </div>

                      </div>-->

                      <!--<div class="col-xs-6">
                        <center><h4 class="hd4" style="margin-bottom:15px;font-size:22px">Enter Subtasks</h4></center>
                        <div class="col -xs-12"  id="subtasks" style="overflow-y:scroll;height:450px;">
                          
                            <div class="col-xs-12" style="background:lavender;padding:2%;" id="individualsubtasks">
                              <label class="col-sm-2 control-label">Upload Subtask file:</label>
                              <div class="col-sm-3">
                                <input type="file" id="subtaskfile" required style="width:140%;">
                              </div>
                              <label class="col-sm-2 control-label" >Marks: </label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control" class="marks" required style="width:100%;">
                              </div>
                              <div class="col-xs-12"><center><button class="btn btn-danger" onclick="addsubtask();">Add +</button></center></div>
                            </div>

                        </div>
                      </div>-->

                    </formx>

                    </div>
                    
                </div><!-- right container-->


          </div><!-- right panel-->


        </div><!-- mainrow-->
    </div><!-- container -->
</body>
   <script src="bootstrap/js/bootstrap.min.js"></script>
  
  
</html>