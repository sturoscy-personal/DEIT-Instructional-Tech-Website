/*
 * Title: JavaScript file to handle the request form on the client side
 * Filename: form.handler.js
 * Author: Stephen Turoscy
 * Website URI: http://deit.desales.edu/deit
 * JavaScript URI: http://deit.desales.edu/deit/javascript/form.handler.js
 * Last Updated: May 09, 2011
 * Additional Notes:	The following comment can be removed within a months
 * 						time from the last updated date above. "Switching 
 * 						checked/unchecked, enabled/disabled code for newer 
 * 						version of attr." The deprecated (and commented) code following that
 * 						comment can also be removed.
 */

google.setOnLoadCallback(function() {	
	//Disable the form until the check box is checked
	$("#request-page #technology-request form input, textarea").attr("disabled", "disabled");
	$("#request-page #technology-request form a").css({"opacity" : "0.0", "visibility" : "hidden"});
	
	//Switching checked/unchecked, enabled/disabled code for newer version of attr
	//$("#request-page #technology-request form #installed").attr("disabled", "").attr("checked", false);
	$("#request-page #technology-request form #installed").removeAttr("disabled").attr("checked", false);

	//Add background colors and disabled icons
	$("#request-page #technology-request form input.required").attr("disabled", function(){
		if (this.disabled) {
			$(this).css({"background" : "url('images/disabled.png') #E6E6E6 no-repeat 4px 4px", "padding-left" : "25px"});
		};
	});

	//Enable the building and room check input text box when checkbox is enabled (checked)
	$("#request-page #technology-request form #installed").change(function() {
		if ($("input[name=installed]").is(":checked")) {
			//Check box is checked and the requirements are met			
			//Switching checked/unchecked, enabled/disabled code for newer version of attr
			//$("#request-page #technology-request form input, textarea").attr("disabled", "");
			$("#request-page #technology-request form input, textarea").removeAttr("disabled");
			
			$("#request-page #technology-request form a").css({"visibility" : "visible"}).animate({
				opacity : 1.0
			}, 3000);

			//Add background colors and enabled icons
			$("#request-page #technology-request form input.required").css({"background" : "url('images/enabled.png') #FFFFFF no-repeat 4px 4px", "padding-left" : "25px"});
		} else {
			//Check box is un-checked (disable the form)
			$("#request-page #technology-request form input, textarea").attr("disabled", "disabled");
			$("#request-page #technology-request form a").animate({
				opacity : 1.0
			}, 3000).css({"visibility" : "hidden"});
			
			//Switching checked/unchecked, enabled/disabled code for newer version of attr
			//$("#request-page #technology-request form #installed").attr("disabled", "");
			$("#request-page #technology-request form #installed").removeAttr("disabled");

			//Add background colors and disabled icons
			$("#request-page #technology-request form input.required").css({"background" : "url('images/disabled.png') #E6E6E6 no-repeat 4px 4px", "padding-left" : "25px"});
		}
	});

	//Enable datepicker plugin
	$(function(){
		$("#request-date-start").datepicker();
		$("#request-date-end").datepicker();
	});
	
	//Handle the form
	$("#request-submit").click(function(e){
		e.preventDefault();
					
		//Variables
		var firstName      = $("#request-first-name").val();
		var lastName       = $("#request-last-name").val();
		var email          = $("#request-email").val();
		var phoneNumber    = $("#request-phone-number").val();
		var courseNumber   = $("#request-course-number").val();
		var department     = $("#request-department").val();
		var buildingRoom   = $("#request-building-room").val();
		var dateStart      = $("#request-date-start").val();
		var dateEnd        = $("#request-date-end").val();
		var softwareName   = $("#request-software-name").val();
		var versionNumber  = $("#request-version-number").val();
		var comments       = $("#request-comments").val();
		
		//reCaptcha Fields
		var challengeField = $("input#recaptcha_challenge_field").val();
		var responseField  = $("input#recaptcha_response_field").val();

		//Catch empty data
		//					
		if (!firstName){
			alert("Please enter your first name");
			$("#request-first-name").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!lastName) {
			alert("Please enter your last name");
			$("#request-last-name").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!email) {
			alert("Please enter your email address");
			$("#request-email").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!phoneNumber) {
			alert("Please enter your phone number and extension");
			$("#request-phone-number").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!courseNumber) {
			alert("Please enter the course and number you are requesting the software for");
			$("#request-course-number").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!department) {
			alert("Please enter your department");
			$("#request-department").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!buildingRoom) {
			alert("Please enter assigned building and room number");
			$("#request-building-room").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!dateStart) {
			alert("Please enter the target date for installation");
			$("#request-date-start").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!dateEnd) {
			alert("Please enter the date for when you no longer need the software");
			$("#request-date-end").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!softwareName) {
			alert("Please enter the name for the software that you need");
			$("#request-software-name").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
				
		//Make sure the user is offering a valid e-mail address
		var emailPattern = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if (!emailPattern.test(email)){
			alert("Please enter a valid e-mail address");
			$("#request-email").animate({backgroundColor: 'yellow'}, 1000);
			email.focus;
			return false;
		}
					
		//Put the Data String together for the AJAX POST below
		var dataString = "first_name=" + firstName + "&last_name=" + lastName + "&email=" + email + "&phone_number=" + phoneNumber + "&course_number=" + courseNumber + "&department=" + department + "&building_room=" + buildingRoom + "&date_start=" + dateStart + "&date_end=" + dateEnd + "&software_name=" + softwareName + "&version_number=" + versionNumber + "&comments=" + comments + "&recaptcha_challenge_field=" + challengeField + "&recaptcha_response_field=" + responseField;
					
		$.ajax({
			type: "POST",
			url: "./includes/request.class.php",
			data: dataString,
			success: function(result){
				if (result == "error") {
					alert("The reCAPTCHA wasn't entered correctly. Please go back and try it again.");
			        Recaptcha.reload();
			        return false;
				} else {
					$("#request-result").html(result).hide();
					$(function() {
						$("#request-result").dialog({
							title: "Technology Request Results",
							bgiframe: true,
							modal: true,
							resizable: false,
							width: 800,
							draggable: false,
							close: function(){
								$(this).dialog('destroy');
								$("input").val("");
								$("textarea").val("");
							}
						});
					});
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				console.log(thrownError);
			}
		});
	});
})