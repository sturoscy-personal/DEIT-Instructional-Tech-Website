<?php

	$db_host = 'localhost';
	$db_user = 'desalesdeit';
	$db_pass = 'desales123';
	
	$mysql_connection = mysql_connect($db_host, $db_user, $db_pass);
	mysql_select_db("campus_technology", $mysql_connection);
	
	if (!$mysql_connection) {
		die('Could not connect: ' . mysql_error());
	}
	
	define('URL', $_SERVER['SERVER_NAME']);
?>