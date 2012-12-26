<?php
include "../resources/layout.php";

pageTop("Student Feedback System");
pageStart("Failed to login");
?>

<h1>User access problem</h1>
<p>The page you have requested is not available as you have not authenticated correctly.</p>

<?php pageFinish(); ?><div id="footer">	<a href="main.php">Main page</a>	<a href="logout.php">Logout page</a>
</div><?php pageBottom(); ?>