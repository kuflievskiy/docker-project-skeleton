<?php

//phpinfo();

echo "PHP Version: " . phpversion() . '<br>';

// Connecting to and selecting a MySQL database
$mysqli = new mysqli('container_dbhost', 'dbuser', 'dbpass', 'dbname');

// Oh no! A connect_errno exists so the connection attempt failed!
if ($mysqli->connect_errno) {
	// Let's try this:
	echo "Sorry, this website is experiencing problems.";
	// Something you should not do on a public site, but this example will show you
	// anyways, is print out MySQL error related information -- you might log this
	echo "Error: Failed to make a MySQL connection, here is why: \n";
	echo "Errno: " . $mysqli->connect_errno . "\n";
	echo "Error: " . $mysqli->connect_error . "\n";
	// You might want to show them something nice, but we will simply exit
	exit;
} else {
	echo "MYSQL Client info: " . $mysqli->client_info . '<br>';
}