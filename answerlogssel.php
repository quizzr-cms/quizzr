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
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
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
                </li>
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

      </div>      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Users</h3>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_content">
				<?php
	session_start();
	if (!isset($_SESSION["auth"])){
		header("location:login.php");
	}
	require_once("database.php");
	$sql = "SELECT * FROM selecanslogs";
	$ref = $result->query($sql);
	$count=mysqli_num_rows($ref);
	$per=20;
	$pagecount=ceil($count/$per);
	$page=$_GET["page"];
	if ($page=="")
	{
		$page=1;
	}
	if ($page==1)
	{
		$offset=0;
	}
	else {
		$offset=($page-1)*$per;
	}
	$sql = "SELECT * FROM selecanslogs  ORDER BY time DESC LIMIT $offset,$per";
	$ref = $result->query($sql);

	echo '
	<table class="table table-hover">
                    <thead>
                      <tr>
						<th>#</th>
                        <th>uid</th>
                        <th>Username</th>
						<th>Value</th>
                        <th>Qno</th>
                        <th>Time</th>
                      </tr>
                    </thead>
                    <tbody>';
  
	while($row = mysqli_fetch_assoc($ref))
	{
		echo "<tr><td>".$row["id"]."</td><td>".$row["uid"]."</td><td>".$row["user"]."</td><td>".$row["val"]."</td><td>".$row["qno"]."</td><td>".$row["time"]."</td></tr>";
	} 
	?></tbody>
                  </table>
				  <center>
	<div id="paging">
	<?php
	if($page>1)
	{
		?><a class="btn btn-default" href="answerlogssel.php?page=<?php echo $page-1?>"><?php echo "Previous " ?></a> <?php
	}
	$adjacents=7;
	$start = ($page < $adjacents ? 1 : $page - $adjacents);
    $end = ($page > $pagecount - $adjacents ? $pagecount : $page + $adjacents);
     if($start==0)
	 {
		 $start=1;
	 }
	for ($i=$start;$i<=$end;$i++)
	{
		
		?><a class="btn btn-default" href="answerlogssel.php?page=<?php echo $i?>"><?php echo $i." " ?></a> <?php
	}		
	if($pagecount>$page)
	{
			?><a class="btn btn-default" href="answerlogssel.php?page=<?php echo $page+1?>"><?php echo "Next " ?></a> <?php
	}
?>
</div> </center>
        </div>

      </div>
      <!-- /page content -->
    </div>

  </div>

  

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/custom.js"></script>
  <!-- pace -->
  
</body>

</html>
