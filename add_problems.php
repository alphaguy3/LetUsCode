<?php
session_start();
require_once('function.php');
 require_once('curl_class.php');
//$userid = $_SESSION['id'];
$contestid = $_GET['cid'];
$userid = '3';
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

 $(document).ready(function()
 {
        $('#coding1').css('display','block');
        $('#mcq1').css('display','none');
        $('#subjective1').css('display','none'); 
  $('input:radio[name="prob"]').change(function()
  {
    if($(this).val()=="coding")
      {
        $('#coding1').css('display','block');
        $('#mcq1').css('display','none');
        $('#subjective1').css('display','none');
      }
    else if($(this).val()=="mcq")
      {
        $('#coding1').css('display','none');
        $('#mcq1').css('display','block');
        $('#subjective1').css('display','none');
      }
    else if($(this).val()=="subjective")
      {
       $('#coding1').css('display','none');
        $('#mcq1').css('display','none');
        $('#subjective1').css('display','block');
      }
  });
 });


function subjectiveupload()
{

  var qus = document.getElementById('qus_sub').value;
  var contest = '<?php echo $contestid; ?>';
  var marks = document.getElementById('marks_sub').value;
  $.post('uploadsubjective.php',
  {
    contest    :     contest,
    qus        :     qus,
    marks      :     marks,
  },
  function(data)
  {
    if(data=="success")
      {
        alert("Problem Added");
        document.getElementById('qus_sub').value="";
        document.getElementById('marks_sub').value="";
      }
    else
      alert(data);
  });
}

function mcqupload()
{
  var qus = document.getElementById('qus_mcq').value;
  //var contest=<?php //echo $_SESSION['contest_id'];?>;
  var contest = '<?php echo $contestid; ?>';
  var marks = document.getElementById('marks_mcq').value;
  var op1 = document.getElementById('op1').value;
  var op2 = document.getElementById('op2').value;
  var op3 = document.getElementById('op3').value;
  var op4 = document.getElementById('op4').value;
  var ans = document.getElementById('ans').value;
  $.post('uploadmcq.php',
  {
    contest    :     contest,
    qus        :     qus,
    marks      :     marks,
    op1        :     op1,
    op2        :     op2,
    op3        :     op3,
    op4        :     op4,
    ans        :     ans,
  },
  function(data)
  {
    if(data=="success")
      {
        alert("Problem Added");
        document.getElementById('qus_mcq').value="";
        document.getElementById('marks_mcq').value="";
        document.getElementById('op1').value="";
        document.getElementById('op2').value="";
        document.getElementById('op3').value="";
        document.getElementById('op4').value="";
        document.getElementById('ans').value="";
      }
    else
      alert("Error");
  });
}

function read_image(image)
{
  var img="";
  var reader = new FileReader();
  reader.addEventListener('load', function() {
  img=String(this.result);
});
  reader.readAsText(image);
  return img;
}


function next()
{
  $('#coding1').load(document.URL +  ' #coding1');
}


function upload_source()
{ 
  $('#god').click();
  var file_selector = document.getElementById('form');
  var f = $(file_selector).find('input:file');
  var file = f[1].files[0];
  //var image = f[0].files[0];
  //var contest=<?php //echo $_SESSION['contest_id'];?>;
   var contest = '<?php echo $contestid; ?>';
  if (file) {
    var cnf = confirm("Are you sure you want to continue.Changes cannot be undone.");
    if(cnf==false)
      return false;

  var reader = new FileReader();
  reader.addEventListener('load', function() {
   var src = String(this.result);
  // console.log(document.getElementById('contestid').innerHTML);
   $.post('uploadsource.php',
   {
     contestid    : contest,
     name         : document.getElementById('probname').value,
     description  : document.getElementById('description').value,
     constraints  : document.getElementById('constraints').value,
     timelimit    : document.getElementById('timelimit').value,
     sourcelimit  : document.getElementById('sourcelimit').value,
     demoinput    : document.getElementById('demoinput').value,
     demooutput   : document.getElementById('demooutput').value,
     lang         : document.getElementById('lang').value,
     sourcecode   : src
   },
   function(data)
   {
    if(data=="success")
    {
     $("#form :input").prop('readonly', true);
     var button = $("#form").find("input:file");
     button[0].disabled = true;
     $('#uploadsource').prop('disabled',true);
     alert("Your Problem Has Been Successfully Added");
    }
    else if(data=="compilationerror")
    {
     alert("Your Source Contains Compilation Error");
    }
   }
   )
  });
  reader.readAsText(file);
}
else
{
  alert("Please upload a file");
  return false;
}
}



function addsubtask()
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
//var contest=<?php //echo $_SESSION['contest_id'];?>;
var contest='<?php echo $contestid?>';
var mark_ind=mark[len_marks-1].value;
var conf = confirm("Are you sure you want to add the subtask. You cant undo it later");
if(conf==false)
  return false;
