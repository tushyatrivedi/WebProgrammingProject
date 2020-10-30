<?php
session_start();
require_once "pdo.php";
if ( isset($_POST['logout'] ) ) {
    header("Location:login.php");
    return;
}

if ( isset($_POST['email']) && isset($_POST['pass']) )
{
    if ( strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 )
    {

        $_SESSION['error']="Email and password are required";
    }
    else
    {
        $pass = htmlentities($_POST['pass']);
        $email = htmlentities($_POST['email']);

        if ((strpos($email, '@') === false))
        {

            $_SESSION['error']= "Email must have an at-sign (@)";
        }
        else
        {

					$sql = "SELECT name FROM users
							WHERE email = :em AND password = :pw";
							$pass = htmlentities($_POST['pass']);
							$email = htmlentities($_POST['email']);
					$stmt = $pdo->prepare($sql);
					$stmt->execute(array(
							':em' =>	$email ,
							':pw' => $pass));
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['name']=$row;
					var_dump($row);
				 if ( $row === FALSE ) {
					 $_SESSION['error']= "Incorrect password";
				 } else {
					 header("Location: index.php");
					 return;
				 }

        }
    }
    if(isset($_SESSION["error"])){
      header("Location: login.php");
      return;
    }
}

// Fall through into the View
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CHAT APP</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
body  {
  background-image: url("https://venngage-wordpress.s3.amazonaws.com/uploads/2018/09/Colorful-Geometric-Simple-Background-Image.jpg");
  background-color: #cccccc;

}
div {
  border: 1px solid gray;
  padding: 8px;
}

h1 {
  text-align: center;
  text-transform: uppercase;
  color: #4CAF50;
}

p {
  text-indent: 50px;
  text-align: justify;
  letter-spacing: 3px;
}

a {
  text-decoration: none;
  color: #008CBA;
}
</style>
    </head>
    <body>
      <div style="background-color:orange;" class='header'>
      	<h1>
      		Chat Room
      	</h1>
      </div>
        <div class="container">
            <h1>Please Log In</h1>
                <?php

                    if ( isset($_SESSION["error"]) ) {
                        echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
                        unset($_SESSION["error"]);
                    }
                ?>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="text" name="email" id="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pass">Password:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="password" name="pass" id="pass">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-2">
                        <input class="btn btn-primary" type="submit" value="Log In">
                        <input class="btn" type="submit" name="logout" value="Clear">
                    </div>
                </div>
            </form>
        </div>
				<footer>
  <p>Author:TUSHYA TRIVEDI AND SHUBHAM SHARMA</p>
  <p><a href="mailto:ttushya@gmail.com">ttushya@gmail.com</a></p>
</footer>
    </body>
</html>
