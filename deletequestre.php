<?php 
require_once("database.php");
global $result;
$qn=$_POST['qn'];
$sql ="DELETE FROM `treasquestion` WHERE no=".$qn;
$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to delete";
		}
		$sql ="UPDATE `treasquestion` SET no=no-1 WHERE no >".$qn;
$ref = $result->query($sql);
if(!$ref)
		{
			echo "Failed to update";
		}
header("location:viewquestionstre.php?qn=$qn");
?>