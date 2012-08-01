<?php
	//Include the Database Class
	include_once('database/database.class.php');
	
	//PHP Variables from form
	$ipadFullName = mysql_real_escape_string($_POST['ipad_full_name']);
	$ipadEmail    = mysql_real_escape_string($_POST['ipad_email']);
	
	//SQL Query to enter data into database
	//Enter the data into the database
	$insert_query = "INSERT INTO ipad_request_form
					(ipad_full_name, ipad_email)
					VALUES ('$ipadFullName', '$ipadEmail')";
					
	if (!mysql_query($insert_query, $mysql_connection)){
		die('Error: ' . mysql_error());
	};
	
	//Close the Database Connection
	mysql_close($mysql_connection);
	
	//Thank you message
	echo
	("
		<h4>Thank you!</h4><br />
		<p>A representative from DeSales University will be contacting you shortly.</p>
	");
	
	/*
	//E-mail the contents of the form to deit@desales.edu
	//E-mail Setup
	ini_set('SMTP', 'smtp.desales.edu');
	ini_set('sendmail_from', 'deit@desales.edu');
	
	//Send the help desk ticket
	$to      = 'helpdesk@desales.edu';
	$subject = 'Request for Software Installation';
	*/
 ?>