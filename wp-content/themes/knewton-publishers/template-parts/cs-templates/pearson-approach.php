<?php
	$cs_pearson_approach_heading = get_sub_field('cs_pearson_approach_heading');
	$cs_pearson_content          = get_sub_field('cs_pearson_content');
?>
<section id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).'Approach'; ?>" class="cs-sections cs-pearson-approach">
	<div class="wrapper">
		<h3 class="cs-block-heading"><?php echo $cs_pearson_approach_heading; ?></h3>
		<?php echo $cs_pearson_content; ?>
	</div>
</section>