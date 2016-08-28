<?php
session_start();
if(!$_SESSION["surveyvaliduser"])
	header("location:userlogin.php");
	require_once("../database.php");
	global $result;
	$name=$_SESSION["name"];
	$answers=array_values($_POST);
	$i=0;
	$sql="SELECT max(no)as count FROM surveyquestion WHERE 1";
	$ref=$result->query($sql);
	$row=mysqli_fetch_assoc($ref);
	$count=$row[count];
	$sql="DELETE FROM `surveyanslogs` WHERE uid=".$_SESSION["uid"];
	$ref=$result->query($sql);
	while($i<$count) {

	$sql="INSERT INTO `surveyanslogs`(`uid`, `user`, `val`, `qno`) VALUES ('".$_SESSION["uid"]."','".$name."','".$answers[$i]."','".($i+1)."')";
	$ref=$result->query($sql);
		$i++;

	}
	$sql="SELECT * FROM surveyanslogs WHERE uid=".$_SESSION['uid'];
	$ref=$result->query($sql);

	echo "<h2>Your Responses Are ...</h2>";
	while($row=mysqli_fetch_assoc($ref))
	{
		echo "Qn $row[qno]. $row[val] ";

	}
	?>
