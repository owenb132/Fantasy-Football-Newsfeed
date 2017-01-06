<?php 
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="forum_comments"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get data that sent from form 
$userid=$_POST['userid'];
$comment=$_POST['comment'];
$fid=$_POST['fid'];
$query="select * from $tbl_name";
$re=mysql_query($query);
$cid=$_POST['cid'];
$h=0;
while($row=mysql_fetch_array($re))
{
	$h+=1;
}
$h=$h+1;
$sql="INSERT INTO $tbl_name values($fid, $h,'$comment', $userid)";
$result=mysql_query($sql);
echo $sql;
if($result){
echo "Successful<BR>";
header("Location: view_topic.php?id=$fid&cid=$cid");
?>
<a href=view_topic.php?id=<?php echo $fid;?> >View your topic</a>
<?php
}
else {
echo "ERROR";
}
mysql_close();
?>