<?php
require_once('function.php');
$userid = $_POST['userid'];
$contestid = $_POST['contestid'];
$con = con();
$sql = "update time_updates set finished='1' where userid='$userid' and contestid='$contestid'";
$res= $con->query($sql);
echo "success";
?>