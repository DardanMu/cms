<?php
include "resources/adminDatabase.php";
openDatabase();
useDatabase("drop table userdetails");
useDatabase("create table userdetails (userno int not null primary key auto_increment,username char(255), passwordHash char(255))");

//hashing the admin password. There is no registration yet for this CMS 
//as there is only one admin user.
$password = 'admin';
	$hash = sha1('%^fs%dldfg@I#3as2h23dg#@4*^&a(*&@#'.$password);

$query = 'insert into userdetails (username,passwordHash)  values ("admin", "'.$hash.'")';
	useDatabase($query);

closeDatabase();

print "database lines processed";
?>

