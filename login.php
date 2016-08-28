<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Quizzr | Login </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>


</head>

<body style="background:#F7F7F7;">

  <div class="">
    

    <div id="wrapper">
      <div id="login" class="form">
        <section class="login_content">
          <form action="checklogin.php" method="post">
            <h1>Admin Login</h1>
            <div>
              <input type="text" class="form-control" name="uname" placeholder="Username" required />
			  <span><?php if($_GET[wu])echo "<h4>Incorrect Username</h4>" ?><span>
            </div>
            <div>
              <input type="password" class="form-control" name="pass" placeholder="Password" required  />
			  <span><?php if($_GET[wp])echo "<h4>Incorrect Password</h4>" ?><span>
            </div>
            <div>
              <button class="btn btn-default submit" type="submit" >Log in</button>
              
            </div>
            <div class="clearfix"></d
              <br />
              <div>
                <h1><i class="fa fa-graduation-cap" style="font-size: 26px;"></i> Quizzr</h1>
                <p>©2016 All Rights Reserved.<br>Quizzr Online quiz managenent</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    
    </div>
  </div>

</body>

</html>
