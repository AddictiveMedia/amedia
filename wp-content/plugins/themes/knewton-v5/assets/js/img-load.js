$(document).ready(function(){
	$('.img-wrap img').imgpreload({
		each: function() {
			var $me = $(this);
			
			$me.parent().addClass('loaded');
		}
	})
});