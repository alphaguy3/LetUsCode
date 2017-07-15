<?php
session_start();
require_once('function.php');
$problem_id = $_POST['problemid'];
$con = con();
$sql = "select * from problem where id='$problem_id'";
$res = $con->query($sql);
$ans = array();
while($arr = $res->fetch_array())
{
	$ans[0]['name'] = $arr['name'];
	$ans[0]['statement'] = $arr['statement'];
	$ans[0]['time_limit'] = $arr['time_limit'];
	$ans[0]['source_limit'] = $arr['source_limit'];
	$ans[0]['constraints'] = $arr['constraints'];
	$ans[0]['demo_input'] = $arr['demo_input'];
	$ans[0]['demo_output'] = $arr['demo_output'];
 }
$name=$ans[0]['name'];
$sql = "select * from images where problemname='$name'";
$res = $con->query($sql);
if(isset($res))
if($res->num_rows>0)
{
	$ans[0]['img'] = 1;
	while($arr=$res->fetch_array())
	{
		$x = $arr['image'];
		$ans[0]['img_url']="$x";
	}
}
 $ans = json_encode($ans);
 echo $ans;
?>