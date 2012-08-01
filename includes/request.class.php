<?php
	//Include the Database Class
	include_once('database/database.class.php');
	require_once('recaptcha/recaptchalib.php');
	$privatekey = '6LfkdQwAAAAAAG189Wyz27i0LGcjSxz0WX-BeAFa';

	//PHP Variables from form
	//Contact Information
	$firstName     = mysql_real_escape_string($_POST['first_name']);
	$lastName      = mysql_real_escape_string($_POST['last_name']);
	$email         = mysql_real_escape_string($_POST['email']);
	$phoneNumber   = mysql_real_escape_string($_POST['phone_number']);
	$courseNumber  = mysql_real_escape_string($_POST['course_number']);
	$department    = mysql_real_escape_string($_POST['department']);
	
	//Software Request Information
	$buildingRoom  = mysql_real_escape_string($_POST['building_room']);
	$dateStart     = mysql_real_escape_string($_POST['date_start']);
	$dateEnd       = mysql_real_escape_string($_POST['date_end']);
	$softwareName  = mysql_real_escape_string($_POST['software_name']);
	$versionNumber = mysql_real_escape_string($_POST['version_number']);
	$comments      = mysql_real_escape_string($_POST['comments']);
	
	//reCaptcha
	$challenge     = $_POST['recaptcha_challenge_field'];
	$response      = $_POST['recaptcha_response_field'];
	
	$resp = recaptcha_check_answer ($privatekey,
									$_SERVER['REMOTE_ADDR'],
									$_POST['recaptcha_challenge_field'],
									$_POST['recaptcha_response_field']);
	
	if ($resp->is_valid){
	
		//SQL Query to enter data into database
		//Enter the data into the database
		$insert_query = "INSERT INTO software_request_form
						(first_name, last_name, email, phone, course, department, building_room, date_start, date_end, software, version, comments)
						VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$courseNumber', '$department', '$buildingRoom', '$dateStart', '$dateEnd', '$softwareName', '$versionNumber', '$comments')";
		
		//Comment this out until ready to save to the database (production only)
		if (!mysql_query($insert_query, $mysql_connection)){
			die('Error: ' . mysql_error());
		};
		
		//Close the Database Connection
		mysql_close($mysql_connection);
		
		//----------- Help Desk E-mail Start ----------//
		//
		//E-mail Setup
		ini_set('SMTP', 'exchange.desales.edu');
		ini_set('sendmail_from', $email);
		
		//Send the help desk ticket
		$to      = 'stephen.turoscy@desales.edu' . ', ' . $email; //Change this to HelpDesk@desales.edu when live (production only)!
		$subject = 'Request for Software Installation';
		$message =  
		"<div>
			<p>Dear Help Desk,</p>
	
			<p>
				" . $firstName . " " . $lastName . " is requesting additional software to be installed in " . $buildingRoom . ".<br /><br />
		
				The following is " . $firstName . "'s contact and request information:<br /><br />
				
				<span style='font-weight: bold;'>Contact Information</span><br />
				First Name: " . $firstName . "<br />
				Last Name: " . $lastName . "<br />
				Phone Number: " . $phoneNumber . "<br />
				E-mail: " . $email . "<br />
				Course & Number: " . $courseNumber . "<br />
				Department: " . $department . "<br />
				Building & Room Number: " . $buildingRoom . "<br /><br />
				
				<span style='font-weight: bold;'>Software Request Information</span><br />
				Software Name: " . $softwareName . "<br />
				Version: " . $versionNumber . "<br /><br />
				<span style='font-weight: bold;'>Installation Dates</span><br />
				From: " . $dateStart . " To: " . $dateEnd . "<br /><br />
				
				<span style='font-weight: bold;'>Additional Comments from User:</span><br />
				" . $comments . "<br /><br />
				
				If you have any questions or issues, please contact " . $firstName . " directly.  Thank you very much and have a great day!
			</p>
		</div>";
		
		$message = wordwrap($message, 70);
		
		//Set the headers for the message (includes html content)
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: \"" . $email . "\"\n";
		
		//Sends the e-mail to the help desk
		mail($to, $subject, $message, $headers);
		
		//----------- Help Desk E-mail End ----------//
	} else {
		echo ("There was an error processing your request. Please dial x2290 for help.");
		return false;
	}
?>
<html>
	<head>
		<title>Technology Request Confirmation</title>
	</head>
	<body>
		<p style='font-weight: bold;'>
			The following message was sent to the Help Desk and to the e-mail address you provided above for your reference.
		</p>
		<p>
			Please contact the Help Desk at x4357 if you have any questions regarding your installation request.
		</p>
		<hr />
		<p>Dear Help Desk,</p>
		<p>
			<?php echo($firstName); ?> <?php echo($lastName); ?> is requesting additional software to be installed in <?php echo($buildingRoom); ?><br /><br />
	
			The following is <?php echo($firstName); ?>'s contact and request information:<br /><br />
			
			<span style='font-weight: bold;'>Contact Information</span><br />
			First Name: <?php echo($firstName); ?><br />
			Last Name: <?php echo($lastName); ?><br />
			Phone Number: <?php echo($phoneNumber); ?><br />
			E-mail: <?php echo($email); ?><br />
			Course & Number: <?php echo($courseNumber); ?><br />
			Department: <?php echo($department); ?><br />
			Building & Room Number: <?php echo($buildingRoom); ?><br /><br />
			
			<span style='font-weight: bold;'>Software Request Information</span><br />
			Software Name: <?php echo($softwareName); ?><br />
			Version: <?php echo($versionNumber); ?><br /><br />
			<span style='font-weight: bold;'>Installation Dates</span><br />
			From: <?php echo($dateStart); ?> To: <?php echo($dateEnd); ?><br /><br />
			
			<span style='font-weight: bold;'>Additional Comments from User:</span><br />
			<?php echo($comments); ?><br /><br />
			
			If you have any questions or issues, please contact <?php echo($firstName); ?> directly.  Thank you very much and have a great day!
		</p>
	</body>
</html>