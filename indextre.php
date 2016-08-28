<?php
session_start();
	if (!isset($_SESSION["auth"])){
		header("location:login.php");
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

          <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i>
                </div>
                <div class="count">231</div>

                <h3>Total Users</h3>
                <p></p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-circle"></i>
                </div>
                <div class="count">129</div>

                <h3>Active Users</h3>
                <p></p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-child"></i>
                </div>
                <div class="count">179</div>

                <h3>New Sign ups</h3>
                <p></p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i>
                </div>
                <div class="count">579</div>

                <h3>No of Attempts</h3>
                <p></p>
              </div>
            </div>
          </div>
          </div>
        </div>

       
      </div>
      <!-- /page content -->
    </div>


  </div>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/pace/pace.min.js"></script>
  
</body>

</html>
