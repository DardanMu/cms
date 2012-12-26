<?php
include "resources/layout.php";
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

<div id="footer">
	<a href="mainfeedback.html">Main page</a>
	<a href="givefeedback.php">Provide Feedback</a>
	<a href="results.php">See Results</a>
	<a href="resources/css/styles.css">FAQ</a>
</div>

<?php pageBottom(); ?>
