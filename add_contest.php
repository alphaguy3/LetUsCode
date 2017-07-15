<?php
require_once('function.php');
 require_once('curl_class.php');
session_start();
$contest_name=validate($_POST['contestname']);
$setter_name=validate($_POST['settername']);
$tester_name=validate($_POST['testername']);
$desp=validate($_POST['description']);
$date=validate($_POST['date']);
$start=validate($_POST['starttime']);
$dur_hrs=validate($_POST['dur_hrs']);
$dur_min=validate($_POST['dur_min']);
$dur = $dur_hrs*3600 + $dur_min*60;
$password = validate($_POST['password']);
//$ownerid=$_SESSION['id'];
checkadmin();
$ownerid=$_SESSION['id'];                                            
$query="INSERT INTO `contest`( `name`, `owner`, `setter`, `tester`, `date`, `starttime`, `duration`,`desp`,`start`,`finish`,`password`) VALUES ('$contest_name','$ownerid','$setter_name','$tester_name','$date','$start','$dur','$desp','0','0','$password')";
$con=con();
$con->query($query);

$query="SELECT `id` from `contest` where `name`='$contest_name'";
$res=$con->query($query);
while($arr=$res->fetch_array())
{
	$contest_id=$arr['id'];
}

$query="CREATE TABLE `contest".$contest_id."` (
`user` INT(11) UNSIGNED PRIMARY KEY, 
`error` VARCHAR(30) DEFAULT '0',
`mcq` VARCHAR(30) DEFAULT '0',
`subjective` VARCHAR(30) DEFAULT '0'
)";
$con->query($query); 
$_SESSION['contest_id']=$contest_id;
header('location:add_problems.php?cid='.$contest_id);
?>