<?php

include "resources/class.Database.php";
$db = new database;

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

if(!$username || !$password || !$password2){
	print '<h1>ERROR</h1>';

}elseif(!$password==$password2){
	print '<h1>ERROR</h1>';
}else{
	
$db->queryDatabase("CREATE TABLE IF NOT EXISTS `newsfeed` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`))") or die('Query failed: ' . mysql_error());

$db->queryDatabase("CREATE TABLE IF NOT EXISTS `userdetails` (userno int not null primary key auto_increment,username char(255), passwordHash char(255))") or die('Query failed: ' . mysql_error());
	
	//create defult user. Must change password after running this file.
	//$password = 'admin';
	$hash = sha1('%^fs%dldfg@I#3as2h23dg#@4*^&a(*&@#'.$password);

	$query = 'insert into userdetails (username,passwordHash)  values ("'.$username.'", "'.$hash.'")';
	$db->queryDatabase($query);
	print '<h1>Database set up</h1>';
}
?>


<!doctype html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h3>You must create the login details for your blog. Use the form below to register an account:</h3>
	<form id="setupDB" name="setupDB" action="" method="POST">
		<p> Enter a Username: <input name="username" type="text" required></p>
		<p> Enter a Password: <input name="password" type="password" required></p>
		<p> Confirm Password: <input name="password2" type="password" required></p>
		<br>
		<button type="submit" name="submit" form="setupDB">Submit</button>
	</form>
</body>
</html>

