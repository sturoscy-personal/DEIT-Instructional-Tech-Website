			<?php $page_title = "Technology Request"; ?>
			<?php include_once('includes/header/header.inc'); ?>
			<!-- Include the header -->
			<div id="request-page" class="grid_12">
				<div id="main">
					<div class="grid_3 alpha">
						<?php include_once('includes/links/links.inc'); ?>
					</div>

					<div class="grid_9 omega">
						<div id="technology-request">
							<form>
								<div id="is-technology-available">
									<blockquote>
										<h5>
											<span class="bold red">*</span>To utilize this form, you must:
										</h5>
										<br />
										<ul>
											<li>be current faculty or staff.</li>
											<li>possess the software approved by your academic unit.</li>
											<li>have a confirmed room assignment from the registrar.</li>
										</ul>
									</blockquote>
									<table>
										<tr>
											<td><label for="installed">Please check here if you meet the above criteria:</label></td>
											<td><input id="installed" name="installed" type="checkbox" value="yes" /></td>
										</tr>
									</table>
									<hr class="break" />
								</div>
																	
								<h4>Contact Information</h4>
								
								<label for="first-name" name="First Name">First Name*</label><br />
								<input id="request-first-name" class="required" name="first-name" type="text" /><br />
								
								<label for="last-name" name="Last Name">Last Name*</label><br />
								<input id="request-last-name" class="required" name="last-name" type="text" /><br />
								
								<label for="email" name="email">E-mail*</label><br />
								<input id="request-email" class="required" name="email" type="text" /><br />
								
								<label for="phone-number" name="Phone Number">Phone Number*</label><br />
								<input id="request-phone-number" class="required" name="phone-number" type="text" /><br />
								
								<label for="course-number" name="Course Number">Course Number*</label><br />
								<input id="request-course-number" class="required" name="course-number" type="text" /><br />
								
								<label for="department" name="Department">Department*</label><br />
								<input id="request-department" class="required" name="department" type="text" /><br />
								
								<h4>Request Software Installation</h4>
								<label for="building-room" name="Building and Room Number">Building and Room Number*</label><br />
								<input id="request-building-room" class="required" name="building-room" type="text" /><br />
								
								<label name="Date the software is needed">Software Installation Dates*</label><br />
								<!--<label for="date-start" name="Installation Date Start">From: </label>-->
								<input id="request-date-start" class="calendar" name="date-start" type="text" value="From:" />
								<!--<label for="date-end" name="Installation Date End">To: </label>-->
								<input id="request-date-end" class="calendar" name="date-end" type="text" value="To:" /><br />
								
								<label for="software-name" name="Software Name">Software Name*</label><br />
								<input id="request-software-name" class="required" name="software-name" type="text" /><br />
								
								<label for="version-number" name="Version Number">Version Number</label><br />
								<input id="request-version-number" name="version-number" type="text" /><br />
								
								<label for="comments" name="Comments">Comments</label><br />
								<textarea id="request-comments" name="comments" type="text" wrap="hard"></textarea><br />
								
								<label>Please fill out the reCAPTCHA field below.</label>
								<?php 
									require_once('includes/recaptcha/recaptchalib.php'); 
									$publickey  = '6LfkdQwAAAAAAFGxxz9KwMet9aQNiO5h7UzyXw-R'; 
									
									echo recaptcha_get_html($publickey);
								?>
								
								<a id="request-submit" href="#">Submit</a>
							</form>
						</div>
					</div>
				</div>				
			</div>
			
			<div class="clear"></div>
			
			<!-- Include the footer -->
			<?php include_once('includes/footer/footer.inc'); ?>
			
			<!-- Close the containter_12 div -->
			<div id="request-result"></div>
		</div>
		<script type="text/javascript" src="javascript/form.handler.js"></script>
	</body>
</html>
