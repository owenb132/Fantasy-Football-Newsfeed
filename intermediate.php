<?php  session_start();
echo "hi";
if(isset($_POST['submit']))
{
	
	include 'database.php';
	$email1=$_POST['email'];
	$password1=$_POST['pword'];
	$sq="SELECT * from login where email='$email1'";
	//echo $_POST['checkbox'];
	

	$query=mysql_query($sq);
	$login=mysql_fetch_array($query);
	$hour=time()+60;
	$uid1=$login['uid'];
	echo $uid1;
	
	
	if($password1==$login['password'])
	{	
		if($login['activation']==1)
		{	
			if(isset($_POST['cb']))
			{
				setcookie('email_site',$email1,$hour);
				setcookie('password_site',$password1,$hour);
				setcookie('uid_site',$uid1,$hour);
				//echo $_COOKIE['email_site'];
				header('Location:homepagenew.php');
				echo "cookie set";
				
			}
			else
			{
				if(isset($_SESSION['email']) && isset($_SESSION['password']))
				{
					
					echo "hi you are already logged in";
					header('Location:homepagenew.php');
				
				}
		
				else
				{
					$_SESSION['email']=$login['email'];
					$_SESSION['password']=$login['password'];
					$_SESSION['uid']=$uid1;
					header('Location:homepagenew.php');
					echo "welcome<br><br>";
				}
			}
			
		}
		else
		{
			echo "you have not yet activated your account, go to your inbox and register from the link given.";
		}
	}
	else
	{
		echo "wrong username or password";
	}
}
			
	?>