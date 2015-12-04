
/* jquery.ad-gallery.js */

/* 1   */ /**
/* 2   *|  * Copyright (c) 2010 Anders Ekdahl (http://coffeescripter.com/)
/* 3   *|  * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
/* 4   *|  * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
/* 5   *|  *
/* 6   *|  * Version: 1.2.4
/* 7   *|  *
/* 8   *|  * Demo and documentation: http://coffeescripter.com/code/ad-gallery/
/* 9   *|  */
/* 10  */ (function($) {
/* 11  */   $.fn.adGallery = function(options) {
/* 12  */     var defaults = { loader_image: 'loader.gif',
/* 13  */                      start_at_index: 0,
/* 14  */ 					 gallery_ID: 0,
/* 15  */ 					 lightbox_class: 'lightbox',
/* 16  */                      description_wrapper: false,
/* 17  */                      thumb_opacity: 0.7,
/* 18  */                      animate_first_image: false,
/* 19  */                      animation_speed: 400,
/* 20  */                      width: false,
/* 21  */                      height: false,
/* 22  */                      display_next_and_prev: true,
/* 23  */                      display_back_and_forward: true,
/* 24  */                      scroll_jump: 0, // If 0, it jumps the width of the container
/* 25  */                      slideshow: {
/* 26  */                        enable: true,
/* 27  */                        autostart: false,
/* 28  */                        speed: 5000,
/* 29  */                        start_label: 'START SLIDESHOW',
/* 30  */                        stop_label: 'STOP SLIDESHOW',
/* 31  */ 					   zoom_label: 'ZOOM +',
/* 32  */                        stop_on_scroll: true,
/* 33  */                        countdown_prefix: '(',
/* 34  */                        countdown_sufix: ')',
/* 35  */                        onStart: false,
/* 36  */                        onStop: false
/* 37  */                      },
/* 38  */                      effect: 'slide-hori', // or 'slide-vert', 'fade', or 'resize', 'none'
/* 39  */                      enable_keyboard_move: true,
/* 40  */                      cycle: true,
/* 41  */                      callbacks: {
/* 42  */                        init: false,
/* 43  */                        afterImageVisible: false,
/* 44  */                        beforeImageVisible: false
/* 45  */                      }
/* 46  */     };
/* 47  */     var settings = $.extend(false, defaults, options);
/* 48  */ 	
/* 49  */     if(options && options.slideshow) {
/* 50  */       settings.slideshow = $.extend(false, defaults.slideshow, options.slideshow);

/* jquery.ad-gallery.js */

/* 51  */     };
/* 52  */     if(!settings.slideshow.enable) {
/* 53  */       settings.slideshow.autostart = false;
/* 54  */     };
/* 55  */     var galleries = [];
/* 56  */     $(this).each(function() {
/* 57  */       var gallery = new AdGallery(this, settings);
/* 58  */       galleries[galleries.length] = gallery;
/* 59  */     });
/* 60  */     // Sorry, breaking the jQuery chain because the gallery instances
/* 61  */     // are returned so you can fiddle with them
/* 62  */     return galleries;
/* 63  */   };
/* 64  */ 
/* 65  */   function VerticalSlideAnimation(img_container, direction, desc) {
/* 66  */ 	  
/* 67  */     var current_top = parseInt(img_container.css('top'), 10);
/* 68  */     if(direction == 'left') {
/* 69  */       var old_image_top = '-'+ this.image_wrapper.height() +'px';
/* 70  */       img_container.css('top', this.image_wrapper.height() +'px');
/* 71  */     } else {
/* 72  */       var old_image_top = this.image_wrapper.height() +'px';
/* 73  */       img_container.css('top', '-'+ this.image_wrapper.height() +'px');
/* 74  */     };
/* 75  */     if(desc) {
/* 76  */       //desc.css('bottom', '-'+ desc[0].offsetHeight +'px');
/* 77  */       //desc.animate({bottom: 0}, this.settings.animation_speed * 2);
/* 78  */     };
/* 79  */     if(this.current_description) {
/* 80  */       this.current_description.animate({bottom: '-'+ this.current_description[0].offsetHeight +'px'}, this.settings.animation_speed * 2);
/* 81  */     };
/* 82  */     return {old_image: {top: old_image_top},
/* 83  */             new_image: {top: current_top}};
/* 84  */   };
/* 85  */ 
/* 86  */   function HorizontalSlideAnimation(img_container, direction, desc) {
/* 87  */ 	img_container.css({left: 0});  
/* 88  */     var current_left = parseInt(img_container.css('left'), 10);
/* 89  */     if(direction == 'left') {
/* 90  */       var old_image_left = '-'+ this.image_wrapper.width() +'px';
/* 91  */       img_container.css('left',this.image_wrapper.width() +'px');
/* 92  */     } else {
/* 93  */       var old_image_left = this.image_wrapper.width() +'px';
/* 94  */       img_container.css('left','-'+ this.image_wrapper.width() +'px');
/* 95  */     };
/* 96  */ 	
/* 97  */     if(desc) {
/* 98  */       desc.css('bottom', '-'+ desc[0].offsetHeight +'px');
/* 99  */       desc.animate({bottom: 0}, this.settings.animation_speed * 2);
/* 100 */     };

/* jquery.ad-gallery.js */

/* 101 */     if(this.current_description) {
/* 102 */       this.current_description.animate({bottom: '-'+ this.current_description[0].offsetHeight +'px'}, this.settings.animation_speed * 2);
/* 103 */     };
/* 104 */     return {old_image: {left: old_image_left},
/* 105 */             new_image: {left: current_left}};
/* 106 */   };
/* 107 */ 
/* 108 */   function ResizeAnimation(img_container, direction, desc) {
/* 109 */ 	
/* 110 */     var image_width = img_container.width();
/* 111 */     var image_height = img_container.height();
/* 112 */     var current_left = parseInt(img_container.css('left'), 10);
/* 113 */     var current_top = parseInt(img_container.css('top'), 10);
/* 114 */     img_container.css({width: 0, height: 0, top: parseInt( this.image_wrapper.height() ) / 2, left: 0});
/* 115 */     return {old_image: {width: 0,
/* 116 */                         height: 0,
/* 117 */                         top: parseInt( this.image_wrapper.height() ) / 2,
/* 118 */                         left: 0},
/* 119 */             new_image: {width: image_width,
/* 120 */                         height: image_height,
/* 121 */                         top: current_top,
/* 122 */                         left: 0}};
/* 123 */   };
/* 124 */ 
/* 125 */   function FadeAnimation(img_container, direction, desc) {
/* 126 */     img_container.css('opacity', 0);
/* 127 */     return {old_image: {opacity: 0},
/* 128 */             new_image: {opacity: 1}};
/* 129 */   };
/* 130 */ 
/* 131 */   // Sort of a hack, will clean this up... eventually
/* 132 */   function NoneAnimation(img_container, direction, desc) {
/* 133 */     img_container.css('opacity', 0);
/* 134 */     return {old_image: {opacity: 0},
/* 135 */             new_image: {opacity: 1},
/* 136 */             speed: 0};
/* 137 */   };
/* 138 */ 
/* 139 */   function AdGallery(wrapper, settings) {
/* 140 */     this.init(wrapper, settings);
/* 141 */   };
/* 142 */   AdGallery.prototype = {
/* 143 */     // Elements
/* 144 */ 	first_load:true,
/* 145 */     wrapper: false,
/* 146 */     image_wrapper: false,
/* 147 */     gallery_info: false,
/* 148 */     nav: false,
/* 149 */     loader: false,
/* 150 */     preloads: false,

/* jquery.ad-gallery.js */

/* 151 */     thumbs_wrapper: false,
/* 152 */     scroll_back: false,
/* 153 */     scroll_forward: false,
/* 154 */     next_link: false,
/* 155 */     prev_link: false,
/* 156 */ 
/* 157 */     slideshow: false,
/* 158 */     image_wrapper_width: 0,
/* 159 */     image_wrapper_height: 0,
/* 160 */     current_index: 0,
/* 161 */     current_image: false,
/* 162 */     current_description: false,
/* 163 */     nav_display_width: 0,
/* 164 */     settings: false,
/* 165 */     images: false,
/* 166 */     in_transition: false,
/* 167 */     animations: false,
/* 168 */     init: function(wrapper, settings) {
/* 169 */       var context = this;
/* 170 */       this.wrapper = $(wrapper);
/* 171 */       this.settings = settings;
/* 172 */       this.setupElements();
/* 173 */       this.setupAnimations();
/* 174 */       if(this.settings.width) {
/* 175 */         this.image_wrapper_width = this.settings.width;
/* 176 */         this.image_wrapper.width(this.settings.width);
/* 177 */         this.wrapper.width(this.settings.width);
/* 178 */       } else {
/* 179 */         this.image_wrapper_width = this.image_wrapper.width();
/* 180 */       };
/* 181 */       if(this.settings.height) {
/* 182 */         this.image_wrapper_height = this.settings.height;
/* 183 */         this.image_wrapper.height(this.settings.height);
/* 184 */       } else {
/* 185 */         this.image_wrapper_height = this.image_wrapper.height();
/* 186 */       };
/* 187 */       this.nav_display_width = this.nav.width();
/* 188 */       this.current_index = 0;
/* 189 */       this.current_image = false;
/* 190 */       this.current_description = false;
/* 191 */       this.in_transition = false;
/* 192 */       this.findImages();
/* 193 */       if(this.settings.display_next_and_prev) {
/* 194 */         this.initNextAndPrev();
/* 195 */       };
/* 196 */       // The slideshow needs a callback to trigger the next image to be shown
/* 197 */       // but we don't want to give it access to the whole gallery instance
/* 198 */       var nextimage_callback = function(callback) {
/* 199 */         return context.nextImage(callback);
/* 200 */       };

/* jquery.ad-gallery.js */

/* 201 */       this.slideshow = new AdGallerySlideshow(nextimage_callback, this.settings);
/* 202 */       this.image_wrapper.append(this.slideshow.create());
/* 203 */       if(this.settings.slideshow.enable) {
/* 204 */         this.slideshow.enable();
/* 205 */       } else {
/* 206 */         this.slideshow.disable();
/* 207 */       };
/* 208 */       if(this.settings.display_back_and_forward) {
/* 209 */         this.initBackAndForward();
/* 210 */       };
/* 211 */       if(this.settings.enable_keyboard_move) {
/* 212 */         this.initKeyEvents();
/* 213 */       };
/* 214 */       var start_at = parseInt(this.settings.start_at_index, 10);
/* 215 */       if(window.location.hash && window.location.hash.indexOf('#ad-image') === 0) {
/* 216 */         start_at = window.location.hash.replace(/[^0-9]+/g, '');
/* 217 */         // Check if it's a number
/* 218 */         if((start_at * 1) != start_at) {
/* 219 */           start_at = this.settings.start_at_index;
/* 220 */         };
/* 221 */       };
/* 222 */ 
/* 223 */       this.loading(true);
/* 224 */       this.showImage(start_at,
/* 225 */         function() {
/* 226 */           // We don't want to start the slideshow before the image has been
/* 227 */           // displayed
/* 228 */           if(context.settings.slideshow.autostart) {
/* 229 */             context.preloadImage(start_at + 1);
/* 230 */             context.slideshow.start();
/* 231 */           };
/* 232 */         }
/* 233 */       );
/* 234 */       this.fireCallback(this.settings.callbacks.init);
/* 235 */     },
/* 236 */     setupAnimations: function() {
/* 237 */       this.animations = {
/* 238 */         'slide-vert': VerticalSlideAnimation,
/* 239 */         'slide-hori': HorizontalSlideAnimation,
/* 240 */         'resize': ResizeAnimation,
/* 241 */         'fade': FadeAnimation,
/* 242 */         'none': NoneAnimation
/* 243 */       };
/* 244 */     },
/* 245 */     setupElements: function() {
/* 246 */       this.controls = this.wrapper.find('.ad-controls');
/* 247 */       this.gallery_info = $('<p class="ad-info"></p>');
/* 248 */       this.controls.append(this.gallery_info);
/* 249 */       this.image_wrapper = this.wrapper.find('.ad-image-wrapper');
/* 250 */ 		

/* jquery.ad-gallery.js */

/* 251 */       this.image_wrapper.empty();
/* 252 */       this.nav = this.wrapper.find('.ad-nav');
/* 253 */       this.thumbs_wrapper = this.nav.find('.ad-thumbs');
/* 254 */       this.preloads = $('<div class="ad-preloads"></div>');
/* 255 */       this.loader = $('<img class="ad-loader" src="'+ this.settings.loader_image +'" style="width:auto !important;" />');
/* 256 */       this.image_wrapper.append(this.loader);
/* 257 */       this.loader.hide();
/* 258 */       $(document.body).append(this.preloads);
/* 259 */     },
/* 260 */     loading: function(bool) {
/* 261 */       if(bool) {
/* 262 */         this.loader.show();
/* 263 */       } else {
/* 264 */         this.loader.hide();
/* 265 */       };
/* 266 */     },
/* 267 */     addAnimation: function(name, fn) {
/* 268 */       if($.isFunction(fn)) {
/* 269 */         this.animations[name] = fn;
/* 270 */       };
/* 271 */     },
/* 272 */     findImages: function() {
/* 273 */       var context = this;
/* 274 */       this.images = [];
/* 275 */       var thumb_wrapper_width = 0;
/* 276 */       var thumbs_loaded = 0;
/* 277 */       var thumbs = this.thumbs_wrapper.find('a');
/* 278 */       var thumb_count = thumbs.length;
/* 279 */       if(this.settings.thumb_opacity < 1) {
/* 280 */         thumbs.find('img').css('opacity', this.settings.thumb_opacity);
/* 281 */       };
/* 282 */       thumbs.each(
/* 283 */         function(i) {
/* 284 */           var link = $(this);
/* 285 */           var image_src = link.attr('href');
/* 286 */           var thumb = link.find('img');
/* 287 */ 		      var alt = link.attr('alt');
/* 288 */           // Check if the thumb has already loaded
/* 289 */           if(!context.isImageLoaded(thumb[0])) {
/* 290 */             thumb.load(
/* 291 */               function() {
/* 292 */                 thumb_wrapper_width += this.parentNode.parentNode.offsetWidth;
/* 293 */                 thumbs_loaded++;
/* 294 */               }
/* 295 */             );
/* 296 */           } else{
/* 297 */             thumb_wrapper_width += thumb[0].parentNode.parentNode.offsetWidth;
/* 298 */             thumbs_loaded++;
/* 299 */           };
/* 300 */           link.addClass('ad-thumb'+ i);

/* jquery.ad-gallery.js */

/* 301 */           link.click(
/* 302 */             function() {
/* 303 */               context.showImage(i);
/* 304 */               context.slideshow.stop();
/* 305 */               return false;
/* 306 */             }
/* 307 */           ).hover(
/* 308 */             function() {
/* 309 */               if(!$(this).is('.ad-active') && context.settings.thumb_opacity < 1) {
/* 310 */                 $(this).find('img').fadeTo(300, 1);
/* 311 */               };
/* 312 */               context.preloadImage(i);
/* 313 */             },
/* 314 */             function() {
/* 315 */               if(!$(this).is('.ad-active') && context.settings.thumb_opacity < 1) {
/* 316 */                 $(this).find('img').fadeTo(300, context.settings.thumb_opacity);
/* 317 */               };
/* 318 */             }
/* 319 */           );
/* 320 */           var link = false;
/* 321 */           if(thumb.data('ad-link')) {
/* 322 */             link = thumb.data('ad-link');
/* 323 */           } else if(thumb.attr('longdesc') && thumb.attr('longdesc').length) {
/* 324 */             link = thumb.attr('longdesc');
/* 325 */           };
/* 326 */           var desc = false;
/* 327 */           if(thumb.data('ad-desc')) {
/* 328 */             desc = thumb.data('ad-desc');
/* 329 */           } else if(thumb.attr('data-caption') && thumb.attr('data-caption').length) {
/* 330 */             desc = thumb.attr('data-caption');
/* 331 */           };
/* 332 */           var title = false;
/* 333 */           if(thumb.data('ad-title')) {
/* 334 */             title = thumb.data('ad-title');
/* 335 */           } else if(thumb.attr('title') && thumb.attr('title').length) {
/* 336 */             title = thumb.attr('title');
/* 337 */           };
/* 338 */           context.images[i] = { thumb: thumb.attr('src'), image: image_src, error: false,
/* 339 */                                 preloaded: false, desc: desc, title: title, size: false,
/* 340 */                                 link: link,alt:alt };
/* 341 */         }
/* 342 */       );
/* 343 */       // Wait until all thumbs are loaded, and then set the width of the ul
/* 344 */       var inter = setInterval(
/* 345 */         function() {
/* 346 */           if(thumb_count == thumbs_loaded) {
/* 347 */             //thumb_wrapper_width -= 100;
/* 348 */             var list = context.nav.find('.ad-thumb-list');
/* 349 */ 			//alert(thumb_wrapper_width);
/* 350 */             list.css('width', thumb_wrapper_width +'px');

/* jquery.ad-gallery.js */

/* 351 */             var i = 1;
/* 352 */             var last_height = list.height();
/* 353 */             while(i < 201) {
/* 354 */               list.css('width', (thumb_wrapper_width + i) +'px');
/* 355 */               if(last_height != list.height()) {
/* 356 */                 break;
/* 357 */               }
/* 358 */               last_height = list.height();
/* 359 */               i++;
/* 360 */             }
/* 361 */             clearInterval(inter);
/* 362 */           };
/* 363 */         },
/* 364 */         100
/* 365 */       );
/* 366 */     },
/* 367 */     initKeyEvents: function() {
/* 368 */       var context = this;
/* 369 */       $(document).keydown(
/* 370 */         function(e) {
/* 371 */           if(e.keyCode == 39) {
/* 372 */             // right arrow
/* 373 */             context.nextImage();
/* 374 */             context.slideshow.stop();
/* 375 */           } else if(e.keyCode == 37) {
/* 376 */             // left arrow
/* 377 */             context.prevImage();
/* 378 */             context.slideshow.stop();
/* 379 */           };
/* 380 */         }
/* 381 */       );
/* 382 */     },
/* 383 */     initNextAndPrev: function() {
/* 384 */       this.next_link = $('<div class="ad-next"><div class="ad-next-image"></div></div>');
/* 385 */       this.prev_link = $('<div class="ad-prev"><div class="ad-prev-image"></div></div>');
/* 386 */       this.image_wrapper.append(this.next_link);
/* 387 */       this.image_wrapper.append(this.prev_link);
/* 388 */ 	  
/* 389 */ 	  
/* 390 */ 	  
/* 391 */       var context = this;
/* 392 */       this.prev_link.add(this.next_link).mouseover(
/* 393 */         function(e) {
/* 394 */           // IE 6 hides the wrapper div, so we have to set it's width
/* 395 */           $(this).css('height', context.image_wrapper.height() );
/* 396 */           $(this).find('div').show();
/* 397 */         }
/* 398 */       ).mouseout(
/* 399 */         function(e) {
/* 400 */           $(this).find('div').hide();

/* jquery.ad-gallery.js */

/* 401 */         }
/* 402 */       ).click(
/* 403 */         function() {
/* 404 */           if($(this).is('.ad-next')) {
/* 405 */             context.nextImage();
/* 406 */             context.slideshow.stop();
/* 407 */           } else {
/* 408 */             context.prevImage();
/* 409 */             context.slideshow.stop();
/* 410 */           };
/* 411 */         }
/* 412 */       ).find('div').css('opacity', 0.7);
/* 413 */     },
/* 414 */     initBackAndForward: function() {
/* 415 */       var context = this;
/* 416 */       this.scroll_forward = $('<div class="ad-forward"></div>');
/* 417 */       this.scroll_back = $('<div class="ad-back"></div>');
/* 418 */       this.nav.append(this.scroll_forward);
/* 419 */       this.nav.prepend(this.scroll_back);
/* 420 */       var has_scrolled = 0;
/* 421 */       var thumbs_scroll_interval = false;
/* 422 */       $(this.scroll_back).add(this.scroll_forward).click(
/* 423 */         function() {
/* 424 */           // We don't want to jump the whole width, since an image
/* 425 */           // might be cut at the edge
/* 426 */           var width = context.nav_display_width - 50;
/* 427 */           if(context.settings.scroll_jump > 0) {
/* 428 */             var width = context.settings.scroll_jump;
/* 429 */           };
/* 430 */           if($(this).is('.ad-forward')) {
/* 431 */             var left = context.thumbs_wrapper.scrollLeft() + width;
/* 432 */           } else {
/* 433 */             var left = context.thumbs_wrapper.scrollLeft() - width;
/* 434 */           };
/* 435 */           if(context.settings.slideshow.stop_on_scroll) {
/* 436 */             context.slideshow.stop();
/* 437 */           };
/* 438 */           context.thumbs_wrapper.animate({scrollLeft: left +'px'});
/* 439 */           return false;
/* 440 */         }
/* 441 */       ).hover(
/* 442 */         function() {
/* 443 */           var direction = 'left';
/* 444 */           if($(this).is('.ad-forward')) {
/* 445 */             direction = 'right';
/* 446 */           };
/* 447 */           thumbs_scroll_interval = setInterval(
/* 448 */             function() {
/* 449 */               has_scrolled++;
/* 450 */               // Don't want to stop the slideshow just because we scrolled a pixel or two

/* jquery.ad-gallery.js */

/* 451 */               if(has_scrolled > 30 && context.settings.slideshow.stop_on_scroll) {
/* 452 */                 context.slideshow.stop();
/* 453 */               };
/* 454 */               var left = context.thumbs_wrapper.scrollLeft() + 1;
/* 455 */               if(direction == 'left') {
/* 456 */                 left = context.thumbs_wrapper.scrollLeft() - 1;
/* 457 */               };
/* 458 */               context.thumbs_wrapper.scrollLeft(left);
/* 459 */             },
/* 460 */             10
/* 461 */           );
/* 462 */           $(this).css('opacity', 1);
/* 463 */         },
/* 464 */         function() {
/* 465 */           has_scrolled = 0;
/* 466 */           clearInterval(thumbs_scroll_interval);
/* 467 */           
/* 468 */         }
/* 469 */       );
/* 470 */     },
/* 471 */     _afterShow: function() {
/* 472 */       this.gallery_info.html((this.current_index + 1) +' / '+ this.images.length);
/* 473 */       if(!this.settings.cycle) {
/* 474 */         // Needed for IE
/* 475 */         this.prev_link.show().css('height', this.image_wrapper.height());
/* 476 */         this.next_link.show().css('height', this.image_wrapper.height());
/* 477 */         if(this.current_index == (this.images.length - 1)) {
/* 478 */           this.next_link.hide();
/* 479 */         };
/* 480 */         if(this.current_index == 0) {
/* 481 */           this.prev_link.hide();
/* 482 */         };
/* 483 */       };
/* 484 */ 	  
/* 485 */       this.fireCallback(this.settings.callbacks.afterImageVisible);
/* 486 */     },
/* 487 */     /**
/* 488 *|      * Checks if the image is small enough to fit inside the container
/* 489 *|      * If it's not, shrink it proportionally
/* 490 *|      */
/* 491 */     _getContainedImageSize: function(image_width, image_height) {
/* 492 */       if(image_height > this.image_wrapper.height()) {
/* 493 */         var ratio = image_width / image_height;
/* 494 */         image_height = parseInt( this.image_wrapper.height() );
/* 495 */         image_width = parseInt( this.image_wrapper.height() ) * ratio;
/* 496 */       };
/* 497 */       if(image_width > parseInt( this.image_wrapper.width() ) ) {
/* 498 */   	    var ratio = image_height / image_width;
/* 499 */   	    image_width = parseInt( this.image_wrapper.width() );
/* 500 */   	    image_height = parseInt( this.image_wrapper.width() ) * ratio;

/* jquery.ad-gallery.js */

/* 501 */   	  };
/* 502 */       return {width: image_width, height: image_height};
/* 503 */     },
/* 504 */     /**
/* 505 *|      * If the image dimensions are smaller than the wrapper, we position
/* 506 *|      * it in the middle anyway
/* 507 *|      */
/* 508 */     _centerImage: function(img_container, image_width, image_height) {
/* 509 */       img_container.css('top', '0px');
/* 510 */       if(image_height < parseInt( this.image_wrapper.height() ) ) {
/* 511 */         var dif = parseInt( this.image_wrapper.height() ) - image_height;
/* 512 */         img_container.css('top', (dif / 2) +'px');
/* 513 */       };
/* 514 */       img_container.css('left', '0px');
/* 515 */       if(image_width < parseInt( this.image_wrapper.width() ) ) {
/* 516 */         var dif = parseInt( this.image_wrapper.width() ) - image_width;
/* 517 */         //img_container.css('left', (dif / 2) +'px');
/* 518 */ 		img_container.css('left', (dif / 2) +'px');
/* 519 */       };
/* 520 */     },
/* 521 */     _getDescription: function(image, gallery_id) {
/* 522 */       var desc = false;
/* 523 */ 	  var links = '';
/* 524 */       if(image.desc.length || image.title.length) {
/* 525 */         var title = '';
/* 526 */         if(image.title.length) {
/* 527 */           title = '<strong class="ad-description-title">'+ image.title +'</strong>';
/* 528 */         };
/* 529 */         var desc = '';
/* 530 */         if(image.desc.length) {
/* 531 */ 		    if(image.link){
/* 532 */ 				links = '<a href="'+image.link+'">... Read more</a>';
/* 533 */ 			}
/* 534 */           desc = '<span>'+ image.desc +'</span> ';
/* 535 */ 		  
/* 536 */         };
/* 537 */         desc = $('<p class="ad-image-description ad-image-description-'+gallery_id+'">'+ title + desc + links +'</p>');
/* 538 */       };
/* 539 */ 	  
/* 540 */ 	  if(!image.desc.length){
/* 541 */ 		   if(image.link){
/* 542 */ 				links = '<a href="'+image.link+'">Read more...</a>';
/* 543 */ 				desc = $('<p class="ad-image-description ad-image-description-'+gallery_id+'">'+ links +'</p>');
/* 544 */ 			}
/* 545 */ 			
/* 546 */ 	  }
/* 547 */       return desc;
/* 548 */     },
/* 549 */     /**
/* 550 *|      * @param function callback Gets fired when the image has loaded, is displaying

/* jquery.ad-gallery.js */

/* 551 *|      *                          and it's animation has finished
/* 552 *|      */
/* 553 */     showImage: function(index, callback) {
/* 554 */ 	  
/* 555 */       if(this.images[index] && !this.in_transition) {
/* 556 */         var context = this;
/* 557 */         var image = this.images[index];
/* 558 */         this.in_transition = true;
/* 559 */         if(!image.preloaded) {
/* 560 */ 			
/* 561 */           this.loading(true);
/* 562 */           this.preloadImage(index, function() {
/* 563 */             context.loading(false);		
/* 564 */             context._showWhenLoaded(index, callback);
/* 565 */           });
/* 566 */         } else {
/* 567 */           this._showWhenLoaded(index, callback);
/* 568 */ 		  
/* 569 */         };
/* 570 */       };
/* 571 */     },
/* 572 */     /**
/* 573 *|      * @param function callback Gets fired when the image has loaded, is displaying
/* 574 *|      *                          and it's animation has finished
/* 575 *|      */
/* 576 */     _showWhenLoaded: function(index, callback) {
/* 577 */       if(this.images[index]) {
/* 578 */         var context = this;
/* 579 */         var image = this.images[index];
/* 580 */ 	
/* 581 */         var img_container = $(document.createElement('div')).addClass('ad-image');
/* 582 */ 		
/* 583 */ 		
/* 584 */ 		
/* 585 */ 		var id = this.settings.gallery_ID;
/* 586 */ 		if(image.link){
/* 587 */         	var img = $(new Image()).attr('src', image.image).attr('rel','').attr('rel','gallery_'+id);
/* 588 */ 			img.attr('alt',image.alt);
/* 589 */ 		}else{
/* 590 */ 			var img = $(new Image()).attr('src', image.image).attr('rel','').addClass(this.settings.lightbox_class).attr('rel','gallery_'+id);
/* 591 */ 			img.attr('alt',image.alt);
/* 592 */ 		}
/* 593 */ 		
/* 594 */ 		img.attr('idx',index);
/* 595 */         if(image.link) {
/* 596 */           var link = $('<a href="'+ image.link +'" target="_blank"></a>');
/* 597 */           link.append(img);
/* 598 */           img_container.append(link);
/* 599 */         } else {
/* 600 */           img_container.append(img);

/* jquery.ad-gallery.js */

/* 601 */         }
/* 602 */ 		if ($(".icon_zoom_"+id).length > 0){
/* 603 */ 		}else{
/* 604 */ 		this.image_wrapper.find('.slide-ctrl').before('<div class="icon_zoom '+this.settings.lightbox_class+' icon_zoom_'+id+'" rel="gallery_'+id+'"><span>'+ this.settings.slideshow.zoom_label +'</span></div>');
/* 605 */ 		}
/* 606 */ 		
/* 607 */ 		//img_container.after('<div class="slide-ctrl"><span class="ad-slideshow-start-slide">Start</span><span class="ad-slideshow-stop-slide">Stop</span></div>');
/* 608 */ 	
/* 609 */ 		if($('#view_gallery_'+id).length <= 0){
/* 610 */ 			this.controls.append('<div id="view_gallery_'+id+'" class="view_gallery '+this.settings.lightbox_class+'" rel="gallery_'+id+'"></div>');
/* 611 */ 		}
/* 612 */ 		var delay_lazy = this.settings.animation_speed;
/* 613 */ 		if (!this.first_load) {
/* 614 */ 			this.image_wrapper.siblings(".lazy-load").remove();
/* 615 */ 			var ad_nav_height = this.nav.height();
/* 616 */ 			var lazy_load_bottom = '-9px';
/* 617 */ 			if ( ad_nav_height > 2 ) lazy_load_bottom = ( parseInt( this.nav.height() ) + 9 )+'px';
/* 618 */ 			this.image_wrapper.before('<div class="lazy-load" style="background:#000;width:100%;height:1px; display: none;z-index:8;position:absolute; bottom:' + lazy_load_bottom + ';"></div>');
/* 619 */ 			this.image_wrapper.siblings(".lazy-load").animate( { width: "0px" },delay_lazy );
/* 620 */ 		}
/* 621 */ 		
/* 622 */ 		
/* 623 */         this.image_wrapper.prepend(img_container);
/* 624 */         var size = this._getContainedImageSize(image.size.width, image.size.height);
/* 625 */         //img.attr('width', size.width);
/* 626 */         //img.attr('height', size.height);
/* 627 */ 		img.css({width: size.width +'px', height: size.height +'px'});
/* 628 */         img_container.css({width: size.width +'px', height: size.height +'px'});
/* 629 */         this._centerImage(img_container, size.width, size.height);
/* 630 */ 		
/* 631 */ 		img_container.css('left', '0px');
/* 632 */ 		$('p.ad-image-description-'+id).remove();
/* 633 */         var desc = this._getDescription(image, id, img_container);
/* 634 */         if(desc) {
/* 635 */ 			
/* 636 */           if(!this.settings.description_wrapper) {
/* 637 */             this.image_wrapper.append(desc);
/* 638 */             var width = size.width - parseInt(desc.css('padding-left'), 10) - parseInt(desc.css('padding-right'), 10);
/* 639 */             desc.css('width', width +'px');
/* 640 */           } else {
/* 641 */             this.settings.description_wrapper.append(desc);
/* 642 */           }
/* 643 */ 		  $('p.ad-image-description-'+id).hide();
/* 644 */         };
/* 645 */ 		
/* 646 */ 		/*var des_delay = this.settings.animation_speed;
/* 647 *| 		setTimeout(function() {			
/* 648 *| 			$('p.ad-image-description').css("display","block").css("bottom","-1000px").animate({"bottom":"0"}, 1000);
/* 649 *| 		}, (des_delay+1) );
/* 650 *| 		

/* jquery.ad-gallery.js */

/* 651 *| 		var delay_lazy = this.settings.slideshow.speed;
/* 652 *| 		setTimeout(function() {
/* 653 *| 			  $('p.ad-image-description').animate({"bottom":"-1000px"}, 1000);
/* 654 *| 		}, (delay_lazy-500) );*/
/* 655 */ 		
/* 656 */ 		var delay_lazy = this.settings.animation_speed;
/* 657 */ 		if (!this.first_load) {
/* 658 */ 			setTimeout(function() {
/* 659 */ 				$('p.ad-image-description-'+id).css('bottom','0').show(1000);
/* 660 */ 			}, ( parseInt(delay_lazy) + 1) );
/* 661 */ 		} else {
/* 662 */ 			setTimeout(function() {
/* 663 */ 				$('p.ad-image-description-'+id).css('bottom','0').show(1000);
/* 664 */ 			}, ( 1) );
/* 665 */ 		}
/* 666 */ 		
/* 667 */ 		this.first_load = false;
/* 668 */ 		
/* 669 */ 		var des_delay = this.settings.slideshow.speed;
/* 670 */ 		setTimeout(function() {
/* 671 */ 			$('p.ad-image-description-'+id).hide(1000);
/* 672 */ 		}, ( ( parseInt(delay_lazy) + parseInt(des_delay) ) -1000) );
/* 673 */ 		
/* 674 */         this.highLightThumb(this.nav.find('.ad-thumb'+ index));
/* 675 */ 
/* 676 */         var direction = 'right';
/* 677 */         if(this.current_index < index) {
/* 678 */           direction = 'left';
/* 679 */         };
/* 680 */         this.fireCallback(this.settings.callbacks.beforeImageVisible);
/* 681 */         if(this.current_image || this.settings.animate_first_image) {
/* 682 */           var animation_speed = this.settings.animation_speed;
/* 683 */           var easing = 'swing';
/* 684 */           var animation = this.animations[this.settings.effect].call(this, img_container, direction, desc);
/* 685 */           if(typeof animation.speed != 'undefined') {
/* 686 */             animation_speed = animation.speed;
/* 687 */           };
/* 688 */           if(typeof animation.easing != 'undefined') {
/* 689 */             easing = animation.easing;
/* 690 */           };
/* 691 */ 		  
/* 692 */           if(this.current_image) {
/* 693 */             var old_image = this.current_image;
/* 694 */             var old_description = this.current_description;
/* 695 */             old_image.animate(animation.old_image, animation_speed, easing,
/* 696 */               function() {
/* 697 */                 old_image.remove();
/* 698 */                 if(old_description) old_description.remove();
/* 699 */               }
/* 700 */             );

/* jquery.ad-gallery.js */

/* 701 */ 			
/* 702 */           };
/* 703 */           img_container.animate(animation.new_image, animation_speed, easing,
/* 704 */             function() {
/* 705 */               context.current_index = index;
/* 706 */               context.current_image = img_container;
/* 707 */               context.current_description = desc;
/* 708 */               context.in_transition = false;
/* 709 */               context._afterShow();
/* 710 */               context.fireCallback(callback);
/* 711 */             }
/* 712 */           );
/* 713 */         } else {
/* 714 */           this.current_index = index;
/* 715 */           this.current_image = img_container;
/* 716 */           context.current_description = desc;
/* 717 */           this.in_transition = false;
/* 718 */           context._afterShow();
/* 719 */ 		  
/* 720 */           this.fireCallback(callback);
/* 721 */         };
/* 722 */       };
/* 723 */     },
/* 724 */     nextIndex: function() {
/* 725 */ 	  
/* 726 */       if(this.current_index == (this.images.length - 1)) {
/* 727 */         if(!this.settings.cycle) {
/* 728 */           return false;
/* 729 */         };
/* 730 */         var next = 0;
/* 731 */       } else {
/* 732 */         var next = this.current_index + 1;
/* 733 */       };
/* 734 */       return next;
/* 735 */     },
/* 736 */     nextImage: function(callback) {
/* 737 */       var next = this.nextIndex();
/* 738 */       if(next === false) return false;
/* 739 */       this.preloadImage(next + 1);
/* 740 */ 	  var delay_lazy = this.settings.animation_speed;
/* 741 */ 
/* 742 */       this.showImage(next, callback);	
/* 743 */       return true;
/* 744 */     },
/* 745 */     prevIndex: function() {
/* 746 */       if(this.current_index == 0) {
/* 747 */         if(!this.settings.cycle) {
/* 748 */           return false;
/* 749 */         };
/* 750 */         var prev = this.images.length - 1;

/* jquery.ad-gallery.js */

/* 751 */       } else {
/* 752 */         var prev = this.current_index - 1;
/* 753 */       };
/* 754 */       return prev;
/* 755 */     },
/* 756 */     prevImage: function(callback) {
/* 757 */       var prev = this.prevIndex();
/* 758 */       if(prev === false) return false;
/* 759 */       this.preloadImage(prev - 1);
/* 760 */       this.showImage(prev, callback);
/* 761 */       return true;
/* 762 */     },
/* 763 */     preloadAll: function() {
/* 764 */       var context = this;
/* 765 */       var i = 0;
/* 766 */       function preloadNext() {
/* 767 */         if(i < context.images.length) {
/* 768 */           i++;
/* 769 */           context.preloadImage(i, preloadNext);
/* 770 */         };
/* 771 */       };
/* 772 */       context.preloadImage(i, preloadNext);
/* 773 */     },
/* 774 */     preloadImage: function(index, callback) {
/* 775 */       if(this.images[index]) {
/* 776 */         var image = this.images[index];
/* 777 */         if(!this.images[index].preloaded) {
/* 778 */           var img = $(new Image());
/* 779 */           img.attr('src', image.image);
/* 780 */           if(!this.isImageLoaded(img[0])) {
/* 781 */             this.preloads.append(img);
/* 782 */             var context = this;
/* 783 */             img.load(
/* 784 */               function() {
/* 785 */                 image.preloaded = true;
/* 786 */                 image.size = { width: $(this).width(), height: $(this).height() };
/* 787 */                 context.fireCallback(callback);
/* 788 */               }
/* 789 */             ).error(
/* 790 */               function() {
/* 791 */                 image.error = true;
/* 792 */                 image.preloaded = false;
/* 793 */                 image.size = false;
/* 794 */               }
/* 795 */             );
/* 796 */           } else {
/* 797 */             image.preloaded = true;
/* 798 */             image.size = { width: img[0].width, height: img[0].height };
/* 799 */             this.fireCallback(callback);
/* 800 */           };

/* jquery.ad-gallery.js */

/* 801 */         } else {
/* 802 */           this.fireCallback(callback);
/* 803 */         };
/* 804 */       };
/* 805 */     },
/* 806 */     isImageLoaded: function(img) {
/* 807 */       if(typeof img.complete != 'undefined' && !img.complete) {
/* 808 */         return false;
/* 809 */       };
/* 810 */       if(typeof img.naturalWidth != 'undefined' && img.naturalWidth == 0) {
/* 811 */         return false;
/* 812 */       };
/* 813 */       return true;
/* 814 */     },
/* 815 */     highLightThumb: function(thumb) {
/* 816 */       this.thumbs_wrapper.find('.ad-active').removeClass('ad-active');
/* 817 */       thumb.addClass('ad-active');
/* 818 */       if(this.settings.thumb_opacity < 1) {
/* 819 */         this.thumbs_wrapper.find('a:not(.ad-active) img').fadeTo(300, this.settings.thumb_opacity);
/* 820 */         thumb.find('img').fadeTo(300, 1);
/* 821 */       };
/* 822 */       var left = thumb[0].parentNode.offsetLeft;
/* 823 */       left -= (this.nav_display_width / 2) - (thumb[0].offsetWidth / 2);
/* 824 */       this.thumbs_wrapper.animate({scrollLeft: left +'px'});
/* 825 */     },
/* 826 */     fireCallback: function(fn) {
/* 827 */       if($.isFunction(fn)) {
/* 828 */         fn.call(this);
/* 829 */       };
/* 830 */     }
/* 831 */   };
/* 832 */ 
/* 833 */   function AdGallerySlideshow(nextimage_callback, settings) {
/* 834 */     this.init(nextimage_callback, settings);
/* 835 */   };
/* 836 */   AdGallerySlideshow.prototype = {
/* 837 */ 	first_load_item: true,
/* 838 */     start_link: false,
/* 839 */     stop_link: false,
/* 840 */     countdown: false,
/* 841 */     controls: false,
/* 842 */ 	image_wrapper: false,
/* 843 */ 
/* 844 */     settings: false,
/* 845 */     nextimage_callback: false,
/* 846 */     enabled: false,
/* 847 */     running: false,
/* 848 */     countdown_interval: false,
/* 849 */     init: function(nextimage_callback, settings) {
/* 850 */       var context = this;

/* jquery.ad-gallery.js */

/* 851 */       this.nextimage_callback = nextimage_callback;
/* 852 */       this.settings = settings;
/* 853 */     },
/* 854 */     create: function() {
/* 855 */       this.start_link = $('<span class="ad-slideshow-start-slide">'+ this.settings.slideshow.start_label +'</span>');
/* 856 */       this.stop_link = $('<span class="ad-slideshow-stop-slide">'+ this.settings.slideshow.stop_label +'</span>');
/* 857 */ 	  
/* 858 */       this.countdown = $('<span class="ad-slideshow-countdown"></span>');
/* 859 */       this.controls = $('<div class="ad-slideshow-controls"></div>');
/* 860 */ 	  this.slide_ctrl = $('<div class="slide-ctrl"></div>');
/* 861 */ 	  this.slide_ctrl.append(this.start_link).append(this.stop_link);
/* 862 */ 	  
/* 863 */ 	  var delay_lazy = this.settings.animation_speed;
/* 864 */       this.countdown.hide();
/* 865 */       var context = this;
/* 866 */       this.start_link.click(
/* 867 */         function() {
/* 868 */ 			context.start();
/* 869 */ 		  	$(this).parents('.slide-ctrl').parents('.ad-image-wrapper').siblings(".lazy-load").remove();
/* 870 */         }
/* 871 */       );
/* 872 */ 	  
/* 873 */       this.stop_link.click(
/* 874 */ 	  
/* 875 */         function() {
/* 876 */ 			//$(this).parents('.slide-ctrl').removeClass('ad-slideshow-running');
/* 877 */ 			$(this).parents('.slide-ctrl').parents('.ad-image-wrapper').siblings(".lazy-load").remove();
/* 878 */           	context.stop();
/* 879 */         }
/* 880 */       );
/* 881 */ 	  
/* 882 */       $(document).keydown(
/* 883 */         function(e) {
/* 884 */           if(e.keyCode == 83) {
/* 885 */             // 's'
/* 886 */             if(context.running) {
/* 887 */               context.stop();
/* 888 */             } else {
/* 889 */               context.start();
/* 890 */             };
/* 891 */           };
/* 892 */         }
/* 893 */       );
/* 894 */       return this.slide_ctrl;
/* 895 */     },
/* 896 */     disable: function() {
/* 897 */       this.enabled = false;
/* 898 */       this.stop();
/* 899 */       this.controls.hide();
/* 900 */     },

/* jquery.ad-gallery.js */

/* 901 */     enable: function() {
/* 902 */       this.enabled = true;
/* 903 */       this.controls.show();
/* 904 */     },
/* 905 */     toggle: function() {
/* 906 */       if(this.enabled) {
/* 907 */         this.disable();
/* 908 */       } else {
/* 909 */         this.enable();
/* 910 */       };
/* 911 */     },
/* 912 */     start: function() {
/* 913 */ 
/* 914 */       if(this.running || !this.enabled) return false;
/* 915 */       var context = this;
/* 916 */       this.running = true;
/* 917 */       this.slide_ctrl.addClass('ad-slideshow-running');
/* 918 */       this._next();
/* 919 */ 	  
/* 920 */       this.fireCallback(this.settings.slideshow.onStart);
/* 921 */       return true;
/* 922 */     },
/* 923 */     stop: function() {
/* 924 */ 	  
/* 925 */       if(!this.running) return false;
/* 926 */       this.running = false;
/* 927 */       this.countdown.hide();
/* 928 */ 	  		
/* 929 */       this.slide_ctrl.removeClass('ad-slideshow-running');
/* 930 */ 	  
/* 931 */       clearInterval(this.countdown_interval);
/* 932 */       this.fireCallback(this.settings.slideshow.onStop);
/* 933 */ 
/* 934 */       return true;
/* 935 */     },
/* 936 */     _next: function() {
/* 937 */       var context = this;
/* 938 */       var pre = this.settings.slideshow.countdown_prefix;
/* 939 */       var su = this.settings.slideshow.countdown_sufix;
/* 940 */       clearInterval(context.countdown_interval);
/* 941 */       this.countdown.show().html(pre + ( parseInt(this.settings.slideshow.speed) / 1000) + su);
/* 942 */       var slide_timer = 0;
/* 943 */ 	  var slide_next_timer = 0;
/* 944 */       this.countdown_interval = setInterval(
/* 945 */         function() {
/* 946 */           slide_timer += 1000;
/* 947 */ 		  context.first_load_item = false;
/* 948 */           if(slide_timer >= parseInt(context.settings.slideshow.speed) ) {
/* 949 */             var whenNextIsShown = function() {
/* 950 */               // A check so the user hasn't stoped the slideshow during the

/* jquery.ad-gallery.js */

/* 951 */               // animation
/* 952 */               if(context.running) {
/* 953 */                 context._next();
/* 954 */ 			  };
/* 955 */               slide_timer = 0;
/* 956 */ 			  
/* 957 */ 			 
/* 958 */             };
/* 959 */             if(!context.nextimage_callback(whenNextIsShown)) {
/* 960 */               context.stop();
/* 961 */             };
/* 962 */             slide_timer = 0;
/* 963 */ 			
/* 964 */           };
/* 965 */           var sec = parseInt(context.countdown.text().replace(/[^0-9]/g, ''), 10);
/* 966 */           sec--;
/* 967 */           if(sec > 0) {
/* 968 */ 			context.countdown.html(pre + sec + su);
/* 969 */           }
/* 970 */         },
/* 971 */         1000
/* 972 */       );
/* 973 */ 	  
/* 974 */     },
/* 975 */     fireCallback: function(fn) {
/* 976 */       if($.isFunction(fn)) {
/* 977 */         fn.call(this);
/* 978 */       };
/* 979 */     }
/* 980 */   };
/* 981 */ })(jQuery);
/* 982 */ 

