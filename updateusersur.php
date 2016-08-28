
<?php
  session_start();
	require_once("database.php");
	global $result;
		$name = $_GET['name'];
		$college = $_GET['college'];
		$email = $_GET['email'];
		$mob = $_GET['mob'];
		$uid = $_GET['id'];
		$role = $_GET['role'];

		if($_SESSION["logintype"]==0)
		$sql = "UPDATE surveyusers SET role='$role', name='$name',email='$email',mob='$mob',college='$college' WHERE uid =$uid";
		else
		$sql = "UPDATE surveyusers SET role='$role', name='$name',email='$email',mob='$mob',college='$college' WHERE fbuid =$uid";
		$ref = $result->query($sql);
		header("location:profilesur.php?id=$uid");
?>
