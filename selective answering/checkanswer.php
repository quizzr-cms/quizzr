<?php 
session_start();
if(!$_SESSION["selecvaliduser"])
	header("location:userlogin.php");
	require_once("../database.php");
	global $result;
	$name=$_SESSION["name"];
	$answers=array_values($_POST);
	$sql="SELECT max(no) as count FROM selecquestion WHERE 1";
	$ref=$result->query($sql);
	$row=mysqli_fetch_assoc($ref);
	$count=$row["count"];
	$sql="SELECT * FROM `selecquestion`";
	$ref=$result->query($sql);
	$i=0;
	$correct=0;
	$wrong=0;
	$cormark=1;  //marks for each right answer.chage value if u want
	$negmark=1; //negative mark for each wrong answer. change value if u want.
	while($row = mysqli_fetch_assoc($ref))
		
	{ 
		if($row["answer"]==$answers[$i])
		{
			$correct=($correct+1);
		}
		else if ($answers[$i]!="")
		{
			$wrong=($wrong+1);
		}
		$i++;
	}
	$attempted=0;
	$i=0;
	while($i<$count)
	{
		if($answers[$i]!="")
			$attempted++;
		$i++;
	}
	while($i<$count) {
		
	$sql="INSERT INTO `selecanslogs`(`uid`, `user`, `val`, `qno`) VALUES (".$_SESSION["uid"].",'".$name."','".$answers[$i]."',".($i+1).")";
	$ref=$result->query($sql);	
		$i++;
	}
	
	echo "<h2>RESULTS</h2><h3>Total no of questions : $count</h3><h3>Attempted questions : $attempted</h3><h3>No of correct answers : $correct</h3><h3>No of wrong answers : $wrong</h3>";
	$score=(($cormark*$correct)-($negmark*$wrong));
	echo "<h3>Score: ".$score."</h3>";
	if($_SESSION["logintype"]==0)
	$sql="UPDATE selecusers SET score=$score WHERE uid=$_SESSION[uid]";
    else
	$sql="UPDATE selecusers SET score=$score WHERE fbuid=$_SESSION[uid]";
	$ref=$result->query($sql);
	?>