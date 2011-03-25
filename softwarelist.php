			<?php $page_title = "Software Listing"; ?>
			<?php include_once('includes/header/header.inc'); ?>
			<!-- Include the header -->
			<div id="software-list-page" class="grid_12">
				<div id="main">
					<div class="grid_3 alpha">
						<?php include_once('includes/links/links.inc'); ?>
					</div>
					
					<div class="grid_9 omega">
						<div id="software-list-result">
							<h4>Campus Software Listing</h4>
							<p class="normal">
								Please click <a href="assets/Software Master List.pdf">here</a> for a master list of software currently
								available on campus.  If you do not see the software on this list, please contact your department to see 
								if it has been purchased and is available for install.<br />
								
								<!--  
								Please note that the software listing is for <span class="bold italics underline">instructor PC's only</span>. 
								Student PC's coming soon!
								-->
							</p>
							<hr style="margin-bottom: 20px; class="hr" />
							
							<h4>Campus Software Search</h4>
							<form>
								<input id="search-term" type="text" name="software-search-term"></input>
								<a class="search-submit" href="#"><span>Search</span></a>
							</form>
						</div>
						<div id="search-result"></div>
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

				$(".search-submit").click(function(e){
					//Prevent Default Behavior
					e.preventDefault();

					//Get the universal search term
					var searchTerm = $("#search-term").val();
					var dataString = "software_search_term=" + searchTerm;
					
					$.ajax({
						type: "POST",
						url: "includes/softwarelist.class.php",
						data: dataString,
						beforeSend: function(){
							$(function() {
								$("#search-result").html("<img src='images/ajax-loader.gif' />").dialog({
									title: "Results loading...",
									bfiframe: true,
									modal: true,
									width: 255,
									height: 85,
									resizable: false,
									draggable: false
								});
							});
						},
						success: function(result){
							$("#search-result").html(result).hide();
							$("#search-result table").dataTable({
								"bJQueryUI": true,
								"sPaginationType": "full_numbers",
								"iDisplayLength": 10
							});
							$(function() {
								$("#search-result").dialog('destroy');
								$("#search-result").dialog({
									title: "Search Result",
									bgiframe: true,
									modal: true,
									width: 940,
									resizable: false,
									draggable: false
								});
							});
						}
					});
				});
			})
		</script>
	</body>
</html>