<?php
require_once('function.php');
require_once('curl_class.php');
$connection = con();
$contestid   = $_POST['contestid'];
$problemname = $_POST['problemname'];
$subtaskno = $_POST['subtaskno'];
$subtaskinput  = $_POST['subtask'];
$sourcelimit = $_POST['sourcelimit'];
$marks=$_POST['marks'];
$lang        = $_POST['lang'];

$client_secret = apikey();
$compile_url = "https://api.hackerearth.com/v3/code/compile/";
$run_url = "https://api.hackerearth.com/v3/code/run/";


$sourcefilelocation = "all_files/sourcefiles/".$contestid."_".$problemname.".txt";
$tempsubtaskfilename = $contestid."_".$problemname."_".$subtaskno.".txt";
	$tempsubtaskfilelocation = "all_files/temp_sub/".$tempsubtaskfilename;
	$file = fopen($tempsubtaskfilelocation,"w");
   fwrite($file,$subtaskinput);


$curl = new curl();
$res=$curl->get_run($client_secret,$run_url,$sourcefilelocation,"1",intval($sourcelimit),$tempsubtaskfilelocation,$lang);
//var_dump($res);
if($res['run_status']['status']=="AC")
{
	$subtaskfilename = $contestid."_".$problemname."_".$subtaskno.".txt";
	$subtaskfilelocation = "all_files/input/".$subtaskfilename;
	$file = fopen($subtaskfilelocation,"w");
	if(fwrite($file,$subtaskinput))
	{
		$outputresponse=$res['run_status']['output'];
		$outputfilepath="all_files/output/".$contestid."_".$problemname."_".$subtaskno.".txt"; 
        $outputfile=$contestid."_".$problemname."_".$subtaskno.".txt";
        $fileout=fopen($outputfilepath,"w");
        fwrite($fileout,$outputresponse);
		$con=con();
		$query="SELECT id FROM `problem` where `name`='$problemname' ";
		$res=$con->query($query);
		while($arr=$res->fetch_array())
		{
			$id=$arr['id'];
		}
		$query="INSERT INTO `test_cases`(`problem_id`, `input`,`marks`) VALUES ('$id','$tempsubtaskfilename','$marks')";
		$res=$con->query($query);
		echo "success";
	}
    else
    {
    	echo "error";
    }
}
else
{
	echo "error";
}
?>