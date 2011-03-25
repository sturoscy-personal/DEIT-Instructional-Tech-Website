<?php
	//Include the Database Class
	include_once("database/database.class.php");
	
	//Query for Master Search
	$software_search_term  = ucwords(mysql_real_escape_string($_POST['software_search_term']));
	
	//Build the Query
	//$software_search_query = mysql_query("SELECT * FROM existing_software_all WHERE Location Like '%$software_search_term%' OR SuiteName Like '%$software_search_term%' OR Publisher Like '%$software_search_term'", $mysql_connection) or die (mysql_error());
	$software_search_query = mysql_query(
		"SELECT * FROM existing_software_campbell
 		 WHERE Location Like '%$software_search_term%'
 		 OR DeviceName Like '%$software_search_term%'
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'
		 UNION ALL
		 SELECT * FROM existing_software_dooling
		 WHERE Location Like '%$software_search_term%'
		 OR DeviceName Like '%$software_search_term%' 
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'
		 UNION ALL
		 SELECT * FROM existing_software_easton
 		 WHERE Location Like '%$software_search_term%'
 		 OR DeviceName Like '%$software_search_term%' 
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'
		 UNION ALL
		 SELECT * FROM existing_software_hurd
		 WHERE Location Like '%$software_search_term%' 
		 OR DeviceName Like '%$software_search_term%'
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'
		 UNION ALL
		 SELECT * FROM existing_software_labuda
		 WHERE Location Like '%$software_search_term%'
		 OR DeviceName Like '%$software_search_term%' 
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'
		 UNION ALL
		 SELECT * FROM existing_software_lansdale
		 WHERE Location Like '%$software_search_term%'
		 OR DeviceName Like '%$software_search_term%' 
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'
		 UNION ALL
		 SELECT * FROM existing_software_maccart
		 WHERE Location Like '%$software_search_term%'
		 OR DeviceName Like '%$software_search_term%' 
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'
		 UNION ALL
		 SELECT * FROM existing_software_nolocation
		 WHERE Location Like '%$software_search_term%'
		 OR DeviceName Like '%$software_search_term%' 
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'
		 UNION ALL
		 SELECT * FROM existing_software_trexler
		 WHERE Location Like '%$software_search_term%'
		 OR DeviceName Like '%$software_search_term%'
		 OR SuiteName Like '%$software_search_term%' 
		 OR Publisher Like '%$software_search_term'", $mysql_connection) or die (mysql_error());
	
	//Return the Results
	echo("
		<table class='tablesorter' width='100%'>
			<thead>
				<tr>
					<th>Location</th>
					<th>Device Name</th>
					<th>Suite Name</th>
					<th>Publisher</th>
					<th>Version</th>
				</tr>
			</thead>
			<tbody>
	");
	while($row = mysql_fetch_array($software_search_query)) {
		echo("
				<tr>
					<td>" . $row[1] . "</td>
					<td>" . $row[2] . "</td>
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