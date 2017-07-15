<?php
  session_start();
  require_once('function.php');
  require_once('curl_class.php');
  $con = con();
  $problem_id = $_POST['problem_id'];
  $userid = $_POST['user_id'];
  $lang = $_POST['lang'];
  $filelocation = "all_files/autosavedfiles/".$userid."_".$problem_id."_".$lang.".txt";
  $code="";
  $arr = array();
  if(file_exists($filelocation))
  {
    $code = fopen($filelocation, "r");
    $code = fread($code,filesize($filelocation));
    $arr[0]['code'] = $code;
    $arr = json_encode($arr);
    echo $arr;
  }
  else
  {
     $arr[0]['code'] = "NA";
     $arr = json_encode($arr);
     echo $arr;
  }
?>