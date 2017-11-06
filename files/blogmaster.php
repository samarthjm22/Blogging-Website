<?php include("auth.php"); //include auth.php file on all secure pages ?>
<?php
 require('db.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['upload']))
 {
 $title = $_POST['title'];
 $username = $_SESSION['username'];
 $category = $_POST['cate'];
 $desc = $_POST['desc'];
 $id = 0;
 $title = stripslashes($title);
 $title = mysqli_real_escape_string($connection, $title);
 $category = stripslashes($category);
 $category = mysqli_real_escape_string($connection, $category);
 $desc = stripslashes($desc);
 $desc = mysqli_real_escape_string($connection, $desc);
 date_default_timezone_set('Asia/Kolkata');
 $creation_date = date("Y-m-d H:i:s");
 $query = "SELECT blogger_id FROM `blogger_info` WHERE blogger_username='$username' ";
 $result = mysqli_query($connection, $query) or die(mysql_error($connection));
 $rows = mysqli_num_rows($result);

 $res=mysqli_query($connection, "SELECT blogger_id FROM `blogger_info` WHERE blogger_username='$username'");
 $upload_image=addslashes($_FILES["imageupload"][ "name" ]);
 /*image*/
 $row=mysqli_fetch_assoc($res);
 while ($row = mysqli_fetch_assoc($res))
					{
					$id = $row['blogger_id'];

					}
 //$id=$row['blog_id'];
 if($upload_image=='')
			{
				echo "<script>alert('Please Select an Image')</script>";
				exit();
			}
			else{
				$folder="myimages";
				move_uploaded_file(addslashes($_FILES["imageupload"]["tmp_name"]), "$folder".addslashes($_FILES["imageupload"]["name"]));
				$insert_path="insert into blog_master(blog_title,blogger_id,blog_desc,blog_category,blog_author,blog_is_active,creation_date,update_date,Name,img) values('$title','$id','$desc','$category','$username','1','$creation_date','$creation_date','$folder','$upload_image')";
			  $result = mysqli_query($connection, $insert_path);

		if($result){ header("Location: dashboard.php"); }
 else{

	 echo $result;
	 echo "mistake";
 }

			}


  }


?>
