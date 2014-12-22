/*--------------------------------------------
* @ SproutSlide-jQuery-Plugin
* @ version 2.1.0
This is git testing
--------------------------------------------*/

$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

(function($){
$.fn.sproutSlide = function(options) {
// jQuery.fn.extend({
	// sproutSlide: function (options) {
		var settings = $.extend({
			animateStyle: "slide",
			width: "auto",
			slideNum: 4,
			duration:700,
			autovalue:true,
			interval:3000,
			enableDot:true,
			enableArrow:true,
			enablePageNo:false,
			enableLoop:true,
			hoverShowArrow:false,
			clickToNext:false,
			onInit:false,
			beforeAnimate:false,
			afterAnimate:false
		}, options);
		// if (options){$.extend(config, options);}

		return this.each(function(){
			var slider = $(this);
			var mainContent = $(this).find('.sprout-slide');
			var animateLoop;
			var animateStyle = settings.animateStyle;
			var duration = settings.duration;
			var autoplay = settings.autovalue;
			var autoInterval = settings.interval;
			var enableDot = settings.enableDot;
			var enableArrow = settings.enableArrow;
			var enablePageNo = settings.enablePageNo;
			var enableLoop = settings.enableLoop;
			var hoverShowArrow = settings.hoverShowArrow;
			slider.addClass('animate-'+animateStyle);

			var width = settings.width;
			if(width == 'auto'){
				width = slider.parent().width();
			} else {
				width = parseInt(width)
			}
			slider.css('width', width);
			slider.find('.sprout-slide-wrapper').css('width', width);

			if (animateStyle == 'slide'){
				var slideNum = settings.slideNum;
				var itemNum = slider.find('.sprout-slide > li').length;
				var pageNum = Math.ceil(itemNum/slideNum);
				var lastItemNum = itemNum%slideNum;
				var currentDot = 0;
				var copyFront = false;
				var copyEnd = false;
				var sliderFullWidth = width* pageNum;

				// //先補上空白的 li for 除不盡
				if (lastItemNum == 0){
					var missli = 0;
				} else {
					var missli = slideNum - lastItemNum;
					for ( k = 1 ; k <= missli ; k++ ){
						slider.find('.sprout-slide > li:last').after('<li> </li>');
					}
				}

				//Initial Layout
				mainContent.css('width', sliderFullWidth);
				slider.find('.sprout-slide > li').css('width', width/slideNum);
			} else if (animateStyle == 'fade'){
				var currentDot = 0;
				var nextPage;
				var sliderH = 0;
				var pageNum = slider.find('.sprout-slide > li').length;

				slider.hide();
				slider.find('.sprout-slide li').css('display','none');
				slider.find('.sprout-slide li').eq(0).css('display','block');

				slider.delay(0).fadeIn(100,function(){
					sliderH = slider.find('.sprout-slide li').eq(0).height();
					mainContent.height(sliderH);
				});
			}

			//清空 舊的 page li
			//解決：如果有重新叫同一個 sider 時出現的 兩倍 li 問題
			slider.find('.sprout-dots').html('');

			//Create Page li
			if (pageNum > 1){
				// SET page attr in li
				// 可能會有需要重複呼叫 slider 針對同一個 element,
				// 所以需要確認是否需要重新編列 Attr --> page, 先算出之前有幾頁。
				if (animateStyle == 'slide'){
					var oldpage = 0;
					$(slider.find('.sprout-slide > li')).each(function(){
						if($(this).hasAttr('page')){
							oldpage++;
						}
					});

					if( oldpage == pageNum) {
						//如果頁數一樣的話就不重新編列
					} else {
						//第一次建立這個 slider，或是頁數不一樣。
						slider.find('.sprout-slide > li').removeAttr('page');
						for( i=1 ; i <= pageNum ; i++ ){
							slider.find('.sprout-slide > li').eq((i-1)*slideNum).attr('page',(i-1));
						};
					}

					//解決：如果有重新叫同一個 sider 時出現的問題，一開始要把 ul margin-left 位置 歸0; 
					mainContent.css('margin-left','0px');
				}

				//Fade In Slider
				slider.delay(2000).fadeIn(500);
				
				//Create Dots;
				for( i=1 ; i <= pageNum ; i++ ){
					if(enablePageNo){
						slider.find('.sprout-dots').addClass('hasNumber');
						slider.find('.sprout-dots').append('<div>'+i+'</div>');
					} else {
						slider.find('.sprout-dots').append('<div></div>');
					}
				};
				slider.find('.sprout-dots div').eq(0).addClass('active');	//Active First dots

				if(!enableLoop){
					checkArrowDisplay();
				}

				if(hoverShowArrow){
					if(enableDot){
						slider.find('.sprout-dots').show();
					}
					if(enableArrow){
						slider.hover(function(){
							slider.find('.sprout-arrow').fadeIn('fast');
						},function(){
							slider.find('.sprout-arrow').fadeOut('fast');
						});
					}
				} else {
					if(enableDot){
						slider.find('.sprout-dots').show();
					}
					if(enableArrow){
						slider.find('.sprout-arrow').show();
					}
				}

				// true --> false || true --> true 都先清掉最後一個 timer;
				// 解決 如果第一次呼叫是 autoplay 然後再次呼叫成為不 autoplay 的錯誤;
				if(slider.attr('slide-loop-id') != null){
					clearInterval(parseInt(slider.attr('slide-loop-id')));
				}

				// //Autoplay Slider
				if (autoplay) {
					restartInterval();
				};
			}

			//unbind 舊的 function, 解決：如果有重新叫同一個 sider 時出現的 duplicated function
			if(settings.clickToNext){ 
				mainContent.unbind("click").bind("click",nextClick);
				mainContent.addClass('hasCursor');
			}
			slider.find('.sprout-next').unbind("click").bind("click",nextClick);
			slider.find('.sprout-prev').unbind("click").bind("click",prevClick);
			slider.find('.sprout-dots div').unbind("click").bind("click",dotsClick);

			//mobile touch slide
			slider.swipe({
				swipe:function(event, direction, distance, duration, fingerCount) {
					//alert("You swiped " + direction);  
					if (direction == 'left'){
						animateSlide('right');
					} else if (direction == 'right'){
						animateSlide('left');
					}
				},
				excludedElements:[],
				threshold:75  	//Default is 75px, set to 0 for demo so any distance triggers swipe
			});

			if($.isFunction( settings.onInit )){
				settings.onInit.call(this,slider,currentDot,pageNum);
			}

			function checkArrowDisplay(){
				if(currentDot == 0){
					slider.find('.sprout-prev').hide();
				} else{
					slider.find('.sprout-prev').show();
				}
				if(currentDot == pageNum-1){
					slider.find('.sprout-next').hide();
				} else{
					slider.find('.sprout-next').show();
				}
			}

			function nextClick(){
				//console.debug('right');
				animateSlide('right');
			}
			function prevClick(){
				//console.debug('left');
				animateSlide('left');
			}
			function dotsClick(){
				//console.debug('dots');
				if ( $(this).index() == currentDot){
					//console.debug('no move');
				} else {
					animateSlide($(this).index());
				}
			}

			function restartInterval(){
				//console.debug('last-loop'+animateLoop);
				//clearInterval(animateLoop);
				animateLoop = setInterval(function(){animateSlide('right');},autoInterval);
				slider.attr('slide-loop-id',animateLoop);
				//console.debug('new-loop'+animateLoop);
			}

			function animateSlide(where){
				//console.debug('last-loop'+animateLoop);
				clearInterval(animateLoop);
				slider.find('.sprout-next').unbind("click",nextClick);
				slider.find('.sprout-prev').unbind("click",prevClick);
				slider.find('.sprout-dots div').unbind("click",dotsClick);

				if (animateStyle == 'slide'){
					//add animateTimer function to end of animation queue
					if (autoplay) {
						restartInterval();
					};

					//移除所有 active;
					slider.find('.sprout-dots div').removeClass('active');

					/* using a if statement and the where variable check 
					we will check where the user wants to slide (left or right)*/  
					if(where == 'left'){  
						//...calculating the new left indent of the unordered list (ul) for left sliding  
						var left_indent = parseInt(mainContent.css('margin-left')) + width;
						currentDot = currentDot-1;
						if (currentDot < 0){
							currentDot = currentDot+pageNum;
						}
					} else if (where == 'right'){  
						//...calculating the new left indent of the unordered list (ul) for right sliding  
						var left_indent = parseInt(mainContent.css('margin-left')) - width;
						currentDot = currentDot+1;
						if (currentDot >= pageNum){
							currentDot = 0;
						}
					} else {
						//console.log('currentDot'+currentDot);
						//console.log('where'+where);
						var old_indent = parseInt(slider.find('.sprout-slide li[page="'+currentDot+'"]').offset().left);
						var new_indent = parseInt(slider.find('.sprout-slide li[page="'+where+'"]').offset().left);
						var left_indent = parseInt(mainContent.css('margin-left')) - (new_indent - old_indent);
						
						//console.log('old_indent'+old_indent);
						currentDot = where;
					}

					if(left_indent > 0){
						//alert('左邊沒了');
						copyFront = true;
						for (j = 0 ; j < slideNum*(pageNum-1) ; j++ ){
							slider.find('.sprout-slide > li:first').before(slider.find('.sprout-slide > li:last'));
						}
						mainContent.css('margin-left',(pageNum-1)*(-1)*width);
						var left_indent = parseInt(mainContent.css('margin-left')) + width;
					} else if(left_indent <= sliderFullWidth*(-1)){
						//alert('右邊沒了');
						copyEnd = true;
						for (j = 0 ; j < slideNum*(pageNum-1) ; j++ ){
							slider.find('.sprout-slide > li:last').after(slider.find('.sprout-slide > li:first'));
						}
						mainContent.css('margin-left','0px');
						var left_indent = parseInt(mainContent.css('margin-left')) - width;
					}

					checkArrowDisplay();

					if($.isFunction( settings.beforeAnimate )){
						settings.beforeAnimate.call(this,slider,currentDot,pageNum);
					}
		
					//make the sliding effect using jQuery's animate function... '  
					slider.find('.sprout-slide:not(:animated)').animate({'margin-left' : left_indent},duration,function(){  

						//...and then just get back the default left indent  
						slider.find('.sprout-dots div:eq('+currentDot+')').addClass('active');

						if(copyFront){
							//恢復原狀
							//alert('恢復原狀copyFront');
							for (j = 0 ; j < slideNum ; j++ ){
								slider.find('.sprout-slide > li:first').before(slider.find('.sprout-slide > li:last'));
							}
							mainContent.css('margin-left',(pageNum-1)*(-1)*width);
							copyFront = false;
						} else if(copyEnd){
							//恢復原狀
							//alert('恢復原狀copyEnd');
							for (j = 0 ; j < slideNum ; j++ ){
								slider.find('.sprout-slide > li:last').after(slider.find('.sprout-slide > li:first'));
							}
							mainContent.css('margin-left','0px');
							copyEnd = false;
						}

						if($.isFunction( settings.afterAnimate )){
							settings.afterAnimate.call(this,slider,currentDot,pageNum);
						}

						slider.find('.sprout-next').bind("click",nextClick);
						slider.find('.sprout-prev').bind("click",prevClick);
						slider.find('.sprout-dots div').bind("click",dotsClick);
					});
				} else if (animateStyle == 'fade'){
					//Get Next Page;
					if(where == 'left'){  
						nextPage = currentDot-1;
					} else if (where == 'right'){  
						nextPage = currentDot+1;
					} else {  
						nextPage = where;
					}

					if(nextPage < 0){
						nextPage = pageNum-1;
					} else if(nextPage >= pageNum){
						nextPage = 0;
					}

					if($.isFunction( settings.beforeAnimate )){
						settings.beforeAnimate.call(this,slider,currentDot,pageNum);
					}

					//取得現在 active 的點, 並且移除所有 active;
					slider.find('.sprout-dots div').removeClass('active');
					slider.find('.sprout-dots div:eq('+nextPage+')').addClass('active');
					
					sliderH = slider.find('.sprout-slide li').eq(nextPage).height();
					mainContent.animate({'height':sliderH},500);

					slider.find('.sprout-slide li').eq(currentDot).fadeOut(300).end().eq(nextPage).hide().fadeIn(duration, function(){
						currentDot = nextPage;
						checkArrowDisplay();

						slider.find('.sprout-next').bind("click",nextClick);
						slider.find('.sprout-prev').bind("click",prevClick);
						slider.find('.sprout-dots div').bind("click",dotsClick);

						if($.isFunction( settings.afterAnimate )){
							settings.afterAnimate.call(this,slider,currentDot,pageNum);
						}

						//add animateTimer function to end of animation queue
						if (autoplay) {
							restartInterval();
						};
					});
				}
			}  
		});
	}
}(jQuery));
// });