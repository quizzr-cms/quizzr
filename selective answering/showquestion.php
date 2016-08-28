<?php

require_once("../database.php");

global $result;
if($_SESSION["logintype"]==0)
     $sql = "SELECT * FROM selecusers WHERE  uid= '" . $_SESSION["uid"]. "'";
     else
	$sql = "SELECT * FROM selecusers WHERE  fbuid= '" . $_SESSION["uid"]. "'";
	$ref = $result->query($sql);
	$row = mysqli_fetch_assoc($ref);
	$_SESSION["role"]=$row["role"];

$sql = "SELECT MAX(no) as max FROM `selecquestion`";
	$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
	$count=$row[max];

?>

<link rel="stylesheet" href="css/selective.css">
<form id="msform" method="post" action="checkanswer.php">
<?php
$i=1;
if($_SESSION["role"] == -1)
$content="You are banned from this playing";
else if($_SESSION["role"] == -2)
{
$content="You have played once. <a href='timeuphandle.php?replay=1'>Click here to replay</a> Previous score will be overwritten with new score ";	
}
else{
$sql = "SELECT * FROM `selecquestion` WHERE 1";
	$ref = $result->query($sql);
	$title="<h3>Question ".$row["no"]."</h3>";
while($row=mysqli_fetch_assoc($ref)){
	$title="<h3>Question ".$row["no"]."</h3>";
	$content=$content.'<fieldset>'.$title.$row["contents"];
	if($i==1)
		$content=$content.'<br><input type="button" name="next" class="next action-button" value="Next" />';
	else if ($i==$count)
		$content=$content.'<br><input type="button" name="previous" class="previous action-button" value="Previous" />
		<input id="submit"type="submit" name="submit" class="submit action-button" value="Submit" />';
		else
		$content=$content.'<br><input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />';

		$content=$content.'</fieldset>';
	$i++;
}}
print $content;

?>

</form>

<?php
require_once("quesnav.php");?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="js/selective.js"></script>
