<?php session_start();
include 'database.php';
if(isset($_POST['post']))
{
	echo "hi";
	$topic_id=$_GET['tid'];
	$comments1=$_POST['reply'];
	$userid=$_SESSION['uid'];
	$sq="INSERT INTO forum_comments (comments, fid, uid) VALUES ('$comments1', '$topic_id', '$userid')";
	if(!mysql_query($sq))
	{
		echo "yes";
	}
	header('Location:home.php');
}
?>