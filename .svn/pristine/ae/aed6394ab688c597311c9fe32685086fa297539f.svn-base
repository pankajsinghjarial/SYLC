//home slider start
    jQuery(window).load(function() {
    jQuery('.flexslider').flexslider({
          animation: "fade"
    });
	
  });
 //home slider end
  

// Mon compte pop up start
jQuery(document).ready(function(){
jQuery("#mon_compte_pop, .m_identifier").hover(function(){	 
	jQuery(".m_identifier").css({"display":"block"});
}, function(){	 
	jQuery(".m_identifier").css({"display":"none"});
	});  
});
// Mon compte pop up end


// identifiez-vous pop up start
jQuery(document).ready(function(){
jQuery("#identifiez_pop, .identifiez_vous").hover(function(){	 
	jQuery(".identifiez_vous").css({"display":"block"});
}, function(){	 
	jQuery(".identifiez_vous").css({"display":"none"});
	});  
});
// identifiez-vous pop up start


// equipements-de-nettoyage slider start
jQuery(function() {
//	Scrolled by user interaction
jQuery('#foo2').carouFredSel({
auto: true,
prev: '#prev2',
next: '#next2',
pagination: "#pager2",
duration: '8500',
mousewheel: true,
auto: {
duration: 5250,
timeoutDuration: 7000    
},
swipe: {
	onMouse: true,
	onTouch: true
						}
});

});
// equipements-de-nettoyage slider end


 

jQuery(document).ready(function(){

 
jQuery("a.tab").click(function (event) {
event.stopPropagation();

 
jQuery(".active").removeClass("active");

 
jQuery(this).addClass("active");

 
jQuery(".content").fadeOut();
 
 
var content_show = jQuery(this).attr("title");
jQuery("#"+content_show).fadeIn();

});



});


/*
jQuery(".tab2").click(function (event) {
		event.stopPropagation();
		jQuery(".content").fadeOut();
		jQuery(".de_paiment > ul.pay_method li").find('li').andSelf().removeClass("active");
		 
		var content_show = jQuery(this).attr("title");
		jQuery("#"+content_show).fadeIn();
		jQuery(this).parent().find('li').andSelf().addClass("active");
});*/


jQuery(".pro_deatil_tabs").children('#content_3').css({"display":"block"});
jQuery(".pro_deatil_tabs").children('#content_1').css({"display":"none"});



 
 // home tabs script end 
 
 
 
 
//This function will run automatically after the page is loaded
jQuery(document).ready(function() 
{
	jQuery('div.htmltabsz div.tabszContent').hide();//tabsContent class is used to hide all the tabs content in the start
	jQuery('div.tab1').show(); // It will show the first tab content when page load, you can set any tab content you want - just put the tab content class e.g. tab4
	jQuery('div.htmltabsz ul.tabsz li.tab1 a').addClass('tab-current');// We will add the class to the current open tab to style the active state
	//It will add the click event on all the anchor tag under the htmltabs class to show the tab content when clicking to the tab
	jQuery('div.htmltabsz ul li a').click(function()
	{
		var thisClass = this.className.slice(0,4);//"this" is the current anchor where user click and it will get the className from the current anchor and slice the first part as we have two class on the anchor 
		jQuery('div.htmltabsz div.tabszContent').hide();// It will hide all the tab content
		jQuery('div.' + thisClass).show(); // It will show the current content of the user selected tab
		jQuery('div.htmltabsz ul.tabsz li a').removeClass('tabz-current');// It will remove the tab-current class from the previous tab to remove the active style
		jQuery(this).addClass('tabz-current'); //It will add the tab-current class to the user selected tab
	});
});