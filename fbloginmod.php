<?php
require_once(__DIR__ ."/quizzr.php");
if($fb_en==1){
    if($quesmoden=="true")
    {
        header("location: ".$quesmodloc);
        return;
    }
    require_once(__DIR__ ."/includes/src/Facebook/autoload.php ");

    $fb = new Facebook\Facebook([
      'app_id' => $fbappid,
      'app_secret' => $fbappsct,
      'default_graph_version' => 'v2.5',
      ]);

    $helper = $fb->getRedirectLoginHelper();
	
    try {
        if (isset($_SESSION['facebook_access_token'])) {
            $accessToken = $_SESSION['facebook_access_token'];
        } else {
            $accessToken = $helper->getAccessToken();
        }
    }
    catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();

        exit;
    }
    catch(Facebook\Exceptions\FacebookSDKException $e) {
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
            header('Location: '.$quesmodloc);
        }

        // getting basic info about user
        try {
            $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
            $profile = $profile_request->getGraphNode()->asArray();
        }
        catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            session_destroy();
            // redirecting user back to app login page
            header("Location: ".$fbmodloc);
            exit;
        }
        catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        
        // printing $profile array on the screen which holds the basic info about user
        //print_r($profile);


        // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
    } else {
        // replace your website URL same as added in the developers.facebook.com/apps 
        //e.g. if you used http instead of https and you used non-www version or 
        //www version of your website then you must add the same here
        $loginUrl = $helper->getLoginUrl($fbmodloc);
        echo '<a href="' . $loginUrl . '"><img src="'.$fbloginimg.'"></a>';
    }
}
else if($fb_en==0){
    // Checks for the POST variables
    if(isset($_POST['qzusn'])&&isset($_POST['qzpass']))
    {
        $usn=$_POST['qzusn'];
        $pass=$_POST['qzpass'];
        $sql = "SELECT * FROM users WHERE userid='".$usn."' and password='".$pass."'";
        $res = $con->query($sql);
        $rowcount=mysqli_num_rows($res);
        if($rowcount==0)
        {
            $fail= '<div id="quizzr-loginfail">'.$loginfailmsg.'</div>';
        }
        else
        {
            $row=mysqli_fetch_assoc($res);

            $_SESSION['login_en']="true";
            $_SESSION['uuid']=$row['uuid'];
            header("location: ".$quesmodloc);
            return;
        }
    }
    if(!isset($_SESSION['login_en']))
    {
    echo '<div class="quizzr-login">
    <form action="'.$loginmodloc.'" method="post">
    <input type="text" class="quizzr-username" id="qzusn" name="qzusn" placeholder="Username" /><br /><br/>
    <input type="password" class="quizzr-password" id="qzpass" name="qzpass" placeholder="Password" /><br />
    <br />
    <input type="Submit" value="Login" />
    </form>
    </div>';
    if(isset($fail))
    {echo $fail;}
    }   
}

?>