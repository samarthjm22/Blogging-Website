<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>AdminLogin</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
 require('db.php');
 session_start();
 session_unset();
 // If form submitted, insert values into the database.
 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysqli_real_escape_string($connection, $username);
 $password = stripslashes($password);
 $password = mysqli_real_escape_string($connection, $password);
 $_SESSION['Error'] = NULL;
 //Checking if user existing in the database or not
 $query = "SELECT * FROM `admin` WHERE username='$username' and password='$password'";
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 $rows = mysqli_num_rows($result);
 if($rows==1){
 $_SESSION['username'] = $username;
 header("Location: adminpage.php"); // Redirect user to index.php
 }else{

	 $_SESSION['Error'] = "Incorrect username/password.";
	 header("Location: admin.php");
 }
 }else{
?>
<h1><div class="blur">Admin</div></h1>
<div class="login">
<div class="stitched">
<center>
<div class="form">
<h3>Secure Login</h3>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
<p><a href='blog.php'>home</a></p>
</form>

</div>
</center>
</div>
</div>
<?php
if( isset($_SESSION['Error']) )
{
        echo"<script type='text/javascript'>alert('Incorrect password/Username');</script>";
		unset($_SESSION['Error']);

}
} ?>
</body>
</html>
