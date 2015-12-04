/*
 * jQuery Nivo Slider v1.6
 * http://nivo.dev7studios.com
 *
 * Copyright 2010, Gilbert Pellegrom
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * March 2010
 */
$(window).load(function(){$('#slider').nivoSlider({effect:'fade'})});$(document).ready(function(){$('#download-form input:radio').change(function(){var url=$('#download-form input:radio:checked').val();$('#download-btn').attr('href',url)});$('a#download-jump').click(function(){$(window).scrollTo($('a[name="download"]'),1000)})});(function($){$.fn.nivoSlider=function(options){var currentSlide=0;var currentImage='';var totalSlides=0;var randAnim='';var running=false;var paused=false;settings=jQuery.extend({effect:'random',slices:15,animSpeed:800,pauseTime:5000,startSlide:1,directionNav:true,directionNavHide:true,controlNav:true,pauseOnHover:false,beforeChange:function(){},afterChange:function(){}},options);return this.each(function(){var slider=$(this);slider.css('position','relative');slider.width('1px');slider.height('1px');slider.addClass('nivoSlider');var kids=slider.children();kids.each(function(){var child=$(this);if(!child.is('img')){if(child.is('a')){child.addClass('nivo-imageLink')}child=child.find('img:first')}var childWidth=child.width();if(childWidth==0)childWidth=child.attr('width');var childHeight=child.height();if(childHeight==0)childHeight=child.attr('height');if(childWidth>slider.width()){slider.width(childWidth)}if(childHeight>slider.height()){slider.height(childHeight)}child.css('display','none');totalSlides++});if($(kids[currentSlide]).is('img')){currentImage=$(kids[currentSlide])}else{currentImage=$(kids[currentSlide]).find('img:first')}if($(kids[currentSlide]).is('a')){$(kids[currentSlide]).css('display','block')}slider.css('background','url('+currentImage.attr('src')+') no-repeat');for(var i=0;i<settings.slices;i++){var sliceWidth=Math.round(slider.width()/settings.slices);if(i==settings.slices-1){slider.append($('<div class="nivo-slice"></div>').css({left:(sliceWidth*i)+'px',width:(slider.width()-(sliceWidth*i))+'px'}))}else{slider.append($('<div class="nivo-slice"></div>').css({left:(sliceWidth*i)+'px',width:sliceWidth+'px'}))}}slider.append($('<div class="nivo-caption"><p></p></div>').css('display','none'));if(currentImage.attr('title')!=''){$('.nivo-caption p',slider).html(currentImage.attr('title'));$('.nivo-caption',slider).fadeIn(settings.animSpeed)}var timer=setInterval(function(){nivoRun(slider,kids,settings,false)},settings.pauseTime);if(settings.directionNav){slider.append('<div class="nivo-directionNav"><a class="nivo-prevNav">Prev</a><a class="nivo-nextNav">Next</a></div>');if(settings.directionNavHide){$('.nivo-directionNav',slider).hide();slider.hover(function(){$('.nivo-directionNav',slider).show()},function(){$('.nivo-directionNav',slider).hide()})}$('a.nivo-prevNav',slider).live('click',function(){if(running)return false;clearInterval(timer);timer='';currentSlide-=2;nivoRun(slider,kids,settings,'prev')});$('a.nivo-nextNav',slider).live('click',function(){if(running)return false;clearInterval(timer);timer='';nivoRun(slider,kids,settings,'next')})}if(settings.controlNav){var nivoControl=$('<div class="nivo-controlNav"></div>');slider.append(nivoControl);for(var i=0;i<kids.length;i++){nivoControl.append('<a class="nivo-control" rel="'+i+'">'+(i+1)+'</a>')}$('.nivo-controlNav a:eq('+currentSlide+')',slider).addClass('active');$('.nivo-controlNav a',slider).live('click',function(){if(running)return false;if($(this).hasClass('active'))return false;clearInterval(timer);timer='';slider.css('background','url('+currentImage.attr('src')+') no-repeat');currentSlide=$(this).attr('rel')-1;nivoRun(slider,kids,settings,'control')})}if(settings.pauseOnHover){slider.hover(function(){paused=true;clearInterval(timer);timer=''},function(){paused=false;if(timer==''){timer=setInterval(function(){nivoRun(slider,kids,settings,false)},settings.pauseTime)}})}slider.bind('nivo:animFinished',function(){running=false;$(kids).each(function(){if($(this).is('a')){$(this).css('display','none')}});if($(kids[currentSlide]).is('a')){$(kids[currentSlide]).css('display','block')}if(timer==''&&!paused){timer=setInterval(function(){nivoRun(slider,kids,settings,false)},settings.pauseTime)}settings.afterChange.call(this)})});function nivoRun(slider,kids,settings,nudge){settings.beforeChange.call(this);if(!nudge){slider.css('background','url('+currentImage.attr('src')+') no-repeat')}else{if(nudge=='prev'){slider.css('background','url('+currentImage.attr('src')+') no-repeat')}if(nudge=='next'){slider.css('background','url('+currentImage.attr('src')+') no-repeat')}}currentSlide++;if(currentSlide==totalSlides)currentSlide=0;if(currentSlide<0)currentSlide=(totalSlides-1);if($(kids[currentSlide]).is('img')){currentImage=$(kids[currentSlide])}else{currentImage=$(kids[currentSlide]).find('img:first')}if(settings.controlNav){$('.nivo-controlNav a',slider).removeClass('active');$('.nivo-controlNav a:eq('+currentSlide+')',slider).addClass('active')}if(currentImage.attr('title')!=''){if($('.nivo-caption',slider).css('display')=='block'){$('.nivo-caption p',slider).fadeOut(settings.animSpeed,function(){$(this).html(currentImage.attr('title'));$(this).fadeIn(settings.animSpeed)})}else{$('.nivo-caption p',slider).html(currentImage.attr('title'))}$('.nivo-caption',slider).fadeIn(settings.animSpeed)}else{$('.nivo-caption',slider).fadeOut(settings.animSpeed)}var i=0;$('.nivo-slice',slider).each(function(){var sliceWidth=Math.round(slider.width()/settings.slices);$(this).css({height:'0px',opacity:'0',background:'url('+currentImage.attr('src')+') no-repeat -'+((sliceWidth+(i*sliceWidth))-sliceWidth)+'px 0%'});i++});if(settings.effect=='random'){var anims=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade");randAnim=anims[Math.floor(Math.random()*(anims.length+1))];if(randAnim==undefined)randAnim='fade'}running=true;if(settings.effect=='sliceDown'||settings.effect=='sliceDownRight'||randAnim=='sliceDownRight'||settings.effect=='sliceDownLeft'||randAnim=='sliceDownLeft'){var timeBuff=0;var i=0;var slices=$('.nivo-slice',slider);if(settings.effect=='sliceDownLeft'||randAnim=='sliceDownLeft')slices=$('.nivo-slice',slider).reverse();slices.each(function(){var slice=$(this);slice.css('top','0px');if(i==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished')})},(100+timeBuff))}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed)},(100+timeBuff))}timeBuff+=50;i++})}else if(settings.effect=='sliceUp'||settings.effect=='sliceUpRight'||randAnim=='sliceUpRight'||settings.effect=='sliceUpLeft'||randAnim=='sliceUpLeft'){var timeBuff=0;var i=0;var slices=$('.nivo-slice',slider);if(settings.effect=='sliceUpLeft'||randAnim=='sliceUpLeft')slices=$('.nivo-slice',slider).reverse();slices.each(function(){var slice=$(this);slice.css('bottom','0px');if(i==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished')})},(100+timeBuff))}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed)},(100+timeBuff))}timeBuff+=50;i++})}else if(settings.effect=='sliceUpDown'||settings.effect=='sliceUpDownRight'||randAnim=='sliceUpDown'||settings.effect=='sliceUpDownLeft'||randAnim=='sliceUpDownLeft'){var timeBuff=0;var i=0;var v=0;var slices=$('.nivo-slice',slider);if(settings.effect=='sliceUpDownLeft'||randAnim=='sliceUpDownLeft')slices=$('.nivo-slice',slider).reverse();slices.each(function(){var slice=$(this);if(i==0){slice.css('top','0px');i++}else{slice.css('bottom','0px');i=0}if(v==settings.slices-1){setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished')})},(100+timeBuff))}else{setTimeout(function(){slice.animate({height:'100%',opacity:'1.0'},settings.animSpeed)},(100+timeBuff))}timeBuff+=50;v++})}else if(settings.effect=='fold'||randAnim=='fold'){var timeBuff=0;var i=0;$('.nivo-slice',slider).each(function(){var slice=$(this);var origWidth=slice.width();slice.css({top:'0px',height:'100%',width:'0px'});if(i==settings.slices-1){setTimeout(function(){slice.animate({width:origWidth,opacity:'1.0'},settings.animSpeed,'',function(){slider.trigger('nivo:animFinished')})},(100+timeBuff))}else{setTimeout(function(){slice.animate({width:origWidth,opacity:'1.0'},settings.animSpeed)},(100+timeBuff))}timeBuff+=50;i++})}else if(settings.effect=='fade'||randAnim=='fade'){var i=0;$('.nivo-slice',slider).each(function(){$(this).css('height','100%');if(i==settings.slices-1){$(this).animate({opacity:'1.0'},(settings.animSpeed*2),'',function(){slider.trigger('nivo:animFinished')})}else{$(this).animate({opacity:'1.0'},(settings.animSpeed*2))}i++})}}};$.fn.reverse=[].reverse})(jQuery);

/*$(window).load(function () {
    $('#slider').nivoSlider({
        effect: 'fade'
    })
});
$(document).ready(function () {
    $('#download-form input:radio').change(function () {
        var url = $('#download-form input:radio:checked').val();
        $('#download-btn').attr('href', url)
    });
    $('a#download-jump').click(function () {
        $(window).scrollTo($('a[name="download"]'), 1000)
    })
});
(function ($) {
    $.fn.nivoSlider = function (options) {
        var currentSlide = 0;
        var currentImage = '';
        var totalSlides = 0;
        var randAnim = '';
        var running = false;
        var paused = false;
        settings = jQuery.extend({
            effect: 'random',
            slices: 15,
            animSpeed: 800,
            pauseTime: 5000,
            startSlide: 1,
            directionNav: true,
            directionNavHide: true,
            controlNav: true,
            pauseOnHover: false,
            beforeChange: function () {},
            afterChange: function () {}
        }, options);
        return this.each(function () {
            var slider = $(this);
            slider.css('position', 'relative');
            slider.width('1px');
            slider.height('1px');
            slider.addClass('nivoSlider');
            var kids = slider.children();
            kids.each(function () {
                var child = $(this);
                if (!child.is('img')) {
                    if (child.is('a')) {
                        child.addClass('nivo-imageLink')
                    }
                    child = child.find('img:first')
                }
                var childWidth = child.width();
                if (childWidth == 0) childWidth = child.attr('width');
                var childHeight = child.height();
                if (childHeight == 0) childHeight = child.attr('height');
                if (childWidth > slider.width()) {
                    slider.width(childWidth)
                }
                if (childHeight > slider.height()) {
                    slider.height(childHeight)
                }
                child.css('display', 'none');
                totalSlides++
            });
            if ($(kids[currentSlide]).is('img')) {
                currentImage = $(kids[currentSlide])
            } else {
                currentImage = $(kids[currentSlide]).find('img:first')
            } if ($(kids[currentSlide]).is('a')) {
                $(kids[currentSlide]).css('display', 'block')
            }
            slider.css('background', 'url(' + currentImage.attr('src') + ') no-repeat');
            for (var i = 0; i < settings.slices; i++) {
                var sliceWidth = Math.round(slider.width() / settings.slices);
                if (i == settings.slices - 1) {
                    slider.append($('<div class="nivo-slice"></div>').css({
                        left: (sliceWidth * i) + 'px',
                        width: (slider.width() - (sliceWidth * i)) + 'px'
                    }))
                } else {
                    slider.append($('<div class="nivo-slice"></div>').css({
                        left: (sliceWidth * i) + 'px',
                        width: sliceWidth + 'px'
                    }))
                }
            }
            slider.append($('<div class="nivo-caption"><p></p></div>').css('display', 'none'));
            if (currentImage.attr('title') != '') {
                $('.nivo-caption p', slider).html(currentImage.attr('title'));
                $('.nivo-caption', slider).fadeIn(settings.animSpeed)
            }
            var timer = setInterval(function () {
                nivoRun(slider, kids, settings, false)
            }, settings.pauseTime);
            if (settings.directionNav) {
                slider.append('<div class="nivo-directionNav"><a class="nivo-prevNav">Prev</a><a class="nivo-nextNav">Next</a></div>');
                if (settings.directionNavHide) {
                    $('.nivo-directionNav', slider).hide();
                    slider.hover(function () {
                        $('.nivo-directionNav', slider).show()
                    }, function () {
                        $('.nivo-directionNav', slider).hide()
                    })
                }
                $('a.nivo-prevNav', slider).live('click', function () {
                    if (running) return false;
                    clearInterval(timer);
                    timer = '';
                    currentSlide -= 2;
                    nivoRun(slider, kids, settings, 'prev')
                });
                $('a.nivo-nextNav', slider).live('click', function () {
                    if (running) return false;
                    clearInterval(timer);
                    timer = '';
                    nivoRun(slider, kids, settings, 'next')
                })
            }
            if (settings.controlNav) {
                var nivoControl = $('<div class="nivo-controlNav"></div>');
                slider.append(nivoControl);
                for (var i = 0; i < kids.length; i++) {
                    nivoControl.append('<a class="nivo-control" rel="' + i + '">' + (i + 1) + '</a>')
                }
                $('.nivo-controlNav a:eq(' + currentSlide + ')', slider).addClass('active');
                $('.nivo-controlNav a', slider).live('click', function () {
                    if (running) return false;
                    if ($(this).hasClass('active')) return false;
                    clearInterval(timer);
                    timer = '';
                    slider.css('background', 'url(' + currentImage.attr('src') + ') no-repeat');
                    currentSlide = $(this).attr('rel') - 1;
                    nivoRun(slider, kids, settings, 'control')
                })
            }
            if (settings.pauseOnHover) {
                slider.hover(function () {
                    paused = true;
                    clearInterval(timer);
                    timer = ''
                }, function () {
                    paused = false;
                    if (timer == '') {
                        timer = setInterval(function () {
                            nivoRun(slider, kids, settings, false)
                        }, settings.pauseTime)
                    }
                })
            }
            slider.bind('nivo:animFinished', function () {
                running = false;
                $(kids).each(function () {
                    if ($(this).is('a')) {
                        $(this).css('display', 'none')
                    }
                });
                if ($(kids[currentSlide]).is('a')) {
                    $(kids[currentSlide]).css('display', 'block')
                }
                if (timer == '' && !paused) {
                    timer = setInterval(function () {
                        nivoRun(slider, kids, settings, false)
                    }, settings.pauseTime)
                }
                settings.afterChange.call(this)
            })
        });

        function nivoRun(slider, kids, settings, nudge) {
            settings.beforeChange.call(this);
            if (!nudge) {
                slider.css('background', 'url(' + currentImage.attr('src') + ') no-repeat')
            } else {
                if (nudge == 'prev') {
                    slider.css('background', 'url(' + currentImage.attr('src') + ') no-repeat')
                }
                if (nudge == 'next') {
                    slider.css('background', 'url(' + currentImage.attr('src') + ') no-repeat')
                }
            }
            currentSlide++;
            if (currentSlide == totalSlides) currentSlide = 0;
            if (currentSlide < 0) currentSlide = (totalSlides - 1);
            if ($(kids[currentSlide]).is('img')) {
                currentImage = $(kids[currentSlide])
            } else {
                currentImage = $(kids[currentSlide]).find('img:first')
            } if (settings.controlNav) {
                $('.nivo-controlNav a', slider).removeClass('active');
                $('.nivo-controlNav a:eq(' + currentSlide + ')', slider).addClass('active')
            }
            if (currentImage.attr('title') != '') {
                if ($('.nivo-caption', slider).css('display') == 'block') {
                    $('.nivo-caption p', slider).fadeOut(settings.animSpeed, function () {
                        $(this).html(currentImage.attr('title'));
                        $(this).fadeIn(settings.animSpeed)
                    })
                } else {
                    $('.nivo-caption p', slider).html(currentImage.attr('title'))
                }
                $('.nivo-caption', slider).fadeIn(settings.animSpeed)
            } else {
                $('.nivo-caption', slider).fadeOut(settings.animSpeed)
            }
            var i = 0;
            $('.nivo-slice', slider).each(function () {
                var sliceWidth = Math.round(slider.width() / settings.slices);
                $(this).css({
                    height: '0px',
                    opacity: '0',
                    background: 'url(' + currentImage.attr('src') + ') no-repeat -' + ((sliceWidth + (i * sliceWidth)) - sliceWidth) + 'px 0%'
                });
                i++
            });
            if (settings.effect == 'random') {
                var anims = new Array("sliceDownRight", "sliceDownLeft", "sliceUpRight", "sliceUpLeft", "sliceUpDown", "sliceUpDownLeft", "fold", "fade");
                randAnim = anims[Math.floor(Math.random() * (anims.length + 1))];
                if (randAnim == undefined) randAnim = 'fade'
            }
            running = true;
            if (settings.effect == 'sliceDown' || settings.effect == 'sliceDownRight' || randAnim == 'sliceDownRight' || settings.effect == 'sliceDownLeft' || randAnim == 'sliceDownLeft') {
                var timeBuff = 0;
                var i = 0;
                var slices = $('.nivo-slice', slider);
                if (settings.effect == 'sliceDownLeft' || randAnim == 'sliceDownLeft') slices = $('.nivo-slice', slider).reverse();
                slices.each(function () {
                    var slice = $(this);
                    slice.css('top', '0px');
                    if (i == settings.slices - 1) {
                        setTimeout(function () {
                            slice.animate({
                                height: '100%',
                                opacity: '1.0'
                            }, settings.animSpeed, '', function () {
                                slider.trigger('nivo:animFinished')
                            })
                        }, (100 + timeBuff))
                    } else {
                        setTimeout(function () {
                            slice.animate({
                                height: '100%',
                                opacity: '1.0'
                            }, settings.animSpeed)
                        }, (100 + timeBuff))
                    }
                    timeBuff += 50;
                    i++
                })
            } else if (settings.effect == 'sliceUp' || settings.effect == 'sliceUpRight' || randAnim == 'sliceUpRight' || settings.effect == 'sliceUpLeft' || randAnim == 'sliceUpLeft') {
                var timeBuff = 0;
                var i = 0;
                var slices = $('.nivo-slice', slider);
                if (settings.effect == 'sliceUpLeft' || randAnim == 'sliceUpLeft') slices = $('.nivo-slice', slider).reverse();
                slices.each(function () {
                    var slice = $(this);
                    slice.css('bottom', '0px');
                    if (i == settings.slices - 1) {
                        setTimeout(function () {
                            slice.animate({
                                height: '100%',
                                opacity: '1.0'
                            }, settings.animSpeed, '', function () {
                                slider.trigger('nivo:animFinished')
                            })
                        }, (100 + timeBuff))
                    } else {
                        setTimeout(function () {
                            slice.animate({
                                height: '100%',
                                opacity: '1.0'
                            }, settings.animSpeed)
                        }, (100 + timeBuff))
                    }
                    timeBuff += 50;
                    i++
                })
            } else if (settings.effect == 'sliceUpDown' || settings.effect == 'sliceUpDownRight' || randAnim == 'sliceUpDown' || settings.effect == 'sliceUpDownLeft' || randAnim == 'sliceUpDownLeft') {
                var timeBuff = 0;
                var i = 0;
                var v = 0;
                var slices = $('.nivo-slice', slider);
                if (settings.effect == 'sliceUpDownLeft' || randAnim == 'sliceUpDownLeft') slices = $('.nivo-slice', slider).reverse();
                slices.each(function () {
                    var slice = $(this);
                    if (i == 0) {
                        slice.css('top', '0px');
                        i++
                    } else {
                        slice.css('bottom', '0px');
                        i = 0
                    } if (v == settings.slices - 1) {
                        setTimeout(function () {
                            slice.animate({
                                height: '100%',
                                opacity: '1.0'
                            }, settings.animSpeed, '', function () {
                                slider.trigger('nivo:animFinished')
                            })
                        }, (100 + timeBuff))
                    } else {
                        setTimeout(function () {
                            slice.animate({
                                height: '100%',
                                opacity: '1.0'
                            }, settings.animSpeed)
                        }, (100 + timeBuff))
                    }
                    timeBuff += 50;
                    v++
                })
            } else if (settings.effect == 'fold' || randAnim == 'fold') {
                var timeBuff = 0;
                var i = 0;
                $('.nivo-slice', slider).each(function () {
                    var slice = $(this);
                    var origWidth = slice.width();
                    slice.css({
                        top: '0px',
                        height: '100%',
                        width: '0px'
                    });
                    if (i == settings.slices - 1) {
                        setTimeout(function () {
                            slice.animate({
                                width: origWidth,
                                opacity: '1.0'
                            }, settings.animSpeed, '', function () {
                                slider.trigger('nivo:animFinished')
                            })
                        }, (100 + timeBuff))
                    } else {
                        setTimeout(function () {
                            slice.animate({
                                width: origWidth,
                                opacity: '1.0'
                            }, settings.animSpeed)
                        }, (100 + timeBuff))
                    }
                    timeBuff += 50;
                    i++
                })
            } else if (settings.effect == 'fade' || randAnim == 'fade') {
                var i = 0;
                $('.nivo-slice', slider).each(function () {
                    $(this).css('height', '100%');
                    if (i == settings.slices - 1) {
                        $(this).animate({
                            opacity: '1.0'
                        }, (settings.animSpeed * 2), '', function () {
                            slider.trigger('nivo:animFinished')
                        })
                    } else {
                        $(this).animate({
                            opacity: '1.0'
                        }, (settings.animSpeed * 2))
                    }
                    i++
                })
            }
        }
    };
    $.fn.reverse = [].reverse
})(jQuery); */