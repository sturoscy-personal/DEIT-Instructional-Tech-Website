<?php
	//Include the Database Class
	include_once("database/database.class.php");
	
	//Query for Master Search
	$hardware_search_term  = ucwords(mysql_real_escape_string($_POST['hardware_search_term']));
	
	//Build the Query
	$hardware_search_query = mysql_query("SELECT * FROM classroom_hardware WHERE building Like '%$hardware_search_term%' OR actual_room_number Like '%$hardware_search_term%' OR classroom_type Like '%$hardware_search_term%' OR room_features Like '%$hardware_search_term%'", $mysql_connection) or die (mysql_error());
	
	//Return the Results
	echo("
		<table class='tablesorter' width='100%'>
			<thead>
				<tr>
					<th>Building</th>
					<th>Room Number</th>
					<th>Classroom Type</th>
					<th>Classroom Features</th>
				</tr>
			</thead>
			<tbody>
	");
	while($row = mysql_fetch_array($hardware_search_query)) {
		echo("
				<tr>
					<td>" . $row[1] . "</td>
					<td>" . $row[3] . "</td>
					<td>" . $row[4] . "</td>
					<td>" . $row[5] . "</td>
				</tr>
			");
	}
	echo("
		</tbody>
	</table>
	");
?>