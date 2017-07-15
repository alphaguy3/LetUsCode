<?php
	require_once('function.php');
	$con=con();
	$ans="";
	$cid = $_POST['cid'];
	$pid = $_POST['pid'];
    $sql = "SELECT * FROM `comments` WHERE contestid='$cid' and pid='$pid'";
	$res=$con->query($sql);
	while($arr=$res->fetch_array()){

		$text = $arr['text'];
		$uid = $arr['userid'];
		$sql2 = "SELECT * FROM `user` WHERE id='$uid'";
		$res2=$con->query($sql2);
		$arr2=$res2->fetch_array();
		$name = $arr2['name'];

		$ans=$ans. '
		<div class="col-sm-10 col-sm-push-0 indcomment">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>'.$name.'</strong>
                </div>
                <div class="panel-body">'
                  .$text.
                '</div>
            </div>
          </div>
          ';
	}
	echo $ans;
?>