
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

<div class="container"><center>
<form name = "get_user" action="blogger_profile.php" method="post" >
  <input style="margin-top:5%;" type="text" name="text_inp" autocomplete="username" >
  <input type="submit" >
</form>
</center>
</div>

</body>
</html>
