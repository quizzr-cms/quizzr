<?php
require_once("database.php");
global $result;
		$uname = $_POST['nuname'];
		$cpass = $_POST['cpass'];
		$npass1 = $_POST['npass1'];
		$npass2 = $_POST['npass2'];
		$fbappid=$_POST['fbappid'];
		$fbappsct=$_POST['fbappsct'];
		print_r($_POST);

		$sql ="SELECT * FROM surveysettings";
		$ref = $result->query($sql);
		while($row=mysqli_fetch_assoc($ref))
{
	switch($row['key'])
	{
		case "password"			:	$pass=$row['val'];
									break;

		default: break;
	}
}
		if($uname!=""){
		$sql ="UPDATE `surveysettings` SET `val` = '".$uname."' WHERE `key` = 'uname'";
		$ref = $result->query($sql);

		if(!$ref)
		{
			echo "Failed to update user";
		}

		}
		if($cpass!=""){


		if($cpass==$pass) {
			if($npass1==$npass2) {
				$sql ="UPDATE `surveysettings` SET `val` = '".$npass1."' WHERE `key` = 'password'";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update password";
		}
			}
			else {
				echo"passwords donot match";
			}

		}
		else
			echo "Typed Current password is wrong";

		}
		if($fbappid!=""){
		$sql ="UPDATE `surveysettings` SET `val` = '".$fbappid."' WHERE `key` = 'fbappid'";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update fbappid";
		}

		}
		if($fbappsct!=""){
		$sql ="UPDATE `surveysettings` SET `val` = '".$fbappsct."' WHERE `key` = 'fbappsct'";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update fbappsecret";
		}

		}

		header("location:settingssur.php");

	?>
