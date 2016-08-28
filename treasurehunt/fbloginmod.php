<?php
session_start();
require_once("../database.php");
global $result;
require_once ('/src/Facebook/autoload.php');
$fb = new Facebook\Facebook([
'app_id' => '949557711747245',
  'app_secret' => '73b92d2756883faf7481875d41077b91',
      'default_graph_version' => 'v2.5',
      ]);


$helper = $fb->getRedirectLoginHelper();
try {
	if (isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
} catch(Facebook\Exceptions\FacebookResponseException $e) {
 	// When Graph returns an error
 	echo 'Graph returned an error: ' . $e->getMessage();

  	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
 	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
  	exit;
 }

if (isset($accessToken)) {
	if (isset($_SESSION['facebook_access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} else {
		// getting short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;

	  	// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();

		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);

		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}

	// redirect the user back to the same page if it has "code" GET variable
	if (isset($_GET['code'])) {
		header('Location:index.php');
	}

	// getting basic info about user
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name');
		$profile = $profile_request->getGraphNode()->asArray();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		// When Graph returns an error
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location:localhost/treasurehunt/");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		// When validation fails or other local issues
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// printing $profile array on the screen which holds the basic info about user
	print_r($profile);
	$id=$profile['id'];
	$_SESSION["uid"]=$id;
	$name=$profile['name'];
	$sql = "SELECT * FROM treasusers WHERE fbuid=".$id;
	$ref = $result->query($sql);
	$count=mysqli_num_rows($ref);
	if ($count==0)
	{	
		$sql= "INSERT INTO `treasusers` (`fbuid`, `name`, `level`,`role`) VALUES ('".$id."', '".$name."', '1', '1')";
		$ref = $result->query($sql);
		$_SESSION["role"]=1;
		$_SESSION["level"]=0;
		$_SESSION["trevaliduser"]=1;
        $output = "<script>
        window.location='register.php';
        </script>";
	  //echo $output;
		
	}
	else $_SESSION["trevaliduser"]=1;
  	// Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
	// if not logged in display
	$loginUrl = $helper->getLoginUrl('http://localhost/treasurehunt/fbloginmod.php');
	echo "<span><a href=\"".$loginUrl ."\" class=\"email\">LOGIN WITH FACEBOOK</a></span></div>";
}
?>