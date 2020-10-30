<?php


?>

<html>
<head>
	<link rel="stylesheet" href="homepage.css">
	<title> Chat Room </title>
	<style type="text/css">
	body{
		background-image:url('5.jpg');
		background-repeat:no-repeat;
		background-size:100% 100%;
		margin:0;
	}
	.navbar{
		font-family:lato;
		width:100%;
		background-color:#191970;
		overflow:auto;
	}
	.navbar a{
			font-family:lato;
			float:left;
			padding:12px;
			color:#FF4500;
			text-decoration:none;
			font-size:27px;
	}
	h1{
		color:Black;
		font-size:50px;
		margin-top:1%;
		padding-left:40%;
		font-family:lato;
	}
	.footer{
		text-align:center;
		position:fixed;
		left:0;
		bottom:0;
		width:100%;
		font-size:23px;
		font-weight:bold;
		background-color:green;
		color:black;
	}
	.footer a{ color:white;
	}

	img {
  height: 100px;
  width: 20%;
}
	.your-centered-div{
    position: absolute;
    margin: auto;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
}

        a:link{
           text-decoration:none;
          }	   <!-- underline/none -->
    a:visited{color:lightYellow;
	         }
    a:hover{background-color:gold;
	        color:white;
			text-decoration:none;
			font-weight:bold;
			}
	a:active{background-color:orange;
            }
	</style>
<body>
	<div class="navbar">
		<a href="ChatRoomHomePage.php"> Home </a>
		<a href="signup.php"> Signup </a>
		<a href="login.php"> Login </a>
	</div>

<div class="para">
	<p>
		<img src="4.png" alt=" Join Chat Room ">
	</p>
</div>
	<iframe class="your-centered-div" width="560" height="315" src="https://www.youtube.com/embed/4CJxMV-P5sc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   <div class="footer">
    <p>
		 Thank You for Visiting.<br>
		 <a href="mailto:shubham066sharma@gmail.com"> Click here to Contact Us  </a>

    </p>
	</div>

</body>
</html>
