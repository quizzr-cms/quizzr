<?php
session_start();
require_once("../database.php");

global $result;
    if($_SESSION["logintype"]==0)
     $sql = "SELECT * FROM treasusers WHERE  uid= '" . $_SESSION["uid"]. "'";
     else
	$sql = "SELECT * FROM treasusers WHERE  fbuid= '" . $_SESSION["uid"]. "'";
	$ref = $result->query($sql);
	$row = mysqli_fetch_assoc($ref);
    $_SESSION["level"]=$row["level"];
	$_SESSION["role"]=$row["role"];
	
	 if($_SESSION["role"] >=0)
	{
		$id = $_SESSION["level"];
		
		//replace 25 with total number of questions
		if($id==25){
		header(""); //give the url to redirect when quiz is over
		}
		
		$sql = "SELECT * FROM treasquestion WHERE no = '" .$id. "'" ;
		$ref = $result->query($sql);
		$rowcount=mysqli_num_rows($ref);
		$row = mysqli_fetch_assoc($ref);
		$title="<h3>Question ".$row["no"]."</h3>";
		$content = "<div id=\"ques\">
			".$title.$row['contents']. "</div>";
		if(!($rowcount))
		{$content = "<p class=\"ack\">WAIT HERE TILL I SET NEW QUESTIONS FOR YOU</p>";
		}

		print $content;
	}
	else if ($_SESSION["role"]==-1)
	{
		$content = "<p class=\"classnamehere\">You have been banned from playing.</p>";
		print $content;
	}
	else if ($_SESSION["role"]==-2)
	{
			$content = "<p class=\"classnamehere\">You had played once.</p><p><a href='timeuphandle.php?replay=1'>Click here to play agian.</a> Your previous score will be erased</p>";
		print $content;
	}
