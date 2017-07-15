<?php
include('function.php');
session_start();
$contest_name=validate($_POST['contestname']);
$setter_name=validate($_POST['settername']);
$tester_name=validate($_POST['testername']);
$desp=validate($_POST['description']);
$date=validate($_POST['date']);
$start=validate($_POST['starttime']);
$end=validate($_POST['endtime']);
//$ownerid=$_SESSION['id']; 
$ownerid=12;                                            
$query="INSERT INTO `contest`( `name`, `owner`, `setter`, `tester`, `date`, `starttime`, `duration`,`desp`,`start`,`finish`) VALUES ('$contest_name','$ownerid','$setter_name','$tester_name','$date','$start','100','$desp','0','0')";
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
`error` VARCHAR(30) DEFAULT '0')";
$con->query($query); 
$_SESSION['contest_id']=$contest_id;
header('location:add_problems.php')
?>