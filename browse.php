			<?php $page_title = "Browse Technology"; ?>
			<?php include_once('includes/browse.class.php'); ?>
			<?php include_once('includes/header/header.inc'); ?>
			<!-- Include the header -->
			<div id="browse-page" class="grid_12">
				<div id="main">
					<div class="grid_3 alpha">
						<?php include_once('includes/links/links.inc'); ?>
					</div>
					
					<div class="grid_9 omega">
						<div id="browse-technology">
							<h4>Browse Classrooms</h4>
							<p>
								Browse rooms in the central classroom pool. The list below is arranged alphabetically 
								by building. Click a building to view rooms.
							</p>
							<div id="buildings">
								<p class="bold">Center Valley Campus</p>
								<ul id="buildings-list">
									<li>
										<a id="billera-trigger" href="#">Billera Hall</a>
										<ul id="billera-dropdown" class="triggered-list">
											<?php while($row = mysql_fetch_array($billera_query)) : ?>
												<li><?php echo($row[2]); ?></li>
											<?php endwhile; ?>
										</ul>
									</li>
									<li>
										<a id="campbell-trigger" href="#">Campbell Hall</a>
										<ul id="campbell-dropdown" class="triggered-list">
											<?php while($row = mysql_fetch_array($campbell_query)) : ?>
												<li><?php echo($row[2]); ?></li>
											<?php endwhile; ?>
										</ul>
									</li>
									<li>
										<a id="dooling-trigger" href="#">Dooling Hall</a>
										<ul id="dooling-dropdown" class="triggered-list">
											<?php while ($row = mysql_fetch_array($dooling_query)) : ?>
												<li><?php echo($row[2]); ?></li>
											<?php endwhile; ?>
										</ul>
									</li>
									<li>
										<a id="hurd-trigger" href="#">Hurd Science Center</a>
										<ul id="hurd-dropdown" class="triggered-list">
											<?php while ($row = mysql_fetch_array($hurd_query)) :?>
												<li><?php echo($row[2]); ?></li>
											<?php endwhile; ?>
										</ul>
									</li>
									<li>
										<a id="labuda-trigger" href="#">Labuda Hall</a>
										<ul id="labuda-dropdown" class="triggered-list">
											<?php while ($row = mysql_fetch_array($labuda_query)) :?>
												<li><?php echo($row[2]); ?></li>
											<?php endwhile; ?>
										</ul>
									</li>
									<li>
										<a id="trexler-trigger" href="#">Trexler Library</a>
										<ul id="trexler-dropdown" class="triggered-list">
											<?php while ($row = mysql_fetch_array($trexler_query)) : ?>
												<li><?php echo($row[2]); ?></li>
											<?php endwhile; ?>
										</ul>
									</li>
								</ul>
							</div>
							<div id="campus">
								<ul id="campus-list">
									<li>
										<a id="easton-trigger" class="bold" href="#">Click for Easton Campus</a>
										<ul id="easton-dropdown" class="triggered-list">
											<?php while ($row = mysql_fetch_array($easton_query)) : ?>
												<li><?php echo($row[2]); ?></li>
											<?php endwhile; ?>
										</ul>
									</li><br />
									<li>
										<a id="lansdale-trigger" class="bold" href="#">Click for Lansdale Campus</a>
										<ul id="lansdale-dropdown" class="triggered-list">
											<?php while ($row = mysql_fetch_array($lansdale_query)) : ?>
												<li><?php echo($row[2]); ?></li>
											<?php endwhile; ?>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>				
			</div>
			
			<div class="clear"></div>
			
			<!-- Include the footer -->
			<?php include_once('includes/footer/footer.inc'); ?>
			
		<div id="request-result"></div>
		<!-- Close the containter_12 div -->
		</div>
		<script type="text/javascript" src="javascript/dropdown-control.js"></script>
	</body>
</html>
<?php mysql_free_result($billera_query); ?>
<?php mysql_free_result($dooling_query); ?>
<?php mysql_free_result($campbell_query); ?>
<?php mysql_free_result($hurd_query); ?>
<?php mysql_free_result($trexler_query); ?>
<?php mysql_free_result($labuda_query); ?>
<?php mysql_free_result($easton_query); ?>
<?php mysql_free_result($lansdale_query); ?>