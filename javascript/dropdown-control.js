			google.setOnLoadCallback(function() {

				//Main Height
				var mainHeight = $("#browse-page #main").height();
				
				//Hide the drop down lists
				$("#billera-dropdown").hide();				
				$("#dooling-dropdown").hide();
				$("#campbell-dropdown").hide();
				$("#hurd-dropdown").hide();
				$("#labuda-dropdown").hide();
				$("#trexler-dropdown").hide();
				$("#easton-dropdown").hide();
				$("#lansdale-dropdown").hide();
				
				//Trigger the dropdowns
				//
				//Toggle States
				bts = 0;
				dts = 0;
				cts = 0;
				hts = 0;
				lts = 0;
				tts = 0;
				ets = 0;
				las = 0;
				
				$("#billera-trigger").click(function(e){
					//Prevent default click behavior
					e.preventDefault();
					$("#billera-dropdown").toggle(function(){
						if (cts == 0){
							billeraHeight = $(this).height();
							mainHeight     = mainHeight + billeraHeight;
							cts = cts + 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height((mainHeight - 40));
							$("#browse-page #main #links").height((mainHeight - 40));
						} else if (cts == 1){
							mainHeight = mainHeight - billeraHeight;
							cts = cts - 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height(mainHeight - 40);
							$("#browse-page #main #links").height(mainHeight - 40);
						}
					});
				});

				$("#campbell-trigger").click(function(e){
					//Prevent default click behavior
					e.preventDefault();
					$("#campbell-dropdown").toggle(function(){
						if (cts == 0){
							campbellHeight = $(this).height();
							mainHeight     = mainHeight + campbellHeight;
							cts = cts + 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height((mainHeight - 40));
							$("#browse-page #main #links").height((mainHeight - 40));
						} else if (cts == 1){
							mainHeight = mainHeight - campbellHeight;
							cts = cts - 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height(mainHeight - 40);
							$("#browse-page #main #links").height(mainHeight - 40);
						}
					});
				});
				
				$("#dooling-trigger").click(function(e){
					//Prevent default click behavior
					e.preventDefault();
					$("#dooling-dropdown").toggle(function(){
						if (dts == 0){
							doolingHeight = $(this).height();
							mainHeight    = mainHeight + doolingHeight;
							dts = dts + 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height((mainHeight - 40));
							$("#browse-page #main #links").height((mainHeight - 40));
						} else if (dts == 1){
							mainHeight = mainHeight - doolingHeight;
							dts = dts - 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height(mainHeight - 40);
							$("#browse-page #main #links").height(mainHeight - 40);
						}
					});
				});

				$("#hurd-trigger").click(function(e){
					//Prevent default click behavior
					e.preventDefault();
					$("#hurd-dropdown").toggle(function(){
						if (hts == 0){
							hurdHeight = $(this).height();
							mainHeight = mainHeight + hurdHeight;
							hts = hts + 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height((mainHeight - 40));
							$("#browse-page #main #links").height((mainHeight - 40));
						} else if (hts == 1){
							mainHeight = mainHeight - hurdHeight;
							hts = hts - 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height(mainHeight - 40);
							$("#browse-page #main #links").height(mainHeight - 40);
						}
					});
				});

				$("#labuda-trigger").click(function(e){
					//Prevent default click behavior
					e.preventDefault();
					$("#labuda-dropdown").toggle(function(){
						if (lts == 0){
							labudaHeight = $(this).height();
							mainHeight = mainHeight + labudaHeight;
							lts = lts + 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height((mainHeight - 40));
							$("#browse-page #main #links").height((mainHeight - 40));
						} else if (lts == 1){
							mainHeight = mainHeight - labudaHeight;
							lts = lts - 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height(mainHeight - 40);
							$("#browse-page #main #links").height(mainHeight - 40);
						}
					});
				});

				$("#trexler-trigger").click(function(e){
					//Prevent default click behavior
					e.preventDefault();
					$("#trexler-dropdown").toggle(function(){
						if (tts == 0){
							trexlerHeight = $(this).height();
							mainHeight = mainHeight + trexlerHeight;
							tts = tts + 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height((mainHeight - 40));
							$("#browse-page #main #links").height((mainHeight - 40));
						} else if (tts == 1){
							mainHeight = mainHeight - trexlerHeight;
							tts = tts - 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height(mainHeight - 40);
							$("#browse-page #main #links").height(mainHeight - 40);
						}
					});
				});
				
				$("#easton-trigger").click(function(e){
					//Prevent default click behavior
					e.preventDefault();
					$("#easton-dropdown").toggle(function(){
						if (ets == 0){
							eastonHeight = $(this).height();
							mainHeight = mainHeight + eastonHeight;
							ets = ets + 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height((mainHeight - 40));
							$("#browse-page #main #links").height((mainHeight - 40));
						} else if (ets == 1){
							mainHeight = mainHeight - eastonHeight;
							ets = ets - 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height(mainHeight - 40);
							$("#browse-page #main #links").height(mainHeight - 40);
						}
					});
				});
				
				$("#lansdale-trigger").click(function(e){
					//Prevent default click behavior
					e.preventDefault();
					$("#lansdale-dropdown").toggle(function(){
						if (las == 0){
							lansdaleHeight = $(this).height();
							mainHeight = mainHeight + lansdaleHeight;
							las = las + 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height((mainHeight - 40));
							$("#browse-page #main #links").height((mainHeight - 40));
						} else if (las == 1){
							mainHeight = mainHeight - lansdaleHeight;
							las = las - 1;
							$("#main").height(mainHeight);
							$("#browse-page #main #browse-technology").height(mainHeight - 40);
							$("#browse-page #main #links").height(mainHeight - 40);
						}
					});
				});
			})