;
/* fancybox.min.js */

/* 1  */ /*
/* 2  *|  * FancyBox - jQuery Plugin
/* 3  *|  * Simple and fancy lightbox alternative
/* 4  *|  *
/* 5  *|  * Examples and documentation at: http://fancybox.net
/* 6  *|  * 
/* 7  *|  * Copyright (c) 2008 - 2010 Janis Skarnelis
/* 8  *|  * That said, it is hardly a one-person project. Many people have submitted bugs, code, and offered their advice freely. Their support is greatly appreciated.
/* 9  *|  * 
/* 10 *|  * Version: 1.3.4 (11/11/2010)
/* 11 *|  * Requires: jQuery v1.3+
/* 12 *|  *
/* 13 *|  * Dual licensed under the MIT and GPL licenses:
/* 14 *|  *   http://www.opensource.org/licenses/mit-license.php
/* 15 *|  *   http://www.gnu.org/licenses/gpl.html
/* 16 *|  */
/* 17 */ 
/* 18 */ ;(function(b){var m,t,u,f,D,j,E,n,z,A,q=0,e={},o=[],p=0,d={},l=[],G=null,v=new Image,J=/\.(jpg|gif|png|bmp|jpeg)(.*)?$/i,W=/[^\.]\.(swf)\s*$/i,K,L=1,y=0,s="",r,i,h=false,B=b.extend(b("<div/>")[0],{prop:0}),M=b.browser.msie&&b.browser.version<7&&!window.XMLHttpRequest,N=function(){t.hide();v.onerror=v.onload=null;G&&G.abort();m.empty()},O=function(){if(false===e.onError(o,q,e)){t.hide();h=false}else{e.titleShow=false;e.width="auto";e.height="auto";m.html('<p id="fancybox-error">The requested content cannot be loaded.<br />Please try again later.</p>');
/* 19 */ F()}},I=function(){var a=o[q],c,g,k,C,P,w;N();e=b.extend({},b.fn.fancybox.defaults,typeof b(a).data("fancybox")=="undefined"?e:b(a).data("fancybox"));w=e.onStart(o,q,e);if(w===false)h=false;else{if(typeof w=="object")e=b.extend(e,w);k=e.title||(a.nodeName?b(a).attr("title"):a.title)||"";if(a.nodeName&&!e.orig)e.orig=b(a).children("img:first").length?b(a).children("img:first"):b(a);if(k===""&&e.orig&&e.titleFromAlt)k=e.orig.attr("alt");c=e.href||(a.nodeName?b(a).attr("href"):a.href)||null;if(/^(?:javascript)/i.test(c)||
/* 20 */ c=="#")c=null;if(e.type){g=e.type;if(!c)c=e.content}else if(e.content)g="html";else if(c)g=c.match(J)?"image":c.match(W)?"swf":b(a).hasClass("iframe")?"iframe":c.indexOf("#")===0?"inline":"ajax";if(g){if(g=="inline"){a=c.substr(c.indexOf("#"));g=b(a).length>0?"inline":"ajax"}e.type=g;e.href=c;e.title=k;if(e.autoDimensions)if(e.type=="html"||e.type=="inline"||e.type=="ajax"){e.width="auto";e.height="auto"}else e.autoDimensions=false;if(e.modal){e.overlayShow=true;e.hideOnOverlayClick=false;e.hideOnContentClick=
/* 21 */ false;e.enableEscapeButton=false;e.showCloseButton=false}e.padding=parseInt(e.padding,10);e.margin=parseInt(e.margin,10);m.css("padding",e.padding+e.margin);b(".fancybox-inline-tmp").unbind("fancybox-cancel").bind("fancybox-change",function(){b(this).replaceWith(j.children())});switch(g){case "html":m.html(e.content);F();break;case "inline":if(b(a).parent().is("#fancybox-content")===true){h=false;break}b('<div class="fancybox-inline-tmp" />').hide().insertBefore(b(a)).bind("fancybox-cleanup",function(){b(this).replaceWith(j.children())}).bind("fancybox-cancel",
/* 22 */ function(){b(this).replaceWith(m.children())});b(a).appendTo(m);F();break;case "image":h=false;b.fancybox.showActivity();v=new Image;v.onerror=function(){O()};v.onload=function(){h=true;v.onerror=v.onload=null;e.width=v.width;e.height=v.height;b("<img />").attr({id:"fancybox-img",src:v.src,alt:e.title}).appendTo(m);Q()};v.src=c;break;case "swf":e.scrolling="no";C='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+e.width+'" height="'+e.height+'"><param name="movie" value="'+c+
/* 23 */ '"></param>';P="";b.each(e.swf,function(x,H){C+='<param name="'+x+'" value="'+H+'"></param>';P+=" "+x+'="'+H+'"'});C+='<embed src="'+c+'" type="application/x-shockwave-flash" width="'+e.width+'" height="'+e.height+'"'+P+"></embed></object>";m.html(C);F();break;case "ajax":h=false;b.fancybox.showActivity();e.ajax.win=e.ajax.success;G=b.ajax(b.extend({},e.ajax,{url:c,data:e.ajax.data||{},error:function(x){x.status>0&&O()},success:function(x,H,R){if((typeof R=="object"?R:G).status==200){if(typeof e.ajax.win==
/* 24 */ "function"){w=e.ajax.win(c,x,H,R);if(w===false){t.hide();return}else if(typeof w=="string"||typeof w=="object")x=w}m.html(x);F()}}}));break;case "iframe":Q()}}else O()}},F=function(){var a=e.width,c=e.height;a=a.toString().indexOf("%")>-1?parseInt((b(window).width()-e.margin*2)*parseFloat(a)/100,10)+"px":a=="auto"?"auto":a+"px";c=c.toString().indexOf("%")>-1?parseInt((b(window).height()-e.margin*2)*parseFloat(c)/100,10)+"px":c=="auto"?"auto":c+"px";m.wrapInner('<div style="width:'+a+";height:"+c+
/* 25 */ ";overflow: "+(e.scrolling=="auto"?"auto":e.scrolling=="yes"?"scroll":"hidden")+';position:relative;"></div>');e.width=m.width();e.height=m.height();Q()},Q=function(){var a,c;t.hide();if(f.is(":visible")&&false===d.onCleanup(l,p,d)){b.event.trigger("fancybox-cancel");h=false}else{h=true;b(j.add(u)).unbind();b(window).unbind("resize.fb scroll.fb");b(document).unbind("keydown.fb");f.is(":visible")&&d.titlePosition!=="outside"&&f.css("height",f.height());l=o;p=q;d=e;if(d.overlayShow){u.css({"background-color":d.overlayColor,
/* 26 */ opacity:d.overlayOpacity,cursor:d.hideOnOverlayClick?"pointer":"auto",height:b(document).height()});if(!u.is(":visible")){M&&b("select:not(#fancybox-tmp select)").filter(function(){return this.style.visibility!=="hidden"}).css({visibility:"hidden"}).one("fancybox-cleanup",function(){this.style.visibility="inherit"});u.show()}}else u.hide();i=X();s=d.title||"";y=0;n.empty().removeAttr("style").removeClass();if(d.titleShow!==false){if(b.isFunction(d.titleFormat))a=d.titleFormat(s,l,p,d);else a=s&&s.length?
/* 27 */ d.titlePosition=="float"?'<table id="fancybox-title-float-wrap" cellpadding="0" cellspacing="0"><tr><td id="fancybox-title-float-left"></td><td id="fancybox-title-float-main">'+s+'</td><td id="fancybox-title-float-right"></td></tr></table>':'<div id="fancybox-title-'+d.titlePosition+'">'+s+"</div>":false;s=a;if(!(!s||s==="")){n.addClass("fancybox-title-"+d.titlePosition).html(s).appendTo("body").show();switch(d.titlePosition){case "inside":n.css({width:i.width-d.padding*2,marginLeft:d.padding,marginRight:d.padding});
/* 28 */ y=n.outerHeight(true);n.appendTo(D);i.height+=y;break;case "over":n.css({marginLeft:d.padding,width:i.width-d.padding*2,bottom:d.padding}).appendTo(D);break;case "float":n.css("left",parseInt((n.width()-i.width-40)/2,10)*-1).appendTo(f);break;default:n.css({width:i.width-d.padding*2,paddingLeft:d.padding,paddingRight:d.padding}).appendTo(f)}}}n.hide();if(f.is(":visible")){b(E.add(z).add(A)).hide();a=f.position();r={top:a.top,left:a.left,width:f.width(),height:f.height()};c=r.width==i.width&&r.height==
/* 29 */ i.height;j.fadeTo(d.changeFade,0.3,function(){var g=function(){j.html(m.contents()).fadeTo(d.changeFade,1,S)};b.event.trigger("fancybox-change");j.empty().removeAttr("filter").css({"border-width":d.padding,width:i.width-d.padding*2,height:e.autoDimensions?"auto":i.height-y-d.padding*2});if(c)g();else{B.prop=0;b(B).animate({prop:1},{duration:d.changeSpeed,easing:d.easingChange,step:T,complete:g})}})}else{f.removeAttr("style");j.css("border-width",d.padding);if(d.transitionIn=="elastic"){r=V();j.html(m.contents());
/* 30 */ f.show();if(d.opacity)i.opacity=0;B.prop=0;b(B).animate({prop:1},{duration:d.speedIn,easing:d.easingIn,step:T,complete:S})}else{d.titlePosition=="inside"&&y>0&&n.show();j.css({width:i.width-d.padding*2,height:e.autoDimensions?"auto":i.height-y-d.padding*2}).html(m.contents());f.css(i).fadeIn(d.transitionIn=="none"?0:d.speedIn,S)}}}},Y=function(){if(d.enableEscapeButton||d.enableKeyboardNav)b(document).bind("keydown.fb",function(a){if(a.keyCode==27&&d.enableEscapeButton){a.preventDefault();b.fancybox.close()}else if((a.keyCode==
/* 31 */ 37||a.keyCode==39)&&d.enableKeyboardNav&&a.target.tagName!=="INPUT"&&a.target.tagName!=="TEXTAREA"&&a.target.tagName!=="SELECT"){a.preventDefault();b.fancybox[a.keyCode==37?"prev":"next"]()}});if(d.showNavArrows){if(d.cyclic&&l.length>1||p!==0)z.show();if(d.cyclic&&l.length>1||p!=l.length-1)A.show()}else{z.hide();A.hide()}},S=function(){if(!b.support.opacity){j.get(0).style.removeAttribute("filter");f.get(0).style.removeAttribute("filter")}e.autoDimensions&&j.css("height","auto");f.css("height","auto");
/* 32 */ s&&s.length&&n.show();d.showCloseButton&&E.show();Y();d.hideOnContentClick&&j.bind("click",b.fancybox.close);d.hideOnOverlayClick&&u.bind("click",b.fancybox.close);b(window).bind("resize.fb",b.fancybox.resize);d.centerOnScroll&&b(window).bind("scroll.fb",b.fancybox.center);if(d.type=="iframe")b('<iframe id="fancybox-frame" name="fancybox-frame'+(new Date).getTime()+'" frameborder="0" hspace="0" '+(b.browser.msie?'allowtransparency="true""':"")+' scrolling="'+e.scrolling+'" src="'+d.href+'"></iframe>').appendTo(j);
/* 33 */ f.show();h=false;b.fancybox.center();d.onComplete(l,p,d);var a,c;if(l.length-1>p){a=l[p+1].href;if(typeof a!=="undefined"&&a.match(J)){c=new Image;c.src=a}}if(p>0){a=l[p-1].href;if(typeof a!=="undefined"&&a.match(J)){c=new Image;c.src=a}}},T=function(a){var c={width:parseInt(r.width+(i.width-r.width)*a,10),height:parseInt(r.height+(i.height-r.height)*a,10),top:parseInt(r.top+(i.top-r.top)*a,10),left:parseInt(r.left+(i.left-r.left)*a,10)};if(typeof i.opacity!=="undefined")c.opacity=a<0.5?0.5:a;f.css(c);
/* 34 */ j.css({width:c.width-d.padding*2,height:c.height-y*a-d.padding*2})},U=function(){return[b(window).width()-d.margin*2,b(window).height()-d.margin*2,b(document).scrollLeft()+d.margin,b(document).scrollTop()+d.margin]},X=function(){var a=U(),c={},g=d.autoScale,k=d.padding*2;c.width=d.width.toString().indexOf("%")>-1?parseInt(a[0]*parseFloat(d.width)/100,10):d.width+k;c.height=d.height.toString().indexOf("%")>-1?parseInt(a[1]*parseFloat(d.height)/100,10):d.height+k;if(g&&(c.width>a[0]||c.height>a[1]))if(e.type==
/* 35 */ "image"||e.type=="swf"){g=d.width/d.height;if(c.width>a[0]){c.width=a[0];c.height=parseInt((c.width-k)/g+k,10)}if(c.height>a[1]){c.height=a[1];c.width=parseInt((c.height-k)*g+k,10)}}else{c.width=Math.min(c.width,a[0]);c.height=Math.min(c.height,a[1])}c.top=parseInt(Math.max(a[3]-20,a[3]+(a[1]-c.height-40)*0.5),10);c.left=parseInt(Math.max(a[2]-20,a[2]+(a[0]-c.width-40)*0.5),10);return c},V=function(){var a=e.orig?b(e.orig):false,c={};if(a&&a.length){c=a.offset();c.top+=parseInt(a.css("paddingTop"),
/* 36 */ 10)||0;c.left+=parseInt(a.css("paddingLeft"),10)||0;c.top+=parseInt(a.css("border-top-width"),10)||0;c.left+=parseInt(a.css("border-left-width"),10)||0;c.width=a.width();c.height=a.height();c={width:c.width+d.padding*2,height:c.height+d.padding*2,top:c.top-d.padding-20,left:c.left-d.padding-20}}else{a=U();c={width:d.padding*2,height:d.padding*2,top:parseInt(a[3]+a[1]*0.5,10),left:parseInt(a[2]+a[0]*0.5,10)}}return c},Z=function(){if(t.is(":visible")){b("div",t).css("top",L*-40+"px");L=(L+1)%12}else clearInterval(K)};
/* 37 */ b.fn.fancybox=function(a){if(!b(this).length)return this;b(this).data("fancybox",b.extend({},a,b.metadata?b(this).metadata():{})).unbind("click.fb").bind("click.fb",function(c){c.preventDefault();if(!h){h=true;b(this).blur();o=[];q=0;c=b(this).attr("rel")||"";if(!c||c==""||c==="nofollow")o.push(this);else{o=b("a[rel="+c+"], area[rel="+c+"]");q=o.index(this)}I()}});return this};b.fancybox=function(a,c){var g;if(!h){h=true;g=typeof c!=="undefined"?c:{};o=[];q=parseInt(g.index,10)||0;if(b.isArray(a)){for(var k=
/* 38 */ 0,C=a.length;k<C;k++)if(typeof a[k]=="object")b(a[k]).data("fancybox",b.extend({},g,a[k]));else a[k]=b({}).data("fancybox",b.extend({content:a[k]},g));o=jQuery.merge(o,a)}else{if(typeof a=="object")b(a).data("fancybox",b.extend({},g,a));else a=b({}).data("fancybox",b.extend({content:a},g));o.push(a)}if(q>o.length||q<0)q=0;I()}};b.fancybox.showActivity=function(){clearInterval(K);t.show();K=setInterval(Z,66)};b.fancybox.hideActivity=function(){t.hide()};b.fancybox.next=function(){return b.fancybox.pos(p+
/* 39 */ 1)};b.fancybox.prev=function(){return b.fancybox.pos(p-1)};b.fancybox.pos=function(a){if(!h){a=parseInt(a);o=l;if(a>-1&&a<l.length){q=a;I()}else if(d.cyclic&&l.length>1){q=a>=l.length?0:l.length-1;I()}}};b.fancybox.cancel=function(){if(!h){h=true;b.event.trigger("fancybox-cancel");N();e.onCancel(o,q,e);h=false}};b.fancybox.close=function(){function a(){u.fadeOut("fast");n.empty().hide();f.hide();b.event.trigger("fancybox-cleanup");j.empty();d.onClosed(l,p,d);l=e=[];p=q=0;d=e={};h=false}if(!(h||f.is(":hidden"))){h=
/* 40 */ true;if(d&&false===d.onCleanup(l,p,d))h=false;else{N();b(E.add(z).add(A)).hide();b(j.add(u)).unbind();b(window).unbind("resize.fb scroll.fb");b(document).unbind("keydown.fb");j.find("iframe").attr("src",M&&/^https/i.test(window.location.href||"")?"javascript:void(false)":"about:blank");d.titlePosition!=="inside"&&n.empty();f.stop();if(d.transitionOut=="elastic"){r=V();var c=f.position();i={top:c.top,left:c.left,width:f.width(),height:f.height()};if(d.opacity)i.opacity=1;n.empty().hide();B.prop=1;
/* 41 */ b(B).animate({prop:0},{duration:d.speedOut,easing:d.easingOut,step:T,complete:a})}else f.fadeOut(d.transitionOut=="none"?0:d.speedOut,a)}}};b.fancybox.resize=function(){u.is(":visible")&&u.css("height",b(document).height());b.fancybox.center(true)};b.fancybox.center=function(a){var c,g;if(!h){g=a===true?1:0;c=U();!g&&(f.width()>c[0]||f.height()>c[1])||f.stop().animate({top:parseInt(Math.max(c[3]-20,c[3]+(c[1]-j.height()-40)*0.5-d.padding)),left:parseInt(Math.max(c[2]-20,c[2]+(c[0]-j.width()-40)*0.5-
/* 42 */ d.padding))},typeof a=="number"?a:200)}};b.fancybox.init=function(){if(!b("#fancybox-wrap").length){b("body").append(m=b('<div id="fancybox-tmp"></div>'),t=b('<div id="fancybox-loading"><div></div></div>'),u=b('<div id="fancybox-overlay"></div>'),f=b('<div id="fancybox-wrap"></div>'));D=b('<div id="fancybox-outer"></div>').append('<div class="fancybox-bg" id="fancybox-bg-n"></div><div class="fancybox-bg" id="fancybox-bg-ne"></div><div class="fancybox-bg" id="fancybox-bg-e"></div><div class="fancybox-bg" id="fancybox-bg-se"></div><div class="fancybox-bg" id="fancybox-bg-s"></div><div class="fancybox-bg" id="fancybox-bg-sw"></div><div class="fancybox-bg" id="fancybox-bg-w"></div><div class="fancybox-bg" id="fancybox-bg-nw"></div>').appendTo(f);
/* 43 */ D.append(j=b('<div id="fancybox-content"></div>'),E=b('<a id="fancybox-close"></a>'),n=b('<div id="fancybox-title"></div>'),z=b('<a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a>'),A=b('<a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a>'));E.click(b.fancybox.close);t.click(b.fancybox.cancel);z.click(function(a){a.preventDefault();b.fancybox.prev()});A.click(function(a){a.preventDefault();b.fancybox.next()});
/* 44 */ b.fn.mousewheel&&f.bind("mousewheel.fb",function(a,c){if(h)a.preventDefault();else if(b(a.target).get(0).clientHeight==0||b(a.target).get(0).scrollHeight===b(a.target).get(0).clientHeight){a.preventDefault();b.fancybox[c>0?"prev":"next"]()}});b.support.opacity||f.addClass("fancybox-ie");if(M){t.addClass("fancybox-ie6");f.addClass("fancybox-ie6");b('<iframe id="fancybox-hide-sel-frame" src="'+(/^https/i.test(window.location.href||"")?"javascript:void(false)":"about:blank")+'" scrolling="no" border="0" frameborder="0" tabindex="-1"></iframe>').prependTo(D)}}};
/* 45 */ b.fn.fancybox.defaults={padding:10,margin:40,opacity:false,modal:false,cyclic:false,scrolling:"auto",width:560,height:340,autoScale:true,autoDimensions:true,centerOnScroll:false,ajax:{},swf:{wmode:"transparent"},hideOnOverlayClick:true,hideOnContentClick:false,overlayShow:true,overlayOpacity:0.7,overlayColor:"#777",titleShow:true,titlePosition:"float",titleFormat:null,titleFromAlt:false,transitionIn:"fade",transitionOut:"fade",speedIn:300,speedOut:300,changeSpeed:300,changeFade:"fast",easingIn:"swing",
/* 46 */ easingOut:"swing",showCloseButton:true,showNavArrows:true,enableEscapeButton:true,enableKeyboardNav:true,onStart:function(){},onCancel:function(){},onComplete:function(){},onCleanup:function(){},onClosed:function(){},onError:function(){}};b(document).ready(function(){b.fancybox.init()})})(jQuery);

