<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
 require('db.php');

 if (isset($_POST['username'])){
 $username = $_POST['username'];

 $password = $_POST['password'];
 $username = stripslashes($username);
 $username = mysqli_real_escape_string($connection, $username);

 $password = stripslashes($password);
 $password = mysqli_real_escape_string($connection, $password);
 date_default_timezone_set('Asia/Kolkata');
 $trn_date = date("Y-m-d H:i:s");

 $email = $_POST['email'];
 $email = stripslashes($email);
 $email = mysqli_real_escape_string($connection, $email);

 $hash = md5( rand(0,1000) );
 $pass = md5(rand(1000,5000));

 $query = "SELECT * FROM `blogger_info` WHERE blogger_username='$username' ";
 $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
 $rows = mysqli_num_rows($result);
 if($rows>=1){
 echo "<h2><div style='margin-left : 30%; margin-top : 10%;'>Username not available.Try adding numbers.<br> Already registered?Click here to <a href='login.php'>Login</a></div> </h2>";

 }
 else{
 $query = "INSERT into `blogger_info` (blogger_username, blogger_password, hash, pass, blogger_email, blogger_creation_date) VALUES ('$username', '$password','$hash','$pass','$email','$trn_date')";

 $result = mysqli_query($connection, $query);
 if($result){


   if(0){
   $email = trim($_POST['email']);

   require_once "Mail.php";

   $from    = "futuresundarpichai@gmail.com";
   $to      = $email;
   $subject = "Email verfication";
   $body    = 'Enter the given link to verify your email address: http://localhost/blogfiles/files/registration.php?email='.$email.'';


   $smtpinfo["host"] = "ssl://smtp.gmail.com";
   $smtpinfo["port"] = "465";
   $smtpinfo["auth"] = true;
   $smtpinfo["username"] = "futuresundarpichai@gmail.com";
   $smtpinfo["password"] = "futuresundarpichai123";

   $headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
   $smtp = &Mail::factory('smtp', $smtpinfo );

   $mail = $smtp->send($to, $headers, $body);

   if (PEAR::isError($mail)) {
     echo("<p>" . $mail->getMessage() . "</p>");
   } else {
     echo("<p>Message successfully sent!</p>");
   }
    // $header = "From:themysticmindhunter@gmail.com \r\n";
    // $message = '<p>Click the below link to verify your email address.<p><a href="localhost/software-blog/login/signup.php?verified=true&email='.$email.'&password='.$password.'&username='.$username.'>';
    // mail($email, 'Verify your email',$message,$header);
 }







 echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
 //echo $result;
 }
 else{
   echo "<div class='form'><h3> Registered Unsuccessfully.</h3><br/>Click here to go back to<a href='blog.php'>Home</a></div>";
 }

 }

 }else{
?>
<h1><div class="blur">Blog It</div></h1>
<div class="login">
<div class="stitched">
<center>
<div class="form">
<h3>Registration</h3>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />

<input type="password" name="password" placeholder="Password" required />
<input type="email" name="email" value="<?php if(isset($_GET["email"])) $_GET["email"] ?>" placeholder="Email" required />
<input type="submit" name="submit" value="Register" />
<p><a href='blog.php'>home</a></p>
</form>
</center>
</div>
</div>
</div>
<?php } ?>
</body>
</html>
