			<?php
				$building = $_GET['building'];
				$room_num = $_GET['room_num'];
				include_once('includes/browseresult.class.php');
			?>			
			<?php $page_title = "Browse Result for " . $building . " - " . $room_num; ?>
			<?php include_once('includes/header/header.inc'); ?>
			<!-- Include the header -->
			<div id="browse-result-page" class="grid_12">
				<div id="main">
					<div class="grid_3 alpha">
						<?php include_once('includes/links/links.inc'); ?>
					</div>
					
					<div class="grid_9 omega">
						<div id="browse-result">
							<h4>Result for <?php echo($building . " - " . $room_num); ?></h4>
							<div id="browse-result-tabs">
								<ul>
									<li><a href="#tabs-1">Hardware</a></li>
									<li><a href="#tabs-2">Software</a></li>
									<li><a href="#tabs-3">Accessibility</a></li>
									<li><a href="#tabs-4">Photos</a></li>
									<li><a href="#tabs-5">Other</a></li>
								</ul>
								<div id="tabs-1">
									<p class="bold">Hardware</p>
									<p>
										<?php while($row = mysql_fetch_array($hardware_query)) : ?>
											<?php $keywords = preg_split('/[\,]/', $row[5]); ?>
											<?php
												//Regular expression wizardry to catch sub-lists
												//Does not display '&' or anything after in main list
												$pattern = '/\&.*/';
												$replacement = '';
												$newKeywords = preg_replace($pattern, $replacement , $keywords);
											?>
											<?php $subWords = preg_split('/[&]/', $row[5]); ?>
											<ul id="hardware-list">
												<?php 
													foreach ($newKeywords as $keyword) {
														echo("<li>" . $keyword . "</li>");
													}
													//Sub lists
													if ($subWords){
														echo("<ul style='margin-left: 25px;'>");
														for ($i = 1; $i<=(count($subWords))-1; $i++) {
															echo("<li>" . $subWords[$i] . "</li>");
														}
														echo("</ul>");
													}
												?>
											</ul>
										<?php endwhile; ?>
										<p>Visit the Hardware Reference page <a target="_BLANK" class="non-tab" href="hardwareref.php">here</a> for detailed specs on classroom hardware.</p>
									</p>
								</div>
								<div id="tabs-2">
									<p class="bold">
										Software<br />
									</p>
									<table class="tablesorter" width="100%">
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
											<?php while($row = mysql_fetch_array($software_query)) : ?>
												<tr>
													<td><?php echo($row[1]); ?></td>
													<td><?php echo($row[2]); ?></td>
													<td><?php echo($row[3]); ?></td>
													<td><?php echo($row[4]); ?></td>
													<td><?php echo($row[5]); ?></td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div>
								<div id="tabs-3">
									<p class="bold">Accessibility</p>
									<p>
										<ul class="non-tab">
											<li>Wheelchair Accessible: <span class="bold">Yes</span></li>
											<li>For more information on accessibility, please visit our
											<a class="non-tab" href="assistive.php">Assistive Technology</a> page.</li>
										</ul>
									</p>
								</div>
								<div id="tabs-4">
									<p class="bold">Click on the photos to see a larger version.</p>
									<?php 
										while ($row = mysql_fetch_array($picture_query)) {
											if ($row[3] == '0') {
												$regular = $row[2];
												$regular = $regular . $room_num . "/resize";
											} elseif ($row[3] == '1') {
												$thumbNail = $row[2];
												$thumbNail = $thumbNail . $room_num . "/thumbnails";
											}
										}
										if ($handle = @opendir($regular)) {
											while (false !== ($file = readdir($handle))) {
												if ($file != "." && $file != ".." && $file != "Thumbs.db") {
													echo("<a class='lightbox' href='" . $regular . "/" . $file . "'><img src='" . $thumbNail . "/" . $file . "'/></a>");
												}
											}
											closedir($handle);
										} else {
											echo("<a class='lightbox' href='http://placehold.it/600x250&text=Still+Nothing+Here+:)'><img src='http://placehold.it/305x150&text=Photos+Coming+Soon' /></a>");
										}
									?>
								</div>
								<div id="tabs-5">
									<p class="bold">Other</p>
									<p>
										<ul class="non-tab">
											<li>Wireless Ready: <span class="bold">Yes</span></li>
											<?php 
												//Reset the data pointer in the array
												mysql_data_seek($hardware_query, 0);
												while($mac = mysql_fetch_array($hardware_query)) {
													if ($mac[1] == 'Campbell'){
														if ($mac[3] == 'Campbell Distance Learning Center')
														{
															echo("<li>HD Video Conferencing Ready: <span class='bold'>Yes</span></li>");
															echo("<li>Touch-to-talk student microphones</li>");
															echo("<li>Multimedia projection system and plasma display</li>");
															echo("<li>Seating for up to <span class='bold'>30</span> participants</li>");
															echo("<li>(29) Dell Latitude 110L Student Laptops</li>");
														}
													}
													if ($mac[1] == 'Dooling'){
														if ($mac[3] == '104' || $mac[3] == '105' || $mac[3] == '106' || $mac[3] == '107' || 
															$mac[3] == '108' || $mac[3] == '109' || $mac[3] == '128' || $mac[3] == '204' || 
															$mac[3] == '205' || $mac[3] == '206' || $mac[3] == '207' || $mac[3] == '208' || 
															$mac[3] == '209' || $mac[3] == '225' || $mac[3] == '227' || $mac[3] == '228' || 
															$mac[3] == '229')
														{
															echo("<li>Mac Laptop Ready: <span class='bold'>Yes</span></li>");
															echo("<li>HD Video Conferencing Ready: <span class='bold'>Yes</span></li>");
														}
													}
													if ($mac[1] == 'Trexler') {
														if ($mac[3] == 'Trexler Library Air Products Room')
														{
															echo("<li>HD Video Conferencing Ready: <span class='bold'>Yes</span></li>");
															echo("<li>14' wide projection screen</li>");
															echo("<li>42\" plasma display</li>");
															echo("<li>Dolby&copy 7.1 Surround Sound Technology</li>");
															echo("<li>Wireless audio and remote control</li>");
														}
													}
													if ($mac[1] == 'Easton') {
														if ($mac[3] == '111')
														{
															echo("<li>HD Video Conferencing Ready: <span class='bold'>Yes</span></li>");
															echo("<li>Ceiling Mounted Microphones: <span class='bold'>Yes</span></li>");
															echo("<li>Wireless Instructor Microphone: <span class='bold'>Yes</span></li>");
															echo("<li><span class='bold'>20</span> student stations equipped with push-to-talk (PTT) microphones</li>");
															echo("<li>Bandwidth capabilities: <span class='bold'>1 MB (minimum) to 5 MB (maximum)</span></li>");
															
														}
													}
													if ($mac[1] == 'Lansdale') {
														if ($mac[3] == '21' || $mac[3] == '103')
														{
															echo("<li>HD Video Conferencing Ready: <span class='bold'>Yes</span></li>");
															echo("<li>Ceiling Mounted Microphones: <span class='bold'>Yes</span></li>");
															echo("<li>Wireless Instructor Microphone: <span class='bold'>Yes</span></li>");
															echo("<li>Seating for up to <span class='bold'>16</span> participants</li>");
															echo("<li>Bandwidth capabilities: <span class='bold'>1 MB (minimum) to 5 MB (maximum)</span></li>");
														}
													}
													if ($mac[6] !== Null) {
														echo("<li><span class='bold'>Lighting: </span>" . $mac[6] . "</li>");
													}
												}
											?>
										</ul>
									</p>
								</div>						
							</div>
						</div>
					</div>
				</div>				
			</div>
			
			<div class="clear"></div>
			
			<!-- Include the footer -->
			<?php include_once('includes/footer/footer.inc'); ?>
			
		<!-- Close the containter_12 div -->
		</div>
		<script type="text/javascript">
			google.setOnLoadCallback(function() {
				//Lightbox
				$("a.lightbox").lightBox({
					imageLoading:  'http://deit.desales.edu/deit/stylesheets/lightbox/images/lightbox-ico-loading.gif',
					imageBtnClose: 'http://deit.desales.edu/deit/stylesheets/lightbox/images/lightbox-btn-close.gif',
					imageBtnPrev:  'http://deit.desales.edu/deit/stylesheets/lightbox/images/lightbox-btn-prev.gif',
					imageBtnNext:  'http://deit.desales.edu/deit/stylesheets/lightbox/images/lightbox-btn-next.gif'
				});
				
				$("#browse-result-tabs").tabs();
				
				$("#tabs-2 table").dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers",
					"iDisplayLength": 10
				});

			})
		</script>
	</body>
</html>
<?php mysql_free_result($hardware_query); ?>
<?php mysql_free_result($software_query); ?>
<?php mysql_free_result($picture_query); ?>