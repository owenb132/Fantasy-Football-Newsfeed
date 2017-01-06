<html>
<head>
<title>
forums
</title>
<link rel="stylesheet" type="text/css" href="css/960.css">
<link rel="stylesheet" type="text/css" href="css/gen.css">
<link rel="stylesheet" type="text/css" href="css/960_24_col">
</head>
<?php session_start();
include 'header.php';
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="forums"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$query1="select * from $tbl_name order by f_id";
$result1=mysql_query($query1);
$result2=mysql_query($query1);
$_fnum=mysql_num_fields($result1);
?>
<body>
<div class="container_24">
<div class="grid_4">
		<img src="dp/<?php echo $uid; ?>.jpg" alt="profilepic here" height=100 width=100/><br /> 
		<?php echo $fname; echo " $lname"; ?>
		<br />
		<a href=edit.php?uid=<?php echo $uid; ?>>edit profile</a><br />
		<a href=view.php?uid=<?php echo $uid; ?>>view your profile</a><br />
	</div>
<div class="grid_20">
<table border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="8%" align="center" bgcolor="#E6E6E6"><strong>no.</strong></td>
<td width="60%" align="center" bgcolor="#E6E6E6"><strong>Question</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>related tags</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>asked by</strong></td>
</tr>

<?php
 
// Start looping table row
while($rows=mysql_fetch_array($result1)){
?>
<tr>
<!--<td bgcolor="#FFFFFF">
<?php
$i=0;
echo $rows[$i]; 
?></td>-->
<td bgcolor="#FFFFFF"><?php echo $rows['f_id']; ?><BR></td>
<td align="center" bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['f_id']; $i++;?>" > <?php echo $rows['question'];$i++; ?></a></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['tag'];$i++; ?></td>
<td align="center" bgcolor="#FFFFFF"><?php echo $rows['uid'];$i++; ?></td>
</tr>

<?php
// Exit looping and close connection 
}
mysql_close();
?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="create_topic.php"><strong>Create New Topic</strong> </a></td>
</tr>
</table>
</div>
</body>
</html>