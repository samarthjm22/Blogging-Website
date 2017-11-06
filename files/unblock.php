<?php include("auth.php"); //include auth.php file on all secure pages ?>
<?php
 require('db.php');
 // If form submitted, insert values into the database.

 if (isset($_POST['unblock']))
 {

	 $id=$_POST['id'];
	 $blockqry="update blog_master set blog_is_active='1' where blog_id='$id'";
	 $result=mysqli_query($connection, $blockqry);
	if($result)
	{

		header("location:adminpage.php");
	}
	else{

	}
 }
 ?>
