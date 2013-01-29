<?php
include "resources/adminDatabase.php";

$username = mysql_real_escape_string($_POST['username']);
$passQuery = mysql_real_escape_string($_POST['password']);

	$password = sha1('%^fs%dldfg@I#3as2h23dg#@4*^&a(*&@#'.$passQuery);

if($username == "" || $passQuery == ""){
	header('Location:failed.php');
	exit();
}

$result1 = queryDatabase("SELECT * FROM userdetails WHERE username = '".strtolower($username)."'");
$row1 = mysql_fetch_array($result1);
		
		if($password != $row1['passwordHash']){
			header('Location:failed.php');
			exit();
		}

	session_start();
		$_SESSION['userno']=$row1['userno'];
		$_SESSION['username']=strtolower($username);
		$_SESSION["loggedIn"] = true;
		header('Location: index.php');
		exit();
		
?>