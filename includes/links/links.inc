						<div id="links">
							<h4>Classrooms</h4>
							<a href="browse.php">Browse Classrooms</a>
							
							<h4 class="link-category-two">Classroom Technology</h4>
							<a href="hardwareref.php">Hardware Reference</a><br />
							<a href="hardwareloan.php">Hardware Loan</a><br />
							<a href="softwarelist.php">Software Listing</a><br />
							<a href="request.php">Request Software</a><br />
							<a href="assistive.php">Assistive Technology</a>
							
							<!-- If on homepage, display the DEIT motto and iPad link... 
								 if not, display nothing. -->
							<?php if ($page_title == 'Technology Home') : ?>
								<table>
									<tr>
										<td valign="top">
											<img class="ipad" src="images/ipad_small.png" />
										</td>
										<td valign="top">
											<p class="ipad">
												<span class="bold red">New!</span> Three iPad 2's for faculty use.
											</p>
										</td>
									</tr>
								</table>
								<a id="open-ipad-form" href="">Click here to reserve one.</a>

								<br /><div class="hr"><hr /></div><br />
								
								<p class="quote italics" style="padding-right: 25px;">									
									The mission of the Distance Education and Instructional Technology Department is to support the effective 
									use of technology in order to enhance the quality of instruction and learning in the Commonwealth and 
									beyond in a manner consistent with our Christian humanism philosophy.
								</p>
							<?php endif; ?>
						</div>