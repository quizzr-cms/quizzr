<?php
session_start();
	if (!isset($_SESSION["auth"])){
		header("location:login.php");
	}
require_once("database.php");
global $result;
$sql = "SELECT MAX(no) as max FROM `treasquestion`";
	$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
	$count=$row[max];
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

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/quest.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  
  <link href="css/icheck/flat/green.css" rel="stylesheet">
  <link href="css/viewque.css" rel="stylesheet">

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
      <!-- /top navigation -->
	  <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>View and Edit Questions</h3>
            </div>
          </div>
          

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="container">
	<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
		<?php 
		
	$pagecount=$count;
	$qn=$_GET["qn"];
	if ($qn=="")
	{
		$qn=1;
	}
	
	$sql = "SELECT * FROM treasquestion WHERE no=$qn";
	$ref = $result->query($sql);
	
	$row = mysqli_fetch_assoc($ref);
	$title="<h3>Question $row[no] </h3>";
	echo "<center>$title $row[contents]";
	echo "<br><h4>Answer :  $row[answer]</h4>";
	echo '<br><form action="deletequestre.php" method="post"><input name="qn" type="hidden" value="'.$qn.'"><button class="btn btn-danger btn-m" type="submit"><i class="fa fa-trash-o"></i> Delete </button><a data-toggle="modal" data-target="#myModal" class="btn btn-info btn-m"><i class="fa fa-pencil"></i> Edit </a><a href="addquestiontre.php" class="btn btn-dark btn-m"><i class="fa fa-plus"></i> Add </a></form></center><br>';
	
	if($qn>1)
	{
		?><br><center><a class="btn btn-default" href="viewquestionstre.php?qn=<?php echo $qn-1?>"><?php echo "Previous " ?></a> <?php
	}
	$adjacents=3;
	$page=$qn;
	$start = ($page <= $adjacents ? 1 : $qn - $adjacents);
    $end = ($qn > $pagecount - $adjacents ? $pagecount : $qn + $adjacents);
	
     
	for ($i=$start;$i<=$end;$i++)
	{
		
		?><a class="btn btn-default" href="viewquestionstre.php?qn=<?php echo $i?>"><?php echo $i." " ?></a> <?php
	}		
	if($pagecount>$qn)
	{
			?><a class="btn btn-default" href="viewquestionstre.php?qn=<?php echo $qn+1?>"><?php echo "Next " ?></a> <?php
	}
?>
</center>
<br>
		
		
		</div>
  </div>
</div>
              </div>
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
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
       <form role="form" action="updatequestiontre.php" method="post">
	   <h4><?php echo "Question $qn";?></h4>
  <div class="form-group">
    <label for="name">Question:</label>
    <textarea class="form-control" name="contents"><?php echo $row[contents];?></textarea>
  </div>
  <div class="form-group">
    <label for="answer">Answer:</label>
    <input type="text" class="form-control" name="answer" value="<?php echo $row[answer];?>">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" name="qn" value="<?php echo $qn;?>">
	<input type="hidden" class="form-control" name="qtype" value="<?php echo $row[qtype];?>">
	<input type="hidden" class="form-control" name="atype" value="<?php echo $row[atype];?>">
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
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/pace/pace.min.js"></script>

</body>

</html>

