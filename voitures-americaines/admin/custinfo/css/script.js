;(function($) {
	
	
	
	$(function() {
    if (window.PIE) {
	$('.header_main').each(function(){PIE.attach(this);});
	$('input.form_input').each(function(){PIE.attach(this);});
	$('.contact_area').each(function(){PIE.attach(this);});
    }
});
	
	
	
$(function() {

			 
				//	Responsive layout, resizing the items
				$('#foo4').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					items: {
						width: 400,
					//	height: '30%',	//	optionally resize item-height
						visible: {
							min: 2,
							max: 6
						}
					}
				});

})
			
			
			
		$(function() { 
		
		 function resetTabs(){
        $("#content_vehicle > div").hide(); //Hide all content_vehicle
        $("#tabs a").attr("id",""); //Reset id's      
    }

    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0,4); // For the above example, myUrlTabName = #tab

    (function(){
        $("#content_vehicle > div").hide(); // Initially hide all content_vehicle
        $("#tabs li:first a").attr("id","current"); // Activate first tab
        $("#content_vehicle > div:first").fadeIn(); // Show first tab content_vehicle
        
        $("#tabs a").on("click",function(e) {
            e.preventDefault();
            if ($(this).attr("id") == "current"){ //detection for current tab
             return       
            }
            else{             
            resetTabs();
            $(this).attr("id","current"); // Activate this
            $($(this).attr('name')).fadeIn(); // Show content_vehicle for current tab
            }
        });

        for (i = 1; i <= $("#tabs li").length; i++) {
          if (myUrlTab == myUrlTabName + i) {
              resetTabs();
              $("a[name='"+myUrlTab+"']").attr("id","current"); // Activate url tab
              $(myUrlTab).fadeIn(); // Show url tab content_vehicle        
          }
        }
    })()
		
		})	
			
			
			
			
			
			
			
			
			
			} 




(jQuery))