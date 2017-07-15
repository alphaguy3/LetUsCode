<?php
require_once('function.php');
$con = con();
$description = "s";
$constraints = "s";
$timelimit   = "s";
$sourcelimit = "s";
$demoinput   = "s";
$demooutput  = "s";
echo $sql = "UPDATE problem set `statement` = '$description', `constraints` = '$constraints', `time_limit` = '$timelimit', `source_limit`= '$sourcelimit', `demo_output` = '$demooutput', `demo_input` = '$demoinput' WHERE name='$problemname'";
echo $con->query($sql);
?>