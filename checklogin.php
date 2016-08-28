<?php 
session_start();
require_once("database.php");
global $result;
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$sql ="SELECT * FROM treassettings";
		$ref = $result->query($sql);
		while($row=mysqli_fetch_assoc($ref))
{
	switch($row['key'])
	{	case "uname"			:	$ouname=$row['val'];
									break;
		case "password"			:	$opass=$row['val'];
									break;
		case "fblogin_enabled"	:	$type=$row['val'];
									$_SESSION["logintype"]=$row["val"];
									break;
		default: break;
	}
}

		
		if($uname==$ouname) {
				
		      if($pass==$opass) {
				$_SESSION["auth"]=1;
header("location:index.php");
			}
			else {
				header("location:login.php?wp=1");
			}
			}
			else {
				header("location:login.php?wu=1");
			}
		
		
		?>