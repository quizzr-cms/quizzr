<?php
session_start();
if(!$_SESSION["trevaliduser"])
	header("location:userlogin.php");

/*make this your index page for users. And use <?php require_once("showquestion.php") ?> at the position you need to dispaly the question*/
require_once("timer.php");
require_once("showquestion.php");

?> 
<style>
img {width:400px;
		height:400px;
	}
</style>