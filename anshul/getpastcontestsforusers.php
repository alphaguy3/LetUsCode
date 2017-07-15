<?php
require_once('function.php');
require_once('curl_class.php');
$con = con();
$date = date("Y-m-d");
$ans = array();
$sql = "select * from contest where  date<='$date' and start='1' and finish='1' ";
$res= $con->query($sql);
$i = 0;
while($arr = $res->fetch_array())
{
  $ans[$i]['name'] 			= $arr['name'];
  $ans[$i]['description']   = $arr['desp'];
  $ans[$i]['date']			= $arr['date'];
  $ans[$i]['started']		= $arr['start'];
  $ans[$i]['finished']		= $arr['finish'];
}
$ans = json_encode($ans);
echo $ans;
?>