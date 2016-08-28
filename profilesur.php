<?php
session_start();
	  require_once("database.php");
	  $uid=$_GET['id'];
		if($_SESSION["logintype"]==0)
	  $sql = "SELECT * FROM surveyusers WHERE uid=$uid";
		else
		$sql = "SELECT * FROM surveyusers WHERE fbuid=$uid";
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
            <a href="indexsur.php" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Quizzr</span></a>
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
                </li>
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
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">

        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>User Profile</h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                      <!-- end of image cropping -->
                      <div id="crop-avatar">
                        <!-- Current avatar -->
                        <div class="avatar-view" title="Change the avatar">
                          <img src="images/picture.jpg" alt="Avatar">
                        </div>

                        <!-- Cropping modal -->
                        <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                                <div class="modal-header">
                                  <button class="close" data-dismiss="modal" type="button">&times;</button>
                                  <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="avatar-body">

                                    <!-- Upload image and data -->
                                    <div class="avatar-upload">
                                      <input class="avatar-src" name="avatar_src" type="hidden">
                                      <input class="avatar-data" name="avatar_data" type="hidden">
                                      <label for="avatarInput">Local upload</label>
                                      <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                    </div>

                                    <!-- Crop and preview -->
                                    <div class="row">
                                      <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="avatar-preview preview-lg"></div>
                                        <div class="avatar-preview preview-md"></div>
                                        <div class="avatar-preview preview-sm"></div>
                                      </div>
                                    </div>

                                    <div class="row avatar-btns">
                                      <div class="col-md-9">
                                        <div class="btn-group">
                                          <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                        </div>
                                        <div class="btn-group">
                                          <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                          <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                        </div>
                                      </div>
                                      <div class="col-md-3">
                                        <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- /.modal -->

                        <!-- Loading state -->
                        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                      </div>
                      <!-- end of image cropping -->

                    </div>
                    <h3><?php echo $row[name]; ?></h3>

                    <ul class="list-unstyled user_data">
                      <li><i class="fa fa-phone"></i> <?php echo $row[mob];?>
                      </li>

                      <li>
                        <i class="fa fa-university"></i> <?php echo $row[college];?>
                      </li>
					  <li>
                        <i class="fa fa-envelope"></i> <?php echo $row[email];?>
                      </li>

                    </ul>

                    <a class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                    <br/>

                    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit user info</h4>
      </div>
      <div class="modal-body">
       <form role="form" action="updateusersur.php">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" value="<?php echo $row[name];?>">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" name="email" value="<?php echo $row[email];?>">
  </div>
  <div class="form-group">
    <label for="mob">Mobile No:</label>
    <input type="text" class="form-control" name="mob" value="<?php echo $row[mob];?>">
  </div>
  <div class="form-group">
    <label for="college">College:</label>
    <input type="text" class="form-control" name="college" value="<?php echo $row[college];?>">
  </div>

  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="<?php echo $uid;?>">
  </div>
  <div class="form-group">
    <label for="role">State:</label>
    <input type="radio" class="flat" name="role" value="1" <?php if ($row[role]>0) echo 'checked';?>>Active</input>
	<input type="radio" class="flat" name="role" value="-1" <?php if ($row[role]<0) echo 'checked';?>>Banned</input>
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
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                      <div class="col-md-6">
                        <h2>User Activity Report</h2>
                      </div>
                      <div class="col-md-6">

                      </div>
                    </div>

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Login Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Answer Logs</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Current Status</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                          <!-- start recent activity -->
						  <table class="data table table-striped no-margin">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>IP Address</th>
                                <th>Time</th>

                              </tr>
                            </thead>
                            <tbody>
							<?php
							$sql = "SELECT * FROM surveyaccesslogs WHERE uid=$uid";
	$ref = $result->query($sql);
	$count=mysqli_num_rows($ref);
	$per=10;
	$pagecount=ceil($count/$per);
	$page=$_GET["alog"];
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
	$sql = "SELECT * FROM surveyaccesslogs WHERE uid=$uid LIMIT $offset,$per";
	$ref = $result->query($sql);
	$sino=$offset+1;

	while($row = mysqli_fetch_assoc($ref))
	{
		echo "<tr><td>".$sino."</td><td>".$row[ip]."</td><td>".$row[time]."</td></tr>";
		$sino++;
	}
	?></tbody>
                  </table>
				  <center>
	<div id="paging">
	<?php
	if($page>1)
	{
		?><a class="btn btn-default" href="profilesur.php?id=<?php echo $uid?>&alog=<?php echo $page-1?>"><?php echo "Previous " ?></a> <?php
	}
	$adjacents=3;
	$start = ($page < $adjacents ? 1 : $page - $adjacents);
    $end = ($page > $pagecount - $adjacents ? $pagecount : $page + $adjacents);
     if($start==0)
	 {
		 $start=1;
	 }
	for ($i=$start;$i<=$end;$i++)
	{

		?><a class="btn btn-default" href="profilesur.php?id=<?php echo $uid?>&alog=<?php echo $i?>"><?php echo $i." " ?></a> <?php
	}
	if($pagecount>$page)
	{
			?><a class="btn btn-default" href="profilesur.php?id=<?php echo $uid?>&alog=<?php echo $page+1?>"><?php echo "Next " ?></a> <?php
	}
