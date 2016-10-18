<?php
	$cs_summary_heading = get_sub_field('cs_summary_heading');
	$cs_summary_content = get_sub_field('cs_summary_content');
	$cs_summary_image = get_sub_field('cs_summary_image');
?>
<section id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).$cs_summary_heading; ?>" class="cs-sections cs-summary">
	<div class="wrapper">
		<div class="img-block">
			<img src="<?php echo $cs_summary_image['url']; ?>" alt="" />
		</div>
		<div class="text-block">
			<h3 class="cs-block-heading"><?php echo $cs_summary_heading; ?></h3>
			<p><?php echo $cs_summary_content; ?></p>
		</div>
	</div>
</section>