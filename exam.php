<?php 
session_start();

if(!isset($_SESSION[no]))
{
	$_SESSION[no]=1;
}
if ($_SESSION[no]>4)
{
	$_SESSION[no]=1;
}
require_once("database.php");
$sql="select contents from examq where no=$_SESSION[no]";
$ref=$result->query($sql);
$row=mysqli_fetch_assoc($ref);
echo $row[contents];
?>