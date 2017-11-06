<?php include("auth.php"); //include auth.php file on all secure pages ?>
<?php
 require('db.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['upload']))
 {
 $username = $_SESSION['username'];
 $bid = $_POST['bid'];
 $desc = $_POST['desc'];
 $id = 0;

 $desc = stripslashes($desc);
 $desc = mysqli_real_escape_string($connection, $desc);


$insert_path="insert into comments(blog_id,username,comment) values('$bid','$username','$desc')";
$result = mysqli_query($connection, $insert_path);
if($result)
{

   header("location:index.php");
}

 }


?>
