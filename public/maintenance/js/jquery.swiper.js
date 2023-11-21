(function( $ ) {
	$.fn.swiper = function() {

		var item 			= $(".sections"),
			itemWrapper 	= $('.all-section'),
			itemLength 		= item.length,
			activeItem 		= 0,
			speed 			= 500;

		// Add height for scroll block

		function sectionsHeight() {

			item.css('height',$('#wrapper').outerHeight());

			item.each(function(){

				sectionHeight = $('#wrapper').outerHeight() - $('.site-header').outerHeight() - $('.site-footer').outerHeight();

				$(this).find('.section-content').removeAttr('style', 'height');

				if (sectionHeight < ($(this).find('.section-content').height())) {
					$(this).find('.section-content')
						.css({'height': sectionHeight, 'margin-top': $('.site-header').outerHeight() })
				}

			});
		}

		sectionsHeight();

		itemWrapper.css('width', 100 * itemLength + '%');
		item.css('width', 100 / itemLength + '%');
				
		itemWrapper.swipe({
			triggerOnTouchEnd: true,
			swipeStatus: swipeStatus,
			allowPageScroll: "vertical",
			threshold: 75
		});		

		function swipeStatus(event, phase, direction, distance) {
			if (phase == "move" && (direction == "left" || direction == "right")) {
				var duration = 0;

				if (direction == "left") {
					scrollItem(($('body').width() * activeItem) + distance, duration);
				} else if (direction == "right") {
					scrollItem(($('body').width() * activeItem) - distance, duration);
				}

			} else if (phase == "cancel") {
				scrollItem($('body').width() * activeItem, speed);
			} else if (phase == "end") {

				if (direction == "right") {
					$.fn.swiper.previousItem();
					$.fn.swiper.activeNav();
				} else if (direction == "left") {
					$.fn.swiper.nextItem();
					$.fn.swiper.activeNav();
				}

			}
		}

		$.fn.swiper.activeItm = function (numb) {
			item.removeClass('active');
			$('.sections:nth-child('+(numb+1)+')').addClass('active');
		}
		$.fn.swiper.previousItem = function () {
			activeItem = Math.max(activeItem - 1, 0);
			scrollItem($('body').width() * activeItem, speed);
			$.fn.swiper.activeItm(activeItem);
		}

		$.fn.swiper.nextItem = function (){
			activeItem = Math.min(activeItem + 1, itemLength - 1);
			scrollItem($('body').width() * activeItem, speed);
			$.fn.swiper.activeItm(activeItem);
		}

		function scrollItem(distance, duration) {
			itemWrapper.css("transition-duration", (duration / 1000).toFixed(1) + "s");
			var value = (distance < 0 ? "" : "-") + Math.abs(distance).toString();
			itemWrapper.css("transform", "translate(" + value + "px,0)");
		}		

		$(window).resize(function(){

			var rec = 0;

			item.each(function(){
				rec = rec + 1;
				if($(this).hasClass('active')) {
					return false;
				}			
			});

			var resValue = (100 / itemLength) * (rec - 1);

			itemWrapper.css("transform", "translate(-" + resValue + "%,0)");

			sectionsHeight();

		});

		if( $('#swiperNav').length == 0 ) {

			// Wrapper for Nav
			$('body').append('<div id="swiperNav"><ul></ul></div>');

			// Add Length Nav item
			for (var i = 1; i < itemLength +1; i++) {
				$('#swiperNav ul').append('<li><a href="#"><span></span></a></li>');
			}
			// Active Item
			$('#swiperNav ul li:nth-child('+(activeItem + 1)+')').addClass('active');

			$('#swiperNav ul li').on('click', function(){

				var curentNum = $(this).prevAll().length;

				activeItem = curentNum;

				// Active Item
				$.fn.swiper.activeNav();
				$.fn.swiper.activeItm(activeItem);

				itemWrapper.css("transform", "translate(-" + $('body').width() * curentNum + "px,0)");

			});
		}		

		// Active Nav
		$.fn.swiper.activeNav = function(){
			$('#swiperNav>ul>li').removeClass('active');
			$('#swiperNav>ul>li:nth-child('+(activeItem + 1)+')').addClass('active');
		}

		// Add CSS transition
		setTimeout(function(){
			itemWrapper.css("transition-duration", ".5s");
		},500)

	}
})(jQuery);