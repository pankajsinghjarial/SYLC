$(document).ready(function () {
	var currentStep = 0;
	var hasBeenEnabled = false;
  
  $('.first_step_header.disabled').live('click', function (e) {
		$('.first_step', form).show();
		$('.second_step', form).hide();
		$('.second_step_header').addClass('disabled').removeClass('current');
		$('.first_step_header').removeClass('disabled').addClass('current');
  });
  
  $('.second_step_header.disabled').live('click', function (e) {
    if(!hasBeenEnabled) return;
    
		$('.first_step', form).hide();
		$('.second_step', form).show();
		$('.first_step_header').addClass('disabled').removeClass('current');
		$('.second_step_header').removeClass('disabled').addClass('current');
  });
	
	$('#form form').submit(function (e) {
	  e.preventDefault();
	  
		validatePersonalInfo(e, this);
	});
		
	$('#form form input').focus(function (e) {
	  $(this).removeClass('error');
	  
	  setTimeout(function () {
	    $('.first_errors, .second_errors').slideUp(150, function () {
	      $(this).html('');
	    });
	  }, 1);
    
	}).bind('error', function () {
	  if($(this).parents('.first_step').size() > 0 && $('.first_errors').text().length === 0) {
	    $('.first_errors').html("* Please enter a valid "+ $(this).attr('name').replace('_', ' ') +'.').slideDown(150);
    } else if($(this).parents('.second_step').size() > 0 && $('.second_errors').text().length === 0) {
	    $('.second_errors').html("* Please enter a valid "+ $(this).attr('name').replace('_', ' ') +'.').slideUp(150);
    }
	});
	
	function validatePersonalInfo(e, form) {
		e.preventDefault();
		
		if(validateStep('first_step', form)) {
      $.post('/admin/endpoint.php', $('#form form').serialize(), function (data) {
        if (data == 'NO') {
          alert("There was a problem submitting your information, please try again.");
          return; 
        }
        
        window.location = 'http://www.prestigegoldbuyers.com/thankyou.php';
      });
		}
	}
	
	function validateStep(step, form) {
		$('.'+ step +' :input[value!=""]', form).removeError();
		$('.'+ step +' :input[value=""]', form).addError();
		
		$('#zip_code', form).addError(function () {
			return ($(this).val().replace(/[A-Za-z]/, '').length !== 5) || isNaN(parseInt($(this).val().replace(/[A-Za-z]/, '')));
		});
		
		$('#email').addError(function () {
			var email = $('#email', form).val();
			var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
			
			return !filter.test(email);
		});
		
		return $('.'+ step +' dd > .error', form).size() === 0;
	}
	
	$.fn.addError = function (validate) {
		if(typeof validate === 'function') {
			this.each(function () {
				if(validate.call($(this))) {
					$(this).addClass('error').trigger('error');
				} else {
					$(this).removeClass('error');
				}
			});
		} else {
			this.addClass('error').trigger('error');
		}
	}
	
	$.fn.removeError = function (validate) {
		if(typeof validate === 'function') {
			this.each(function (i) {
				if(validate.call($(this))) {
					$(this).removeClass('error');
				} else {
					$(this).addClass('error').trigger('error');
				}
			});
		} else {
			this.removeClass('error');
		}
	}
	
	$.fn.showAndHide = function(elemToHide) {
		$(elemToHide).hide();
		return this.show();
	}
});