
<!doctype html> 
<!-- Feel free to edit the page according to your design. But be careful while editing the php code -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leaderboard</title>
	
</head>
<body>
	<div id="page">
		<div class="header">
			<!-- Add navigation here -->
		</div>
			
				 <div class="container tablestyle">
        
          <h1> Leaderboard</h1>
          
		
            <table>
            <tr><th>RANK</th><th>NAME</th><th>COLLEGE</th><th>SCORE</th></tr>
            
            <!-- start here-->
	<?php
	session_start();
	require_once("../database.php");
	global $result;
	$sql = "SELECT * FROM selecusers WHERE role!=-1 ORDER BY score DESC";
	$ref = $result->query($sql);
	$count=mysqli_num_rows($ref);
	$per=20;							//no of rows per page
	$pagecount=ceil($count/$per);       //gives total no of pages
	
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
	$sql = "SELECT name,score,college FROM selecusers WHERE role!=-1 ORDER BY score DESC, passtime ASC LIMIT $offset,$per";
	$ref = $result->query($sql);
	$rank=$offset+1;

	//check the classnames given to <tr> ,<a> and change them to your classnames.
  
	while($row = mysqli_fetch_assoc($ref))
	{	if($page==1){
		echo "<tr class=\"add classname here if any\" id=\"rank".$rank."\"><td>".$rank."</td><td>".$row["name"]."</td><td>".$row["college"]."</td><td>".$row["score"]."</td></tr>";
		$rank++;
		}
		else{
		echo "<tr class=\"add classname here if any\"><td>".$rank."</td><td>".$row["name"]."</td><td>".$row["college"]."</td><td>".$row["score"]."</td></tr>";
		$rank++;
		}
	} 
	?></table>
	<div id="paging">
<?php
	if($page>1)
	{	// if you are changing the filename, make sure you change it in these links too
		?><a class="" href="leaderboard.php?page=<?php echo $page-1?>"><?php echo "Previous " ?></a> <?php
	}
	$adjacents=2;  //no of links shown on right and left side of current question number
	$start = ($page < $adjacents ? 1 : $page - $adjacents);
    $end = ($page > $pagecount - $adjacents ? $pagecount : $page + $adjacents);
     if($start==0)
	 {
		 $start=1;
	 }
	for ($i=$start;$i<=$end;$i++)
	{        // if you are changing the filename, make sure you change it in these links too
		
		?><a class="" href="leaderboard.php?page=<?php echo $i?>"><?php echo $i." " ?></a> <?php
	}		
	if($pagecount>$page)
	{
			?><a class="" href="leaderboard.php?page=<?php echo $page+1?>"><?php echo "Next " ?></a> <?php
	}
?>

</div>
           <!-- end here-->
	  </div>
		
	</div>
</body>
</html>