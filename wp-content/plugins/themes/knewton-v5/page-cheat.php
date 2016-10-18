<?php get_header() ?>
	<div class="content-block">
		<div class="inner">
			<h1>Cheat Mode for Engineers</h1>
			<script type="text/javascript" src="http://www.formstack.com/forms/js.php?1229842-mrq0lJkoqD-v2"></script>
		</div>
	</div>
</div>
<?php get_footer() ?>

<style>
.fsRowOpen, .fsRowClose {
	display: none;
}
.row-fluid, .fsCell, label, input, textarea {
	width:100% !important;
}
input[type="text"], textarea, .uneditable-input {
	width: 425px !important;
}
.fsPagination {
	text-align: left !important;
}

input[type="submit"] {
	font-size:11px !important;
	display: inline !important;
	width:200px !important;
}

.fsSubmit {
	display: block !important;
}

.fsTable {
	position:relative;
	left:-25px;
}

#mobile-subnav, #subnav-container {
	display: none !important;
}

</style>

<script>
;(function($) {
	$(function() {
		// setTimeout(function() {
			// Remove the Formstack styles
			$('.fsBody link').remove();
			$('.fsBody style').remove();

			// Set the page up to be responsive
			$('.fsPage')
				.removeClass('fsPage')
				.addClass('row-fluid');

			// Remove Formstack junk
			$('.fsSection')
				.removeClass('fsSection');

			// Set up a 1-col div to hold response spans
			$('.fs1Col')
				.removeClass('fs1Col')
				.addClass('row-fluid');

			// Replace crufty row divs with a Bootstrap row container
			$('.fsRow.fsFieldRow.fsLastRow')
				.removeClass('fsRow')
				.removeClass('fsFieldRow')
				.removeClass('fsLastRow')
				.addClass('row-fluid');

			// Map checkbox form elements to what Bootstrap is expecting
			$('.fsOptionLabel > input[type="checkbox"]').each(function(el, i) {
				$(this)
					.parent()
					.removeClass('fsOptionLabel')
					.addClass('checkbox');
			});

			$('.checkbox.horizontal')
				.removeClass('horizontal')
				.addClass('inline');

			// Map radio form elements to what Bootstrap is expecting
			$('.fsOptionLabel > input[type="radio"]').each(function(el, i) {
				$(this)
					.parent()
					.removeClass('fsOptionLabel')
					.addClass('radio');
			});

			$('.radio.horizontal')
				.removeClass('horizontal')
				.addClass('inline');

			// Map supporting text to what Bootstrap is expecting
			$('.fsSupporting')
				.removeClass('fsSupporting')
				.addClass('help-block');

			// Bootstrap the submit button
			// $('.fsSubmitButton')
			// 	.removeClass('fsSubmitButton')
			// 	.addClass('button').addClass('button-primary').addClass('button-arrow');;

			// Remove manual styles from all inputs
			$('input', $('.fsBody')).attr('style', '');

			// Map multi-field groups to what Bootstrap is expecting
			$('.fieldset-content')
				.removeClass('fieldset-content')
				.addClass('controls').addClass('controls-row');

			// Fix multi-field city/state/zip address fields so they renderin inline properly
			// 1. Find a Formstack div and rename it to a Bootstrapped div for multiple fields
			// 2. Create a clone div beneath the first that we just renamed
			// 3. In the first div, give each input and matching label the appropriate span
			// 4. Move the labels into the second Bootstrapped div so the spans line up properly
			function restructure_fields(container_class, span_class, context, new_div) {
				var container = $('div.' + container_class, context);
				$('input, label, select', container).addClass(span_class);
				var new_label = $('label', container).clone();
				$('label', container).remove();
				new_div.append(new_label);

				$('input, select', container).unwrap();
			}

			$('.fsSubFieldGroup').each(function(i, el) {

				$(this).addClass('controls').addClass('controls-row').removeClass('fsSubFieldGroup');
				var new_div = $('<div class="controls controls-row" />').insertAfter($(this));

				var classes = {
					'fsFieldCity': 'span4',
					'fsFieldState': 'span1',
					'fsFieldZip' : 'span2'
				}

				for (var container_class in classes) {
					restructure_fields(container_class, classes[container_class], $(this), new_div);
				}

			});
		// }, 1);
	});
})(jQuery);
</script>
