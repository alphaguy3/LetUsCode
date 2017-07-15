<?php
//Import the SDK 
require_once ('./curl_class.php');
include('function.php');
//Setting up the Hackerearth API
$client_secret = apikey();
$hackerearth = Array(
		'client_secret' => apikey(), //(REQUIRED) Obtain this by registering your app at http://www.hackerearth.com/api/register/
        'time_limit' => '5',   //(OPTIONAL) Time Limit (MAX = 5 seconds )
        'memory_limit' => '262144'  //(OPTIONAL) Memory Limit (MAX = 262144 [256 MB])
	);


$time = '5';
$memory = '262144' ;
$source = "test.c";
$input = "1.txt";
$lang ='C';
$compile = "https://api.hackerearth.com/v3/code/compile/";
$run = "https://api.hackerearth.com/v3/code/run/";

$curl = new curl();
$res=$curl->get_run($client_secret,$run,$source,$time,$memory,$input,$lang);
var_dump($res);
echo "<br>";

foreach($res['run_status'] as $k=>$v)
		echo $k."--".$v."<br>";
	echo "\n";
$ou=$res['run_status']['output'];
$fil_ou=file_get_contents('out.txt');
var_dump($fil_ou);
var_dump($ou);	
echo $fil_ou."---".$ou."---";
if($ou==$fil_ou)
	echo "yes";
else
	echo "no";
//Printing the response
//echo $response ;
?>