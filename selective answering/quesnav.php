<?php
require_once("../database.php");
global $result;
$sql = "SELECT MAX(no) as max FROM `selecquestion`";
	$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
	$counter=$row[max];
	$i=0;
	$count=$counter;
	echo "<div id='qnavcon'>";	
	while($counter--){
echo '<div class="navg" onclick="DoAction('.$i.','.$count.');">'.($i+1).'</div>';
if(($i+1)%4==0) 
	echo"<br><br><br>";
	$i++;}
	echo "</div>";
?>
<style>
.navg {
	cursor:pointer;
	display:inline;
	height:25px;
	width:25px;
	margin:5px 5px 5px 5px;
	padding:15px;
	color:ivory;
	border-radius:50% 50%;
	background-color: cadetblue;
}
</style>
