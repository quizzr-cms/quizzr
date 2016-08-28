
<?php
session_start();
	if (!isset($_SESSION["auth"])){
		header("location:login.php");
	}
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>Quizzr</title>

<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/index.css">
  
  </head>

  <body>

    <section class="buttons">
  <div class="container">

    <h1>Select Quiz Type</h1>
 
    <a href="indextre.php" class="btn btn-2">Treasure <br> Hunt</a> 
	<a href="indexsur.php" class="btn btn-2">Survey</a> 
	<a href="indexsel.php" class="btn btn-2">Selective Answering</a> 

  </div>
  
</section>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <img src="images/logo.png">
  </body>
</html>
