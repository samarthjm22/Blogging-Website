<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="header"><center>
<div class="welcome"><p>Welcome <?php echo $_SESSION['username']; ?>!</p></div>
</center>
	<nav>
  <ul class="top-menu">
    <li><a href="index.php">Home</a><div class="menu-item" id="home"></div></li>
    <li><a href="write_new.php">Write New</a><div class="menu-item" id="cataloge"></div></li>
    <li><a href="logout.php">Logout</a><div class="menu-item" id="price"></div></li>
    <li><a href="about_login.php">About</a><div class="menu-item" id="about"></div></li>
    <li><a href="contact.php">Contact</a><div class="menu-item" id="contact"></div></li>
		<li><a href="search.php">Search</a><div class="menu-item" id="search"></div></li>
  </ul>
	</nav>

</div>

<div class="container">
<center>
<blockquote>
I am Samarth Modi. This Blogging Website has been developed by me. I am pursuing Computer Engineering from NIT-Surat.
</blockquote>
</center>
</div>

</body>
</html>
