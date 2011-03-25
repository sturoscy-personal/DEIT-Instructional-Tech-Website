<?php

	##############################################################################
	# breadcrumb.php                  Version 1.1                                #
	# Copyright 2000 Jacob Stetser    jstetser@icongarden.com                    #
	# Created Dec 30, 2000            Last Modified May 2, 2001                 #
	##############################################################################
	# COPYRIGHT NOTICE                                                           #
	# Copyright [and -left] 2000 Jacob Stetser. All Rights Reserved except as    #
	# provided below.                                                            #
	#                                                                            #
	# breadcrumb.php may be used and modified free of charge by anyone so long   #
	# as this copyright notice and the comments above remain intact. By using    #
	# this code you agree to indemnify Jacob Stetser from any liability that     #
	# might arise from it's use.                                                 #
	#                                                                            #
	# This script is released under the BSD license.                             #
	# The author recognizes this script's indebtedness to evolt.org, Martin      #
	# Burns, Adrian Roselli and countless other ideas of its kind. This script   #
	# is therefore unencumbered free code.                                       #
	##############################################################################
	
	function breadCrumb($PATH_INFO) {
		global $page_title, $root_url;
	
		// Remove these comments if you like, but only distribute 
		// commented versions.
		
		// Replace all instances of _ with a space
		$PATH_INFO = str_replace("_", " ", $PATH_INFO);
		// split up the path at each slash
		$pathArray = explode("/",$PATH_INFO);
		
		// Initialize variable and add link to home page
		if(!isset($root_url)) { $root_url=""; }
		$breadCrumbHTML = '&gt &nbsp <a href="'.$root_url.'/deit" title="Technology Home">Technology Home</a>';
		
		// initialize newTrail
		$newTrail = $root_url."/";
		
		// starting for loop at 1 to remove root
		for($a=1;$a<count($pathArray)-1;$a++) {
			// capitalize the first letter of each word in the section name
			$crumbDisplayName = ucwords($pathArray[$a]);
			// rebuild the navigation path
			$newTrail .= $pathArray[$a].'/';
			// build the HTML for the breadcrumb trail
			$breadCrumbHTML .= '<a href="'.$newTrail.'">'.$crumbDisplayName.'</a>';
		}
		// Add the current page
		if(!isset($page_title)) { $page_title = "<span class='breadcrumb'>Current Page</span>"; }
		if ($page_title !== "Technology Home"){
			$breadCrumbHTML .= '&nbsp &gt &nbsp <span class="breadcrumb">'.$page_title.'</span>';	
		}
		
		// print the generated HTML
		print($breadCrumbHTML);
		
		// return success (not necessary, but maybe the 
		// user wants to test its success?
		return true;
	}

?>