<?php
	$cs_industry_feedback_heading = get_sub_field('cs_industry_feedback_heading');
	$cs_feedback_upload_image     = get_sub_field('cs_feedback_upload_image');
?>

<section class="cs-sections cs-industry-feedback">
	<div class="wrapper">
		<h2><?php echo $cs_industry_feedback_heading; ?></h2>
		<img src="<?php echo $cs_feedback_upload_image['url']; ?>" alt="" />
	</div>
</section>