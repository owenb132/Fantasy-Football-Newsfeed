<?php session_start();
//header("Content-type: text/css");
include 'newsfeedfunction.php';
include 'database.php';
include 'header.php';

if((isset($_COOKIE['email_site'])) && (isset($_COOKIE['password_site'])))
{
	$_SESSION['email']=$_COOKIE['email_site'];
	$_SESSION['uid']=$_COOKIE['uid_site'];
}
$uid=$_SESSION['uid'];
$sq1="Select * from user_details where uid='$uid'";
$query1=mysql_query($sq1);
while($check1=mysql_fetch_array($query1))
{
	$fname=$check1['fname'];
	$lname=$check1['lname'];
	$team=$check1['team'];
	$uid=$check1['uid'];
}

?>

<html>
<head>
<title>
home-page
</title>
</head>
<body bgcolor="white">
<div class="clear">
</div>
<div class="container_24">
	<div class="profile bordered">
		<img src="dp/<?php echo $uid; ?>.jpg" alt="profilepic here" height=100 width=100/><br /> 
		<?php echo $fname; echo " $lname"; ?>
		<br />
		<a href=edit.php?uid=<?php echo $uid; ?>>edit profile</a><br />
		<a href=view.php?uid=<?php echo $uid; ?>>view your profile</a><br />
	</div>
	<div class="grid_10 newsfeed" style="overflow:scroll; height:1000px;">
	
		<?php
		getFeed("http://www.FOXSPORTSASIA.com/football-rss");
		getFeed("http://feeds.news.com.au/public/rss/2.0/fs_football_20.xml");
		getFeed("http://www.skysports.com/rss/0,20514,11095,00.xml");
		getFeed("http://feeds.bbci.co.uk/sport/0/football/rss.xml?edition=uk");
		?>
	
	</div>
	Your Favorite Team's News!
	
	<div id="personalized" style="overflow:scroll; height:200px;">
	<marquee  behavior="scroll" direction="up">
	<?php
		getFeed("http://www.chelseafc.com/rss/ptv/page/CustomArticleIndex/0,,10268~2244975,00.xml");
	?>
	</marquee>
	
	</div>
	
	<div id="bg">
 <img src="teams/<?php echo $team; ?>.jpg">
</div>

	
	
	
</div>
</body>
</html>



