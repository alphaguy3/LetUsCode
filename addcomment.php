<?php
    session_start();
	require_once('function.php');
	checkuser();
	$cid = $_POST['cid'];
	$uid = $_POST['uid'];
	$text = $_POST['text'];
	$pid = $_POST['pid'];
	$con=con();
    $sql = "INSERT INTO `comments`(`contestid`,`userid`,`text`,`pid`) VALUES ('$cid','$uid','$text','$pid')";
	if($res=$con->query($sql))
		echo 'success';
	else
		echo 'failure';
	
?>