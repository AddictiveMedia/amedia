jQuery(document).ready(function(){
	//pop up
	jQuery('.popup-link').colorbox({
		inline: true
	});
	//match Height
	jQuery('ul.video-row li  .video-details p,.testimonial-box .box-content p,.testimonial-box1 p,.boxes-container .box .white-box p,.feedback-content p').matchHeight();
	var window_width = jQuery().outerWidth();
	if(window_width < 767){
		jQuery('.two-video-section .video-box,.boxes-container .box .white-box').matchHeight();
	}
	//tabbing
	jQuery("#content-insights").smartTabs();
	jQuery("#support").smartTabs();
	//scroll ease
	jQuery(document).on('click', 'a.scroll-ease', function(e){
		var id = jQuery(this).attr('href');
		var jQueryid = jQuery(id);
		if (jQueryid.length === 0) {
			return;
		}
		e.preventDefault();
		var pos = jQuery(id).offset().top;
		jQuery('body, html').animate({scrollTop: pos},1000);
	});
});
jQuery('.logo-slider').slick({
	dots: false,
	infinite: true,
	speed: 300,
	slidesToShow: 5,
	slidesToScroll: 5,
	responsive: [
		{
			breakpoint: 1170,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 4,
				infinite: true
			}
		},
		{
			breakpoint: 900,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
	]
});
jQuery('.img-text-slider').slick({
	infinite: false
});