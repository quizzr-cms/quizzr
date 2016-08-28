<?php 
require_once("database.php");
global $result;
$qn=$_POST['qn'];
$sql ="DELETE FROM `surveyquestion` WHERE no=".$qn;
$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to delete";
		}
		$sql ="UPDATE `surveysquestion` SET no=no-1 WHERE no >".$qn;
$ref = $result->query($sql);
if(!$ref)
		{
			echo "Failed to update";
		}
header("location:viewquestionssur.php?qn=$qn");
?>