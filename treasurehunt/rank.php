<?php
session_start();
require_once("../database.php");
global $result;
if($_SESSION["logintype"]==0)
$sql= "SELECT count( * ) as rank FROM `treasusers` WHERE level > (SELECT level FROM treasusers WHERE uid =".$_SESSION["uid"]." ) OR ( level = (SELECT level FROM treasusers WHERE uid =".$_SESSION["uid"]." ) AND passtime< (SELECT passtime FROM treasusers WHERE uid =".$_SESSION["uid"]." )) AND role!=-1";
else
	$sql= "SELECT count( * ) as rank FROM `treasusers` WHERE level > (SELECT level FROM treasusers WHERE fbuid =".$_SESSION["uid"]." ) OR ( level = (SELECT level FROM treasusers WHERE fbuid =".$_SESSION["uid"]." ) AND passtime< (SELECT passtime FROM treasusers WHERE fbuid =".$_SESSION["uid"]." )) AND role!=-1";
		$ref = $result->query($sql);
		$row = mysqli_fetch_assoc($ref);
		$rank=$row['rank'];
		$rank=$rank+1;
echo "<h2>Your rank  ".$rank."</h2>";

?>