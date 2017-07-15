<html>
<head>
<?php
session_start();
require_once('function.php');
require_once('curl_class.php');
checkuser();
$contestid  = $_GET['cid'];
$userid     = $_SESSION['id'];
//echo "<script>alert('hi');</script>";
//echo "<script>alert(".$contestid.");</script>";
$con = con();
$sql  = "select * from time_updates where userid='$userid' and contestid='$contestid'";
$res = $con->query($sql);
if($res->num_rows > 0)
{
    //echo "<script>location.href = \"mcq.php?cid=\"+".$contestid.";</script>";
    header('location:instruction.php?cid='.$contestid);
    die();
}
?>
</head>
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
        	location.href = "instruction.php?cid="+contestid;
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
<input type="password" id="password">   
<button onclick="register();">Register</button>
</input>
</html>