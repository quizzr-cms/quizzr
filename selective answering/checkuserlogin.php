<?php
session_start();
require_once("../database.php");
global $result;
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
    $sql = "SELECT * FROM selecusers WHERE name = '" . $uname . "'";
	$ref = $result->query($sql);
	$row = mysqli_fetch_assoc($ref);
	$uid = $row["uid"];
	$fbuid = $row["fbuid"];
	$_SESSION["name"]=$row["name"];
		$_SESSION["role"]=$row["role"];
	if($row["name"]==$uname) {

		      if($pass==$row["password"]) {

				$_SESSION["selecvaliduser"]=1;
				$sql ="SELECT * FROM selecsettings";
				$ref = $result->query($sql);
				while($row=mysqli_fetch_assoc($ref))
				{
				switch($row['key'])
				{	case "fblogin_enabled"			:	$type=$row['val'];$_SESSION["logintype"]=$row["val"];
															break;

					default: break;
				}

				}
				if($_SESSION["logintype"]==0)
				$_SESSION["uid"]=$uid;
				else $_SESSION["uid"]=$fbuid;
				$sqllog = "INSERT INTO selecaccesslogs (uid,ip, user) VALUES ('".$_SESSION["uid"]."','". mysqli_real_escape_string($result,$_SERVER['REMOTE_ADDR']) . "','" .$_SESSION["name"]. "')";
	            $ref = $result->query($sqllog);
				$sqllog = "INSERT INTO selecactiveusers (uid, name) VALUES ('".$_SESSION["uid"]. "','" .$row["name"]. "')";
	            $ref = $result->query($sqllog);

				header("location:index.php");
			}
			else {

				header("location:userlogin.php?wp=1");
			}
			}
			else {

				header("location:userlogin.php?wu=1");
			}

?>
