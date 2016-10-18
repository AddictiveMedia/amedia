
(function($,sr){

  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;

      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null;
          };

          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);

          timeout = setTimeout(delayed, threshold || 100);
      };
  }
	// smartresize
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');

(function($){
	$(document).ready(function() {
		$('#main-nav > ul > .menu-item-has-children').each(function(){
			var $me = $(this),
				$link = $me.find('> a').attr('href');


			$me.find('.sub-menu').prepend('<li class="overview-link"><a href="' + $link + '" class="">Overview</a></li>');
		});

		$.Velocity.defaults.easing = 'ease';

		$.Velocity
			.RegisterEffect("transition.fadeScaleIn", {
		        defaultDuration: 700,
		        calls: [
		            [ { opacity: 1, scale: 1 } ]
		        ],
		    })
			.RegisterEffect("transition.fadeScaleOut", {
		        defaultDuration: 700,
		        calls: [
		            [ { scale: .85, opacity: 0 } ]
		        ]
		    });

		headerMenuFunctions();
		customerClick();
	});

	function isVelocityAnim() {
		if($('.velocity-animating').length >= 1) {
			return true;
		} else {
			return false;
		}
	}

	function realWidth(obj){
	    var clone = obj.clone();

	    clone.css({
	    	visibility : "hidden",
			position: "absolute",
			bottom: 0,
			'z-index' : -1
	    });

	    $('body').append(clone);
	    var width = clone.outerWidth();
		clone.remove();
	    return width;
	}


	function headerMenuFunctions(){
		/* Prevent link function on parent items */
		var $header = $("#header"),
			$navtoggle = $('.nav-toggle'),
			$submenu = $('.sub-menu'),
			$submenuwrap = $('.sub-menu-wrap'),
			$mainnav = $('#main-nav'),
			$ancestor = $mainnav.find('.current-menu-ancestor .sub-menu-wrap, .current-menu-item .sub-menu-wrap'),
			$ancestorPar = $ancestor.parent(),
			$ancestorLength = $ancestor.length,
			$submenuwrapNotAn = $('.sub-menu-wrap').not($ancestor),
			$menuItems = $('#main-nav .menu-item'),
			$menuParents = $menuItems.filter('.menu-item-has-children'),
			menuDuration = 275,
			subDuration = 300;

		$menuParents.find('> a').on('click touchend', function(e){
			var $me = $(this),
				$myParent = $me.parent(),
				$mySubmenu;

			if($navtoggle.is(':visible')) {
				$mySubmenu = $myParent.find($submenuwrap);

				e.preventDefault();

				if(isVelocityAnim()) {
					return false;
				}

				$menuParents.filter('.open').not($myParent)
					.removeClass('open')
					.find($submenuwrap)
						.velocity('slideUp', {duration: subDuration});

				if($myParent.hasClass('open')) {
					$mySubmenu.velocity('slideUp', {duration: subDuration});
				} else {
					$mySubmenu.velocity('slideDown', {duration: subDuration});
				}

				$myParent.toggleClass('open');
			}
		});

		/* Open sub menus on parent hover */
		$menuParents.data('parent', true);

/*
		$('#main-nav .menu-item').hoverIntent({
			over: function(){
				return false;
				var $me = $(this),
					$mySub = $me.find($submenuwrap);

				if($navtoggle.is(':visible')) {
					return false;
				}

				if($me.data('parent') === true) {
					$me.addClass('hover');

					if( !$ancestor.is($mySub) ) {

						if($ancestorLength) {
							$ancestor.filter(':visible').not($mySub).velocity("fadeOut", {duration: menuDuration});
						}

						$mySub.not(':visible').velocity("fadeIn", { duration: menuDuration });
					}
				}
			},
			out: function() {
				var $me = $(this),
					$mySub = $me.find($submenuwrap).not(':hidden').not($ancestor);

				if($navtoggle.is(':visible')) {
					return false;
				}

				if($me.data('parent') === true) {
					$mySub.velocity("fadeOut", {
						duration: menuDuration,
						complete: function(){
							$me.removeClass('hover');
							if( $ancestor.is(':hidden') && $ancestorLength) {
								$ancestor.velocity("fadeIn", {
									duration: 75
								});
							}
						}
					});
				}
			},

			timeout: 100
		});
*/

		$(window).smartresize(function(){
			if($navtoggle.is(':hidden')) {
				// When we resize to desktop size, fade out open sub menus
				$submenuwrapNotAn.filter(':visible').velocity("fadeOut", {
					duration: menuDuration,
					complete: function() {
						$menuParents.removeClass('open');
					}
				});

				if( $ancestor.is(':hidden') ) {
					$ancestorPar.addClass('open');

					$ancestor.velocity("fadeIn", {
						duration: 75
					});
				}

			} else {
				// When we resize to mobile size, remove inline style attribute on sub menus
				$submenuwrap.filter(':hidden').removeAttr('style');
			}
		});
	}

	function customerClick() {
		var $block = $('.logo-block'),
			$overlay = $('.logo-overlay'),
			overlayFade;

		overlayFade = function($vis){
			$vis.velocity("transition.fadeScaleOut", {
				duration: 275,
				complete: function(){
					$(this).parent().removeClass('open');
				}
			});
		}

		$block.click(function(e){
			var $me = $(this),
				$target = $(e.target),
				$myOverlay = $me.find($overlay),
				$vis = $overlay.not($myOverlay).filter(':visible');

			if( !$target.hasClass('logo-overlay-close') && $myOverlay.is(':hidden') && isVelocityAnim() === false ){
				if($vis.length) {
					overlayFade($vis);
				}

				$myOverlay.parent().addClass('open opening');

				$myOverlay.velocity("transition.fadeScaleIn", {
					duration: 275,
					complete: function(){
						$myOverlay.parent().removeClass('opening');
					}
				});
			}
		});

		//never let a content-block with a border top be adjacent to one with a border bottom and vice versa
		$('.content-block').each(function(i, el) {
			el = $(el);
			var prev = $(el).prev('.content-block'),
				next = $(el).next('.content-block');

			if (el.hasClass('border-top2')) {
				//make sure the prev block doesnt have a border botttom
				prev.removeClass('border-bottom2');
			}

			if (el.hasClass('border-bottom2')) {
				//make sure the next block doesnt have a border top
				next.removeClass('border-top2');
			}
		});


		$(document).on('click touchend', function(e){
			var $target = $(e.target),
				$vis = $overlay.filter(':visible');

			if( $target.hasClass('logo-overlay-close') || (!$target.hasClass('logo-overlay logo-block') && $target.parents('.logo-block').length === 0) && isVelocityAnim() === false ) {
				overlayFade($vis);
			}
		});
	}
})(jQuery);

