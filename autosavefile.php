<?php
  session_start();
  require_once('curl_class.php');
  require_once('function.php');
  checkuser();
  $userid = $_POST['userid'];
  $problemid = $_POST['problemid'];
  $code = $_POST['code_save'];
  $lang = $_POST['lang'];
  $filelocation = "all_files/autosavedfiles/".$userid."_".$problemid."_".$lang.".txt";
  $file = fopen($filelocation,"w");
  if(fwrite($file,$code))
  {
  	echo "success";
  }
  else
  {
  	echo "failure";
  }
?>