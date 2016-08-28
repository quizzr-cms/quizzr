<?php
require_once("database.php");
global $result;
		$qtype = $_POST['qtype'];
		$atype = $_POST['atype'];
		$contents = $_POST['contents'];
		$answer = $_POST['answer'];
		$qn=$_POST['qn'];

// real escape string is not used here.So a little insecure.
         $contents = addcslashes($contents,"'");
			echo $contents;
		$sql ="UPDATE selecquestion SET contents='".$contents."',answer='".$answer."' WHERE no=".$qn;
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		$sql="SELECT * from `selecquestion` WHERE no=".$qn;
		$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
		$qnc=$row[contents];
		echo $qnc;

	header("location:viewquestionssel.php?qn=$qn");
	?>
