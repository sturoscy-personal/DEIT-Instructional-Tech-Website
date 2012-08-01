<?php 
	
	//E-mail Setup
	ini_set('SMTP', 'smtp.desales.edu');
	ini_set('sendmail_from', 'deit@desales.edu');
	
	//Send the help desk ticket
	$to      = 'helpdesk@desales.edu';
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
		Version: " . $version . "<br />
		<span style='font-weight: bold;'>Installation Dates</span><br />
		From: " . $dateStart . " To: " . $dateEnd . "<br /><br />
		
		<span style='font-weight: bold;'>Additional Comments from User:</span><br />
		" . $comments . "<br /><br />
		
		If you have any questions or issues, please contact " . $firstName . " directly.  Thank you very much and have a great day!
	</div>"
	
	$message = wordwrap($message, 70);
	
	//Set the headers for the message (includes html content)
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: deit@desales.edu';
	
	//Sends the e-mail to the help desk
	mail($to, $subject, $message, $headers);

?>