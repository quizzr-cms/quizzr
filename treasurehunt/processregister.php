<?php
function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
	require_once("../database.php");
	
		$name = filter_var($_POST["username"],513);
		$password = filter_var($_POST["password"],513);
		$phone = filter_var($_POST["phone"],519);
		$college = filter_var($_POST["college"],513);
		$email = filter_var($_POST["email"],274);
		
		if(!$name)
		{
			$content = "Enter a valid username<br>Return to <a href = \"register.php\">Registration Form</a>";
		}
		
		else if(!$password) 
		{
			$content = "Enter a valid password<br>Return to <a href = \"register.php\">Registration Form</a>";
		}
		else if(!$phone)
		{
			$content = "Enter a valid phone number<br>Return to <a href = \"register.php\">Registration Form</a>";
		}
		else if(!$college)
		{
			$content = "Enter a valid college<br>Return to <a href = \"register.php\">Registration Form</a>";
		}
		else if(!$email)
		{
			$content = "Enter a valid Email<br>Return to <a href = \"register.php\">Registration Form</a>";
		}
		else
		{
			$sql = "SELECT COUNT(*) FROM treasusers WHERE name = '" . mysqli_real_escape_string($result,$name) . "'";
			$ref = $result->query($sql);
			$result1 = mysqli_result($ref,0);
			if($result1 == 0)
			{
					$sql = "INSERT INTO treasusers (name,level, password,  mob, college, email, role) VALUES ('" . mysqli_real_escape_string($result,$name) . "','1','" . mysqli_real_escape_string($result,$password) . "','". $phone . "','" . mysqli_real_escape_string($result,$college) .  "','" . mysqli_real_escape_string($result,$email) . "','1')";
					$ref = $result->query($sql);
				
				
					$content = "Registration Sucessfull. <a href = \"userlogin.php\">login page</a>";
				
			}
			else 
				$content = "That username is already taken. <a href = \"register.php\">Try another username</a>";
	
		}
	print $content;
?>	
