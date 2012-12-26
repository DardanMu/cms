<?php
session_start();
	if ($_SESSION['loggedIn']==false){
	header('Location: failed.php');
	exit();
	}
$userno=$_SESSION['userno'];
$username=$_SESSION['username'];

include "resources/adminlayout.php";

pageTop("Student Feedback System");
pageStart("Admin Control Panel");
?>

<form name="insert" action="insertresponse.php" method="POST">
	<h2>Insert a new Post</h2>
	
	
	
	<p>Post title: <input name="pTitle" type="text"></p>
	<br>
	<p>Post Content: </p>
	<p> <textarea name="pContent" rows="6" cols="50"></textarea> </p>
	<p> <input name="submit" type="submit" value="Post!"></p>
	
</form>

<?php pageFinish(); ?>
<div id="footer">
	<a href="admin.php">Main page</a>
	<a href="logout.php">Logout page</a>
</div>

<?php pageBottom(); ?>