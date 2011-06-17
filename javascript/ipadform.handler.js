/*
 * Title: JavaScript file to handle the ipad request form on the client side
 * Filename: ipadform.handler.js
 * Author: Stephen Turoscy
 * Website URI: http://deit.desales.edu/deit
 * JavaScript URI: http://deit.desales.edu/deit/javascript/ipadform.handler.js
 * Last Updated: June 16, 2011
 * Additional Notes: none
 */

google.setOnLoadCallback(function() {
	//Do not auto open the modal dialog automatically
	$("#ipad-form").dialog({
		autoOpen: false,
		bgiframe: true,
		title: "iPad 2 Information",
		modal: true,
		resizable: false,
		width: 500,
		draggable: false
	});

	//Form dialog
	$("#open-ipad-form").click(function(e){
		e.preventDefault();
		$("#ipad-form").dialog('open');
		return false;
	});

	//Process the form
	$("#ipad-submit").click(function(){
		var ipadFullName = $("#ipad-full-name").val();
		var ipadEmail    = $("#ipad-email").val();

		if (!ipadFullName){
			alert("Please enter your full name");
			$("#ipad-full-name").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}
		if (!ipadEmail){
			alert("Please enter your e-mail address");
			$("#ipad-email").animate({backgroundColor: 'yellow'}, 1000);
			return false;
		}

		//Make sure the user is offering a valid e-mail address
		var emailPattern = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		if (!emailPattern.test(ipadEmail)){
			alert("Please enter a valid e-mail address");
			$("#ipad-email").animate({backgroundColor: 'yellow'}, 1000);
			ipadEmail.focus;
			return false;
		}

		//DataString for Quick Help Form
		var ipadDataString = "ipad_full_name=" + ipadFullName + "&ipad_email=" + ipadEmail;

		//Close the Quick Help Form
		$("#ipad-form").dialog('destroy');

		//Submit the Quick Help Form
		$.ajax({
			type: "POST",
			url: "includes/ipad.class.php",
			data: ipadDataString,
			success: function(result){
				$("#ipad-result").html(result).hide();
				$(function() {
					$("#ipad-result").dialog({
						title: "Request Received!",
						bgiframe: true,
						modal: true,
						resizable: false,
						width: 500,
						draggable: false,
						close: function(){
							$(this).dialog('destroy');
							$("input").val("");
							$("textarea").val("");
						}
					});
				});
			}
		});
	//End form processing (click function)
	})
})