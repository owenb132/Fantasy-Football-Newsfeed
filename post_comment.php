<?php
$topic_id=$_GET['tid'];
?>

<html>
<head>
</head>
<body>
<form name="post_comment" action="post_comment1.php?tid=<?php echo $topic_id?>" method="post">
Reply:<br> <textarea name="reply" cols="30" rows="5" required="required" size=300> Write Here .... </textarea><br>
(Maximum 300 characters)
<input type="submit" name="post" value="post"><br>

</form>
</body>
</html>




	
