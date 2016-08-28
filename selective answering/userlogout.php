<?php
session_start();
require_once("../database.php");
global $result;
$sqllog = "DELETE FROM selecactiveusers WHERE uid=".$_SESSION["uid"];
$ref = $result->query($sqllog);
session_unset();
session_destroy ();
header("location:userlogin.php");
?>