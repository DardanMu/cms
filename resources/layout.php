<?php
########################################################################################
# layout.php
#
#
########################################################################################

function pageTop($pageTitle){
print('<!DOCTYPE HTML>');
print('<html>');
print('<head>');
print('<link rel="stylesheet" href="resources/styles.css" type="text/css"> ');
print('		<style type="text/css" media="all"> ');
print('			@import "resources/css/styles.css";');
print('			@import("resources/css/styles.css");');
print('		</style>');
print "<title>$pageTitle</title>";
print('<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">');
print('</head>');
print('<body>');
};


function pageStart($pagebanner){

print('<div id="container">');

print('<div id="banner">');
print('<h1>My site</h1>');
print'<h2>'.$pagebanner.'</h2>';
print "<h3>Hi there!</h3>";
print('</div>');

print'
<div id="leftmenu">
	<a href="/cms/index.php">Main page</a>
	<a href="admin/login.php">log in</a>
</div>';

print('<div id="newsfeed">');
};

function pageFinish(){
print('</div>');
print('</div>');
};

function pageBottom(){
print('</body>');
print('</html>');
};



function menu($divId, $menuItems)
{
print ('<div id="'.$divId.'">');
$noOfMenuItems=count($menuItems);
for($menuIndex=0;$menuIndex<$noOfMenuItems;$menuIndex++){
	print "<a href=\"".$menuItems[$menuIndex][1]."\">".$menuItems[$menuIndex][0]."</a>";
	};
print("</div>");
};

?>