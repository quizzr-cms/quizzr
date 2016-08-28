
<?php 
require_once("database.php");
global $result;
		$qtype = $_POST['qtype'];
		$atype = $_POST['atype'];
		$quest = $_POST['quest'];
		$choice = $_POST['choice'];
		$answer = $_POST['answer'];
		$i=1;
		
		print_r($_POST);
		print_r($_FILES);
		$qtype = mysqli_real_escape_string($result, $qtype);
		$atype = mysqli_real_escape_string($result, $atype);
		$quest = mysqli_real_escape_string($result, $quest);
		$choice = mysqli_real_escape_string($result, $choice);
		$answer = mysqli_real_escape_string($result, $answer);
		
		while ( $i <= $choice )
		{$opt[$i]=mysqli_real_escape_string($result,$_POST[opt.$i]);
		$i++;}
	
	$sql = "SELECT MAX(no) as max FROM `treasquestion`";
	$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
	$qn=$row[max]+1;
	
	
	if(($qtype=="1")&&($atype=="multiple")) {
		$i=1;
		$sql ="INSERT INTO treasquestion(no,contents, answer,qtype,atype) VALUES ('".$qn."','<h3>" .$quest . "</h3><form action=\'checkanswer.php\' method=\'post\'>";
	
		while($i <= $choice){
			$sql=$sql."<input type=\'radio\' name=\'answer\'value=\'".$opt[$i]."\'>".$opt[$i]."</input><br>";
			$i++;
		}
		
		$sql=$sql."<br><input type=\'submit\' value=\'Submit\'></form>','".$answer."','1','multiple')";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		
		$sql="SELECT * from `treasquestion` WHERE no=".$qn;
		$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
		$qnc=$row[contents];
		echo $qnc;
		
	}
	else if(($qtype=="1")&&($atype=="single")) {
		$sql = "INSERT INTO treasquestion(no, contents, answer,qtype,atype) VALUES ('".$qn."','<h3>" .$quest . "</h3><form action=\'checkanswer.php\' method=\'post\'><input type=\'text\' name=\'answer\'><br><input type=\'submit\' value=\'submit\'></form>','".$answer."','1','single')";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		$sql="SELECT * from `treasquestion` WHERE id=".$qn;
		$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
		$qnc=$row[contents];
		echo $qnc;
		
	}
		

	 if(($qtype=="2")||($qtype=="3")) {

$target_dir = "ques/";
$target_file = $target_dir . basename($_FILES["quesi"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["quesi"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["quesi"]["tmp_name"], $target_file)) {
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	echo "hello";
}  echo $target_file;  
	//image question and multiple choice answer
	 if(($qtype=="2")&&($atype=="multiple")) {
		
		$i=1;
		$sql ="INSERT INTO treasquestion(no,contents, answer,qtype,atype) VALUES ('".$qn."','<img src=\'http://localhost/".$target_file."\' id=\'iq\'><br><br><form action=\'checkanswer.php\' method=\'post\'>";
	
		while($i <= $choice){
			$sql=$sql."<input type=\'radio\' name=\'answer\'value=\'".$opt[$i]."\'>".$opt[$i]."</input><br>";
			$i++;
		}
	
		$sql=$sql."<br><input type=\'submit\' value=\'Submit\'></form>','".$answer."','2','multiple')";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		$sql="SELECT * from `treasquestion` WHERE no=".$qn;
		$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
		$qnc=$row[contents];
		echo $qnc;
		
		
	}
	// image question and inputbox answer
	else if(($qtype=="2")&&($atype=="single")) {
		$sql = "INSERT INTO treasquestion(no,contents, answer,qtype,atype) VALUES ('".$qn."','<img src=\'http://localhost/".$target_file."\' id=\'iq\'><br><br><form action=\'checkanswer.php\' method=\'post\'><input type=\'text\' name=\'answer\'><br><input type=\'submit\' value=\'submit\'></form>','".$answer."','2','single')";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		$sql="SELECT * from `treasquestion` WHERE id=".$qn;
		$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
		$qnc=$row[contents];
		echo $qnc;
		
	}
	else if(($qtype=="3")&&($atype=="multiple")) {
		$i=1;
		$sql ="INSERT INTO treasquestion(no,contents, answer,qtype,atype) VALUES ('".$qn."','<h3>" .$quest . "</h3><img src=\'http://localhost/".$target_file."\' id=\'iq\'><br><br><form action=\'checkanswer.php\' method=\'post\'>";
	
		while($i <= $choice){
			$sql=$sql."<input type=\'radio\' name=\'answer\'value=\'".$opt[$i]."\'>".$opt[$i]."</input><br>";
			$i++;
		}
		
		$sql=$sql."<br><input type=\'submit\' value=\'Submit\'></form>','".$answer."','3','multiple')";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		echo "hello";
		$sql="SELECT * from `treasquestions` WHERE no=".$qn;
		$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
		$qnc=$row[contents];
		echo $qnc;
		
	}
	else if(($qtype=="3")&&($atype=="single")) {
		$sql = "INSERT INTO treasquestion(no,contents, answer,qtype,atype) VALUES ('".$qn."','<h3>" .$quest . "</h3><img src=\'http://localhost/".$target_file."\' id=\'iq\'><br><br><form action=\'checkanswer.php\' method=\'post\'><input type=\'text\' name=\'answer\'><br><input type=\'submit\' value=\'submit\'></form>','".$answer."','3','single')";
		$ref = $result->query($sql);
		if(!$ref)
		{
			echo "Failed to update";
		}
		$sql="SELECT * from `treasquestion` WHERE id=".$qn;
		$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
		$qnc=$row[contents];
		echo $qnc;
		
	}
	 }
	//header("location:viewquestionstre.php?qn=$qn");
	?>
