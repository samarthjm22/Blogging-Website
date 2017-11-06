<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback</title>
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
  <!--  <li><a href="contact.php">Contact</a><div class="menu-item" id="contact"></div></li> -->
  </ul>
	</nav>

</div>

<div class="container">

<div class="row">
		      <div class="col s12 m8 l8">


<?php
require('db.php');
$username=$_SESSION['username'];
$sql = "SELECT * FROM contact";
$result =mysqli_query($connection, $sql);

if(! $result )
{
  die('Could not get data: ' . mysqli_error($connection));
}

?>
<?php
while($row =mysqli_fetch_assoc($result))
{
	if(1)
	{
		//$a=$row['blogger_id'];
		?>

   <div class="post-index z-depth-1">

<?php


		 echo "<i><b>Name:</i></b>{$row['name']}<br><br>";
		 echo "<i><b>Question:</i></b>{$row['question']}<br><br>";
		 ?>


</div>
<?php

}

if(0)
	{

		?>

   <div class="post-index z-depth-1">

<?php


		 //echo "<i><b>Name:</i></b>{$row['blogger_username']}<br><br>";
		// echo "<i><b>Blocked on:</i></b>{$row['blogger_end_date']}<br><br>";
		 ?>


</div>
<?php

}
}
?>
	      </div>


</body>
</html>
