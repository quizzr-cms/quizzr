
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
		$level = $_GET['level'];
		if($_SESSION["logintype"]==0)
		$sql = "UPDATE treasusers SET role='$role', level=$level,name='$name',email='$email',mob='$mob',college='$college' WHERE uid =$uid";
		else
		$sql = "UPDATE treasusers SET role='$role', level=$level,name='$name',email='$email',mob='$mob',college='$college' WHERE fbuid =$uid";
		$ref = $result->query($sql);
		header("location:profiletre.php?id=$uid");
?>
