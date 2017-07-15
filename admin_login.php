<?php
session_start();
require_once('function.php');
$username = validate($_POST['username']);
$password = validate($_POST['password']);
if($username=="admin@letuscode" && $password=="admin@letuscode")
{
	$_SESSION['admin'] = 1;
	header('location:admin.php');
}
else
{
	echo "<script>alert('Failed Login');window.location='adminlogin.php';</script>";
}
?>