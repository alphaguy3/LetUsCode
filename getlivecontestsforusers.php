<?php
require_once('function.php');
require_once('curl_class.php');
$ans = array();
$con = con();
$currtime = date("h:i:a");
$date = date("Y-m-d");
$sql = "select * from contest where start='1' and finish='0'";
$res = $con->query($sql);
$i = 0 ;
while($arr=$res->fetch_array())
{
   $ans[$i]['id']            = $arr['id'];
   $ans[$i]['name']          = $arr['name'];
   $ans[$i]['description']   = $arr['desp'];
   $ans[$i]['started']       = $arr['start'];
   $ans[$i]['finished']      = $arr['finish'];
   $ans[$i]['time']          = $currtime;
   $i++;
}
$ans = json_encode($ans);
echo $ans ;
?>