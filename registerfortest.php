<?php
session_start();
require_once('function.php');
require_once('curl_class.php');
$userid = $_POST['userid'];
$contestid = $_POST['contestid'];
$password = $_POST['password'];
$con = con();
$sql = "select * from contest where id='$contestid'";
$res = $con->query($sql);
while($arr = $res->fetch_array())
{
	$cpassword = $arr['password'];
} 
if($cpassword==$password)
{
	$regsql = "insert into time_updates (`userid`,`contestid`,`used_time`,`finished`) values ('$userid','$contestid','0','0')";
	$res = $con->query($regsql);
	$rgsql2 = "insert into `contest".$contestid."` (`user`,`error`,`mcq`,`subjective`) values ('$userid','0','0','0')" ;
	$res = $con->query($rgsql2);
	$regsql3 = "insert into `done_till` (contest_id,user_id,type,page) values ('$contestid','$userid','mcq','0')";
	$res = $con->query($regsql3);
	$regsql4 = "insert into `done_till` (contest_id,user_id,type,page) values ('$contestid','$userid','sub','0')";
	$res = $con->query($regsql4);
	echo "success" ;
}
?>