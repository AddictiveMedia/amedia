<?php
	$cs_feedback_heading          = get_sub_field('cs_feedback_heading');
	$cs_feedback_from_1           = get_sub_field('cs_feedback_from_1');
	$cs_feedback_content_1        = get_sub_field('cs_feedback_content_1');
	$cs_feedback_1_author_name    = get_sub_field('cs_feedback_1_author_name');
	$cs_feedback_1_author_detail  = get_sub_field('cs_feedback_1_author_detail');
	$cs_feedback_from_2           = get_sub_field('cs_feedback_from_2');
	$cs_feedback_content_2        = get_sub_field('cs_feedback_content_2');
	$cs_feedback_2_author_name    = get_sub_field('cs_feedback_2_author_name');
	$cs_feedback_2_author_detail  = get_sub_field('cs_feedback_2_author_detail');
	$cs_feedback_from_3           = get_sub_field('cs_feedback_from_3');
	$cs_feedback_content_3        = get_sub_field('cs_feedback_content_3');
	$cs_feedback_3_author_name    = get_sub_field('cs_feedback_3_author_name');
	$cs_feedback_3_author_detail  = get_sub_field('cs_feedback_3_author_detail');
?>

<section id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).$cs_feedback_heading; ?>" class="cs-sections cs-feedback">
	<div class="wrapper">
		<h3><?php echo $cs_feedback_heading; ?></h3>
		<div class="feedback-container">
			<div class="box">
				<h4><?php echo $cs_feedback_from_1; ?></h4>
				<div class="feedback-content">
					<?php echo $cs_feedback_content_1; ?>
				</div>
				<div class="author-name"><?php echo $cs_feedback_1_author_name; ?>,</div>
				<div class="author-detail"><?php echo $cs_feedback_1_author_detail; ?></div>
			</div>
			<div class="box">
				<h4><?php echo $cs_feedback_from_2; ?></h4>
				<div class="feedback-content">
					<?php echo $cs_feedback_content_2; ?>
				</div>
				<div class="author-name"><?php echo $cs_feedback_2_author_name; ?>,</div>
				<div class="author-detail"><?php echo $cs_feedback_2_author_detail; ?></div>
			</div>
			<div class="box">
				<h4><?php echo $cs_feedback_from_3; ?></h4>
				<div class="feedback-content">
					<?php echo $cs_feedback_content_3; ?>
				</div>
				<div class="author-name"><?php echo $cs_feedback_3_author_name; ?>,</div>
				<div class="author-detail"><?php echo $cs_feedback_3_author_detail; ?></div>
			</div>
		</div>
	</div>
</section>