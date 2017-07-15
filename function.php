<?php
function validate($val){
$val=htmlentities($val);
$val=trim($val);
$val=mysql_real_escape_string($val);
return $val;
}
function con(){
$dbhost="localhost";
$dbuname="root";
$dbpassword="12345";
$dbname="letuscode";
$con=new MySQLi($dbhost,$dbuname,$dbpassword,$dbname);//part of object oriented programming(mysqli=class)
if($con->connect_errno){
die("Not able to connect to database".$con->connect_error);
}
else 
{
return $con;
}
}
function hash_md5($val)
{
  $val=md5($val);
  return $val;
}
function apikey()
{
	$key='9e15b3aab53618fcf501e27ec472d661981c1dda';
	return $key;
}

function checkuser()
{
	if(!isset($_SESSION['id']))
	{
		echo "<script>alert('Please Login To continue');location.href='index.php';</script>";
		die();
	}
}

function checkadmin()
{
	if(!isset($_SESSION['admin']))
	{
		echo "<script>alert('Authentication Failure');location.href='index.php';</script>";
		die();
	}
}

function getusername($id)
{
	$query="SELECT * from user where `id`='$id'";
	$con=con();
	$res=$con->query($query);
	$user=$res->fetch_array();
	return $user['username'];
}

function getemail($id)
{
	$query="SELECT * from user where `id`='$id'";
	$con=con();
	$res=$con->query($query);
	$user=$res->fetch_array();
	return $user['email'];
}
?>