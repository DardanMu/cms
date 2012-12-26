<?php
session_start();

	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
		include "admin/resources/adminlayout.php";
	} else{
		include "resources/layout.php";
	}

include "resources/database.php";

pageTop("CMS");

pageStart("Welcome...");?>

<?php 
if(isset($_GET['post_id'])){
	print_content($_GET['post_id']);
} else{
	print_content();
}
?>

<?php pageFinish(); ?>

<footer>
<p>&copy MySite 2013 </p>
</footer>

<?php pageBottom(); ?>
