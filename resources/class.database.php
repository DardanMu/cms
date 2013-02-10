<?php

class database {

function print_content($post_id = '', $page = ''){

	if($post_id != ''){
		$post_id = mysql_real_escape_string($post_id);
		$queryString = "SELECT * FROM newsfeed WHERE post_id = ".$post_id."";
			$backToIndex = "<p><a href='index.php'>Click to go back</a></p>";
	}else{
		$per_page = 10;
		$pages_query = $this->queryDatabase("SELECT COUNT(post_id) FROM newsfeed");


		$pages = ceil(Mysql_result($pages_query, 0) / $per_page);
			print $pages;

			if ($page == ''){$page = 1;}else{$page = $_GET['page'];}
		$start =($page - 1) * $per_page;


			

			
		$queryString = "SELECT * FROM newsfeed ORDER BY post_id DESC LIMIT $start, $per_page ";
			$backToIndex = '';
	}

	$result = $this->queryDatabase($queryString) or die(mysql_error());

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
		print "<h2>Oops, that post does not exist :( </h2>";
	}
print $backToIndex;
}

function queryDatabase($queryString)
{
$this->openDatabase();
$result= $this->useDatabase($queryString);
$this->closeDatabase();
return $result;
}

function openDatabase()
{
mysql_connect('localhost:3306', 'dardan', '6hwYJZMaaS8csMdp');
mysql_select_db("cms");
}

function useDatabase($queryString)
{
//$result is associative array for requested query
$result = mysql_query ($queryString);
//Return result - needs to be processed using the 
return $result;

}

function closeDatabase()
{
//close db
mysql_close();
}

}
?>