;
/* jquery.form.min.js */

/* 1  */ /*!
/* 2  *|  * jQuery Form Plugin
/* 3  *|  * version: 3.51.0-2014.06.20
/* 4  *|  * Requires jQuery v1.5 or later
/* 5  *|  * Copyright (c) 2014 M. Alsup
/* 6  *|  * Examples and documentation at: http://malsup.com/jquery/form/
/* 7  *|  * Project repository: https://github.com/malsup/form
/* 8  *|  * Dual licensed under the MIT and GPL licenses.
/* 9  *|  * https://github.com/malsup/form#copyright-and-license
/* 10 *|  */
/* 11 */ !function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e("undefined"!=typeof jQuery?jQuery:window.Zepto)}(function(e){"use strict";function t(t){var r=t.data;t.isDefaultPrevented()||(t.preventDefault(),e(t.target).ajaxSubmit(r))}function r(t){var r=t.target,a=e(r);if(!a.is("[type=submit],[type=image]")){var n=a.closest("[type=submit]");if(0===n.length)return;r=n[0]}var i=this;if(i.clk=r,"image"==r.type)if(void 0!==t.offsetX)i.clk_x=t.offsetX,i.clk_y=t.offsetY;else if("function"==typeof e.fn.offset){var o=a.offset();i.clk_x=t.pageX-o.left,i.clk_y=t.pageY-o.top}else i.clk_x=t.pageX-r.offsetLeft,i.clk_y=t.pageY-r.offsetTop;setTimeout(function(){i.clk=i.clk_x=i.clk_y=null},100)}function a(){if(e.fn.ajaxSubmit.debug){var t="[jquery.form] "+Array.prototype.join.call(arguments,"");window.console&&window.console.log?window.console.log(t):window.opera&&window.opera.postError&&window.opera.postError(t)}}var n={};n.fileapi=void 0!==e("<input type='file'/>").get(0).files,n.formdata=void 0!==window.FormData;var i=!!e.fn.prop;e.fn.attr2=function(){if(!i)return this.attr.apply(this,arguments);var e=this.prop.apply(this,arguments);return e&&e.jquery||"string"==typeof e?e:this.attr.apply(this,arguments)},e.fn.ajaxSubmit=function(t){function r(r){var a,n,i=e.param(r,t.traditional).split("&"),o=i.length,s=[];for(a=0;o>a;a++)i[a]=i[a].replace(/\+/g," "),n=i[a].split("="),s.push([decodeURIComponent(n[0]),decodeURIComponent(n[1])]);return s}function o(a){for(var n=new FormData,i=0;i<a.length;i++)n.append(a[i].name,a[i].value);if(t.extraData){var o=r(t.extraData);for(i=0;i<o.length;i++)o[i]&&n.append(o[i][0],o[i][1])}t.data=null;var s=e.extend(!0,{},e.ajaxSettings,t,{contentType:!1,processData:!1,cache:!1,type:u||"POST"});t.uploadProgress&&(s.xhr=function(){var r=e.ajaxSettings.xhr();return r.upload&&r.upload.addEventListener("progress",function(e){var r=0,a=e.loaded||e.position,n=e.total;e.lengthComputable&&(r=Math.ceil(a/n*100)),t.uploadProgress(e,a,n,r)},!1),r}),s.data=null;var c=s.beforeSend;return s.beforeSend=function(e,r){r.data=t.formData?t.formData:n,c&&c.call(this,e,r)},e.ajax(s)}function s(r){function n(e){var t=null;try{e.contentWindow&&(t=e.contentWindow.document)}catch(r){a("cannot get iframe.contentWindow document: "+r)}if(t)return t;try{t=e.contentDocument?e.contentDocument:e.document}catch(r){a("cannot get iframe.contentDocument: "+r),t=e.document}return t}function o(){function t(){try{var e=n(g).readyState;a("state = "+e),e&&"uninitialized"==e.toLowerCase()&&setTimeout(t,50)}catch(r){a("Server abort: ",r," (",r.name,")"),s(k),j&&clearTimeout(j),j=void 0}}var r=f.attr2("target"),i=f.attr2("action"),o="multipart/form-data",c=f.attr("enctype")||f.attr("encoding")||o;w.setAttribute("target",p),(!u||/post/i.test(u))&&w.setAttribute("method","POST"),i!=m.url&&w.setAttribute("action",m.url),m.skipEncodingOverride||u&&!/post/i.test(u)||f.attr({encoding:"multipart/form-data",enctype:"multipart/form-data"}),m.timeout&&(j=setTimeout(function(){T=!0,s(D)},m.timeout));var l=[];try{if(m.extraData)for(var d in m.extraData)m.extraData.hasOwnProperty(d)&&l.push(e.isPlainObject(m.extraData[d])&&m.extraData[d].hasOwnProperty("name")&&m.extraData[d].hasOwnProperty("value")?e('<input type="hidden" name="'+m.extraData[d].name+'">').val(m.extraData[d].value).appendTo(w)[0]:e('<input type="hidden" name="'+d+'">').val(m.extraData[d]).appendTo(w)[0]);m.iframeTarget||v.appendTo("body"),g.attachEvent?g.attachEvent("onload",s):g.addEventListener("load",s,!1),setTimeout(t,15);try{w.submit()}catch(h){var x=document.createElement("form").submit;x.apply(w)}}finally{w.setAttribute("action",i),w.setAttribute("enctype",c),r?w.setAttribute("target",r):f.removeAttr("target"),e(l).remove()}}function s(t){if(!x.aborted&&!F){if(M=n(g),M||(a("cannot access response document"),t=k),t===D&&x)return x.abort("timeout"),void S.reject(x,"timeout");if(t==k&&x)return x.abort("server abort"),void S.reject(x,"error","server abort");if(M&&M.location.href!=m.iframeSrc||T){g.detachEvent?g.detachEvent("onload",s):g.removeEventListener("load",s,!1);var r,i="success";try{if(T)throw"timeout";var o="xml"==m.dataType||M.XMLDocument||e.isXMLDoc(M);if(a("isXml="+o),!o&&window.opera&&(null===M.body||!M.body.innerHTML)&&--O)return a("requeing onLoad callback, DOM not available"),void setTimeout(s,250);var u=M.body?M.body:M.documentElement;x.responseText=u?u.innerHTML:null,x.responseXML=M.XMLDocument?M.XMLDocument:M,o&&(m.dataType="xml"),x.getResponseHeader=function(e){var t={"content-type":m.dataType};return t[e.toLowerCase()]},u&&(x.status=Number(u.getAttribute("status"))||x.status,x.statusText=u.getAttribute("statusText")||x.statusText);var c=(m.dataType||"").toLowerCase(),l=/(json|script|text)/.test(c);if(l||m.textarea){var f=M.getElementsByTagName("textarea")[0];if(f)x.responseText=f.value,x.status=Number(f.getAttribute("status"))||x.status,x.statusText=f.getAttribute("statusText")||x.statusText;else if(l){var p=M.getElementsByTagName("pre")[0],h=M.getElementsByTagName("body")[0];p?x.responseText=p.textContent?p.textContent:p.innerText:h&&(x.responseText=h.textContent?h.textContent:h.innerText)}}else"xml"==c&&!x.responseXML&&x.responseText&&(x.responseXML=X(x.responseText));try{E=_(x,c,m)}catch(y){i="parsererror",x.error=r=y||i}}catch(y){a("error caught: ",y),i="error",x.error=r=y||i}x.aborted&&(a("upload aborted"),i=null),x.status&&(i=x.status>=200&&x.status<300||304===x.status?"success":"error"),"success"===i?(m.success&&m.success.call(m.context,E,"success",x),S.resolve(x.responseText,"success",x),d&&e.event.trigger("ajaxSuccess",[x,m])):i&&(void 0===r&&(r=x.statusText),m.error&&m.error.call(m.context,x,i,r),S.reject(x,"error",r),d&&e.event.trigger("ajaxError",[x,m,r])),d&&e.event.trigger("ajaxComplete",[x,m]),d&&!--e.active&&e.event.trigger("ajaxStop"),m.complete&&m.complete.call(m.context,x,i),F=!0,m.timeout&&clearTimeout(j),setTimeout(function(){m.iframeTarget?v.attr("src",m.iframeSrc):v.remove(),x.responseXML=null},100)}}}var c,l,m,d,p,v,g,x,y,b,T,j,w=f[0],S=e.Deferred();if(S.abort=function(e){x.abort(e)},r)for(l=0;l<h.length;l++)c=e(h[l]),i?c.prop("disabled",!1):c.removeAttr("disabled");if(m=e.extend(!0,{},e.ajaxSettings,t),m.context=m.context||m,p="jqFormIO"+(new Date).getTime(),m.iframeTarget?(v=e(m.iframeTarget),b=v.attr2("name"),b?p=b:v.attr2("name",p)):(v=e('<iframe name="'+p+'" src="'+m.iframeSrc+'" />'),v.css({position:"absolute",top:"-1000px",left:"-1000px"})),g=v[0],x={aborted:0,responseText:null,responseXML:null,status:0,statusText:"n/a",getAllResponseHeaders:function(){},getResponseHeader:function(){},setRequestHeader:function(){},abort:function(t){var r="timeout"===t?"timeout":"aborted";a("aborting upload... "+r),this.aborted=1;try{g.contentWindow.document.execCommand&&g.contentWindow.document.execCommand("Stop")}catch(n){}v.attr("src",m.iframeSrc),x.error=r,m.error&&m.error.call(m.context,x,r,t),d&&e.event.trigger("ajaxError",[x,m,r]),m.complete&&m.complete.call(m.context,x,r)}},d=m.global,d&&0===e.active++&&e.event.trigger("ajaxStart"),d&&e.event.trigger("ajaxSend",[x,m]),m.beforeSend&&m.beforeSend.call(m.context,x,m)===!1)return m.global&&e.active--,S.reject(),S;if(x.aborted)return S.reject(),S;y=w.clk,y&&(b=y.name,b&&!y.disabled&&(m.extraData=m.extraData||{},m.extraData[b]=y.value,"image"==y.type&&(m.extraData[b+".x"]=w.clk_x,m.extraData[b+".y"]=w.clk_y)));var D=1,k=2,A=e("meta[name=csrf-token]").attr("content"),L=e("meta[name=csrf-param]").attr("content");L&&A&&(m.extraData=m.extraData||{},m.extraData[L]=A),m.forceSync?o():setTimeout(o,10);var E,M,F,O=50,X=e.parseXML||function(e,t){return window.ActiveXObject?(t=new ActiveXObject("Microsoft.XMLDOM"),t.async="false",t.loadXML(e)):t=(new DOMParser).parseFromString(e,"text/xml"),t&&t.documentElement&&"parsererror"!=t.documentElement.nodeName?t:null},C=e.parseJSON||function(e){return window.eval("("+e+")")},_=function(t,r,a){var n=t.getResponseHeader("content-type")||"",i="xml"===r||!r&&n.indexOf("xml")>=0,o=i?t.responseXML:t.responseText;return i&&"parsererror"===o.documentElement.nodeName&&e.error&&e.error("parsererror"),a&&a.dataFilter&&(o=a.dataFilter(o,r)),"string"==typeof o&&("json"===r||!r&&n.indexOf("json")>=0?o=C(o):("script"===r||!r&&n.indexOf("javascript")>=0)&&e.globalEval(o)),o};return S}if(!this.length)return a("ajaxSubmit: skipping submit process - no element selected"),this;var u,c,l,f=this;"function"==typeof t?t={success:t}:void 0===t&&(t={}),u=t.type||this.attr2("method"),c=t.url||this.attr2("action"),l="string"==typeof c?e.trim(c):"",l=l||window.location.href||"",l&&(l=(l.match(/^([^#]+)/)||[])[1]),t=e.extend(!0,{url:l,success:e.ajaxSettings.success,type:u||e.ajaxSettings.type,iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank"},t);var m={};if(this.trigger("form-pre-serialize",[this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-pre-serialize trigger"),this;if(t.beforeSerialize&&t.beforeSerialize(this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSerialize callback"),this;var d=t.traditional;void 0===d&&(d=e.ajaxSettings.traditional);var p,h=[],v=this.formToArray(t.semantic,h);if(t.data&&(t.extraData=t.data,p=e.param(t.data,d)),t.beforeSubmit&&t.beforeSubmit(v,this,t)===!1)return a("ajaxSubmit: submit aborted via beforeSubmit callback"),this;if(this.trigger("form-submit-validate",[v,this,t,m]),m.veto)return a("ajaxSubmit: submit vetoed via form-submit-validate trigger"),this;var g=e.param(v,d);p&&(g=g?g+"&"+p:p),"GET"==t.type.toUpperCase()?(t.url+=(t.url.indexOf("?")>=0?"&":"?")+g,t.data=null):t.data=g;var x=[];if(t.resetForm&&x.push(function(){f.resetForm()}),t.clearForm&&x.push(function(){f.clearForm(t.includeHidden)}),!t.dataType&&t.target){var y=t.success||function(){};x.push(function(r){var a=t.replaceTarget?"replaceWith":"html";e(t.target)[a](r).each(y,arguments)})}else t.success&&x.push(t.success);if(t.success=function(e,r,a){for(var n=t.context||this,i=0,o=x.length;o>i;i++)x[i].apply(n,[e,r,a||f,f])},t.error){var b=t.error;t.error=function(e,r,a){var n=t.context||this;b.apply(n,[e,r,a,f])}}if(t.complete){var T=t.complete;t.complete=function(e,r){var a=t.context||this;T.apply(a,[e,r,f])}}var j=e("input[type=file]:enabled",this).filter(function(){return""!==e(this).val()}),w=j.length>0,S="multipart/form-data",D=f.attr("enctype")==S||f.attr("encoding")==S,k=n.fileapi&&n.formdata;a("fileAPI :"+k);var A,L=(w||D)&&!k;t.iframe!==!1&&(t.iframe||L)?t.closeKeepAlive?e.get(t.closeKeepAlive,function(){A=s(v)}):A=s(v):A=(w||D)&&k?o(v):e.ajax(t),f.removeData("jqxhr").data("jqxhr",A);for(var E=0;E<h.length;E++)h[E]=null;return this.trigger("form-submit-notify",[this,t]),this},e.fn.ajaxForm=function(n){if(n=n||{},n.delegation=n.delegation&&e.isFunction(e.fn.on),!n.delegation&&0===this.length){var i={s:this.selector,c:this.context};return!e.isReady&&i.s?(a("DOM not ready, queuing ajaxForm"),e(function(){e(i.s,i.c).ajaxForm(n)}),this):(a("terminating; zero elements found by selector"+(e.isReady?"":" (DOM not ready)")),this)}return n.delegation?(e(document).off("submit.form-plugin",this.selector,t).off("click.form-plugin",this.selector,r).on("submit.form-plugin",this.selector,n,t).on("click.form-plugin",this.selector,n,r),this):this.ajaxFormUnbind().bind("submit.form-plugin",n,t).bind("click.form-plugin",n,r)},e.fn.ajaxFormUnbind=function(){return this.unbind("submit.form-plugin click.form-plugin")},e.fn.formToArray=function(t,r){var a=[];if(0===this.length)return a;var i,o=this[0],s=this.attr("id"),u=t?o.getElementsByTagName("*"):o.elements;if(u&&!/MSIE [678]/.test(navigator.userAgent)&&(u=e(u).get()),s&&(i=e(':input[form="'+s+'"]').get(),i.length&&(u=(u||[]).concat(i))),!u||!u.length)return a;var c,l,f,m,d,p,h;for(c=0,p=u.length;p>c;c++)if(d=u[c],f=d.name,f&&!d.disabled)if(t&&o.clk&&"image"==d.type)o.clk==d&&(a.push({name:f,value:e(d).val(),type:d.type}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}));else if(m=e.fieldValue(d,!0),m&&m.constructor==Array)for(r&&r.push(d),l=0,h=m.length;h>l;l++)a.push({name:f,value:m[l]});else if(n.fileapi&&"file"==d.type){r&&r.push(d);var v=d.files;if(v.length)for(l=0;l<v.length;l++)a.push({name:f,value:v[l],type:d.type});else a.push({name:f,value:"",type:d.type})}else null!==m&&"undefined"!=typeof m&&(r&&r.push(d),a.push({name:f,value:m,type:d.type,required:d.required}));if(!t&&o.clk){var g=e(o.clk),x=g[0];f=x.name,f&&!x.disabled&&"image"==x.type&&(a.push({name:f,value:g.val()}),a.push({name:f+".x",value:o.clk_x},{name:f+".y",value:o.clk_y}))}return a},e.fn.formSerialize=function(t){return e.param(this.formToArray(t))},e.fn.fieldSerialize=function(t){var r=[];return this.each(function(){var a=this.name;if(a){var n=e.fieldValue(this,t);if(n&&n.constructor==Array)for(var i=0,o=n.length;o>i;i++)r.push({name:a,value:n[i]});else null!==n&&"undefined"!=typeof n&&r.push({name:this.name,value:n})}}),e.param(r)},e.fn.fieldValue=function(t){for(var r=[],a=0,n=this.length;n>a;a++){var i=this[a],o=e.fieldValue(i,t);null===o||"undefined"==typeof o||o.constructor==Array&&!o.length||(o.constructor==Array?e.merge(r,o):r.push(o))}return r},e.fieldValue=function(t,r){var a=t.name,n=t.type,i=t.tagName.toLowerCase();if(void 0===r&&(r=!0),r&&(!a||t.disabled||"reset"==n||"button"==n||("checkbox"==n||"radio"==n)&&!t.checked||("submit"==n||"image"==n)&&t.form&&t.form.clk!=t||"select"==i&&-1==t.selectedIndex))return null;if("select"==i){var o=t.selectedIndex;if(0>o)return null;for(var s=[],u=t.options,c="select-one"==n,l=c?o+1:u.length,f=c?o:0;l>f;f++){var m=u[f];if(m.selected){var d=m.value;if(d||(d=m.attributes&&m.attributes.value&&!m.attributes.value.specified?m.text:m.value),c)return d;s.push(d)}}return s}return e(t).val()},e.fn.clearForm=function(t){return this.each(function(){e("input,select,textarea",this).clearFields(t)})},e.fn.clearFields=e.fn.clearInputs=function(t){var r=/^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;return this.each(function(){var a=this.type,n=this.tagName.toLowerCase();r.test(a)||"textarea"==n?this.value="":"checkbox"==a||"radio"==a?this.checked=!1:"select"==n?this.selectedIndex=-1:"file"==a?/MSIE/.test(navigator.userAgent)?e(this).replaceWith(e(this).clone(!0)):e(this).val(""):t&&(t===!0&&/hidden/.test(a)||"string"==typeof t&&e(this).is(t))&&(this.value="")})},e.fn.resetForm=function(){return this.each(function(){("function"==typeof this.reset||"object"==typeof this.reset&&!this.reset.nodeType)&&this.reset()})},e.fn.enable=function(e){return void 0===e&&(e=!0),this.each(function(){this.disabled=!e})},e.fn.selected=function(t){return void 0===t&&(t=!0),this.each(function(){var r=this.type;if("checkbox"==r||"radio"==r)this.checked=t;else if("option"==this.tagName.toLowerCase()){var a=e(this).parent("select");t&&a[0]&&"select-one"==a[0].type&&a.find("option").selected(!1),this.selected=t}})},e.fn.ajaxSubmit.debug=!1});
