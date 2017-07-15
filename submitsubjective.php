<?php
session_start();
$user_id=$_SESSION['id'];
include('function.php');
$contest_id=$_POST['contest'];
$ans=$_POST['ans'];
$i=$_POST['i'];
$query="SELECT * From `subjective` where contest_id='$contest_id'";
$con=con();
$res=$con->query($query);
$all_qus=Array();
while($arr=$res->fetch_array())
{
     array_push($all_qus,$arr['problem_id']);
}
$query="INSERT INTO `subjective_ans`(`user_id`, `problem_id`, `ans`) VALUES ('$user_id','$all_qus[$i]','$ans')";
$res=$con->query($query);
$i++;
$query="UPDATE `done_till` SET `page`='$i' WHERE `contest_id`='$contest_id'and `user_id`='$user_id' and `type`='sub'";
$con->query($query);
$ans=array();
if($i==sizeof($all_qus))
{
	$ans[0]['last']=1;
	$ans[0]['i']=$i;
	$ans[0]['id']="";
    $qus="";
}
else{
$query="SELECT * from `subjective` where `problem_id`='$all_qus[$i]'";
 $res=$con->query($query);
 while($arr=$res->fetch_array())
{
	$ans[0]['last']=0;
	$ans[0]['i']=$i;
	$ans[0]['id']=$all_qus[$i];
    $qus=$arr['qus'];
}
}
$ans[0]['qus']=$qus;
$ans=json_encode($ans);
echo $ans;
?>