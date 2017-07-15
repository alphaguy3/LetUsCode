<?php
session_start();
require_once('function.php');
 require_once('curl_class.php');
 checkadmin();
//$userid = $_SESSION['id'];
$problemid = $_GET['pid'];
//$userid = $_SESSION['id'];
//$userid = 2;
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
       type        :    "coding"
   },
   function(data)
   {
      var ans = jQuery.parseJSON(data);
      contestid = ans['contestid'];
      document.getElementById('name').value = ans['name'];
      document.getElementById('description').value = ans['description'];
      document.getElementById('input').value = ans['input'];
      document.getElementById('output').value = ans['output'];
      document.getElementById('constraints').value = ans['constraints'];
      document.getElementById('timelimit').value = ans['timelimit'];
      document.getElementById('sourcelimit').value = ans['sourcelimit'];
   });
 });
     
     function update()
     {
      var problemid = '<?php echo $problemid;?>';
      var type="coding";
    // var name = document.getElementById('name').value ;
     var description = document.getElementById('description').value ;
     var input = document.getElementById('input').value  ;
     var output =  document.getElementById('output').value ;
      var constraints = document.getElementById('constraints').value ;  
      var timelimit = document.getElementById('timelimit').value ;
      var sourcelimit = document.getElementById('sourcelimit').value ;
      $.post('updatedetails.php',
      {
            problemid  :  problemid ,
            type:type,
           // name:name,
            description :description,
            input:input,
            output:output,
            constraints:constraints,
            timelimit:timelimit,
            sourcelimit:sourcelimit
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
                  
                    <div class="col-xs-12 codeformdiv" id="coding1">
                          
                    <formx class="form-horizontal">

                      <div class="col-xs-6" id="form"> 
                        <div class="form-group">
                        <label class="col-sm-2 control-label no">Problem Name:</label>
                        <div class="col-sm-10" >
                          <input type="text" class="form-control" id="name" required>
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
                          <textarea class="form-control"  rows="2" cols="57" id="input" required></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label no" >Demo Output: </label>
                        <div class="col-sm-10">
                          <textarea class="form-control"  rows="2"  id="output" cols="57" required></textarea>
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
                      <button onclick="update();">Update</button>

                      <!--<div class="form-group">
                        <label class="col-sm-2 control-label no">Language:</label>
                        <div class="col-sm-4" >
                          <select id="lang">
                          <option value="C">C</option>
                          <option value="CPP">Cpp</option>
                          <option value="JAVA">Java</option>
                          <option value="PYTHON">Python</option>
                          </select>
                        </div>
                      </div>


                       <div class="form-group">
                        <label class="col-sm-2 control-label no">Source File:</label>
                        <div class="col-sm-6" id="source_file">
                          <input type="file" class="" id="sourcefile" required>
                        </div>
                        <div class="col-sm-4" >
                          <button id="uploadsource" class="btn btn-danger" onclick="upload_source();">Upload +</button>
                        </div>
                      </div> -->

                      </div>

                     <!-- <div class="col-xs-6">
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