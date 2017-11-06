<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="header">

<center>
<div class="welcome"><p>Welcome <?php echo $_SESSION['username']; ?>!</p></div>
</center>
<nav>
  <ul class="top-menu">
    <li><a href=#>Home</a><div class="menu-item" id="home"></div></li>
    <li><a href="dashboard.php">Dashboard</a><div class="menu-item" id="cataloge"></div></li>
    <li><a href="logout.php">Logout</a><div class="menu-item" id="price"></div></li>
    <li><a href="about_login.php">About</a><div class="menu-item" id="about"></div></li>
    <li><a href="contact.php">Contact</a><div class="menu-item" id="contact"></div></li>
    <li><a href="search.php">Search</a><div class="menu-item" id="search"></div></li>
  </ul>
</nav>
</div>
<div class="container">

<div class="row">
		      <div class="col s12 m8 l8">

<?php
//echo $_SESSION['username'];
require('db.php');

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



  echo " <div class='post-index z-depth-1'>";



		 echo
     "<p style=\" font-size: 2em; text-align:center; margin:0px; \"><i><b>{$row['blog_title']}</i></b></p> ".
     "<i><b>Author: </i></b><a href='blogger.php?id=".$row['blog_author']."'>{$row['blog_author']}</a><br>".
     "<i><b>CATEGORY: </i></b>{$row['blog_category']} <br> ".
		 "<i><b>DESCRIPTION: </i></b>{$row['blog_desc']} <br>";
     //"<i><b>ID: </i></b>{$row['blog_id']} <br>";
		 echo "<br> <br>";
		 $image_name=$row['Name'];
			$image_path=$row['img'];


			echo "&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<img src=../".$image_name."/".$image_path." height=200 width=60%  ><br><br>";

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

      echo '<form name="like" action="like.php" method="post">
 		    <input type="hidden" name="id" value="'. $row['blog_id'].'">
        </input>';

        $trigger = "SELECT count(blog_id) as count_trigger from likes where blog_id = ".$row['blog_id']." and username = \"".$_SESSION['username']."\"";
        $result_trigger = mysqli_query($connection, $trigger);
        $tgr = mysqli_fetch_assoc($result_trigger);
        echo "<br>";
        if($tgr['count_trigger']){
              echo '&nbsp<button type="submit" value="like" name="like" disabled>Like</button>';
            }
        else
          {
              echo '&nbsp<button type="submit" value="like" name="like" >Like</button>';
          }
 		  echo '</form>';

     echo '<form name="comment" action="comment.php" method="post">
       <input type="hidden" name="bid" value="'. $row['blog_id'].'">
       </input>';
     echo '&nbsp<button type="submit" value="comment" name="comment" >Comment</button>';
     echo "<br><br>";
     echo '</form>';


echo"</div>";


}
}
?>
	      </div>
      </div>
    </div>


</body>
</html>
