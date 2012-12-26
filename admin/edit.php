<?php
session_start();
	if ($_SESSION['loggedIn']==false){
	header('Location: failed.php');
	exit();
	}

include "resources/adminlayout.php";
include "resources/adminDatabase.php";
extract($_GET);
pageTop("CMS");

pageStart("Edit/Delete content");?>

<?php 
	if(isset($_GET['post_id'])){
		delete_content($_GET['post_id']);
	}else{

manage_content();
}
?>

<?php pageFinish(); ?>

<div id="footer">
	<a href="mainfeedback.html">Main page</a>
	<a href="givefeedback.php">Provide Feedback</a>
	<a href="results.php">See Results</a>
	<a href="faq.php">FAQ</a>
</div>

<?php pageBottom(); ?>
