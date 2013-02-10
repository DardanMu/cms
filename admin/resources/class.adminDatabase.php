<?php
include_once "../resources/class.database.php";

class adminDatabase extends database{

	function manage_content($display = ''){

		$per_page = 10;
		$pages_query = $this->queryDatabase("SELECT COUNT(post_id) FROM newsfeed");

		$pages = ceil(Mysql_result($pages_query, 0) / $per_page);

		if ($display == ''){$display = 1;}else{$display = $_GET['page'];}
		$start =($display - 1) * $per_page;

		$result = $this->queryDatabase("SELECT * FROM newsfeed ORDER BY post_id DESC LIMIT $start, $per_page ");

		if($result == FALSE) {
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

	//Pagination Navigation
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

	function delete_content($post_id){

		if(!$post_id){
			return false;
		}else {
			$post_id = mysql_real_escape_string($post_id);
			$queryString = "DELETE FROM newsfeed WHERE post_id = ".$post_id."";
			
			$result = $this->queryDatabase($queryString) or die(mysql_error());
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
			
			$result = $this->queryDatabase($queryString) or die(mysql_error());
			$line = mysql_fetch_array($result);
		//print form out here

			print '<form name="editForm" action="editresponse.php" method="POST">';
			print '<h1>Title:</h1>';
			print '<p><input name="titleEdit" type="text" value="'.$line['title'].'"></p>';
			print'<br>';
			print '<h1>Content:</h1>';
			print '<p><textarea name="contentEdit" rows="6" cols="50">'.$line['content'].'</textarea> <script>
			CKEDITOR.replace( "contentEdit" );
			</script></p>';
			print '<p>Post ID: '.$line['post_id'].'<input name="post_id" type="hidden" value="'.$line['post_id'].'""></p>';
			print '<br><br><p><input type="submit" name="submit" value="Update"> | <input type="submit" name="cancel" value="Cancel"></p>';

			print '</form>';
		}
	}
}
?>
