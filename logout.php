<?php
session_start();
require_once("database.php");
global $result;
	$sqllog = "INSERT INTO accesslogs (ip, user) VALUES ('". mysqli_real_escape_string($result,$_SERVER['REMOTE_ADDR']) . "','" .$_SESSION["name"]. "')";
	$ref = $result->query($sqllog);
	session_unset();
session_destroy ();
header("location:login.php");
?>