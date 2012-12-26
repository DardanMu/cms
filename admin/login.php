<?php
include "../resources/layout.php";

pageTop("CMS");
pageStart("Log in to the admin centre");
?>



<form name="login" id="login" action="loginresponse.php" method="POST">
<h1>Admin log in page</h1>
	<p><input name="username" type="text" id="username" placeholder="Username"></p>
	<p><input name="password" type="password" id="password" placeholder="Password"></p>
	<p><input name="submit" type="submit" value="Continue"></p>
</form>


<?php pageFinish(); ?><div id="footer">	<a href="login.php">Login page</a></div><?php pageBottom(); ?>