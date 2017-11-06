<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>


<div class="header"><center>
<div class="welcome"><p>Update <?php echo $_SESSION['username']; ?>!</p></div>
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
<?php

 require('db.php');

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	//echo"$id";
	$res=mysqli_query($connection, "select * from blog_master where blog_id='$id'");
	if(!$res)
	{
		die(mysqli_error());
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
<form name="write" action="edit.php" enctype="multipart/form-data" method="post">

Title:<input type="text" rows="1" cols="40"name="ntitle" value="<?php echo $row['blog_title'];?>"></input>
<br>

 <label>Category :</label>
    <select class="browser-default" name="ncate">
      <option value="<?php echo $row['blog_category'];?>" ><?php echo $row['blog_category'];?></option>
      <option value="Entertainment">Entertainment</option>
	  <option value="Science">Science</option>
	  <option value="Maths">Maths</option>
	  <option value="Sports">Sports</option>
	  <option value="Politics">Politics</option>
	 <option value="Economy">Economy</option>
	<option value="Books">Books</option>
    </select>


<br/>- - - - - - - - -- - - - - -</br>Write your thoughts :-
<textarea rows="13" cols="35" name="ndesc"><?php echo $row['blog_desc'];?>

</textarea><br>

 <input name="nimage" type="file" id="nimage"></input>

<br>
<input type="submit" value="Update" name="update"></input>
<input type="hidden" name="id" value="<?php echo $row['blog_id'];?>"></input>
</form>
<?Php
}
}?>
<?php
if(isset($_POST['update']))
{   $folder="myimages";
	$image=mysqli_real_escape_string($connection, $_FILES['nimage']['name']);
	$username=$_SESSION['username'];
	$creation_date = date("Y-m-d H:i:s");
	$updateqry="update blog_master set blog_title='$_POST[ntitle]',blog_desc='$_POST[ndesc]',blog_category='$_POST[ncate]',Name='$folder',img='$image',update_date='$creation_date' where blog_id='$_POST[id]'" ;
	$update="update blogger_info set blog_updated_date='$creation_date' where blogger_username='$username'";
	$result=mysqli_query($connection, $updateqry);
	if($result)
	{
		header("location:dashboard.php");
	}
	else{echo $result;
	 echo "mistake";
	}

}

?>

</center>
</div>
</div>
</div>
</div>
</body>
</html>
