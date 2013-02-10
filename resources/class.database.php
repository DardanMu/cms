<?php

class database {

	function print_content($display = ''){

		if($display != '' && isset($_GET['post_id'])){
			$post_id = mysql_real_escape_string($_GET['post_id']);
			$queryString = "SELECT * FROM newsfeed WHERE post_id = ".$post_id."";
			$backToIndex = "<p><a href='index.php'>Click to go back</a></p>";
			$pages = 0;
		}else{
			$per_page = 8;
			$pages_query = $this->queryDatabase("SELECT COUNT(post_id) FROM newsfeed");


			$pages = ceil(Mysql_result($pages_query, 0) / $per_page);

			if ($display == ''){$display = 1;}else{$display = $_GET['page'];}
			$start =($display - 1) * $per_page;


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
			print "<h2>Oops, that page does not exist :( </h2>";
		}
		print $backToIndex;

	//Pagination Navigation
		if(!isset($_GET['post_id'])){
			print '<div id="page-nav"><p>';
			if($display >1){ print '<a href="?page='.($display-1).'">Previous</a> ';}
			if($display >3){print'<a href="?page=1">1</a> ... ';}
			if($pages>=1 && $display <=$pages){
				for($x= $display-2;$x<=$display+2 && $x<=$pages;$x++){

					if($x <1){$x = 1;}
					if($x == $display){
						print '<span id="current-page"><a href="?page='.$x.'">'.$x.'</a></span> ';
					}else{print '<a href="?page='.$x.'">'.$x.'</a> ';}
				}
			}
			if($pages > 3 && $display < ($pages-2)){print'... <a href="?page='.$pages.'">'.$pages.'</a> ';}
			if($pages > 1 && $display < $pages){print'<a href="?page='.($display+1).'">Next</a>';}
			print '</p></div>';
		}
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
		$result = mysql_query ($queryString); 
		return $result;
	}

	function closeDatabase()
	{
		mysql_close();
	}
}
?>
