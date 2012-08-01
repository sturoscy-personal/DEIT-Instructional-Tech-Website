<?php

	//Include the Database Class
	include_once("database/database.class.php");
	
	//Building and Room Number from GET Variables
	//
	//Build the Query
	if ($building == 'Student MacBook'){
		$sql_mac   = $building;
		$mac_query = mysql_query("SELECT * FROM existing_software_maccart WHERE DeviceName = '$sql_mac'", $mysql_connection) or die(mysql_error());
	} else {
		$sql_building = strtolower(mysql_real_escape_string($building));
		//Take care of spaces in building name
		if ($building == "Hurd Science Center") {
			$sql_building = "Hurd";
		}
		$sql_room_num   = mysql_real_escape_string($room_num);
		$hardware_query = mysql_query("SELECT * FROM classroom_hardware WHERE building = '$sql_building' AND actual_room_number = '$sql_room_num'", $mysql_connection) or die(mysql_error());
		$software_query = mysql_query("SELECT * FROM existing_software_$sql_building WHERE Location Like '%$sql_room_num%'", $mysql_connection) or die(mysql_error());
		$picture_query  = mysql_query("SELECT * FROM room_pictures WHERE location Like '%$building%'", $mysql_connection) or die(mysql_error());	
	}
?>