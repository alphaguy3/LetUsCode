<?php
session_start();
require_once('function.php');
require_once('curl_class.php');
$contestid  = $_GET['cid'];
//$userid     = $_SESSION['id'];
$userid = 1;
$con = con();
$sql  = "select * from time_updates where userid='$userid' and contestid='$contestid'";
$res = $con->query($sql);
if($res->num_rows > 0)
{
    header('location:contest.php?cid='.$contestid);
    die();
}
?>
<html>
<script src="jquery-3.1.0.js"></script>
<script>
var userid = '<?php echo $userid ;?>' ;
var contestid = '<?php echo $contestid; ?>' ;
function register()
{
    var password = document.getElementById('password').value;
    $.post("registerfortest.php",
    {
         userid 	:    userid,
         contestid	:    contestid,
         password   :    password
    },
    function(data)
    {
        if(data=="success")
        {
        	alert('You are registered for the test');
        	location.href = "contest.php?cid="+contestid;
        }
        else
        {
            alert('Incorrect Password');
            location.reload();
        }
    });
}
</script>
Password::
<input type="text" id="password">
<button onclick="register();">Register</button>
</input>
</html>