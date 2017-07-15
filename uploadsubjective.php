<?php
include('function.php');
$contest=$_POST['contest'];
$qus=$_POST['qus'];
$marks=$_POST['marks'];
$con=con();
$query="INSERT INTO `subjective`( `contest_id`, `qus`, `marks`) VALUES ('$contest','$qus','$marks')";
$res=$con->query($query);
echo "success";
?>