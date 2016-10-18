var rImagesLoaded = true;

function slideshowFull(firstload, $id){

	var spinner = function(id, color) {
		var opts = {
			lines: 9, // The number of lines to draw
			length: 7, // The length of each line
			width: 2, // The line thickness
			radius: 10, // The radius of the inner circle
			corners: 1, // Corner roundness (0..1)
			rotate: 29, // The rotation offset
			direction: 1, // 1: clockwise, -1: counterclockwise
			color: color, // #rgb or #rrggbb or array of colors
			speed: 1, // Rounds per second
			trail: 60, // Afterglow percentage
			shadow: false, // Whether to render a shadow
			hwaccel: true, // Whether to use hardware acceleration
			className: 'spinner', // The CSS class to assign to the spinner
			zIndex: 2e9, // The z-index (defaults to 2000000000)
			top: 'auto', // Top position relative to parent in px
			left: 'auto' // Left position relative to parent in px
		};
		
		var target = document.getElementById(id);
		var spinner = new Spinner(opts).spin(target);
	}

	var imgSet = new Array();
	var viewport = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	var workin = false;
	var images;
	////////GET ALL IMAGES////////
	
	var images = document.getElementsByTagName('body')[0].getElementsByTagName('img');	
	
	if( images.length === 0 ){
		return;
	}

	////////HASATTR FUNCTION////////

	var hasAttr;
	if(!images[0].hasAttribute){ //IE <=7 fix

		hasAttr = function(el, attrName){ //IE does not support Object.Prototype
			return el.getAttribute(attrName) !== null;
		};

	} else {

		hasAttr = function(el, attrName){
			return el.hasAttribute(attrName);
		};

	}

	////////CHECK IF DISPLAY IS RETINA////////

	var retina = window.devicePixelRatio ? window.devicePixelRatio >= 1.2 ? 1 : 0 : 0;

	////////LOOP ALL IMAGES////////
	
	imgSet = new Array();
	
	for (var i = 0; i < images.length; i++) {

			var image = images[i];


			//set attr names

			var srcAttr = ( retina && hasAttr(image, 'data-src2x') ) ? 'data-src2x' : 'data-src';
			var baseAttr = ( retina && hasAttr(image, 'data-src-base2x') ) ? 'data-src-base2x' : 'data-src-base';

			//check image attributes

			if( !hasAttr(image, srcAttr) ){
				continue;
			}

			var basePath = hasAttr(image, baseAttr) ? image.getAttribute(baseAttr) : '';


			//get attributes

			var queries = image.getAttribute(srcAttr);



			//split defined query list

				var queries_array = queries.split(',');

			//loop queries

			for(var j = 0; j < queries_array.length; j++){

				//split each individual query
				var query = queries_array[j].split(':');

				//get condition and response
				var condition = query[0];
				var response = query[1];


				//set empty variables
				var conditionpx;
				var bool;


				//check if condition is below
				if(condition.indexOf('<') !== -1){

					conditionpx = condition.split('<');

					if(queries_array[(j -1)]){

						var prev_query = queries_array[(j - 1)].split(/:(.+)/);
						var prev_cond = prev_query[0].split('<');

						bool =  (viewport <= conditionpx[1] && viewport > prev_cond[1]);

					} else {

						bool =  (viewport <= conditionpx[1]);

					}

				} else {

					conditionpx = condition.split('>');

					if(queries_array[(j +1)]){

						var next_query = queries_array[(j +1)].split(/:(.+)/);
						var next_cond = next_query[0].split('>');
						
						bool = (viewport >= conditionpx[1] && viewport < next_cond[1]);

					} else {

						bool = (viewport >= conditionpx[1]);

					}

				}


				//check if document.width meets condition
				if(bool){

					//console.log('vieport:'+viewport + 'src:' + basePath + response);
					var new_source = basePath + response;

					if(image.src !== new_source){
						imgSet[i] = new_source;
					}

					//break loop
					break;
				}
			}
	}

	if(imgSet.length <= 0) {
		return;
	}
	
	var $slidewrap = $('.slide-show-full'),
		overlayOn = function() {
			if($('.slide-overlay').length == 0) {
				return false;
			} else {
				return true;
			}
		}

	if(firstload == true) {
		$i = 0;
		firstload = false;

		$('<div id="img-spinner" class="switch-spinner"></div>').insertAfter('#header');
					
		spinner('img-spinner', '#343f52');
	
		$('#img-spinner').addClass('spin');
		
		$.imgpreload(imgSet[0], function(){
							
			$slidewrap.addClass('show-caption');

			$('#img-spinner').css({opacity: 0});
			
			var $me = $('.background-parent:eq(' + $i + ')'),
				newSrc = imgSet[$i];
								
			if($me.find('img').attr('src') !== newSrc) {
				$me.css({
					'background-image' : 'url(' + newSrc + ')'
				});
				
				$me.find('img').attr('src', newSrc);					
			}

			$('#slides').superslides({
				animation: 'fade',
				play: 5000
			});
			
			if(overlayOn() == true) {
				$('#slides').superslides('stop');
			} else {
				overlayDelay = 0;
			}
			
			setTimeout(function(){
				$slidewrap.addClass('loaded');
				
				setTimeout(function(){
					$slidewrap.find('.slide-overlay').fadeOut();
				}, overlayDelay);
		
				setTimeout(function(){
					$('.slide-show-full').removeClass('show-caption');
					
					if(overlayOn() == true) {					
						setTimeout(function(){
							$('#slides').superslides('start');
						}, overlayDelay);
					}
				}, (overlayDelay + 250));
				
				setTimeout(function(){
					$slidewrap.addClass('tr-none');	
					$('#img-spinner').remove();
				}, 1000);	
			
			}, 100);														
		});
	}
	
	$.imgpreload(imgSet, {
		all: function(){

			$i = 0;

			$('.background-parent').each(function(){
			
				if(typeof imgSet[$i] == 'undefined') {
					return false;
				}
				
				var $me = $(this),
					newSrc = imgSet[$i];

				//change img src to basePath + response
				
				if($me.find('img').attr('src') !== newSrc) {
					$me.css({
						'background-image' : 'url(' + newSrc + ')'
					});
					
					$me.find('img').attr('src', newSrc);					
				}

				$i++;					
			});
		}
	});	
}

$(window).smartresize(slideshowFull);

$(document).ready(function(){
	var $slidewrap=$('.slide-show-full');
	var winHeight=$(window).height();
	
	$slidewrap.height(winHeight);
	$slidewrap.find('img').each(function(){
		var $me=$(this);
		$me.height(winHeight);
	});
	
	slideshowFull(true);
});