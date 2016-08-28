	<?php
session_start();
/**
 *                  Global DB connection handler
 * */
// this will automaticially stops excecution of further code if an error occurs
$con = mysqli_connect("localhost","root","","quizzr");
if(mysqli_connect_error())
{
	echo "Database connection error! Check your database connection
	settings. Error code:".mysqli_connect_errno();
	die();
}

//                  Global variables section

/**
 *                  Website config
 * */
$siteurl="http://".$_SERVER['SERVER_NAME']."/"; //Website url
$img_folder=$siteurl.'quizzr/images/';       	// Images folder

/**
 *                  FB Login module config
 * */
$fbappid="";		            		        //FB appid
$fbappsct="";					      	        //FB app secret
$fbloginimg="";	                                //FB login button image filename
$fb_en=0;				             	        //FB login enable switch
$fbmodloc="";                                   //FB module location

/**
 *                  Login module config
 * */
$loginmodloc="";                                //FB Login module location
$login_redirect="";                             //Login
$loginfailmsg="";                               //Login failure message

/**
 *                  Logout module config
 * */
$logoutmodloc="";

/**
 *                  Question module config
 * */
$quesmodloc="";                                 //Question module location
$quesmoden=1;//todo: get from session           //Question module enable switch
$ques_cls="";                                   //Question module div main css class
$wrongdisp="";                                  //Wrong answer display type




// Fetching settings for storing to global vars
$sql = "SELECT * FROM settings WHERE 1" ;
$res = $con->query($sql);
while($row=mysqli_fetch_assoc($res))
{
	switch($row['key'])
	{
		case "fbappid"			:	$fbappid=$row['val'];
									break;
		case "fbappsct"			:	$fbappsct=$row['val'];
									break;
		case "fbloginimg"		:	$fbloginimg=$img_folder.$row['val'];
									break;
		case "fblogin_enabled"	:	$fb_en=$row['val'];
									break;
		case "login_redirect_to":	$login_redirect=$siteurl.$row['val'];
									break;
        case "loginmodloc"      :   $loginmodloc=$siteurl.$row['val'];
                                    break;
        case "fbmodloc"         :   $fbmodloc=$siteurl.$row['val'];
                                    break;
        case "quesmodloc"       :   $quesmodloc=$siteurl.$row['val'];
                                    break;
        case "ques_div_cls"     :   $ques_cls=$row['val'];
                                    break;
        case "wrongdisp_type"   :   $wrongdisp=$row['val'];
                                    break;
        case "login_fail_msg"   :   $loginfailmsg=$row['val'];
                                    break;
        case "logoutmodloc"     :   $logoutmodloc=$row['val'];
                                    break;
		default: break;
	}
}

// getting logged in session
if(isset($_SESSION['login_en'])){
    $quesmoden=$_SESSION['login_en'];
    //$userid=
}
?>
