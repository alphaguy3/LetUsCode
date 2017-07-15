<?php
require_once('function.php');
require_once('curl_class.php');
$user_id    = $_POST['userid'];
$contest_id = $_POST['contestid'];
$duration = $_POST['duration'];
$con = con();
$sql = "select * from time_updates where `userid` = '$user_id' and `contestid`= '$contest_id'";
$res = $con->query($sql);
while($arr = $res->fetch_array())
{
	$usedtime = $arr['used_time'];
}
$used_time = $usedtime+15;
$sql = "update `time_updates` set used_time = '$used_time' where userid='$user_id' ";
$res = $con->query($sql);
if($used_time>=$duration)
{
	$sql = "update `time_updates` set finished='1' where userid='$user_id' and contestid='$contest_id'";
	$res = $con->query($sql);
	echo "over";
}
else
echo $used_time;
?>