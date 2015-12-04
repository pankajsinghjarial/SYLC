;(function($) {
	
	
	
	$(function() {
    if (window.PIE) {
	$('.account_box').each(function(){PIE.attach(this);});
	$('input.order_now_bt').each(function(){PIE.attach(this);});
	$('#tabs a').each(function(){PIE.attach(this);});
    }
});
	
	
	
	
	$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".iframe").colorbox({iframe:true, width:"50%", height:"70%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".inline02").colorbox({inline:true, width:"80%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
			
			
			
			
	
$(function() {

			 
				//	Responsive layout, resizing the items
				$('#foo4').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 2,
					auto: false,
					prev: '#prev2',
					next: '#next2',
					
					items: {
						width: 220,
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
        if($.cookie("activetab") != null) {
					resetTabs()
					var cur = $.cookie("activetab");
					$("a[name='"+cur+"']").attr("id","current");
					$(""+cur).fadeIn();
					 }else{ 
				$("#tabs li:first a").attr("id","current"); // Activate first tab
        $("#content_vehicle > div:first").fadeIn(); // Show first tab content_vehicle
				}
        $("#tabs a").on("click",function(e) {
            e.preventDefault();
					
            if ($(this).attr("id") == "current"){ //detection for current tab
          
						return       
            }
            else{             
            resetTabs();
						var tabname = $(this).attr('name');
						$.cookie("activetab",tabname);
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
			
			
$(function() { $(".three_collm_tbl tr:odd").css("background-color", "#dbdbdb"); })			
			
			
			
			
			
			
			} 
(jQuery))