?>
</div> </center>
        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                          <!-- start user projects -->

                          <table class="data table table-striped no-margin">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Question No</th>
                                <th>Answer</th>
                                <th>Time</th>
                              </tr>
                            </thead>
                            <tbody>


                            <?php
							$sql = "SELECT * FROM surveyanslogs WHERE uid=$uid";
	$ref = $result->query($sql);
	$count=mysqli_num_rows($ref);
	$per=10;
	$pagecount=ceil($count/$per);
	$anpage=$_GET["anlog"];
	if ($anpage=="")
	{
		$anpage=1;
	}
	if ($anpage==1)
	{
		$offset=0;
	}
	else {
		$offset=($anpage-1)*$per;
	}
	$sql = "SELECT * FROM surveyanslogs WHERE uid=$uid LIMIT $offset,$per";
	$ref = $result->query($sql);
	$sino=$offset+1;

	while($row = mysqli_fetch_assoc($ref))
	{
		echo "<tr><td>".$sino."</td><td>".$row[qno]."</td><td>".$row[val]."</td><td>".$row[time]."</td></tr>";
		$sino++;
	}
	?></tbody>
                  </table>
				  <center>
	<div id="paging">
	<?php
	if($anpage>1)
	{
		?><a class="btn btn-default" href="profilesur.php?id=<?php echo $uid?>&anlog=<?php echo $anpage-1?>"><?php echo "Previous " ?></a> <?php
	}
	$adjacents=3;
	$start = ($anpage < $adjacents ? 1 : $anpage - $adjacents);
    $end = ($anpage > $pagecount - $adjacents ? $pagecount : $anpage + $adjacents);
     if($start==0)
	 {
		 $start=1;
	 }
	for ($i=$start;$i<=$end;$i++)
	{

		?><a class="btn btn-default" href="profilesur.php?id=<?php echo $uid?>&anlog=<?php echo $i?>"><?php echo $i." " ?></a> <?php
	}
	if($pagecount>$page)
	{
			?><a class="btn btn-default" href="profilesur.php?id=<?php echo $uid?>&anlog=<?php echo $anpage+1?>"><?php echo "Next " ?></a> <?php
	}
?>
</div> </center>
                          <!-- end user projects -->

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                      <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped">
                    <thead>
                      <tr>
						<th>State</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					if ($_SESSION["logintype"]==1)
					$sql = "SELECT * FROM selecusers WHERE fbuid=".$uid;
				else
					$sql = "SELECT * FROM selecusers WHERE uid=".$uid;
	$ref = $result->query($sql);
	$row = mysqli_fetch_assoc($ref);

		if($row[role]>0){$state="Active";}
		else {$state="Banned";}


	echo "<tr><td>".$state."</td></tr>";
					?>
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
                        </div>
                      </div>
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



  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>

  <script src="js/custom.js"></script>

  <!-- image cropping -->
  <script src="js/cropping/cropper.min.js"></script>
  <script src="js/cropping/main.js"></script>


  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>


</body>

</html>
