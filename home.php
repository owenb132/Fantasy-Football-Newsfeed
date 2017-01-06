<?php session_start();
if((isset($_COOKIE['email_site'])) && (isset($_COOKIE['password_site'])))
{
	$_SESSION['email']=$_COOKIE['email_site'];
	$_SESSION['uid']=$_COOKIE['uid_site'];
}
//echo $_SESSION['email'];
//echo $_SESSION['uid'];

include 'database.php';
$sq1="Select * from forum_id";
$sq2="Select * from user_details";
$query1=mysql_query($sq1);
$query2=mysql_query($sq2);
$uid=array();
$uname=array();
$i=0;
$a=0;

while($check1=mysql_fetch_array($query2))
{
	$uid[$i]=$check1['uid'];
	$uname[$i]=$check1['fname'];
	//echo $uid[$i],"=",$uname[$i];
	$i++;
}
	
while($check=mysql_fetch_array($query1))
{
	?><a href=forum.php?tid=<?php echo $check['fid']?>&cid=1><?php echo $check['forum_name']?> </a> -> by <?php 
	while(true)
	{
		if($check['uid']==$uid[$a])
		{
			echo $uname[$a],"<br>";
			break;
		}
		else
		{
			$a++;
		}
	}
}
?>
<a href=newsfeed.php>newsfeed</a>