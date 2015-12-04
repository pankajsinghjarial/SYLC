 $(function() {
    if (window.PIE) {        
		$('.login-panel ul li .login-box').each(function() {
            PIE.attach(this);
        });	
		
		$('.login-header').each(function() {
            PIE.attach(this);
        });	
	$('.shoping-cart').each(function() {
            PIE.attach(this);
        });	
 }
});