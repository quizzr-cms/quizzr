<?php 
require_once("database.php");
global $result;
		$qtype = $_POST['qtype'];
		$atype = $_POST['atype'];
		$contents = $_POST['contents'];
		$answer = $_POST['answer'];
		$qn=$_POST['qn'];
		

         $contents = addcslashes($contents,"'");
			echo $contents;
		$sql ="UPDATE treasquestion SET contents='".$contents."',answer='".$answer."' WHERE no=".$qn;
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		$sql="SELECT * from `treasquestion` WHERE no=".$qn;
		$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
		$qnc=$row[contents];
		echo $qnc;
		
	header("location:viewquestionstre.php?qn=$qn");
	?>
