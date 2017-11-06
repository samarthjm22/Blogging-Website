<?php include("auth.php"); //include auth.php file on all secure pages ?>
<?php
 require('db.php');
 // If form submitted, insert values into the database.

 if (isset($_POST['like']))
 {

	 $id=$_POST['id'];
   $user = $_SESSION['username'];
   echo $id;
   echo $user;
	 $likeqry = "Insert into likes(blog_id,username) values('$id','$user')";
	 $result = mysqli_query($connection, $likeqry);
   echo $likeqry;
   echo $result;
	if($result)
	{

		 header("location:index.php");
	}
	else{
    //header("location:index.php");
	}
 }

 ?>
