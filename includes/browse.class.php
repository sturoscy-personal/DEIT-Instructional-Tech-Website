<?php

	//Include the Database Class
	include_once('database/database.class.php');
	
	//Setup queries for all buildings
	$billera_query  = mysql_query("SELECT * FROM classroom_hardware WHERE building = 'Billera' ORDER BY CAST(actual_room_number AS SIGNED) ASC", $mysql_connection);
	$dooling_query  = mysql_query("SELECT * FROM classroom_hardware WHERE building = 'Dooling' ORDER BY CAST(actual_room_number AS SIGNED) ASC", $mysql_connection);
	$campbell_query = mysql_query("SELECT * FROM classroom_hardware WHERE building = 'Campbell' ORDER BY CAST(actual_room_number AS SIGNED) ASC", $mysql_connection);
	$hurd_query     = mysql_query("SELECT * FROM classroom_hardware WHERE building = 'Hurd' ORDER BY CAST(actual_room_number AS SIGNED) ASC", $mysql_connection);
	$trexler_query  = mysql_query("SELECT * FROM classroom_hardware WHERE building = 'Trexler' ORDER BY CAST(actual_room_number AS SIGNED) ASC", $mysql_connection);
	$labuda_query   = mysql_query("SELECT * FROM classroom_hardware WHERE building = 'Labuda' ORDER BY CAST(actual_room_number AS SIGNED) ASC", $mysql_connection);
	$easton_query   = mysql_query("SELECT * FROM classroom_hardware WHERE building = 'Easton' ORDER BY CAST(actual_room_number AS SIGNED) ASC", $mysql_connection);
	$lansdale_query = mysql_query("SELECT * FROM classroom_hardware WHERE building = 'Lansdale' ORDER BY CAST(actual_room_number AS SIGNED) ASC", $mysql_connection);
?>