var files = document.getElementById('subtasks');
var s = $(files).find('input:file');
var len_file = s.length;
var file = s[len_file-1].files[0];
if (file) {
var reader = new FileReader();
reader.addEventListener('load', function() {
  var subtask_input = String(this.result);





     $.post("uploadsubtask.php",
              {
                      contestid    : contest,
                      problemname  : document.getElementById('probname').value,
                      subtaskno    : no_elements,
                      subtask      : subtask_input,
                      timelimit    : document.getElementById('timelimit').value,
                      sourcelimit  : parseInt(document.getElementById('sourcelimit').value),
                      marks        : mark_ind,
                      lang         : document.getElementById('lang').value

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

 
}

 </script>
 <script type="text/javascript">
   $(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
  var url="upload.php?pid="+document.getElementById('probname').value+"&contest="+'<?php echo $contestid?>';
 console.log(url);
e.preventDefault();
$.ajax({
url: url, 
type: "POST",             
data: new FormData(this), 
contentType: false,       
cache: false,             
processData:false,        
success: function(data)   
{
  console.log(data);
}
});
}));


$(function() {
$("#file").change(function() {

var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
alert('Please Select A valid Image File');
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
});
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
                  <div class="col-xs-12">
               <div class="col-xs-2">
                <input type="radio" name="prob" value="coding" id="coding" checked="checked"> Code
               </div>
              <div class="col-xs-2">
                 <input type="radio" name="prob" value="mcq" id="mcq"> MCQ
                 </div>
             <div class="col-xs-2">
             <input type="radio" name="prob" value="subjective" id="subjective"> Subjective
            </div>
            </div>
                    <div class="col-xs-12 codeformdiv" id="coding1">
                          
                    <formx class="form-horizontal" >

                      <div class="col-xs-6" id="form"> 
                        <div class="form-group">
                        <label class="col-sm-2 control-label no">Problem Name:</label>
                        <div class="col-sm-10" >
                          <input type="text" class="form-control" id="probname" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Description: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="5" cols="57" id="description" required></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" ">Constraints: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="2" cols="57" id="constraints" required></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Demo Input: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="2" cols="57" id="demoinput" required></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Demo Output: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="2"  id="demooutput" cols="57" required></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Time Limit:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="timelimit" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Source Limit:</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="sourcelimit" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label no">Source Code Language:</label>
                        <div class="col-sm-4" >
                          <select id="lang">
                          <option value="C">C</option>
                          <option value="CPP">Cpp</option>
                          <option value="JAVA">Java</option>
                          <option value="PYTHON">Python</option>
                          </select>
                        </div>
                      </div>



                      <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                       <div class="form-group id="selectImage">
                    <label class="col-sm-2 control-label no">Select Your Image</label><br/>
                    <div class="col-sm-6" id="file">
                       <input type="file" name="file" id="file"  />
                       </div>
                      <input type="submit" value="Upload" class="submit" id="god" style="visibility:hidden" />
                              </div>
                        </form>


                      <!--<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                      <div class="form-group" id="selectImage">
                        <label class="col-sm-2 control-label no">Select Your Image</label>
                        <div class="col-sm-6" id="file">
                          <input type="file" class="" id="file">

                        </div>
                      </div>
                      </form>-->


                       <div class="form-group">
                        <label class="col-sm-2 control-label no">Source File:</label>
                        <div class="col-sm-6" id="source_file">
                          <input type="file" class="" id="sourcefile" required>
                        </div>
                        <div class="col-sm-4" >
                          <button id="uploadsource" class="btn btn-danger" onclick="upload_source();">Upload +</button>
                        </div>
                      </div>

                      </div>

                      <div class="col-xs-6">
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
                        <div id="next">
                        <center>  <button onclick="next();">Next</button></center>
                        </div>
                      </div>

                    </formx>

                    </div>
                    
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
    <label class="col-sm-2 control-label no">Marks: </label>
    <div class="col-sm-10">
      <input type="number"  class="form-control" name="marks" id="marks_mcq">    
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-4 col-sm-push-4">
      <center><button class="btn btn-danger" onclick="mcqupload();">Upload +</button></center>
    </div>
  </div>
</formx>
</div><!-- mcq -->
<div class="col-xs-12 codeformdiv" id="subjective1"><!--subjective-->
<formx class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label no">Problem Statement :</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="qus_sub" rows="4" cols="57" required></textarea>
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-2 control-label no">Marks: </label>
    <div class="col-sm-10">
      <input type="number"  class="form-control" name="marks" id="marks_sub">    
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-4 col-sm-push-4">
      <center><button class="btn btn-danger" onclick="subjectiveupload();">Upload +</button></center>
    </div>
  </div>
</formx>
</div><!-- subjective -->
                </div><!-- right container-->


          </div><!-- right panel-->


        </div><!-- mainrow-->

    </div><!-- container -->

</body>
   <script src="bootstrap/js/bootstrap.min.js"></script>
  
  
</html>