<?php
/**
 * CSE Activity 2.2.2 IntroducingPHP
 * 
 * 222indexB.php models use of PHP in conjunction with MySQL, JavaScript, and CSS
 * @copyright Unpublished work 2013 Project Lead The Way
 * @version 2014.7.30
 */
 
/* 
This block allows our program to access the MySQL database.
Elaborated on in 2.2.3.
 */
require_once 'teacherdb.php';
$db_server = mysql_connect($host, $username, $password);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
mysql_select_db($dbname)
	or die("Unable to select database: " . mysql_error());

	
// $_COOKIE is a data structure that holds all cookies for this site.
// This conditional verifies that the cookie 'username' contains data.
// That would symbolize that the user is logged in as an artist.
if (isset($_COOKIE['username']))
{
	$username = $_COOKIE['username']; // Retrieves the value of the cookie
	
	// Dynamically respond to the data in the cookie to recognize the user
	// An echo statement is used to display something in PHP. Plain text
	// shows up as such, and html code enclosed in quotes functions as normal html.
	echo "Welcome back, " . $username . 
		", click <a href='222artist_portalB.php'>here to go to the Artist's page</a>.<br />";
	echo "Click <a href='222logoutB.php'>here to Log Out</a>...<br />";
}
else
{
	echo "Click <a href='222artist_portalB.php'>here to log in as an artist</a>.<br />";
	echo "Or click <a href='222account_creationB.php'>here to create an artist account</a>.<br />";
	echo "you need to be logged in to purchase posters."
}


echo "Click <a href='221indexB.html'>here to return to the gallery</a>.<br />";

?>