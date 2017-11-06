<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Blogger Info</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="header"><center>
<div class="welcome"><p>Welcome <?php echo $_SESSION['username']; ?>!</p></div>
</center>
	<nav>
  <ul class="top-menu">
    <li><a href="adminpage.php">Home</a><div class="menu-item" id="home"></div></li>
    <li><a href="bloggerinfo.php">Blogger's Info</a><div class="menu-item" id="cataloge"></div></li>
    <li><a href="logout.php">Logout</a><div class="menu-item" id="price"></div></li>
    <!--<li><a href="about.php">About</a><div class="menu-item" id="about"></div></li>-->
    <!--<li><a href="contact.php">Contact</a><div class="menu-item" id="contact"></div></li>-->
  </ul>
	</nav>

</div>

<div class="container">

<div class="row">
		      <div class="col s12 m8 l8">


<?php
require('db.php');
$username=$_SESSION['username'];
$sql = "SELECT * FROM blogger_info";
$result =mysqli_query($connection, $sql);

if(! $result )
{
  die('Could not get data: ' . mysqli_error($connection));
}

?>
<?php
while($row =mysqli_fetch_assoc($result))
{
	if($row['blogger_is_active']=='active')
	{
		$a=$row['blogger_id'];
		?>

   <div class="post-index z-depth-1">

<?php


		 echo "<i><b>Name:</i></b>{$row['blogger_username']}<br><br>";
		 echo "<i><b>Last Updated:</i></b>{$row['blogger_updated_date']}<br><br>";
		 echo "<i><b>Last Blocked:</i></b>{$row['blogger_end_date']}<br><br>";
		 ?>
		 <form name="block" action="bloggerblock.php" enctype="multipart/form-data" method="post">
		 <input type="hidden" name="id" value="<?php echo $row['blogger_id'];?>">
		 </input><input type="submit" value="block" name="block"></input>
		 </form>

</div>
<?php

}

if($row['blogger_is_active']=='inactive')
	{
		$a=$row['blogger_id'];
		?>

   <div class="post-index z-depth-1">

<?php


		 echo "<i><b>Name:</i></b>{$row['blogger_username']}<br><br>";
		 echo "<i><b>Blocked on:</i></b>{$row['blogger_end_date']}<br><br>";
		 echo "<i><b>Last Blocked:</i></b>{$row['blogger_end_date']}<br><br>";
		 ?>
		 <form name="block" action="bloggerunblock.php" enctype="multipart/form-data" method="post">
		 <input type="hidden" name="id" value="<?php echo $row['blogger_id'];?>">
		 </input><input type="submit" value="unblock" name="unblock"></input>
		 </form>

</div>
<?php

}
}
?>
	      </div>


</body>
</html>
