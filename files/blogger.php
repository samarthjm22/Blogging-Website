

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Blogger Info</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>


<div class="header"><center>
<div class="welcome"><p>Blogger's Detail </p></div>
</center>
	<nav>
  <ul class="top-menu">
    <li><a href="blog.php">Home</a><div class="menu-item" id="home"></div></li>
    <li><a href="admin.php">Admin</a><div class="menu-item" id="cataloge"></div></li>
    <li><a href="login.php">Login</a><div class="menu-item" id="price"></div></li>
    <li><a href="about.php">About</a><div class="menu-item" id="about"></div></li>
    <li><a href="contact.php">Contact</a><div class="menu-item" id="contact"></div></li>
  </ul>
	</nav>

</div>
<?php

 require('db.php');

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	//echo"$id";
	$res=mysqli_query($connection, "select * from blogger_info where blogger_username='$id'");
	if(!$res)
	{
		die(mysqli_error($connection));
	}
	//$row=mysqli_fetch_array($res);
	//echo $res;
	while($row=mysqli_fetch_assoc($res))
{ ?>
<div class="container">
<div class="">
<div class="stitched1">
<center>
<div class="form">

<p>Username: <?php echo $row['blogger_username'];?><br/>
	Email: <?php echo $row['blogger_email'];?><br/>
Creation Date: <?php echo $row['blogger_creation_date'];?></p>
<br>




<?Php
}
}?>
<?php


?>

</center>
</div>
</div>
</div>
</div>
</body>
</html>
