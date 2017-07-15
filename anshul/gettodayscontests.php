<?php
require_once('function.php');
require_once('curl_class.php');
$con = con();
$date = date("Y-m-d");
$ans = array();
$sql = "select * from contest  where owner='$userid' and date='$date' and start='0' and finish='0' ";
$res= $con->query($sql);
$i = 0;
while($arr = $res->fetch_array())
{
  $ans[$i]['id']	 		= $arr['id'];
  $ans[$i]['name'] 			= $arr['name'];
  $ans[$i]['description']   = $arr['desp'];
  $ans[$i]['date']			= $arr['date'];
}
$ans = json_encode($ans);
echo $ans;
?>