<?php
session_start();
	if ($_SESSION['username']==""){
	header('Location: failed.php');
	exit();
	}
$userno=$_SESSION['userno'];
$username=$_SESSION['username'];

include "resources/adminlayout.php";

pageTop("Student Feedback System");
pageStart("Admin Control Panel");
?>



<h1>User logged in</h1>
<?php print "<p>Congratulations, $username. You have logged in.</p>"; ?>

<?php pageFinish(); ?>
<div id="footer">
	<a href="admin.php">Main page</a>
	<a href="logout.php">Logout page</a>
</div>

<?php pageBottom(); ?>