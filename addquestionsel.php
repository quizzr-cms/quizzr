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
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Quizzr </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet"/>
<link href="css/animate.min.css" rel="stylesheet">
  <link href="fonts/css/font-awesome.min.css" rel="stylesheet"/>
  

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  
   <link href="css/icheck/flat/green.css" rel="stylesheet">
		<link rel="stylesheet" href="css/form-elements.css"/>
        <link rel="stylesheet" href="css/style.css"/>
 <script src="js/jquery.min.js"></script>

      
</style>
    </head>

    <body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="indexsel.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Quizzr</span></a>
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
                <li><a href="indexsel.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a><i class="fa fa-question"></i> Questions <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="addquestionsel.php">Add Questions</a>
                    </li>
                    <li><a href="viewquestionssel.php">View Questions</a>
                    </li>
                  </ul>
                </li>
                <li><a href="userssel.php"><i class="fa fa-users"></i> Users</a>
               <li><a href="settingssel.php"><i class="fa fa-gear"></i>Settings</a>
                </li>
                <li><a href="accesslogssel.php"><i class="fa fa-sign-in"></i>Access Logs</a>
                </li>
				<li><a href="answerlogssel.php"><i class="fa fa-quote-left"></i> Answer Logs</a>
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
      <!-- /top navigation -->

		
        <!-- Top content -->
		<div class="right_col" role="main">

        <br/>
        <div class="">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	
                        	<form name='main' role="form" method="post"class="registration-form" action="processnewquestionsel.php" enctype="multipart/form-data">
  <h3>Question type:</h3>
  <div class="form-group">
  <input type="radio" id="qt1"name="qtype" value="1"class="flat">Text</input><br></div>
  <div class="form-group">
  <input type="radio" id="qt2"name="qtype" value="2" class="flat">Image</input><br></div>
  <div class="form-group">
  <input type="radio" id="qt3"name="qtype" value="3"class="flat">Both Text and Image</input>
  <br></div>
  <h3>Answer type:</h3>
  <div class="form-group">
  <input type="radio" id="at1"name="atype" class="flat"value="single">Input Box</input><br></div>
  <div class="form-group">
  <input type="radio" id="at2"name="atype" class="flat"value="multiple">Multiple Choice</input><br>
  <br><div>
    <input type="button" class="btn btn-info" name="next" onclick="add();" value="Next">
    <div id="cho"></div>
   
</form>
		                    
                        </div>
                    </div>
                
            
            
       

		<div/>

        <br>
        <div/>
		
      </div>
      <!-- /page content -->
    </div>


  </div>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/icheck/icheck.min.js"></script>
<script src="js/custom.js"></script>
  <script src="js/pace/pace.min.js"></script>
 
        <script src="assets/js/scripts.js"></script>
        

    </body>

</html>