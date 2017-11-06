<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>contact us</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
 require('db.php');
 // If form submitted, insert values into the database.
 if (isset($_POST['name'])){
 $name = $_POST['name'];
 $question = $_POST['question'];

 $name = stripslashes($name);
 $name = mysqli_real_escape_string($connection, $name);

 $question = stripslashes($question);
 $question = mysqli_real_escape_string($connection, $question);




 $query = "INSERT into `contact` (name,question) VALUES ('$name', '$question')";


 $result = mysqli_query($connection, $query);
 if($result){
 echo "<div class='form'><h3>Thank you for the information. The Administrator of this blog will contact you soon!</h3><br/>Click here to <a href='blog.php'>go to home</a></div>";

 }
 else{
	 echo "error";
	 echo "$question";
 }


 }else{
?>
<h1><div class="blur">Contact us</div></h1>
<div class="login">
<div class="stitched">
<center>
<div class="form">
<h3>Your Feedback</h3>
<form name="registration" action="" method="post">
Name:<input type="text" name="Name/Email" placeholder="name" required />
Email:<input type="text" name="question" placeholder="question" required />

<input type="submit" name="submit" value="enter" />
<p><a href='index.php'>Home</a></p>
</form>
</center>
</div>
</div>
</div>
<?php } ?>
</body>
</html>
