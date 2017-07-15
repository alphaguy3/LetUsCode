<?php
function connection()
{
try
{
	$dbh = new PDO('mysql:host=localhost;dbname=letuscode',"root","12345",array(PDO::ATTR_PERSISTENT=>true));
	return $dbh;
}
catch(PDOexception $e)
{
     return null;
}
}
?>