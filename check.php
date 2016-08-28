<?php
session_start();
require_once("database.php");
$answers=array_values($_POST);
print_r($_POST);

$qn=$_SESSION[no];
$i=1;

	$sql="INSERT INTO `logs`(`qno`, `val`) VALUES ('".$qn."','".$_POST[opt1]."')";
	$ref=$result->query($sql);
	$sql="INSERT INTO `logs`(`qno`, `val`) VALUES ('".$qn."','".$_POST[opt2]."')";
	$ref=$result->query($sql);
	$sql="INSERT INTO `logs`(`qno`, `val`) VALUES ('".$qn."','".$_POST[opt3]."')";
	$ref=$result->query($sql);
	$sql="INSERT INTO `logs`(`qno`, `val`) VALUES ('".$qn."','".$_POST[opt4]."')";
	$ref=$result->query($sql);
	if($_SESSION[no]+1==4)
$_SESSION[no]=1;
else
	$_SESSION[no]++;
echo '<a href="exam.php">next question</a>';

?>