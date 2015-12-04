// $.easing['jswing'] = $.easing['swing'];
// 
// $.extend($.easing, {
//  def: 'swing',
//  swing: function (x, t, b, c, d) {
//    if (t==0) return b;
//    if (t==d) return b+c;
//    if ((t/=d/2) < 1) return c/2 * Math.pow(2, 10 * (t - 1)) + b;
//    return c/2 * (-Math.pow(2, -10 * --t) + 2) + b;
//  }
// });

(function($) {
  /*
   * 
   **/
  var cache = [];
  $.preloadImages = function() {
    var args_len = arguments.length;
    for (var i = args_len; i--;) {
      var cacheImage = document.createElement('img');
      cacheImage.src = arguments[i];
      cache.push(cacheImage);
    }
  }
})(jQuery);

$(document).ready(function () {
  $.preloadImages("images/contact_background.png", 'images/contact_fields.png', "images/contact_close.png",
                  "images/contact_fade.png", "images/contact_fade.png", "images/contact_map.png", "images/contact_submit.png",
                  "javascripts/droplet/skins/silver/dropdown.png", "images/flags/fr.png", "images/flags/de.png",
                  "images/flags/es.png", "images/flags/nl.png");
  
  $('.dropdown').hover(function () {
    $(this).addClass('hover').find('.options').show();
  }, function () {
    $(this).removeClass('hover').find('.options').hide();
  });
  $('select').droplet();
  
  $('.gallery ul a:not(.back):not(.next)').click(function (e) {
    e.preventDefault();
    var gallery = $(this).parents('.gallery');
    var sizes = gallery.find('.item:eq(0)').outerWidth();
    var current = $(this).parent().prevAll().size()-1;
    
    $('a.active', $(this).parents('.gallery')).removeClass('active');
    $(this).addClass('active');
    
    if(!$.browser.msie) {
      $('.fade_left, .fade_right', gallery).fadeIn(50);
    }
    $('.items', gallery).animate({
      'margin-left': '-'+ (sizes*current)
    }, 500, 'swing', function () {
      if(!$.browser.msie) {
        $('.fade_left, .fade_right', gallery).fadeOut(50);
      }
    });
  });
  
  $('.gallery ul a.next').click(function (e) {
    e.preventDefault();
    
    var index = $('a.active', $(this).parents('.gallery')).parent().prevAll().size();
    var total = $('a:not(.back):not(.next)', $(this).parents('.gallery')).size();
    
    if(total === index) {
      $('a:not(.back):not(.next):first', $(this).parents('.gallery')).parent().find('a').click();
    } else {
      $('a.active', $(this).parents('.gallery')).parent().next().find('a').click();
    }
  });
  
  $('.gallery ul a.back').click(function (e) {
    e.preventDefault();
    
    var index = $('a.active', $(this).parents('.gallery')).parent().prevAll().size()-1;
    
    if(index === 0) {
      $('a:not(.back):not(.next):last', $(this).parents('.gallery')).parent().find('a').click();
    } else {
      $('a.active', $(this).parents('.gallery')).parent().prev().find('a').click();
    }
    
    // $('a.active', $(this).parents('.gallery')).parent().prev().find('a').click();
  });
  
  $('li.tracking').hover(function () {
    $(this).addClass('hover');
    $('.tracking .dropdown').show();
  }, function () {
    $(this).removeClass('hover');
    $('.tracking .dropdown').hide();
  });
  
  $('li.login').hover(function () {
    $(this).addClass('hover');
    $('.login .dropdown').show();
  }, function () {
    $(this).removeClass('hover');
    $('.login .dropdown').hide();
  });
  
  $('.question a').click(function (e) {
    e.preventDefault();
    var hadClass = $(this).hasClass('active');
    
    $(this).parents('.panel').find('.answer').hide();
    $(this).parents('.panel').find('a.active').removeClass('active');
    
    if(!hadClass) {
      $(this).addClass('active').parents('.section').find('.answer').show();
    }
  });
  
  $('.faq_types a').click(function (e) {
    e.preventDefault();
    $('.panel').hide();
    $('.faq_types a.active').removeClass('active');
    
    var show = $(this).parent().prevAll().size();
  
    $(this).addClass('active');
    $('.panel:eq('+ show +')').show();
  });
  
  $('a.contact_popup').click(function (e) {
    e.preventDefault();
    
    $('#contact_us_form').show();
    // $('#contact_us_form').show();
    //     $('#contact_us_wrapper').fadeIn(200);
  });
  
  $('#contact_us_wrapper, #contact_us_form a.close').live('click', function (e) {
    e.preventDefault();
    
    $('#contact_us_form').hide();
    // $('#contact_us_container').fadeOut(200);
    // $('#contact_us_wrapper').delay(100).fadeOut(200, function () {
    //   $('#contact_us_form').hide();
    // });
  });
  
  $('#tracking_form').live('submit', function (e) {
    e.preventDefault();
    
    window.location = 'http://www.fedex.com/Tracking?cntry_code=us&tracknumber_list='+ $('#tracking').val() +'&language=english';
  });
});