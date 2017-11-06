<?php include("auth.php"); //include auth.php file on all secure pages ?>
<?php
 require('db.php');
 // If form submitted, insert values into the database.

 if (isset($_POST['unblock']))
 {
   date_default_timezone_set('Asia/Kolkata');
	 $id=$_POST['id'];
	 $creation_date = date("Y-m-d H:i:s");
	 $blockqry="update blogger_info set blogger_is_active='active',blogger_updated_date='$creation_date' where blogger_id='$id'";
	 $result=mysqli_query($connection, $blockqry);
	 if($result)
	 {

		header("location:bloggerinfo.php");
	 }
	 else{

	 }
 }
 ?>
