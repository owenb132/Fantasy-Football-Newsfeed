<html>
<head>
<title>
view forum
</title>
<link rel="stylesheet" type="text/css" href="css/960.css">
<link rel="stylesheet" type="text/css" href="css/gen.css">
<link rel="stylesheet" type="text/css" href="css/960_24_col">
</head>
<body>
<?php session_start();
/*if((isset($_COOKIE['email_site'])) && (isset($_COOKIE['password_site'])))
{
	$_SESSION['email']=$_COOKIE['email_site'];
	$_SESSION['uid']=$_COOKIE['uid_site'];
}
$uid=$_SESSION['uid'];
$sq1='Select * from user_details where uid=\'$uid\'';
$query1=mysql_query($sq1);
while($check1=mysql_fetch_array($query1))
{
	$fname=$check1['fname'];
	$lname=$check1['lname'];
	$team=$check1['team'];
	$uid=$check1['uid'];
}*/

include 'database.php';
include 'header.php';
$topic_id=$_GET['tid'];
$comment_id=$_GET['cid'];

$sq1="Select * from forum_comments where fid='$topic_id' and cid>='$comment_id'";
$sq3="Select * from forum_comments where fid='$topic_id' and cid>='$comment_id'";
$sq2="Select * from user_details";
$query1=mysql_query($sq1);
$query2=mysql_query($sq2);
$query3=mysql_query($sq3);
$i=0;
$a=0;
$uid=array();
$uname=array();
$uteam=array();
$i=0;
$a=0;
$b=0;
$h=0;
$cont=0;
$fname='kkr';
$lname='adfs';
$suid=4;
while($check=mysql_fetch_array($query1))
{
	$h+=1;
}
echo $h;
?>
<div class="container_24">
<div class="grid_5 alpha bordered">
<img src="dp/<?php echo $suid; ?>.jpg" alt="profilepic here" height=100 width=100/><br /> 
		<?php echo $fname; echo " $lname"; ?>
		<br />
		<a href=edit.php?uid=<?php echo $uid; ?>>edit profile</a><br />
		<a href=view.php?uid=<?php echo $uid; ?>>view your profile</a><br />
	</div>
<div class="grid_19 omega">
	<div class="grid_4">
		<div class="grid_2 alpha">
			<?php
				while($check1=mysql_fetch_array($query2))	
				{
					echo $check1['uid'];
					$uid[$a]=$check1['uid'];
					$uname[$a]=$check1['fname'];
					$uteam[$a]=$check1['team'];
					$a++;
					echo "<br />";
				}
				$jpg="JPG";
				while($check=mysql_fetch_array($query3))
				{
				  $i++;
				  $comm=$check['cid'];
				
				
				if($i<=10 && $cont<$h)
				{
					$cont++;
					$filename=$check['uid'].".".$jpg;
					if(file_exists("dp/$filename"))
					{
					?>
						<br><img src="dp/<?php echo $filename; ?>" height="75" width="70" alt="profile pic here">
						<div class="grid_2">
				<?php
					}
			
				?>	
				</div>
			<div class="grid_2 push_2 omega">
				<?php 
				if($check['uid']==$uid[$b])
				{
					echo $uname[$b],"<br>";
					echo $uteam[$b],"<br>";
					$b=0;
					break;
				}
				else
				{
					$b++;
					//break;
				}
				?>
				</div>
			</div>
				<!--<div class="grid_14 push_4">
					<?php
						echo $check['comments'];
						echo "<br>";

					?>
				</div>-->
				<?php
				}	
			}
	//while ends here
	?>
</div>
</div>
</body>
</html>