<?php
include "../resources/database.php";
openDatabase();
useDatabase("drop table userdetails");
useDatabase("create table userdetails (userno int not null primary key auto_increment,username char(255), password char(255))");
useDatabase('insert into userdetails (username,password)  values ("user1", "qwerty")');closeDatabase();
print "database lines processed";
?>