<?php
session_start();
	if ($_SESSION['username']==""){
	header('Location: failed.php');
	exit();
	}
$userno=$_SESSION['userno'];
$username=$_SESSION['username'];

	extract($_POST);
	
	$pTitle = mysql_real_escape_string($_POST['pTitle']);
	$pContent= mysql_real_escape_string($_POST['pContent']);
	
include "resources/adminlayout.php";
include "resources/adminDatabase.php";

pageTop("Student Feedback System");
pageStart("Admin Control Panel");
?>

<?php

if($pTitle == "" || $pContent == ""){
	print "<h2>ERROR: All form fields must have values.</h2>";
}else{
$queryString = 'INSERT into newsfeed (title,content, date) values ("'.$pTitle.'", "'.$pContent.'", NOW())';
queryDatabase($queryString) or die('Query failed: ' . mysql_error());

print "<h2>Successfully Created New Post!</h2>";	

}
?>



<?php pageFinish(); ?>
<div id="footer">
	<a href="admin.php">Main page</a>
	<a href="logout.php">Logout page</a>
</div>

<?php pageBottom(); ?>