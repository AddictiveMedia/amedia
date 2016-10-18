	<script>
		var $ = jQuery || false;
		if ($) {
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			$(function() {
				$.get(ajaxurl, {
		            action: 'knewton_get_jobs'
		        }, function(response) {

		        	var html = '';
		        	var categories = {};
		        	for (var i in response) {
		        		var job = response[i];
		        		if (typeof categories[job.department] == 'undefined') {
		        			categories[job.department] = [];
		        		}
		        		categories[job.department].push(job);
		        	}
		        	for (var category in categories) {
		        		var jobs = categories[category];
		        		html += '<div class="career-table">';
		        		html += '<h2 class="gamma career-header">' + category + '</h2>';
		        		for (var j in jobs) {
		        			var job = jobs[j];
			        		html += '<a class="career-row" href="'+ job.url + '" target="_blank">';
			        		html += '<div class="career-cell career-job">' + job.title + '</div>';
			        		html += '<div class="career-cell career-city">' + job.location + '</div>';
			        		html += '</a>';
			        	}
			        	html += '</div>';
		        	}

		        	$('#careers-list').html(html);

		        }, 'json');
			});
		}
	</script>
	<a name="open-positions"></a>
	<div class="content-block" id="jobs">
		<div class="inner">
			<h3 class="gamma-heading gamma tac museo-slab-300">Open Positions</h3>

			<div class="row-fluid span-right">

				<div class="inner">

					<!-- div wrapper to use :first-child on career-table -->

					<div id="careers-list">
						Loading..
					</div>
				</div> <!-- span9 -->
			</div> <!-- row-fluid -->

		</div> <!-- inner -->
	</div> <!-- content-block -->
