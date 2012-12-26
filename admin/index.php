<?php
session_start();
	if ($_SESSION['loggedIn']==false){
	header('Location: login.php');
	exit();
	}
$userno=$_SESSION['userno'];
$username=$_SESSION['username'];

include "resources/adminlayout.php";

pageTop("Student Feedback System");
pageStart("Admin Control Panel");
?>

<h1>User logged in</h1>
<?php print "<p>Welcome, $username. This is the Admin Control Panel, Use the links on the left to add/edit/delete posts</p>"; ?>

<?php pageFinish(); ?>
<div id="footer">
	<a href="../index.php">Home</a>
	<a href="logout.php">Logout page</a>
</div>

<?php pageBottom(); ?>