<?php
session_start();
require_once "pdo.php";
if(isset($_POST['cancel'])){
  header('Location:ChatRoomHomePage.php');
  return;
}


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])&& isset($_POST['pass2']) )
{
    if ( strlen($_POST['name']) < 1 ||strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1 )
    {

        $_SESSION['error']="Name,Email and Password are required";
    }
    else
    {   $name= htmlentities($_POST['name']);
        $pass = htmlentities($_POST['pass']);
        $email = htmlentities($_POST['email']);

        if ((strpos($email, '@') === false))
        {
            $_SESSION['error']= "Email must have an at-sign (@)";
        }

    if ($_POST['pass']!=$_POST['pass2']) {
             $_SESSION['error']="Passwords do not match.";
          }
        }
        if(isset($_SESSION["error"])){
          header("Location:signup.php");
          return;
        }
        elseif (!isset($_SESSION["error"])) {
          $sql = "INSERT INTO users (name, email, password)
                    VALUES (:name, :email, :password)";
          echo("<pre>\n".$sql."\n</pre>\n");
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
              ':name' => $name,
              ':email' => $email,
              ':password' => $pass));
          header("Location:login.php");
          return;
        }
    }


?>
<!DOCTYPE html>
<html>
    <head>
      <style>
body {
  background-image: url('https://www.msta.org/wp-content/uploads/2017/10/watercolor-background.jpg');
  background-attachment: fixed;
 background-size: cover;
}
div {
  border: 1px solid gray;
  padding: 8px;
}

h1 {
  text-align: center;
  text-transform: uppercase;
  color: Black;
  font-family:lato;
}

p {
  text-indent: 50px;
  text-align: justify;
  letter-spacing: 3px;
}

a {
  text-decoration:none;
  color:Black;
  font-weight:bold;
  font-size:27px;
}
</style>
      <script>
function validateForm() {
  var x = document.forms["myForm"]["name"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>
        <title>CHAT APP</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body >
      <div style="background-color:yellow;" class='header'>
	  <a href="ChatRoomHomePage.php"> Home </a>
		<a href="login.php"> Login </a>
      	<h1>
      		Chat Room
      	</h1>
      </div>
        <div class="container">
            <h1>Please SIGN UP If New User</h1>
                <?php

                    if ( isset($_SESSION["error"]) ) {
                        echo('<p style="color:red">'.$_SESSION["error"]."</p>\n");
                        unset($_SESSION["error"]);
                    }
                ?>
  <form name="myForm" onsubmit="return validateForm()" method="post" class="form-horizontal">
              <div class="form-group">
                  <label class="control-label col-sm-2" for="name">Name:</label>
                  <div class="col-sm-3">
                      <input class="form-control" type="text" name="name" id="name">
                  </div>
              </div>
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
                    <label class="control-label col-sm-2" for="pass">Confirm Password:</label>
                    <div class="col-sm-3">
                        <input class="form-control" type="password" name="pass2" id="pass2">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-2">
                        <input class="btn btn-primary" type="submit" value="Sign UP">
                        <input class="btn" type="submit" name="cancel" value="Cancel">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
