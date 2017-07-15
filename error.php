<?php
include('function.php');
$error=$_POST['error'];
$userid=$_POST['userid'];
$contest=$_POST['contest'];
$table="contest".$contest;
$query="SELECT `error` from `$table` where `user`='$userid'";
$con=con();
$res=$con->query($query);
while($arr=$res->fetch_array())
{
	$cur=$arr['error'];
}
$error+=$cur;
$query="update `$table` set `error`='$error' where `user`='$userid'";
$res=$con->query($query);
echo $error;
?>