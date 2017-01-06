<?php session_start();
if((isset($_COOKIE['email_site'])) && (isset($_COOKIE['password_site'])))
{
	$_SESSION['email']=$_COOKIE['email_site'];
	$_SESSION['uid']=$_COOKIE['uid_site'];
	header('Location:home.php');
}
?>




<html>
<head>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/960.css">
<title>
welcome to the world of football
</title>
</head>
<style>
#as{background-color:#9999AB; 
	padding: 20px;
	opacity:.7;
	color:white;
	}
#ass{background-color:#081116; 
	padding: 20px;
	opacity:.7;
	color:white;
	}
#arg{
	margin-right:10px;
	}
#mar{
	 margin-left:0px;
	 margin-top:-5px;
	}

h1{font-size:50; text-align:center; color:white;}	
.bordered{border:1px solid white; margin-top:125px;}
 body{
	background-image:url('test.jpg');
	background-repeat:no-repeat;
	background-position:center;
	  }
  </style>
<body bgcolor="black">

<div class="container_12">
<div class="grid_12" id="ass">
<h1> World Of Football</h1>
</div>
<div class="clear"></div>
<div class="grid_3 push_8 bordered" id="as">
	<div class="grid_1 alpha" id="arg">
	E-mail: <br>
	Password: </div>
		<div class="grid_2 omega" id="mar"> 
		<form name="form1" method="post" action="intermediate.php"> 
	<input type="text" name="email" ><br>
	<input type="password" name="pword">
	<div class="clear">
	</div>
	
	</div>
	<input type="checkbox" name="cb"> Remember My Password<br>
	<div class="grid_1" id="sub">
	<input type="submit" name="submit" value="log-in">
	<a href="signup.html"> Signup </a>
	</div>
</div>
</body>
</html>