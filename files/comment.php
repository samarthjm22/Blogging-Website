<?php include("auth.php"); //include auth.php file on all secure pages ?>

<!DOCTYPE html>
<?php
 require('db.php');
 $username = $_SESSION['username'];
 $bid = $_POST['bid'];
 $sql = "SELECT * FROM blogger_info where blogger_username='$username'";
$result =mysqli_query($connection, $sql);

if(! $result )
{
  die('Could not get data: ' . mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($result))
{
	if($row['blogger_is_active']=='inactive')

	{
		header("location:cantwrite.php");
	}
	else
	{

	}
}

 ?>
<html>
<head>
<meta charset="utf-8">
<title>WriteNew</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>


<div class="header"><center>
<div class="welcome"><p>Write new <?php echo $_SESSION['username']; ?>!</p></div>
</center>
	<nav>
  <ul class="top-menu">
    <li><a href="index.php">Home</a><div class="menu-item" id="home"></div></li>
    <li><a href="dashboard.php">Dashboard</a><div class="menu-item" id="cataloge"></div></li>
    <li><a href="logout.php">Logout</a><div class="menu-item" id="price"></div></li>
    <li><a href="about.php">About</a><div class="menu-item" id="about"></div></li>
    <li><a href="contact.php">Contact</a><div class="menu-item" id="contact"></div></li>
  </ul>
	</nav>

</div>
<div class="container">
<div class="">
<div class="stitched1">
<center>
<div class="form">

<form name="write" action="comment_post.php" enctype="multipart/form-data" method="post">

Write your Comment :-
<textarea rows="13" cols="35" name="desc">

</textarea><br>

  <input type="hidden" name="bid" value="<?php echo $bid; ?>">

<input type="submit" value="POST" name="upload"></input>

</form>

</center>
</div>
</div>
</div>
</div>
</body>
</html>
