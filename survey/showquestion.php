<?php

require_once("../database.php");
global $result;
$sql = "SELECT MAX(no) as max FROM `surveyquestion`";
	$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
	$count=$row[max];

?>

<link rel="stylesheet" href="css/selective.css">
<form id="msform" method="post" action="checkanswer.php">
<?php
$i=1;
if($_SESSION["role"] == -1)
$content="You are bannd from this survey";

else{
$sql = "SELECT * FROM `surveyquestion` WHERE 1";
	$ref = $result->query($sql);

while($row=mysqli_fetch_assoc($ref)){
	$title="<h3>Question ".$row["no"]."</h3>";
	$content=$content.'<fieldset>'.$title.$row["contents"];
	if($i==1)
		$content=$content.'<br><input type="button" name="next" class="next action-button" value="Next" />';
	else if ($i==$count)
		$content=$content.'<br><input type="button" name="previous" class="previous action-button" value="Previous" />
		<input d="submit" type="submit" name="submit" class="submit action-button" value="Submit" />';
		else
		$content=$content.'<br><input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />';

		$content=$content.'</fieldset>';
	$i++;
}}
print $content;
require_once("quesnav.php");
?>

</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="js/selective.js"></script>
