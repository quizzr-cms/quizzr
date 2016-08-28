<?php
session_start();
	if (!isset($_SESSION["auth"])){
		header("location:login.php");
	}
require_once("database.php");
global $result;
$sql = "SELECT * FROM `treassettings`";
	$ref = $result->query($sql);
			while($row=mysqli_fetch_assoc($ref))
{
	switch($row['key'])
	{
		case "uname"			:	$uname=$row['val'];
									break;
		case "password"			:	$pass=$row['val'];
									break;
		case "fbappid"			:	$fbappid=$row['val'];
									break;
		case "fbappsct"			:	$fbappsct=$row['val'];
									break;							
		
		default: break;
	}
}
		
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Quizzr </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  
  <link href="css/icheck/flat/green.css" rel="stylesheet">
  <link href="css/floatexamples.css" rel="stylesheet" />

  <script src="js/jquery.min.js"></script>

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="indextre.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Quizzr</span></a>
          </div>
          <div class="clearfix"></div>


          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>Admin</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="indextre.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a><i class="fa fa-question"></i> Questions <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="addquestiontre.php">Add Questions</a>
                    </li>
                    <li><a href="viewquestionstre.php">View Questions</a>
                    </li>
                  </ul>
                </li>
                <li><a href="userstre.php"><i class="fa fa-users"></i> Users</a>
                <li><a href="settingstre.php"><i class="fa fa-gear"></i>Settings</a>
                </li>
                <li><a href="accesslogstre.php"><i class="fa fa-sign-in"></i>Access Logs</a>
                </li>
				<li><a href="answerlogstre.php"><i class="fa fa-quote-left"></i> Answer Logs</a>
                </li>
              </ul>
            </div>
            
          </div>
          <!-- /sidebar menu -->

          
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
<div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>            

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.jpg" alt="">Admin
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated slideInDown pull-right">
                  <li>
                <a href="index.php"><i class="fa fa-info pull-right"></i>Select Quiz type</a>	
                  </li>
                  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>

              
            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation 
	  -->


      <!-- page content -->
      <div class="right_col" role="main">

        <br />
        <div class="">

          
                <div class="x_content">
                  <br />
                  <form class="form-horizontal form-label-left input_mask">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<label class="">Username </label>
                      <input type="text" class="form-control has-feedback-left" id="inputSuccess2" value="<?php echo $uname;?>" >
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<label class="">Password </label>
                      <input type="password" class="form-control" id="inputSuccess3" placeholder="********">
                      <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<label class="">fbappid </label>
                      <input type="text" class="form-control has-feedback-left" id="inputSuccess4" value="<?php echo $fbappid;?>">
                      <span class="fa fa-facebook form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
					<label class="">App Secret </label>
                      <input type="text" class="form-control" id="inputSuccess5" value="<?php echo $fbappsct;?>">
                      <span class="fa fa-facebook form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <a data-toggle="modal" data-target="#myModal" class="btn btn-info btn-m"><i class="fa fa-pencil"></i> Edit </a>
                  </form>
				  <h4></h4>
                </div>

          </div>
        </div>

       
      </div>
      <!-- /page content -->
    </div>


  </div>
  
                     <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Fill the fields you want to change. Leave others blank</h4>
      </div>
      <div class="modal-body">
       <form role="form" action="updatesettingstre.php" method="post">
	   <h4>Change Username</h4>
  <div class="form-group">
   <label for="newuname">New Username:</label>
   <input type="text" class="form-control" name="nuname" >
  </div>
  <h4>Change Password</h4>
  <div class="form-group">
    <label for="currentpw">Current Password:</label>
   <input type="text" class="form-control" name="cpass" palceholder="Type Current password">
   <label for="newuname">New Password:</label>
   <input type="text" class="form-control" name="npass1" >
   <label for="newuname">Confirm New Password:</label>
   <input type="text" class="form-control" name="npass2" >
  </div>
  <h4>Change FB AppID</h4>
  <div class="form-group">
   <label for="newappid">New FB AppID:</label>
   <input type="text" class="form-control" name="fbappid" >
  </div>
  <h4>Change FB App Secret</h4>
  <div class="form-group">
   <label for="newappid">New FB App Secret:</label>
   <input type="text" class="form-control" name="fbappsct" ><br>
  </div>
  
   </div>
      <div class="modal-footer">
	  <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
	  </form>
    </div>

  </div>
</div>
  
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/pace/pace.min.js"></script>
  
</body>

</html>
