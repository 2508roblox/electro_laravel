(function(a){'use strict';a.HSCore.components.HSFancyBox={_baseConfig:{parentEl:"html",baseClass:"u-fancybox-theme",slideClass:"u-fancybox-slide",speed:1e3,slideSpeedCoefficient:1,infobar:!1,fullScreen:!0,thumbs:!0,closeBtn:!0,baseTpl:"<div class=\"fancybox-container\" role=\"dialog\" tabindex=\"-1\"><div class=\"fancybox-content\"><div class=\"fancybox-bg\"></div><div class=\"fancybox-controls\" style=\"position: relative; z-index: 99999;\"><div class=\"fancybox-infobar\"><div class=\"fancybox-infobar__body\"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div></div><div class=\"fancybox-toolbar\">{{BUTTONS}}</div></div><div class=\"fancybox-slider-wrap\"><button data-fancybox-prev class=\"fancybox-arrow fancybox-arrow--left\" title=\"Previous\"></button><button data-fancybox-next class=\"fancybox-arrow fancybox-arrow--right\" title=\"Next\"></button><div class=\"fancybox-stage\"></div></div><div class=\"fancybox-caption-wrap\"><div class=\"fancybox-caption\"></div></div></div></div>",animationEffect:"fade"},pageCollection:a(),init:function(b,c){if(b){var d=a(b);d.length&&(c=c&&a.isPlainObject(c)?a.extend(!0,{},this._baseConfig,c):this._baseConfig,this.initFancyBox(b,c))}},initFancyBox:function(b,c){var d=a(b);d.on("click",function(){var b=a(this),c=b.data("speed"),d=b.data("fancybox"),e=!!b.data("is-infinite"),f=!!b.data("is-slideshow-auto-start"),g=b.data("slideshow-speed");a.fancybox.defaults.animationDuration=c,!0==e&&(a.fancybox.defaults.loop=!0),a.fancybox.defaults.slideShow.autoStart=!(!0!=f),d&&(a.fancybox.defaults.transitionEffect="slide",a.fancybox.defaults.slideShow.speed=g)}),d.fancybox(a.extend(!0,{},c,{beforeShow:function(b){var c=a(b.$refs.container),d=a(b.$refs.bg[0]),e=a(b.current.$slide),f=b.current.opts.$orig[0].dataset.animateIn,g=b.current.opts.$orig[0].dataset.animateOut,h=b.current.opts.$orig[0].dataset.speed,i=b.current.opts.$orig[0].dataset.overlayBg,j=b.current.opts.$orig[0].dataset.overlayBlurBg;if(f&&a("body").hasClass("u-first-slide-init")){var k=a(b.slides[b.prevPos].$slide);e.addClass("has-animation"),k.addClass("animated "+g),setTimeout(function(){e.addClass("animated "+f)},h/2)}else if(f){var k=a(b.slides[b.prevPos].$slide);e.addClass("has-animation"),e.addClass("animated "+f),a("body").addClass("u-first-slide-init"),e.on("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd",function(){e.removeClass(f)})}h?d.css("transition-duration",h+"ms"):d.css("transition-duration","1000ms"),i&&d.css("background-color",i),j&&a("body").addClass("u-blur-30")},beforeClose:function(b){var c=a(b.$refs.container),d=a(b.current.$slide),e=b.current.opts.$orig[0].dataset.animateIn,f=b.current.opts.$orig[0].dataset.animateOut,g=b.current.opts.$orig[0].dataset.overlayBlurBg;f&&(d.removeClass(e).addClass(f),a("body").removeClass("u-first-slide-init")),g&&a("body").removeClass("u-blur-30")}}))}}})(jQuery);