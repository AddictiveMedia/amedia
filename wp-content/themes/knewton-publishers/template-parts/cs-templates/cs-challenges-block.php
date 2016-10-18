<?php
	$cs_challenges_heading = get_sub_field('cs_challenges_heading');
	$cs_first_column_content = get_sub_field('cs_first_column_content');
	$cs_second_column_content = get_sub_field('cs_second_column_content');
?>
<section id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).$cs_challenges_heading; ?>" class="cs-sections cs-challenges">
	<div class="wrapper">
		<h3 class="cs-block-heading"><?php echo $cs_challenges_heading; ?></h3>
		<div class="site-row">
			<div class="col-1-2">
				<?php echo $cs_first_column_content; ?>
			</div>
			<div class="col-1-2">
				<?php echo $cs_second_column_content; ?>
			</div>
		</div>
	</div>
</section>