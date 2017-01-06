<html>
<head>
<title>
forums
</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/960.css">
<link rel="stylesheet" type="text/css" href="css/gen.css">
<link rel="stylesheet" type="text/css" href="css/960_24_col.css">
<link type="text/css" rel="stylesheet" href="css/simplePagination.css"/>

</head>
<?php session_start();
include 'header.php';
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="project"; // Database name 
$tbl_name="forum_comments"; // Table name 
$tbl="forum_user";
$usr="user_details";
// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar 
$fid=$_GET['id'];
//$cid=$_GET['cid'];
$sql="SELECT * FROM $tbl_name WHERE f_id='$fid'";
$query2="select * from $tbl where f_id='$fid'";
$result=mysql_query($sql);
$result2=mysql_query($query2);
$rw=mysql_fetch_array($result2);
?>
<body>
<div class="container_24">
<div class="grid_24">

<table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr>
<td width="99%"bgcolor="#F8F7F1" colspan="2"><h1><?php echo $rw['question']; ?></ h1></td>
</tr>

<tr>
<td width="75%">  </td>
<td width="25%" bgcolor="#F8F7F1">Asked by :<?php echo $rw['fname']; ?></td>
</tr>

</table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
<tr class="comdiv">
<?php
 // Start looping table row
while($rows=mysql_fetch_array($result)){
?>


<!--<td bgcolor="#FFFFFF">
<?php
$ud=$rows['u_id'];
$query3="select * from $usr where uid='$ud'";
$resuser=mysql_query($query3);
$userrow=mysql_fetch_array($resuser);
$jpg='JPG';
?></td>-->
<?php
$filename=$rows['u_id'].".".$jpg;
					if(file_exists("dp/$filename"))
					{
					?>
					<td width="10%"><img src="dp/<?php echo $filename; ?>" height="75" width="70" alt="profile pic here"></td>
					<td width="10%" align="center" bgcolor="#FFFFFF"><?php echo $userrow['fname']; ?><br><?php echo $userrow['team'];?></td>
					<td width="80%" align="center" bgcolor="#FFFFFF"><?php echo $rows['content']; ?></td>
</tr>
					
<?php
}
// Exit looping and close connection
}
?>
</div>

<?php

$tnm='forums';
$sql3="SELECT * FROM $tnm WHERE f_id='$fid'";
$result3=mysql_query($sql3);
$rows=mysql_fetch_array($result3);
$view=$rows['views']; 
// count more value
//echo $result3;
$addview=$result3+1;

$sql5="update $tnm set views='$addview' WHERE f_id='$fid'";
$result5=mysql_query($sql5);
mysql_close();
?>
</table>
<BR>
Add Comment
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_comments.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%"><strong>User id</strong></td>
<td width="3%">:</td>
<td width="79%"><input name="userid" type="text" id="userid" size="45"></td>
</tr>
<tr>
<td valign="top"><strong>Comment</strong></td>
<td valign="top">:</td>
<td><textarea name="comment" cols="45" rows="3" id="comment"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="fid" type="hidden" value="<?php echo $fid; ?>"></td>
<!--<td><input name="cid" type="hidden" value="<?php// echo $cid; ?>"></td>-->
<td><input type="submit" name="Submit" value="Submit"> </td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div>
</div>
</body>
<!--<script type="text/javascript" src="js/jquery.simplePagination.js"></script>
<script type="text/javascript">
$(function() {
    $('.comdiv').pagination({
        items: 13,
        itemsOnPage: 5,
        cssStyle: 'light-theme'
    });
});
</script>-->
</html>