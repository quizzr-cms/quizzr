<?php
session_start();
//Just a basic form. if you are using your own form, just give the names same as here for username and password.
//Or else you can style this form youself to match your design.
if($_SESSION["trevaliduser"])	 
 header("location:index.php");
$content='<form action="checkuserlogin.php" method="post"><label>Username : </label><input id="" type="text" name="uname"><br><br>';
		 
		 
		 $content=$content.'
<label>Password : </label><input type="password" name="pass"><br>';
if($_GET[wu])
			 $content=$content."<h4>Incorrect Username</h4>";
		 if($_GET[wp])
			 $content=$content."<h4>Incorrect Passsword</h4>";
			$content=$content."<h4> </h4>";
$content=$content.'<button type="submit">Submit</button>
</form>';
print $content;
echo '<a href="register.php">Registrer</a>';
?>