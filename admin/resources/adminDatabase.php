<?php

function manage_content(){

$result = queryDatabase("SELECT * FROM newsfeed ORDER BY post_id DESC");

	if($result === FALSE) {
		die(mysql_error()); 
	}else {

		while ($line = mysql_fetch_array($result)) {
		print "<div class='newsItem'>
			<h1>".$line['title']."</h1>
			<small>Posted: ".$line['date']."</small>
			<p> <a href='?edit=".$line['post_id']."'>Edit</a> | <a href='?delete=".$line['post_id']."'>Delete</a></p>
			<br>
			</div>";
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

function edit_content($post_id){

	if(!$post_id){
		return false;
	}else {
		$post_id = mysql_real_escape_string($post_id);
			$queryString = "SELECT * FROM newsfeed WHERE post_id = ".$post_id."";
			
			$result = queryDatabase($queryString) or die(mysql_error());
			$line = mysql_fetch_array($result);
		//print form out here
		
		print '<form name="editForm" action="editresponse.php" method="POST">';
			print '<h1>Title:</h1>';
			print '<p><input name="titleEdit" type="text" value="'.$line['title'].'"></p>';
			print'<br>';
			print '<h1>Content:</h1>';
			print '<p><textarea name="contentEdit" rows="6" cols="50">'.$line['content'].'</textarea></p>';
			print '<p>Post ID: '.$line['post_id'].'<input name="post_id" type="hidden" value="'.$line['post_id'].'""></p>';
			print '<p><input type="submit" name="submit" value="Update"> | <input type="submit" name="cancel" value="Cancel"></p>';
		
		print '</form>';
	
	}



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
