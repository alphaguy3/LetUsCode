<?php
require_once('function.php');
require_once('curl_class.php');
/*$contestid=1 ; $problemname=88 ; $description =1 ;$timelimit =1 ;$sourcelimit =1;$constraints =1; $demoinput =1; $demooutput =1 ;$sourcecode =1; $filename=1;
echo $query ="INSERT INTO `problem`(`contest_id`, `name`, `statement`, `time_limit`, `source_limit`, `constraints`, `demo_input`, `demo_output`,`source_file`) VALUES ('$contestid'  ,'$problemname','$description' ,'$timelimit' ,'$sourcelimit' ,'$constraints','$demoinput'  ,'$demooutput'   ,'$filename')";
    $con=con();
    $res=$con->query($query);*/
    $contestid = 8 ;
    $con=con();
    $problemname="898888";
    /*$query="SELECT id FROM `problem` where `name`='$problemname' ";
		$res=$con->query($query);
		while($arr=$res->fetch_array())
		{
			echo $id=$arr['id'];
		}
		$tempsubtaskfilename="a";$id=1;
		$query="INSERT INTO `test_cases`(`problem_id`, `input`) VALUES ('$id','$tempsubtaskfilename')";*/
		echo $query="ALTER TABLE `$contestid` ADD  `$problemname` VARCHAR(30) NOT NULL DEFAULT '0'";
		$res=$con->query($query);
    ?>