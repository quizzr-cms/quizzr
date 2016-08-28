<?php
session_start();
require_once("../database.php");
global $result;
if($_SESSION["logintype"]==0)
$sql= "SELECT count( * ) as rank FROM `selecusers` WHERE score > (SELECT score FROM selecusers WHERE uid =".$_SESSION["uid"]." ) OR ( score = (SELECT level FROM selecusers WHERE uid =".$_SESSION["uid"]." ) AND passtime< (SELECT passtime FROM selecusers WHERE uid =".$_SESSION["uid"]." )) AND role!=-1";
else
	$sql= "SELECT count( * ) as rank FROM `selecusers` WHERE score > (SELECT score FROM selecusers WHERE fbuid =".$_SESSION["uid"]." ) OR ( score = (SELECT level FROM selecusers WHERE fbuid =".$_SESSION["uid"]." ) AND passtime< (SELECT passtime FROM selecusers WHERE fbuid =".$_SESSION["uid"]." )) AND role!=-1";
		$ref = $result->query($sql);
		$row = mysqli_fetch_assoc($ref);
		$rank=$row['rank'];
		$rank=$rank+1;
echo "<h2>Your rank  ".$rank."</h2>";

?>