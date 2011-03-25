<?php
	//Include the Database Class
	include_once('database/database.class.php');
	
	//PHP Variables from form
	$fullName = mysql_real_escape_string($_POST['full_name']);
	$email    = mysql_real_escape_string($_POST['email']);
	$message  = mysql_real_escape_string($_POST['message']);
	
	//SQL Query to enter data into database
	//Enter the data into the database
	$insert_query = "INSERT INTO quick_help_form
					(full_name, email, message)
					VALUES ('$fullName', '$email', '$message')";
					
	if (!mysql_query($insert_query, $mysql_connection)){
		die('Error: ' . mysql_error());
	};
	
	//Close the Database Connection
	mysql_close($mysql_connection);
	
	echo
	("
		<h4>Thank you!</h4>
		<p>A representative from DeSales University will be contacting you shortly.</p>
		<p>If you require immediate assistance, please contact the Help Desk at 610.282.1100, ext. 4357 or at HelpDesk@desales.edu</p>
	")
 ?>