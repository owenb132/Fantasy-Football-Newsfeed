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
include 'database.php';
include 'header.php';
$topic_id=$_GET['tid'];
$comment_id=$_GET['cid'];
$sq1="Select * from forum_comments where fid='$topic_id' and cid>='$comment_id'";
$sq3="Select * from forum_comments where fid='$topic_id' and cid>='$comment_id'";
$sq2="Select * from user_details";
$query1=mysql_query($sq1);
$query3=mysql_query($sq3);
$i=0;
$a=0;
$query2=mysql_query($sq2);
$uid=array();
$uname=array();
$uteam=array();
$i=0;
$a=0;
$b=0;
$h;
while($check=mysql_fetch_array($query1))
{
	$h=$check['cid'];
}
?>
<div class="container_24">
<div class="grid_5 alpha profile bordered">
		<img src="dp/<?php echo $uid; ?>.jpg" alt="profilepic here" height=100 width=100/><br /> 
		<?php //echo $fname; echo " $lname"; ?>
		<br />
		<a href=edit.php?uid=<?php echo $uid; ?>>edit profile</a><br />
		<a href=view.php?uid=<?php echo $uid; ?>>view your profile</a><br />
	</div>
<div class="grid_18 ">
<div class="grid_4">
<?php
while($check1=mysql_fetch_array($query2))
{
	$uid[$a]=$check1['uid'];
	$uname[$a]=$check1['fname'];
	//echo $uid[$i],"=",$uname[$i];
	$uteam[$a]=$check1['team'];
	$a++;
	
}
$jpg="JPG";
while($check=mysql_fetch_array($query3))
{
	$i++;
	$comm=$check['cid'];
?>
<?php	
	if($i<=10 && $check['cid']<=$h)
	{
		$filename=$check['uid'].".".$jpg;
		if(file_exists("dp/$filename"))
		{
			?><br><img src="dp/<?php echo $filename; ?>" height=75 width=70>
			<div class="grid_2 usrprofiledtls">
			<?php
		}
		while(true)
		{
			if($check['uid']==$uid[$b])
			{
				echo $uname[$b],"<br>";
				echo $uteam[$b],"<br>";
				echo "</div>";
				$b=0;
				break;
			}
			else
			{
				$b++;
				//break;
			}
		} ?>
		</div>
		<?php
		echo $check['comments'];
		echo "<br>";
	}
	else
	{
		?> <a href=forum.php?tid=<?php echo $topic_id?>&cid=<?php echo $comm?>> Next </a> <br><br><br><?php
		break;
	}
	
}
?> <br><a href=post_comment.php?tid=<?php echo $topic_id?>> Reply </a> <?php
?>

</body>
</html>