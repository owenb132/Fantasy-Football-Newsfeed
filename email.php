<?php 
include 'database.php';

if(isset($_POST['signup']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$country=$_POST['country'];
$team=$_POST['favteam'];
$activation=0;
$sq4="SELECT * from login where email='$email'";
$q1=mysql_query($sq4);
$check=mysql_fetch_array($q1);
if($check['email'])
{
	echo "Already an account exists with this email";
}
else
{


$sq="INSERT INTO user_details (fname, lanme, country,team) VALUES ('$fname', '$lname', '$country','$team')";

$sq1="INSERT INTO login (email, password, activation) VALUES ('$email', '$password', '$activation')";

mysql_query($sq);
mysql_query($sq1);
$sq2="Select * from login where email='$email'";
$query=mysql_query($sq2);
$check=mysql_fetch_array($query);
$uid=$check['uid'];
echo $uid;


if(isset($_FILES['ph']) && is_uploaded_file($_FILES['ph']['tmp_name']) && $_FILES['ph']['error']==UPLOAD_ERR_OK)
	{
		
		//foreach($_FILES['ph'] as $key=>$value)
		//{
			//echo "$key:$value <br>";
		//}
		
		$ext=end(explode(".",$_FILES['ph']['name']));
		$filename=$uid.".".$ext;
		
		move_uploaded_file($_FILES['ph']['tmp_name'],"dp/" .$filename);
		
		
	}
else
{
	echo "not";
}
	
require 'class.phpmailer.php';
$mail = new PHPMailer();
//$mail->PluginDir = './PHPMailer'; // relative path to the folder where PHPMailer's files are located
$mail->IsSMTP();
$mail->Port = 465;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->Mailer = 'smtp';
$mail->SMTPSecure = 'ssl';

$mail->SMTPAuth = true;
$mail->Username = "purvilthemaster@gmail.com";
$mail->Password = "xxxxxxxx";

$mail->SingleTo = true; // if you want to send mail to the users individually so that no recipients can see that who has got the same email.

$mail->From = "purvilthemaster@gmail.com";
$mail->FromName = "Purvil";

//$mail->addAddress("yugmapublicity@gmail.com","User 1");
$mail->addAddress($email,"User 2");

//$mail->addCC("user.3@ymail.com","User 3");
//$mail->addBCC("user.4@in.com","User 4");


$mail->Subject = "Registration";
$mail->Body = "<a href=\"localhost/project/registered.php?email=$email\"> Click here </a><br>";
//$mail->Body = "<a href=\"http://localhost/project/registered.php?bn=$h3;\"> Click here </a><br>";

if(!$mail->Send())
    echo "Message was not sent <br />PHP Mailer Error: " . $mail->ErrorInfo;
else
    echo "An email has been sent. Please check your inbox.";
}
}

?>
<a href="project/homepage/login.php">Login</a>
