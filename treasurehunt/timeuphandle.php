<h1>Time up</h1>
<?php 
session_start();
require_once("../database.php");
global $result;
$replay=$_GET[replay];
$replay=mysqli_real_escape_string($result,$replay);
if(!isset($replay))
{$replay=0;}

if ($replay==0) {
if($_SESSION[logintype]==0)
$sql = "UPDATE treasusers SET role=-2 WHERE uid = '" .$_SESSION[uid]. "'" ;
else
$sql = "UPDATE treasusers SET role=-2 WHERE fbuid = '" .$_SESSION[uid]. "'" ;
$ref = $result->query($sql);
$_SESSION[role]=-2;
$content = "<p><a href='timeuphandle.php?replay=1'>Click here to play agian.</a> Your previous score will be erased</p>";
		print $content;
		}
else {
	if($_SESSION[logintype]==0)
	$sql = "UPDATE treasusers SET role=1, level=1 WHERE uid = '" .$_SESSION[uid]. "'" ;
    else
	$sql = "UPDATE treasusers SET role=1, level=1 WHERE fbuid = '" .$_SESSION[uid]. "'" ;	
	$ref = $result->query($sql);
$_SESSION[role]=1;

header("location:index.php");
	}
?>