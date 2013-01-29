<?php

function print_content($post_id = ''){

	if($post_id != ''){
		$post_id = mysql_real_escape_string($post_id);
		$queryString = "SELECT * FROM newsfeed WHERE post_id = ".$post_id."";
			$backToIndex = "<p><a href='index.php'>Click to go back</a></p>";
	}else{
		$queryString = "SELECT * FROM newsfeed ORDER BY post_id DESC";
			$backToIndex = '';
	}

	$result = queryDatabase($queryString) or die(mysql_error());

	if(mysql_num_rows($result) != 0) {
    
		while ($line = mysql_fetch_array($result)) {
			print "<div class='newsItem'>
				<h1><a href='index.php?post_id=".$line['post_id']."'>".$line['title']."</a></h1>
				".$line['content']."
				<br><small>Posted: ".$line['date']."</small>
				<br>
				</div>";
		};
	}else {
		print "<h2>Opps, that post does not exist :( </h2>";
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
