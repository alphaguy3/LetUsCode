<?php
  require_once('function.php');
  require_once('curl_class.php');
  session_start();
  $name = validate($_POST['name']);
  $username = validate($_POST['username']);
  $password = validate($_POST['password']);
  $conf_password = validate($_POST['conf_password']);
  $email = validate($_POST['email']);
  $contact = validate($_POST['contact']);
  $institute = validate($_POST['institute']);
  if(!isset($name) || !isset($username) || !isset($password) || !isset($conf_password) || !isset($email) || !isset($contact) || !isset($institute))
  {
  	echo "<script>alert('Please Fill All The Details');window.location=\"index.php\";</script>";
  	die();
  }
  else if($password != $conf_password)
  {
  	echo "<script>alert('Password And Confirm Password Should Match');window.location=\"index.php\";</script>";
    die();
  }
  else
  {
  	  $con = con(); 
      $username_query = "select * from user where username='$username' ";
      $res = $con->query($username_query);
      if($res->num_rows>0)
      {
      	echo "<script>alert('Username Already Exists');window.location=\"index.php\";</script>";
      	die();
      }
      $emailidquery = "select * from user where email='$email'" ;
      $res = $con->query($emailidquery);
      if($res->num_rows>0)
      {
      	echo "<script>alert('Email Id Already Exists');window.location=\"index.php\";</script>";
      	die();
      }
      $password=hash_md5($password);
      $insertquery = "insert into user (name,username,email,contact,password,hash,verified,institute) values ('$name','$username','$email','$contact','$password','123','1','$institute')" ;
      $res = $con->query($insertquery);
      $query="SELECT `id` from `user` where `email`='$email'";
      $res=$con->query($query);
      while($arr=$res->fetch_array())
      {
          $id=$arr['id'];
      }
      $_SESSION['id']=$id;
      header('location:dashboard.php');
  }
?>