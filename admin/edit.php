<?php
session_start();
	if ($_SESSION['loggedIn']==false){
	header('Location: failed.php');
	exit();
	}

include "resources/adminlayout.php";
include "resources/class.adminDatabase.php";
	$adminDB = new adminDatabase;
extract($_GET);
pageTop("CMS");

pageStart("Edit/Delete content");?>

<?php 
	if(isset($_GET['delete'])){
		$adminDB->delete_content($_GET['delete']);
	}elseif(isset($_GET['edit'])){
		$adminDB->edit_content($_GET['edit']);
	}else	{

$adminDB->manage_content();
}
?>

<?php pageFinish(); ?>

<div id="footer">
	<a href="admin.php">Main page</a>
	<a href="logout.php">Logout page</a>
</div>

<?php pageBottom(); ?>
