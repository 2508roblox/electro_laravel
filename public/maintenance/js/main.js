/*--------------------------------------------------------------------
	Theme Name: Danio
	Theme URI: //template.danio.itembridge.com/
	Author: InfoStyle
	Author URI: https://themeforest.net/user/itembridgethemes
	Description: Danio responsive theme
	Version: 1.0.2
	License: ThemeForest Regular & Extended License
	License URI: http://themeforest.net/licenses/regular_extended
-----------------------------------------------------------------------*/
var $ = jQuery;

(function($) {

	jQuery(document).on('ready', function(){

		"use strict";

		/*------------------------------------------------------*/
		/*------ Calculating The Browser Scrollbar Width -------*/
		/*------------------------------------------------------*/

		var parent, child, scrollWidth;

		if (scrollWidth === undefined) {
			parent = $('<div style="width: 50px; height: 50px; overflow: auto"><div/></div>').appendTo('body');
			child = parent.children();
			scrollWidth = child.innerWidth() - child.height(99).innerWidth();
			parent.remove();
		}

		/*------------------------------------*/
		/*------ For phones and tablets ------*/
		/*------------------------------------*/

		if (navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/)) {

			$('body').addClass('touch');

			// Add div for vertical align middle
			
			setTimeout(function(){
				$('.section-wrap').each(function(){
					$(this).after('<div class="scrollSpy"></div>');
				});
				if ($('body').width() - scrollWidth <= 767) {
					$('.scrollSpy').css('margin-top',$('.site-footer').outerHeight()-1 )
				} else {
					$('.scrollSpy').css('margin-top', -1 )
				}

				$('.scrollSpy').on('inview', function(event, visible) {
					if (visible) {
						setTimeout(function(){
							$('.copyright').addClass('vis');
						},1)
					} else {
						$('.copyright').removeClass('vis');
					}
				});
			},0);
			

			// Swipe Slider 
			$('.sections:nth-child(1)').addClass('active');

			$.fn.swiper();

			// Portfolio block click

			$('.portfolio-info').on('click', function(){
				if ($(this).hasClass('hover')) {
					$(this).removeClass('hover');
				} else {
					$('.portfolio-info').removeClass('hover');
					$(this).addClass('hover');
				}
			});

		/*-----------------------------------*/
		/*----------- For desctop -----------*/
		/*-----------------------------------*/

		} else {

			$('body').addClass('no-touch');

			var main     = $('#fullpage'),
				menuTitles = [];

			$('.sections').each(function(){
				var thisTitle = '';
				if ($(this).data('title')){
					thisTitle = $(this).data('title');
				}
				menuTitles.push(thisTitle);
			});

			if ( main.length ) {
				main.fullpage({
					css3				: true,
					scrollOverflow		: false,
					scrollingSpeed		: 1000,
					navigation			: true,
					slidesNavigation	: true,
					resize				: false,
					navigationTooltips	: menuTitles,
					sectionSelector		: '.sections',
					afterResize: function() {
						$('.section-content').mCustomScrollbar('destroy');
						setTimeout(function(){
							$('#fp-nav').find('a.active').parent().addClass('active');
						},0);

						contentHeight();

					},
					afterRender: function() {
						setTimeout(function(){
							contentHeight();
							$('#fp-nav').find('a.active').parent().addClass('active');
							$('#fp-nav').css('margin-top', '-' + ($('#fp-nav').height()/2) + 'px');
						},0);
						setTimeout(function(){
							$('#fp-nav').css('margin-top', '-' + ($('#fp-nav').height()/2) + 'px');
						},200);
						// Init function for scroll down on click button
						toDownButton();
						
					},
					onLeave: function() {
						setTimeout(function(){
							$('#fp-nav').find('a.active').parent().addClass('active');
						},0);
					}
				});
				
				contentHeight();
			}
		}

		/*-----------------------------------------------------*/
		/*----------------------- Timer -----------------------*/
		/*-----------------------------------------------------*/

		$('.fadein').fadeIn(500);

		if ( $(".glitch-time").length ) {
			$(".glitch-time").countdown({
				date: "13 march 2015 9:00:00"
			});
		}

		/*-----------------------------------------------------*/
		/*----------- Mobile Rotation Load Function -----------*/
		/*-----------------------------------------------------*/

		function contentHeight(){

			var sectionHeight = $('#wrapper').outerHeight() - $('.site-header').outerHeight() - $('.site-footer').outerHeight();
			$('.sections').find('.section-content').removeAttr('style');
			if ( $('body').width() - scrollWidth <= 767 ) {
				$('.section-content').css('top', $('.site-header').outerHeight() );
			}
			$('.sections').each(function(){
				if (sectionHeight < ($(this).find('.section-content').height())) {
					$(this).find('.section-content')
						.css({'height': sectionHeight })
						.mCustomScrollbar({
							axis			:"y",
							scrollInertia	: 150
						});
				}
			});
		}

		// function for scroll down on click button

		function toDownButton() {
			var sectLen = $(".sections").length - 1;
			$('#todown .gos').on('click', function(e){
				e.preventDefault();
				if ( $('body').hasClass('fp-viewing-'+sectLen) ) {
					$.fn.fullpage.moveTo(1);
				} else {
					$.fn.fullpage.moveSectionDown();
				}
			});
		}

		// Portfolio Carousel

		if ( $(".portfolio").length ) {
			$(".portfolio").owlCarousel({
				items : 3,
				itemsDesktop : [1200,3],
				itemsDesktopSmall: [1100,2],
				itemsTablet: [650,1]
			});
		}

		if ( $(".business-about-carousell").length ) {
			$(".business-about-carousell").owlCarousel({
				items : 3,
				itemsDesktop : [1200,3],
				itemsDesktopSmall: [991,3],
				itemsTablet: [767,2],
				itemsMobile: [500,1]
			});
		}

		if ( $(".business-team-carousell").length ) {
			$(".business-team-carousell").owlCarousel({
				items : 3,
				itemsDesktop : [1200,3],
				itemsDesktopSmall: [1100,2],
				itemsTablet: [767,2],
				itemsMobile: [500,1]
			});
		}

		$('.next-slide').on('click', function(){
			if($('body').hasClass('no-touch')){
				$.fn.fullpage.moveSectionDown();
			} else {
				$.fn.swiper.nextItem();
				$.fn.swiper.activeNav();
			}
		});

		/*---------------------------------------------------------*/
		/*------------- Internet Explorer Placeholder -------------*/
		/*---------------------------------------------------------*/

		$(function() {
			if(document.all && !window.atob){
				$('input, textarea').placeholder();
			}
		});

		/*------------------------------------*/
		/*------------ Form block ------------*/
		/*------------------------------------*/

		function contactForm() {

			$('.submit-form').on('click', function(e){
				e.preventDefault();

				if ($('body').hasClass('form-load') ) {
					return false;
				}

				$('#contactform').validator('validate');
				
				var $this = $(this),
						bodyElem = $('body');
					
				$.ajax({
					url  : 'php/contact.php',
					type : 'POST',
					data : $this.closest('#contactform').serialize(),
					beforeSend: function() {
						bodyElem.addClass('form-load');
					},
					success : function(data){
						bodyElem.removeClass('form-load');

						if ($(data).is('.send-true')){
							$this.addClass('loading').delay(650).queue(function(){
								$this.addClass('success').addClass('loaded').dequeue();
							});
						} else {
							$this.addClass('error');
						}
						
						$this.delay(500).queue(function(){
							$this.removeClass('loaded').removeClass('loading').dequeue();
						});
						
						$this.delay(400).queue(function(){
							if ($(data).is('.send-true')){
								$this.removeClass('success').closest('#contactform').trigger('reset');
							} else {
								$this.removeClass('error');
							}
							$this.dequeue();
						});
					}
				});
			});

			//Under Construction (write to file)

			$('.join-us').on('click', function(e){
				e.preventDefault();

				var $this = $(this);

				if ($('body').hasClass('form-load') ) {
					return false;
				}

				$('.under-construction').validator('validate');
			
				$.ajax({
					url  : 'php/u-c.php',
					type : 'POST',
					data : $this.closest('.under-construction').serialize(),
					beforeSend: function() {
						$('body').addClass('form-load');
					},
					success : function(data){
						$('body').removeClass('form-load');
						
						if ($(data).is('.send-true')){
							$this.addClass('loading').delay(650).queue(function(){
								$this.addClass('success').addClass('loaded').dequeue();
							});
						} else {
							$this.addClass('error');
						}
						
						$this.delay(500).queue(function(){
							$this.removeClass('loaded').removeClass('loading').dequeue();
						});
						
						$this.delay(400).queue(function(){
							if ($(data).is('.send-true')){
								$this.removeClass('success').closest('.under-construction').trigger('reset');
							} else {
								$this.removeClass('error');
							}
							$this.dequeue();
						});
					}
				});
				
				return false;
			});
			
			if($(".mailchimp").length>0) {
				$('.mailchimp').ajaxChimp({
					url: 'http://us10.list-manage.com/subscribe/post?u=69007f000c70b89e124b9308d&amp;id=1225ba8aee'
				});
			}
		}

		/*------------------------------------*/
		/*-------- Mobile Hide Social  -------*/
		/*------------------------------------*/

		function hideSocial() {
			var totalWidth = 0,
					socWr = $('.social-icons'),
					socIconsWrapper = $('.social-icons-wrap'),
					logo = $('.logotype');

			$('.social-icons a').each(function(){
				totalWidth = totalWidth + $(this).outerWidth();
			});

			if ( ( socWr.outerWidth() - 20 ) < totalWidth ) {
				socWr.parent().addClass('hide-social');
			} else {
				socWr.parent().removeClass('hide-social');
			}

			$('.opened').on('click', function(){
				socIconsWrapper.addClass('open');
				logo.addClass('hidde');
			});

			$('.closes').on('click', function(){
				socIconsWrapper.removeClass('open');
				logo.removeClass('hidde');
			});
		}


		function mapPopup() {
			var contactWrapper = $('.contact-me');

			$('.contact-street').on('click', function(){
				contactWrapper.addClass('open');
			});
			$('.closed').on('click', function(){
				contactWrapper.removeClass('open');
			});
			if ( $('body').width() <= 767 ) {
				$('.map-canvas').height( $('.contact-form').outerHeight() ) 
			}
		}

		/*------------------------------------*/
		/*----------- Circle Skill -----------*/
		/*------------------------------------*/

		
		var vis = true;

		$('.circle-skill').on('inview', function(event, visible) {
			if (vis == true) {
				if($('.circle-skill').length !== 0) {
					$('.circle-skill').circleSkills();
				}
				vis = false;
			}
		});

		/*---------------------------------------*/
		/*-- Function definition retina device --*/
		/*---------------------------------------*/

		function retina(){

			if( 'devicePixelRatio' in window && window.devicePixelRatio == 2 ){

				var imgToReplace = $('img.replace-2x').get();	
			    for (var i=0,l=imgToReplace.length; i<l; i++) {
		    		var src = imgToReplace[i].src;
			      	src = src.replace(/\.(png|jpg|gif)+$/i, '@2x.$1');
			      	imgToReplace[i].src = src;
			      	$(imgToReplace[i]).load(function(){
						$(this).addClass('loaded');
					});	      	
			    };	    

			    var imgToReplaceM = $('a.replace-2x').get();
			    for (var i=0,l=imgToReplaceM.length; i<l; i++) {
			      	var src = imgToReplaceM[i].href;
			      	src = src.replace(/\.(png|jpg|gif)+$/i, '@2x.$1');
			      	imgToReplaceM[i].href = src;
			      	$(imgToReplaceM[i]).addClass('loaded');
			    };
			 	
			 	$('img').each(function(){
					var item = $(this);
			 		var retinaSrc = $(this).attr('data-retina-src');

			 		if(retinaSrc !== undefined) {
						item.attr('src', retinaSrc );
					}
			 	});

			}
		}

		/*-------------------------------------*/
		/*-------------- Init Fn --------------*/
		/*-------------------------------------*/

		retina();

		contactForm();

		hideSocial();

		mapPopup();

		$(window).on('resize', function(){
			hideSocial();
			mapPopup();
		});
	});

	$(window).on('load', function(){
		$('body').addClass('loader');

		if (!(navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/))) {
			$('#fp-nav').css('margin-top', '-' + ($('#fp-nav').height()/2) + 'px');
		}
		if ( $('.selectpicker').length ) {
			$('.selectpicker').selectpicker();
		}
	});
})(jQuery);













