<?php
include('function.php');
$username=validate($_POST['username']);
$password=validate($_POST['password']);
if(!isset($username) || !isset($password))
  {
  	echo "<script>alert('Please Fill All The Details');window.location=\"login.html\";</script>";
  	die();
  }
$query="select * from user where username='$username'";
$con=con();
$res=$con->query($query);
if($res->num_rows==0)
{
	echo "<script>alert('No such user exists'); window.location.href='login.html';</script>  ";
	

	}
	else
	{
		while($arr=$res->fetch_array())

		 {
			 if($arr['password']==md5($password))
			 {
				 echo "You are successfully logged in";
				 session_start();
				 $_SESSION['id']=$arr['id'];
				 echo  $_SESSION['id'];
				 //header('location:dashboard.php');
				 }
				 else
				 {
				 	echo "<script>alert('Wrong password'); window.location.href='login.html';</script>  ";
				 }
			}
	}
?>