<?php
require_once('function.php');
$id = $_POST['problemid'];
$type=$_POST['type'];
if($ype=="coding")
{
$input=validate($_POST['input']);
$output=validate($_POST['output']);
$description=validate($_POST['description']); 
$constraints=validate($_POST['constraints']);
$timelimit=validate($_POST['timelimit']);
$sourcelimit=validate($_POST['sourcelimit']);
$query="UPDATE `problem` SET `statement`='$description',`time_limit`='$timelimit',`source_limit`='$sourcelimit',`constraints`='$constraints',`demo_input`='$input',`demo_output`='$output' WHERE `id`='$id'";
}else if($type=="mcq")
{
	 $qus_mcq =validate( $_POST['qus_mcq']);
     $op1 = validate($_POST['op1']);
     $op2 =  validate($_POST['op2']);
     $op3 = validate($_POST['op3']);  
     $op4 = validate($_POST['op4']);
    // $ans = validate($_POST['ans']);
     $query="UPDATE `mcq` SET`qus`='$qus_mcq',`option1`='$op1',`option2`='$op2',`option3`='$op3',`option4`='$op4' WHERE `problem_id`='$id'";
}
else if($type=="subjective")
{
	$qus_sub =validate( $_POST['qus_sub']);
	$query="UPDATE `subjective` SET `qus`='$qus_sub' WHERE `problem_id`='$id'";
}
$con=con();
$con->query($query);
echo "success";
?>

