(function(a){'use strict';a.HSCore.components.HSShowAnimation={_baseConfig:{afterShow:function(){}},pageCollection:a(),init:function(b,c){if(this.collection=b&&a(b).length?a(b):a(),!!a(b).length)return this.config=c&&a.isPlainObject(c)?a.extend({},this._baseConfig,c):this._baseConfig,this.config.itemSelector=b,this.initShowEffect(),this.pageCollection},initShowEffect:function(){var b=this,c=b.config,d=b.pageCollection;this.collection.each(function(e,f){var g=a(f),h=g.data("link-group"),i=a(g.data("target")),j=i.data("target-group"),k=g.data("animation-in");g.on("click",function(d){d.preventDefault();a(this).hasClass("active")||(a("[data-link-group=\""+h+"\"]").removeClass("active"),g.addClass("active"),k?b.addAnimation(i,j,k,c):b.hideShow(i,j,c))}),d=d.add(g)})},hideShow:function(b,c,d){a("[data-target-group=\""+c+"\"]").hide().css("opacity",0),b.show().css("opacity",1),d.afterShow()},addAnimation:function(b,c,d,e){a("[data-target-group=\""+c+"\"]").hide().css("opacity",0).removeClass("animated "+d),b.show(),e.afterShow(),setTimeout(function(){b.css("opacity",1).addClass("animated "+d)},50)}}})(jQuery);