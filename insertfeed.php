<?php
require_once('function.php');
echo $cid = $_POST['cid'];
  echo $feed = $_POST['feedback'];
  $con = con();
  $sql = "INSERT INTO feedback(`cid`,`text`) VALUES ('$cid','$feed')";
  $res = $con->query($sql);
  header('location:dashboard.php');

?>