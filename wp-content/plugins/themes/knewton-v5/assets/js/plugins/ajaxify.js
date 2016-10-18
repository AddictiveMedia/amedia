// Ajaxify
// v1.0.1 - 30 September, 2012
// https://github.com/browserstate/ajaxify
(function(window,undefined){
	
	// Prepare our Variables
	var
		History = window.History,
		$ = window.jQuery,
		document = window.document;

	// Check to see if History.js is enabled for our Browser
	if ( !History.enabled ) {
		return false;
	}
	
	// Wait for Document
	$(function(){
		// Prepare Variables
		var
			/* Application Specific Variables */
			contentSelector = '#switcheroo',
			$content = $(contentSelector).filter(':first'),
			contentNode = $content.get(0),
			$menu = $('#header nav ul').filter(':first'),
			activeClass = 'current current-menu-item',
			activeSelector = '.current,.current-menu-item',
			menuChildrenSelector = '> li',
			completedEventName = 'statechangecomplete',
			/* Application Generic Variables */
			$window = $(window),
			$body = $(document.body),
			pageType = 'main',
			rootUrl = History.getRootUrl(),
			scrollOptions = {
				duration: 800,
				easing:'swing'
			};
		
		// Ensure Content
		if ( $content.length === 0 ) {
			$content = $body;
		}
		
		// Internal Helper
		$.expr[':'].internal = function(obj, index, meta, stack){
			// Prepare
			var
				$this = $(obj),
				url = $this.attr('href')||'',
				isInternalLink,
				query = false;
			
			// Check link
			isInternalLink = url.substring(0,rootUrl.length) === rootUrl || url.indexOf(':') === -1;

			// Ignore or Keep
			return isInternalLink;
		};
		
		// HTML Helper
		var documentHtml = function(html){
			// Prepare
			var result = String(html)
				.replace(/<\!DOCTYPE[^>]*>/i, '')
				.replace(/<(html|head|body|title|meta|script)([\s\>])/gi,'<div class="document-$1"$2')
				.replace(/<\/(html|head|body|title|meta|script)\>/gi,'</div>')
			;
			
			// Return
			return result;
		};
		
		// Ajaxify Helper
		$.fn.ajaxify = function(){
			// Prepare
			var $this = $(this);
			
			// Ajaxify
			$this.find('a:internal').not('.pagination a, .no-ajaxy, .slide-show-full .slides-pagination a, .slide-show-full .caption-toggle').click(function(event){
				// Prepare
				var
					$this = $(this),
					url = $this.attr('href'),
					title = $this.attr('title')||null;
								
				// Continue as normal for cmd clicks etc
				if ( event.which == 2 || event.metaKey ) { return true; }
				
				// Ajaxify this link
				History.pushState(null,title,url);
				event.preventDefault();
				return false;
			});
			
			// Chain
			return $this;
		};
		
		// Ajaxify our Internal Links
		$body.ajaxify();
		
		// Hook into State Changes
		$window.bind('statechange',function(){
			// Prepare Variables
			var State = History.getState(),
				url = State.url,
				relativeUrl = url.replace(rootUrl,'');

			// Set loading-switch
			$body.addClass('loading-switch');
			$('html,body').animate({'scrollTop' : 0}, 250);

			setTimeout(function(){
				$('<div class="switch-spinner" id="ajax-spinner"></div>').insertAfter('#header');
				
				bsGlobal.spinner('ajax-spinner', '#343f52');
				
				$('#ajax-spinner').addClass('spin');
			}, 350);
			
			// Ajax Request the Traditional Page
			$.ajax({
				url: url,
				success: function(data, textStatus, jqXHR){
					// Prepare
					var
						$data = $(documentHtml(data)),
						$dataBody = $data.find('.document-body:first'),
						$dataContent = $dataBody.find(contentSelector).filter(':first'),
						dataClass = $data.find('#content').attr('class'),
						$menuChildren, contentHtml, $scripts;
					
					// Fetch the scripts
					$scripts = $dataContent.find('.document-script');
					if ( $scripts.length ) {
						$scripts.detach();
					}

					// Fetch the content
					contentHtml = $dataContent.html()||$data.html();
					if ( !contentHtml ) {
						document.location.href = url;
						return false;
					}
					// Update the menu
					$menuChildren = $menu.find(menuChildrenSelector);
					$menuChildren.filter(activeSelector).removeClass(activeClass);
					$homeLink = $menuChildren.has('a[href="'+url+'"]');
					
					$menuChildren = $menuChildren.has('a[href^="'+relativeUrl+'"],a[href^="/'+relativeUrl+'"],a[href^="'+url+'"]');
					if ( $menuChildren.length === 1 ) {
						$menuChildren.addClass(activeClass); 
					} else {
						if($homeLink.length === 1) {
							$homeLink.addClass(activeClass);
						}
					}
					
					
					window.setTimeout(function() {
						$body.addClass('loading-out').removeClass('loading-switch');

						$('#ajax-spinner').css({opacity: 0});
						
						setTimeout(function(){
							$('#ajax-spinner').remove();
						}, 200);
						
						window.setTimeout(function() {
							// Update the content
							$content.stop(true,true);
							$('#content').removeClass().addClass(dataClass);
							$('html').addClass('img-hide');
							$content.html(contentHtml).ajaxify();
		
							// Update the title
							document.title = $data.find('.document-title:first').text();
							try {
								document.getElementsByTagName('title')[0].innerHTML = document.title.replace('<','&lt;').replace('>','&gt;').replace(' & ',' &amp; ');
							}
							catch ( Exception ) { }
							
							// Add the scripts
							$scripts.each(function(){
								var $script = $(this), scriptText = $script.text(), scriptNode = document.createElement('script');
								scriptNode.appendChild(document.createTextNode(scriptText));
								contentNode.appendChild(scriptNode);
							});
		
							// Complete the change
							if ( $body.ScrollTo||false ) { $body.ScrollTo(scrollOptions); } /* http://balupton.com/projects/jquery-scrollto */
							$body.removeClass('loading-out');
							$window.trigger(completedEventName);
			
							// Inform Google Analytics of the change
							if ( typeof window._gaq !== 'undefined' ) {
								window._gaq.push(['_trackPageview', relativeUrl]);
							}
		
							// Inform ReInvigorate of a state change
							if ( typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined' ) {
								reinvigorate.ajax_track(url);
								// ^ we use the full url here as that is what reinvigorate supports
							}
						}, 400);
					}, 400);
				},
				error: function(jqXHR, textStatus, errorThrown){
					document.location.href = url;
					return false;
				}
			}); // end ajax

		}); // end onStateChange

	}); // end onDomLoad

})(window); // end closure
