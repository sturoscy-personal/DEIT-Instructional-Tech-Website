			<?php $page_title = "Technology Home"; ?>
			<?php include_once('includes/header/header.inc'); ?>
			<!-- Include the header above -->
			<div id="home-page" class="grid_12">
				<div id="main">
					<div class="grid_3 alpha">
						<?php include_once('includes/links/links.inc'); ?>
					</div>
					
					<div class="grid_6">
						<div id="info">
							<div id="info-paragraph-one">
								<h4>DeSales University</h4>
								<h4>Classroom Technology</h4>
								<p>
									Learn more about DeSales University's instructional technologies here. Browse classrooms, make installation 
									requests or search instructional hardware, software and related instructional technology information.
								</p>
							</div>
							
							<div id="info-paragraph-two">
								<h4>Assistance</h4>
								<p>
									For assistance with classroom technology or to request additional resources, please use the links below 
									for help:
								</p>
								<ul>
									<li><a href="request.php">Request Software Installation</a></li>
									<li><a href="assistive.php">Assistive Technology on Campus</a></li>
									<li><a href="mailto:deit@desales.edu?subject=Request for Technologist">Schedule a Meeting with a Technologist</a></li>
								</ul>
							</div>
							
							<!-- <div class="hr"><hr /></div> -->
							
							<h4 class="open-form-h4-margin">Ask DEIT</h4>
							<img class="open-form-img" src="images/help-question.png" />
							<div class="clear"></div>
							<p id="open-form">
								If you can't find what you are looking for, have a question, or simply have a helpful suggestion, click 
								<a id="open-help-form" href="#">here</a> to send us a note.  We appreciate your feedback!
							</p>
							
							<div id="info-form">						
								<form>
									<table width="100%">
										<tr>
											<td width="10%"><img align="middle" src="images/envelope.png" /></td>
											<td width="90%"><h4>Quick Help</h4></td>
										</tr>
									</table>	

									<label for="full-name">Full Name:</label><br />
									<input id="full-name" name="full-name" type="text"/><br />
									
									<label for="email">E-mail Address:</label><br />
									<input id="email" name="email" type="text" /><br />
									
									<label for="messsage">Message:</label><br />
									<textarea id="message" name="message" wrap="hard"></textarea><br />
									
									<input id="submit" name="Submit" type="button" value="Submit" />
								</form>
							</div>
							
							<!-- Code for iPad form -->
							<div id="ipad-form">
								<p>
									If you are interested in checking out an iPad 2 for educational use, please fill out the form below.
									Once your request is received, a member of DEIT will be in contact with you. The DEIT department will
									also let you know where you can pick up your iPad.
								</p>
								<p>
									Please contact DEIT at 610.282.1100 x2290 or at <a href="mailto:deit@desales.edu">deit@desales.edu</a> if
									you have any questions.
								</p>
								<hr style="margin-bottom: 15px;"/>
								<form>
									<label for="ipad-full-name">Full Name:</label><br  />
									<input id="ipad-full-name" name="ipad-full-name" type="text"/><br />
									
									<label for="ipad-email">E-mail Address:</label><br />
									<input id="ipad-email" name="ipad-email" type="text" /><br />
									
									<input id="ipad-submit" name="Submit" type="button" value="Submit" />
								</form>
							</div>
							
						</div>
					</div>
					
					<div class="grid_3 omega">
						<div id="contact">
							<h4>Contact Us</h4>
							<ul>
								<li>Location: Trexler Library</li>
								<li>E-mail: deit@desales.edu</li>
								<li>Phone: 610.282.1100 x2290</li>
							</ul>
							<div class="hr"><hr /></div>
							<div id="contact-links">
								<h4>Helpful Links</h4>
								<ul>
									<li><a target="_blank" href="http://www.desales.edu/angelinfo">ANGEL at DeSales</a></li>
									<hr />

									<li><a target="_blank" href="https://www7.desales.edu/secforms/technology/elluminate.html">Elluminate Request Form</a></li>
									<li><a target="_blank" href="http://deit.desales.edu/deit/assets/StreamCopyWaiverv7.pdf">Streaming Media Request</a></li>
									<li><a target="_blank" href="http://deit.desales.edu/deit/assets/InnovationProcessFormV2.pdf">Technology Innovation Form</a></li>
									<li><a target="_blank" href="http://deit.desales.edu/deit/assets/InnovationProposalRubricFull.pdf">Technology Innovation Rubric</a></li>
									<li><a target="_blank" href="http://www.desales.edu/workshops">Technology Workshops</a></li>
									<hr />

									<li><a target="_blank" href="http://deit.desales.edu/deit/mobile-statement.php">Mobile Technology Policy Statement</a></li>
									<li><a target="_blank" href="http://deit.desales.edu/deit/mobile-tips.php">Tips for Mobile Device Owners</a></li>
									<hr />

									<li><a target="_blank" href="http://blogs.desales.edu/deit">DEIT Blog</a></li>
									<li><a target="_blank" href="http://www.desales.edu/deit">DEIT Homepage</a></li>
									<li><a target="_blank" href="http://www.desales.edu">DeSales Homepage</a></li>
									<li><a target="_blank" href="http://deit.desales.edu/feedback">Distance Education Feedback Form</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			
			<!-- Include the footer -->
			<?php include_once('includes/footer/footer.inc'); ?>
		
		<div id="quickhelp-result"></div>
		<div id="ipad-result"></div>
		<!-- Close the container_12 div -->	
		</div>
	</body>
	<script type="text/javascript">
		google.setOnLoadCallback(function() {
			//Do not auto open the modal dialog automatically
			$("#info-form").dialog({
				autoOpen: false,
				bgiframe: true,
				title: "Quick Help",
				modal: true,
				resizable: false,
				width: 500,
				draggable: false
			});

			//Form dialog
			$("#open-help-form").click(function(e){
				e.preventDefault();
				$("#info-form").dialog('open');
				return false;
			});

			//Process the form
			$("#submit").click(function(){
				var fullName = $("#full-name").val();
				var email    = $("#email").val();
				var message  = $("#message").val();

				if (!fullName){
					alert("Please enter your full name");
					$("#full-name").animate({backgroundColor: 'yellow'}, 1000);
					return false;
				}
				if (!email){
					alert("Please enter your e-mail address");
					$("#email").animate({backgroundColor: 'yellow'}, 1000);
					return false;
				}
				if (!message){
					alert("Please enter a short message");
					$("#message").animate({backgroundColor: 'yellow'}, 1000);
					return false;
				}

				//Make sure the user is offering a valid e-mail address
				var emailPattern = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
				if (!emailPattern.test(email)){
					alert("Please enter a valid e-mail address");
					$("#email").animate({backgroundColor: 'yellow'}, 1000);
					email.focus;
					return false;
				}

				//DataString for Quick Help Form
				var dataString = "full_name=" + fullName + "&email=" + email + "&message=" + message;

				//Close the Quick Help Form
				$("#info-form").dialog('destroy');

				//Submit the Quick Help Form
				$.ajax({
					type: "POST",
					url: "includes/quickhelp.class.php",
					data: dataString,
					success: function(result){
						$("#quickhelp-result").html(result).hide();
						$(function() {
							$("#quickhelp-result").dialog({
								title: "Quick Help Results",
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
	</script>
</html>