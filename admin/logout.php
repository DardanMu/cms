<?php

session_start();
session_destroy();

include "../resources/layout.php";

pageTop("Student Feedback System");
pageStart("Logged out");
?>


<h1>Log out request</h1>
<p>You have logged out</p>

<?php pageFinish(); ?>
<div id="footer">
	<a href="../index.php">Home</a>
</div>

<?php pageBottom(); ?>


