<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>

  <?php


  if(isset($_POST['submit'])){

  	$email = trim($_POST['email']);

    require_once "Mail.php";

    $from    = "futuresundarpichai@gmail.com";
    $to      = $email;
    $subject = "Email verfication";
    $body    = 'Enter the given link to verify your email address: http://localhost/blogfiles/files/registration.php?email='.$email.'';

  /* SMTP server name, port, user/passwd */
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

  ?>
<h1><div class="blur">Blog It</div></h1>
<div class="login">
<div class="stitched">
<center>
<div class="form">
<h3>Registration</h3>
<form name="registration" action="" method="post">
<input type="email" name="email" placeholder="Email" required />
<input type="submit" name="submit" value="Register" />
<p><a href='blog.php'>home</a></p>
</form>
</center>
</div>
</div>
</div>

</body>
</html>
