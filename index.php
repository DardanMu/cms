<?php
session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
	include "admin/resources/adminlayout.php";
} else{
	include "resources/layout.php";
}

include "resources/class.database.php";
$userDB = new database;

pageTop("CMS");

pageStart("Welcome...");?>

<?php 
if(isset($_GET['post_id'])){
	$userDB->print_content($_GET['post_id']);
}elseif (isset($_GET['page'])) {
	$userDB->print_content($_GET['page']);
}else{
	$userDB->print_content();
}
?>

<?php pageFinish(); ?>

<footer>
	<p>&copy MySite 2013 </p>
</footer>

<?php pageBottom(); ?>
