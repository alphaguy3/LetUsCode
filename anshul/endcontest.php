<?php
require_once('function.php');
require_once('curl_class.php');
$con = con();
$contestid = $_POST['contestid'];
$sql = "update contest set finish = '1' where id = '$contestid'";
$res = $con->query($sql);
echo "success";
?>