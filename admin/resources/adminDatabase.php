<?php

function manage_content(){

$result = queryDatabase("SELECT * FROM newsfeed ORDER BY post_id DESC");

if($result === FALSE) {
    die(mysql_error()); 
}else {

while ($line = mysql_fetch_array($result)) {
print "<div class='newsItem'>";
print "<h1>".$line['title']."</h1>";
print "<small>Posted: ".$line['date']."</small>";
print "<p> <a href='#'>Edit</a> | <a href='?post_id=".$line['post_id']."'>Delete</a></p>";
print "<br>";
print "</div>";
};
}
}

function delete_content($post_id){
	
	if(!$post_id){
		return false;
	}else {
		$post_id = mysql_real_escape_string($post_id);
			$queryString = "DELETE FROM newsfeed WHERE post_id = ".$post_id."";
			
		$result = queryDatabase($queryString) or die(mysql_error());
			print "<h2>Post deleted successfully!</h2>";
			$backToIndex = "<p><a href='edit.php'>Click to go back</a></p>";
	}
	print $backToIndex;
}

function queryDatabase($queryString)
{
openDatabase();
$result=useDatabase($queryString);
closeDatabase();
return $result;
};

function openDatabase()
{
mysql_connect('localhost:3306', 'dardan', '6hwYJZMaaS8csMdp');
mysql_select_db("cms");
};

function useDatabase($queryString)
{
//$result is associative array for requested query
$result = mysql_query ($queryString);
//Return result - needs to be processed using the 
return $result;

};

function closeDatabase()
{
//close db
mysql_close();
};

?>
