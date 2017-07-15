<?php
include('curl_class.php');
$curl=new curl();
$rescurl=$curl->get("http://172.31.84.112/z");
$arr= json_decode($rescurl,true);
var_dump($arr);
?>