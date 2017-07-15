<?php
include('function.php');
$contest=$_POST['contest'];
$qus=$_POST['qus'];
$marks=$_POST['marks'];
$op1=$_POST['op1'];
$op2=$_POST['op2'];
$op3=$_POST['op3'];
$op4=$_POST['op4'];
$ans=$_POST['ans'];
$con=con();
$query="INSERT INTO `mcq`( `contest_id`, `qus`, `option1`, `option2`, `option3`, `option4`, `answer`, `marks`) VALUES ('$contest','$qus','$op1','$op2','$op3','$op4','$ans','$marks')";
$con->query($query);
echo "success";
?>