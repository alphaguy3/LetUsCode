<?php
require_once('function.php');
require_once('curl_class.php');
$contestid   = $_POST['contestid'];
$problemname = $_POST['name'];
$description = $_POST['description'];
$constraints = $_POST['constraints'];
$timelimit   = $_POST['timelimit'];
$sourcelimit = $_POST['sourcelimit'];
$demoinput   = $_POST['demoinput'];
$demooutput  = $_POST['demooutput'];
$sourcecode  = $_POST['sourcecode'];
$lang        = 'C';

$client_secret = '9e15b3aab53618fcf501e27ec472d661981c1dda';
$lang ='C';
$compile_url = "https://api.hackerearth.com/v3/code/compile/";
$run_url = "https://api.hackerearth.com/v3/code/run/";

$filename = $contestid."_".$problemname.".txt";
$templocation = "all_files/temp/".$filename;
$temp_file = fopen($templocation,"w");
fwrite($temp_file,$sourcecode);
//fclose($temp_file);
$curl = new curl();
$res=$curl->get_compile($client_secret,$compile_url,$templocation,$timelimit,$sourcelimit,"",$lang);
if($res["compile_status"]=="OK")
{
	$filename = $contestid."_".$problemname.".txt";
	$filelocation = "all_files/sourcefiles/".$filename;
    $file = fopen($filelocation,"w");
    fwrite($file,$sourcecode);
    fclose($file);
    echo "success";
   $query ="INSERT INTO `problem` (`contest_id`, `name`, `statement`, `time_limit`, `source_limit`, `constraints`, `demo_input`, `demo_output`,`source_file`) VALUES ('$contestid'  ,'$problemname','$description' ,'$timelimit' ,'$sourcelimit' ,'$constraints','$demoinput'  ,'$demooutput'   ,'$filename')";
    $con=con();
    $res=$con->query($query);
	
}
else
{
     fwrite($temp_file,$sourcecode."cd");
	echo "compilationerror";
}
?>