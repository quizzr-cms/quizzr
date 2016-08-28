<?php
session_start();
if(!$_SESSION["selecvaliduser"])
	header("location:userlogin.php");

/*make this your index page for users. And use <?php require_once("showquestion.php") ?> at the position you need to dispaly the question*/

require_once("showquestion.php");


?> 