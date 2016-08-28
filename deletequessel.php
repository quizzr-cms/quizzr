<?php 
require_once("database.php");
global $result;
$qn=$_POST['qn'];
$sql ="DELETE FROM `selecquestion` WHERE no=".$qn;
$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to delete";
		}
		$sql ="UPDATE `selecquestion` SET no=no-1 WHERE no >".$qn;
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		$sql="SELECT * FROM selecquestion WHERE no >=".$qn;
		$ref = $result->query($sql);
		
		while($row=mysqli_fetch_assoc($ref))
		 { $find="answer".($row["no"]+1);
		   $replace="answer".$row["no"];
		   $content=$row["contents"];
		   $content=str_replace($find,$replace,$content);
			$sql="UPDATE selecquestion SET contents='".$content."' WHERE no =".$row["no"];
		    $ref1 = $result->query($sql);
			if(!$ref1)
		{
			echo "Failed to update";
		}

		 }
		
header("location:viewquestionssel.php?qn=$qn");
?>