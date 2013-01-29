<?php
session_start();
	if ($_SESSION['loggedIn']== false){
	header('Location: failed.php');
	exit();
	}
$userno=$_SESSION['userno'];
$username=$_SESSION['username'];

	extract($_POST);
	
	$pTitle = mysql_real_escape_string($_POST['titleEdit']);
	$pContent= mysql_real_escape_string($_POST['contentEdit']);
	
include "resources/adminlayout.php";
include "resources/adminDatabase.php";

pageTop("Edit");
pageStart("Admin Control Panel");
?>

<?php

if(isset($_POST['cancel'])){
	header('Location:edit.php');
	exit();
}else{



if($pTitle == "" || $pContent == ""){
	print "<h2>ERROR: All form fields must have values.</h2>";
}else{

$queryString = "UPDATE newsfeed set title='$pTitle',content='$pContent', date=NOW() WHERE post_id=".($_POST['post_id']);
queryDatabase($queryString) or die('Query failed: ' . mysql_error());

print "<h2>Successfully Updated!</h2>";	

}
}
?>



<?php pageFinish(); ?>
<div id="footer">
	<a href="admin.php">Main page</a>
	<a href="logout.php">Logout page</a>
</div>

<?php pageBottom(); ?>