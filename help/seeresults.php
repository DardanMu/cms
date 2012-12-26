<?php
include "resources/layout.php";
include "resources/database.php";

pageTop("Student Feedback System");
pageBanner("Feedback Results");
pageStart();

extract($_GET);
?>

<div id="leftsidebar">
	<a href="mainfeedback.html">Main page</a>
	<a href="givefeedback.php">Provide Feedback</a>
	<a href="results.php">See Results</a>
	<a href="faq.php">FAQ</a>
</div>

<?php 
print "<h1>Student Feedback Results for $courseTitle :</h1>"; 

$result = queryDatabase("SELECT * FROM responseslab8 WHERE coursetitle = '".$courseTitle."'");

if($result === FALSE) {
    die(mysql_error()); 
}else {
	print '<table border="1">';
	print '<tr>  <th>Student Name</th> <th>Course Title</th> <th>Rating</th> <th>Comments</th>  <tr>';
while ($line = mysql_fetch_array($result)) {

print "<tr>  <td>".$line['studentname']."</td> <td>".$line['coursetitle']."</td> <td>".$line['courserating']."</td> <td>".$line['comments']."</td>  </tr>";

};
	print '</table>';
}
?>

<?php pageFinish(); ?>
<div id="footer">
	<a href="mainfeedback.html">Main page</a>
	<a href="givefeedback.php">Provide Feedback</a>
	<a href="results.php">See Results</a>
	<a href="faq.php">FAQ</a>
</div>

<?php pageBottom(); ?>
