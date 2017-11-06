<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
 require('db.php');

 session_start();
 //session_unset();

 if (isset($_POST['username'])){
 $username = $_POST['username'];
 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysqli_real_escape_string($connection, $username);
 $password = stripslashes($password);
 $password = mysqli_real_escape_string($connection, $password);
 $_SESSION['Error'] = NULL;

 $query = "SELECT * FROM `blogger_info` WHERE blogger_username='$username' and blogger_password='$password'";
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 $rows = mysqli_num_rows($result);
 if($rows==1){
 $_SESSION['username'] = $username;
 header("Location: index.php");
 }else{
	 //echo"mistake";
	 //echo"<script type='text/javascript'>alert('Incorrect Password/Username');</script>";
	 $_SESSION['Error'] = "Incorrect username/password.";
	 header("Location: login.php");
 }
 }else{
?>
<h1><div class="blur">Blog It</div></h1>
<div class="login">
<div class="stitched">
<center>
<div class="form">
<h3>Log In</h3>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <br/><a href='registration.php'>Register Here</a></p>

<p><a href='blog.php'>Home</a></p>
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
