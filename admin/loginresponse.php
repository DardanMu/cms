<?php
include "resources/adminDatabase.php";

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);

if($username == "" || $password == ""){
	header('Location:failed.php');
	exit();
}

$result1 = queryDatabase("SELECT * FROM userdetails WHERE username = '".strtolower($username)."'");
$row1 = mysql_fetch_array($result1);
		
		if($password != $row1['password']){
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