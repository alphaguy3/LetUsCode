<?php
session_start();
require_once('function.php');
$con = con();
$problemname = $_POST['name'];
$description = $_POST['description'];
$constraints = $_POST['constraints'];
$timelimit   = $_POST['timelimit'];
$sourcelimit = $_POST['sourcelimit'];
$demoinput   = $_POST['demoinput'];
$demooutput  = $_POST['demooutput'];
$sql = "UPDATE problem set `statement` = '$description', `constraints` = '$constraints', `time_limit` = '$timelimit', `source_limit`= '$sourcelimit', `demo_output` = '$demooutput', `demo_input` = '$demoinput' WHERE name='$problemname'";
if($con->query($sql))
{
	echo "success" ;
}
else
{
	echo "failure";
}
?>