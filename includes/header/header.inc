<?php require_once('includes/breadcrumbs/breadcrumb.php'); $last_updated = "Wednesday, March 23, 2011"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta name="google-site-verification" content="R9wyNlkg7JgytrsGsGOVHL45_N3r_GrIeI-qmD9GcE0" />
		<title>DeSales University Instructional Technology</title>
		<!-- 
			Let Google host the jQueryUI theme CSS 
			This will cut down on server load
		-->
		<!-- Load the jQueryUI theme CSS from Google -->
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/smoothness/jquery-ui.css" media="screen" />
		<link rel="stylesheet" href="stylesheets/grid.960.css" media="screen" />
		<link rel="stylesheet" href="stylesheets/main.css" media="screen" />
		<link rel="stylesheet" href="stylesheets/tablesorter/blue/style.css" />
		<link rel="stylesheet" href="stylesheets/datatables/demo_table.css" />
		<link rel="stylesheet" href="stylesheets/datatables/demo_table_jui.css" />
		<link rel="stylesheet" href="stylesheets/lightbox/css/jquery.lightbox-0.5.css" />
		
		<!-- Correct some CSS styles for plugins -->
		<style type="text/css">
			.dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate {font-family: Helvetica, sans-serif; font-size: 0.85em;}
			.dataTables_length {visibility: hidden;}
			.ui-widget {font-family: Helvetica, sans-serif; font-size: 1.0em;}
			.ui-widget select {font-family: Helvetica, sans-serif; font-size: 0.85em;}
			
			/* Fix Positioning of Modal Dialog */
			.ui-dialog {position: absolute;}
			
			/* reCaptcha fix
			form #recaptcha_widget_div #recaptcha_area {width: 275px !important;}
			form #recaptcha_widget_div #recaptcha_area #recaptcha_table {width: 275px !important;}
			*/
			form #recaptcha_widget_div {margin-bottom: 25px;}
			form #recaptcha_widget_div #recaptcha_area #recaptcha_table #recaptcha_response_field {height: 18px;}
		</style>
		<!-- End plugin CSS style corrections -->
		
		<!-- Correct some remaining IE margin bugs -->
		<!--[if lt IE 8]>
		
			<style type="text/css">
				#campus-list li {margin-bottom: 15px;}
				#technology-request form #installed {margin: 0px;}
				#request-page #main{height: 1380px;}
				#request-page #main #links {height: 1360px;}
				#request-page #main #technology-request {height: 1340px;}
				#software-list-result form .search-submit {padding: 9px 20px 1px 20px;}
				
				#home-page #main #info #info-paragraph-two li {padding-left: 5px;}
				#browse-page #main #browse-technology li {padding-left: 5px;}
				#assistive-page #main {height: 800px;}
				#assistive-page #main #links {height: 780px;}
				#assistive-page #main #assistive-page-result {height: 780px;}
			</style>
			
		<![endif]-->
		<!-- End IE bug fixes -->
				
		<!-- Load the latest versions of jQuery and jQuery UI from Google's CDN servers -->
		<script src="http://www.google.com/jsapi?key=ABQIAAAAouTcR5pargXhEAtm4CODuhR1IgWQluDLEZuG6zC4jkkgj3hPMhT_DiGugOsQJmWOxV5nYZepBkPkxg" type="text/javascript"></script>
		<script>
			// Load the latest version of jQuery
			// Simply choosing '1' will ensure the latest sub-version is chosen
			google.load("jquery", "1");
			google.load("jqueryui", "1");
		</script>
		<!-- Load all plugins -->
		<script src="javascript/datatables/jquery.datatables.min.js"></script>
		<script src="javascript/lightbox/js/jquery.lightbox-0.5.min.js"></script>
		<script src="javascript/jquery.dotimeout.js"></script>
		<script src="javascript/cufon-yui.js"></script>
		<script src="javascript/Georgia.font.js"></script>
		<script src="javascript/OldSans.font.js"></script>
		<script type="text/javascript">
			Cufon.replace('h1, h2, h3, h4, h5, h6', { fontFamily: 'Georgia' });
			Cufon.replace('a.cufon', 'p.cufon', { fontFamily: 'OldSans' });
		</script>
		<!-- End of plugins -->
	</head>
	<body>
		<div id="topper">
			<div style="padding: 5px;">
				<a class="cufon home-link" href="http://www.desales.edu"> >> Return to DeSales Home Page</a>
			</div>
		</div>
		<div class="clear"></div>
		<div class="container_12">
			<div id="header" class="grid_12">
				<a href="http://deit.desales.edu/">
					<img src="images/it-header-text.png" title="Instructional Technology" alt="Instructional Technology" />
				</a>
				<div id="site-navigation">
					<p class="bold">Site Navigation</p>
					<div class="breadcrumbs"><?php breadCrumb(getenv("SCRIPT_URL")); ?></div>
				</div>
				<div class="clear"></div>
				<img id="header-graphic" src="images/it-header-graphic-spring-lessgreen.png" title="DeSales Instructional Technology" alt="DeSales Instructional Technology" />
			</div>
			<div class="clear"></div>