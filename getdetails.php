<?php
 require_once('function.php');
 $problemid = $_POST['problemid'];
 $type = $_POST['type'];
 if($type=="coding")
 {
        $ans = array();
        $con = con();
        $sql = "select * from problem where id='$problemid'";
        $res = $con->query($sql);
        while($arr = $res->fetch_array())
        {
        	$ans['contestid'] = $arr['contest_id'];
        	$ans['name'] = $arr['name'];
        	$ans['description'] = $arr['statement'];
        	$ans['input'] = $arr['demo_input'];
        	$ans['output'] = $arr['demo_output'];
        	$ans['constraints'] = $arr['constraints'];
        	$ans['timelimit'] = $arr['time_limit'];
        	$ans['sourcelimit'] = $arr['source_limit'];
        }
 }
 else if($type=="mcq")
 {
        $ans = array();
        $con = con();  
        $query="select * from mcq where problem_id='$problemid'"; 
        $res=$con->query($query);
        while($arr=$res->fetch_array())
        {
           $ans['contestid']=$arr['contest_id'];
           $ans['qus_mcq']=$arr['qus'];
           $ans['op1']=$arr['option1'];
           $ans['op2']=$arr['option2'];
           $ans['op3']=$arr['option3'];
           $ans['op4']=$arr['option4'];
           $ans['ans']=$arr['answer'];
        } 
 }
 else if($type=="subjective")
 {
        $ans = array();
        $con = con();  
        $query="select * from subjective where problem_id='$problemid'"; 
        $res=$con->query($query);
        while($arr=$res->fetch_array())
        {
           $ans['contestid']=$arr['contest_id'];
           $ans['qus_sub']=$arr['qus'];
        } 
 }
 $ans = json_encode($ans);
 echo $ans;
?>