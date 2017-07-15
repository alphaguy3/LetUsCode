<?php
include('function.php');
$con=con();
if(isset($_FILES["file"]["type"]))
{
	$problem=$_GET['pid'];
	$contest=$_GET['contest'];
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 100000)
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("all_files/images/".$contest."_".$problem.".jpg")) {
echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$sourcePath = $_FILES['file']['tmp_name']; 
$targetPath = $contest."_".$problem.".jpg"; 
move_uploaded_file($sourcePath,$targetPath) ;
$query="INSERT INTO `images`(`problemname`, `image`) VALUES ('$problem','$targetPath')";
$con->query($query);
}
}
}
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}
?>