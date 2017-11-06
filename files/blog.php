
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Blog</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="header"><center>
<div class="welcome"><p>Welcome ALL !!</p></div>
</center>
	<nav>
  <ul class="top-menu">
    <li><a href="blog.php">Home</a><div class="menu-item" id="home"></div></li>
    <li><a href="admin.php">Admin</a><div class="menu-item" id="cataloge"></div></li>
    <li><a href="login.php">Login</a><div class="menu-item" id="price"></div></li>
    <li><a href="about.php">About</a><div class="menu-item" id="about"></div></li>
    <li><a href="contact.php">Contact</a><div class="menu-item" id="contact"></div></li>
		<li><a href="search.php">Search</a><div class="menu-item" id="search"></div></li>
  </ul>
	</nav>

</div>

<div class="container">

<div class="row">
		      <div class="col s12 m8 l8">


<?php
require('db.php');
session_start();
$sql = "SELECT blog_id,blog_title,blog_desc,blog_category,blog_author,blog_is_active,creation_date,Name,img FROM blog_master order by creation_date Desc";
$result = mysqli_query($connection, $sql);

if(! $result )
{
  die('Could not get data: ' . mysqli_error($connection));
}

?>
<?php
while($row = mysqli_fetch_assoc($result))
{
	if($row['blog_is_active']==1)
	{
		$a=$row['blog_id'];

	?>

   <div class="post-index z-depth-1">

<?php

		 echo
		 "<p style=\" font-size: 2em; text-align:center; margin:0px; \"><i><b>{$row['blog_title']}</i></b></p> ".
		 "<i><b>Author: </i></b><a href='blogger.php?id=".$row['blog_author']."'>{$row['blog_author']}</a><br>".
		 "<i><b>CATEGORY: </i></b>{$row['blog_category']}<br> ".
		 "<i><b>DESCRIPTION: </i></b>{$row['blog_desc']} <br>";
		 echo "<br> <br>";
		 $image_name=$row['Name'];
			$image_path=$row['img'];

			echo "&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<img src=../".$image_name."/".$image_path." height=200 width=60%  ><br>";

		 echo "<br>";
		 $like_count = "SELECT count(blog_id) as count_likes from likes where blog_id = ".$row['blog_id'];
		 $result_likes = mysqli_query($connection, $like_count);
		 $row_cnt = mysqli_fetch_assoc($result_likes);
		 echo ("Likes: " .$row_cnt['count_likes']);

		 $com_sql = "SELECT username as com_user, comment as com_desc FROM comments where blog_id = ".$a;
		 $com_result = mysqli_query($connection, $com_sql);
		 echo " <div style=\"padding:0px; margin:0px; background:#AAAAFF \"> ";
		 echo "<p style= \" font-size:1.5em; margin:0px;\">Comments: </p>";
		 while($com_row = mysqli_fetch_assoc($com_result))
		 {
			 echo "<hr>";
			 echo " &nbsp &nbsp &nbsp";
			 echo $com_row['com_desc'];
			 echo "<b><br> &nbsp &nbsp &nbspBy: ";
			 echo "".$com_row['com_user']."</b>";
			 echo "<br>";
		 }
		 echo "<hr>";
		 echo "<br></div>";
		 ?>
</div>
<?php

}
}
?>
	      </div>

<div class="menuone">

		      	<div class="menutwo">

		      		<div>
		      			<ul class="footermenu" > <!--style="padding-top:1px; margin-top:2px;">-->
						   <font color="white">Categories: </font><font color="#003">spaces</font>
					       <a href="entertainment.php" class="collection-item">Entertainment</a> |
					        <a href="politics.php" class="collection-item">Politics</a> |
					        <a href="books.php" class="collection-item">Books</a> |
					        <a href="economy.php" class="collection-item">Economy</a> |
					        <a href="science.php" class="collection-item">Science</a> |
					        <a href="maths.php" class="collection-item">Maths</a> |
							<a href="sports.php" class="collection-item">Sports</a> |

					      </ul>
		      		</div>
		      	</div>
		      </div>
		    </div>
        </div>


</div>
</body>
</html>
