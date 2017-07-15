<?php
  require_once('curl_class.php');
  require_once('function.php');
  $client_secret = apikey();
  $compile_url = "https://api.hackerearth.com/v3/code/compile/";
  $run_url = "https://api.hackerearth.com/v3/code/run/";
  $userid = $_POST['userid'];
  $problemid = $_POST['problemid'];
  $code = $_POST['code'];
  $lang = $_POST['lang'];
  $time = $_POST['time_limit'];
  $memory = $_POST['source_limit'];
  $input = $_POST['input'];
  $time = '5';
  $memory = '262144' ;


  $marks=0;
  $ans="";
  $tempsubtaskfilename = $userid."_".$problemid.".txt";
  $source = "all_files/temp_sub/".$tempsubtaskfilename;
  $file = fopen($source,"w");
  fwrite($file,$code);
  $tempsubtaskfilename = $userid."_".$problemid.".txt";
  $input_file = "all_files/temp_inp/".$tempsubtaskfilename;
  $file1 = fopen($input_file,"w");
  fwrite($file1,$input);
	$curl = new curl();
    $res=$curl->get_run($client_secret,$run_url,$source,$time,$memory,$input_file,$lang);
    if($res['run_status']['status']!="AC")
    	$ans=$ans.$res['run_status']['status']."<br>";
    if($res['run_status']['status']=="AC" )
    {
    	$ans=$ans.$res['run_status']['output']."<br>";
    }
  echo $ans;
?>