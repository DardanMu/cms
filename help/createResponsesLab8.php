<?php
include "../resources/database.php";
openDatabase();
useDatabase("drop table newsfeed");
useDatabase("create table newsfeed (post_id int not null primary key auto_increment, title varchar(255), content text, date datetime)");
useDatabase('insert into newsfeed (title,content, date)  values ("My first blog post", "Welcome to my blog, this is the content of The post.", NOW())');
useDatabase('insert into newsfeed (title,content, date)  values ("Testing the second post", "This is the secnd post, this is how it will look like to users of the site.", NOW())');
useDatabase('insert into newsfeed (title,content, date)  values ("How useful PHP is...", "PHP is a very useful language when combined with MySQL", NOW())');

closeDatabase();
print "database lines processed";

?>
