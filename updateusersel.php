
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
		$score = $_GET['score'];
    if($_SESSION["logintype"]==0)
		$sql = "UPDATE selecusers SET role='$role', score=$score,name='$name',email='$email',mob='$mob',college='$college' WHERE uid =$uid";
		else
		$sql = "UPDATE selecusers SET role='$role', score=$score,name='$name',email='$email',mob='$mob',college='$college' WHERE fbuid =$uid";
		$ref = $result->query($sql);
		header("location:profilesel.php?id=$uid");
?>
