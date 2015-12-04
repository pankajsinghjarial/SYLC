$(function() {
    if (window.PIE) {
	$('.header_main').each(function(){PIE.attach(this);});
	$('input.form_input').each(function(){PIE.attach(this);});
	$('.contact_area').each(function(){PIE.attach(this);});
    }
});