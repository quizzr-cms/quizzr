<?php 
session_start();
if(!$_SESSION["trevaliduser"])
	header("location:userlogin.php");
	require_once("../database.php");
	global $result;
	$level = $_SESSION["level"];
	$answer = $_POST["answer"];
	$name=$_SESSION["name"];
	
	$sql = "INSERT INTO treasanslogs (uid,user,val,level) VALUES (".$_SESSION["uid"].",'" .$name. "','" . mysqli_real_escape_string($result,$answer) . "','". $level . "')";

	$ref = $result->query($sql);

	$sql = "SELECT * FROM treasquestion WHERE no = '" .$level . "'" ;
	$ref = $result->query($sql);
	$row = mysqli_fetch_assoc($ref);
	$ans = $row['answer'];
	

	 if($answer == $row['answer'])
	{
		$level++;
		$_SESSION["level"] = $level;
		if ($level==25)  //replace 25 with total number of questions +1.
		  //Specify what to do when one passes the last question.
      echo "Winner";		  
		else
			//upload images to imgs/correct folder. Which will shown in ersponse to correct answer.
			//Names of the images should be 'cr<a number>.jpg' You can update the parameters to rand function
			//depending on your range of numbers used.Here we use cr1.jpg to cr7.jpg
			//same with wrong images below
		$content = "<img src=\"imgs/correct/cr".rand(1,7).".jpg\"><p class=\"classnamehere\">RIGHT ANSWER<br> <a href = \"index.php\">Next Level</a></p>";
	if($_SESSION["logintype"]==0)
		$sql = "UPDATE treasusers SET level = '" . $level . "' WHERE uid = '" . $_SESSION["uid"] ."'"; 
		else
		$sql = "UPDATE treasusers SET level = '" . $level . "' WHERE fbuid = '" . $_SESSION["uid"] ."'"; 	
		$ref = $result->query($sql);

		
	}
	else
		{
		
		$content = "<img class=\"classnamehere\" src=\"imgs/wrong/wr".rand(1,6).".jpg\"><p class=\"classnamehere\">Wrong answer<br> <a href = \"index.php\">Try again</a></p>";
		

		}
	print $content;
	
?>