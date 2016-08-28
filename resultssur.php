<?php
session_start();
	if (!isset($_SESSION["auth"])){
		header("location:login.php");
	}
require_once("database.php");
global $result;
$sql = "SELECT MAX(no) as max FROM `surveyquestion`";
	$ref = $result->query($sql);
	$row=mysqli_fetch_assoc($ref);
	$count=$row[max];
	$pagecount=$count;
	$qn=$_GET["qn"];
	if ($qn=="")
	{
		$qn=1;
	}
	$sql = "SELECT count(distinct(uid)) as tpart FROM surveyanslogs";
	$ref = $result->query($sql);
	$row = mysqli_fetch_assoc($ref);
	$tpart=$row["tpart"];
	$sql = "SELECT * FROM surveyquestion WHERE no=$qn";
	$ref = $result->query($sql);
	$row = mysqli_fetch_assoc($ref);
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


  <script src="js/jquery.min.js"></script>

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="indexsur.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Quizzr</span></a>
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
                <li><a href="indexsur.php"><i class="fa fa-home"></i> Home</a>
                </li>
                <li><a><i class="fa fa-question"></i> Questions <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="addquestionsur.php">Add Questions</a>
                    </li>
                    <li><a href="viewquestionssur.php">View Questions</a>
                    </li>
                  </ul>
                </li>
                <li><a href="userssur.php"><i class="fa fa-users"></i> Users</a>
                <li><a href="settingssur.php"><i class="fa fa-gear"></i>Settings</a>
                </li>
                <li><a href="accesslogssur.php"><i class="fa fa-sign-in"></i>Access Logs</a>
                </li>
				<li><a href="resultssur.php"><i class="fa fa-bar-chart"></i> Results</a>
                </li>
				<li><a href="answerlogssur.php"><i class="fa fa-quote-left"></i>Answer Logs</a>
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
      <!-- /top navigation  -->


      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Survery Results</h3>
            </div>


          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Total Participants : <?php echo $tpart;?></h2>

                  <div class="clearfix"></div>
                </div>
                <h2><?php 
					$question = current(explode("<input", $row['contents']));
				echo $row["no"].' ) '.$question;?></h2>
                <div class="x_content">

                  <!-- start project list -->
                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">No</th>
                        <th style="width: 20%">Opinon</th>

                        <th>No. of votes</th>
                      </tr>
                    </thead>
										<?php
										$sql="SELECT count(distinct(val)) as opt FROM `surveyanslogs` WHERE qno=".$qn;
										$ref = $result->query($sql);
										$row = mysqli_fetch_assoc($ref);
										$opt=$row["opt"];
										$i=1;
										$sql="SELECT  distinct(val) as value FROM surveyanslogs WHERE qno=".$qn;
										$ref = $result->query($sql);

										echo "<tbody>";
										while ($row = mysqli_fetch_assoc($ref))
										{
											$sql="SELECT  count(*) as vote FROM surveyanslogs WHERE qno=".$qn." AND val='".$row["value"]."'";
											$ref1 = $result->query($sql);
											$row1=mysqli_fetch_assoc($ref1);
											$vote=$row1["vote"];
													echo "<tr>
		                        <td>".$i."</td>
		                        <td>".$row["value"]."</td><td class='project_progress'><div class='progress progress_sm'>
	                            <div class='progress-bar bg-green' role='progressbar' data-transitiongoal='".$vote*100/$tpart."'></div>
	                          </div>
	                          <p>".$vote." Votes</p>
	                        </td></tr>";
													$i++;
										}
										echo "</tbody>";
										?>


                    </tbody>
                  </table>
                  <!-- end project list -->

                </div>
              </div>
            </div>
          </div>
        </div>

<?php
if($qn>1)
{
	?><br><center><a class="btn btn-default" href="resultssur.php?qn=<?php echo $qn-1?>"><?php echo "Previous " ?></a> <?php
}
$adjacents=3;
$start = ($page < $adjacents ? 1 : $qn - $adjacents);
	$end = ($qn > $pagecount - $adjacents ? $pagecount : $qn + $adjacents);
	 if($start==0)
 {
	 $start=1;
 }
for ($i=$start;$i<=$end;$i++)
{

	?><a class="btn btn-default" href="resultssur.php?qn=<?php echo $i?>"><?php echo $i." " ?></a> <?php
}
if($pagecount>$qn)
{
		?><a class="btn btn-default" href="resultssur.php?qn=<?php echo $qn+1?>"><?php echo "Next " ?></a> <?php
}
?>


      </div>
      <!-- /page content -->

     </div>
     <!-- /page content -->
   </div>


 <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/custom.js"></script>
 <script src="js/pace/pace.min.js"></script>

 </body>

 </html>
