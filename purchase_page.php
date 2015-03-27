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
	echo "you need to be logged in to purchase posters.<br />"
}
echo "<TABLE><CAPTION>Your Cart:</CAPTION>";
$closed_tr = 0; // flag, used to determine if we are at the end of a row when the loop terminates
$num_images = mysql_num_rows($image_info_table)
if ($image_info_table)
	{
	$poster_count = 0;
	for ($count = 0; $count < $num_images; $count++)
		if ($count == $cart)
		{
			// The following few lines store information from specific cells in the data about an image
			$image_row = mysql_fetch_row($image_info_table); // Advances a row each time it is called
			$image_name = $image_row[1];
			$thumb_name = $image_row[2];
			$image_path = pathinfo($image_name);
			$id_name = $image_path['filename'];
			$div_id = $id_name . "popin";
			$poster_count++
			// Remember the mod operator, this one gives us the remainder when $count is divided by 6
			if ($count % 6 == 0)
			{
				echo "<TR>";
				$closed_tr = 0;
			}
			$domain = $_SERVER['SERVER_NAME'];
			echo "<TD><img id='$id_name' src='http://$domain/~$dbname/$artistID/$thumb_name' onmouseover=" . '"' . "
						showDetailedView('$div_id', '$firstName', '$dbname')" . '" />';
			echo "<div id = '$div_id'></div>Poster Cost: $10</TD>";
			if ($count % 6 == 5)
			{
				echo "</TR>";
				$closed_tr = 1;
			}
		}
	}
	if ($closed_tr == 0) echo "</TR>"; // Appends a close tag for the TR element if the loop did not terminate at a row end.
	echo "</TABLE>";
}
echo "<TH align='center'>Total cost: $" . $poster_count . "0</TH><br />";
echo "<button type='button' onclick='$cart = []'>Clear cart</button>"
echo "<TH align='right'>Click <a href='221indexB.html'>here to return to the gallery</a>.</TH><br />";
?>