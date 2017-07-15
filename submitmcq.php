<?php
session_start();
$user_id=$_SESSION['id'];//****************************************************
include('function.php');
$contest_id=$_POST['contest'];
$ans=$_POST['ans'];
$i=$_POST['i'];
$query="SELECT * From `mcq` where contest_id='$contest_id'";
$con=con();
$res=$con->query($query);
$all_qus=Array();
while($arr=$res->fetch_array())
{
     array_push($all_qus,$arr['problem_id']);
}
$query="SELECT * from `mcq` where `problem_id`='$all_qus[$i]'";
 $res=$con->query($query);
 while($arr=$res->fetch_array())
{
     $check_ans=$arr['answer'];
     $marks=$arr['marks'];
}
if($ans==strtolower($check_ans))
{
     $query="SELECT `mcq` from contest".$contest_id." where `user`='$user_id'";
     $res=$con->query($query);
     while($arr=$res->fetch_array())
     {
        $marks+=$arr['mcq'];
     }
    $query="UPDATE contest".$contest_id." SET `mcq`='$marks' where `user`='$user_id'";
   $res=$con->query($query);
}
$i++;
$query="UPDATE `done_till` SET `page`='$i' WHERE `contest_id`='$contest_id'and `user_id`='$user_id' and `type`='mcq'";
$con->query($query);
$ans=array();
if($i==sizeof($all_qus))
{
	$ans[0]['last']=1;
	$ans[0]['i']=$i;
	$ans[0]['id']="";
	 $qus="";
     $op1="";
     $op2="";
     $op3="";
     $op4="";

}
else{
$query="SELECT * from `mcq` where `problem_id`='$all_qus[$i]'";
 $res=$con->query($query);
 while($arr=$res->fetch_array())
{
	$ans[0]['last']=0;
	$ans[0]['i']=$i;
	$ans[0]['id']=$all_qus[$i];
     $qus=$arr['qus'];
     $op1=$arr['option1'];
     $op2=$arr['option2'];
     $op3=$arr['option3'];
     $op4=$arr['option4'];
}
}
$ans[0]['qus']=$qus;
$ans[0]['op1']=$op1;
$ans[0]['op2']=$op2;
$ans[0]['op3']=$op3;
$ans[0]['op4']=$op4;
$ans=json_encode($ans);
echo $ans;

?>