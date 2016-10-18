<?php
	$cs_video_heading = get_sub_field('cs_video_heading');
	$cs_video_text    = get_sub_field('cs_video_text');
	$cs_iframe_video  = get_sub_field('cs_iframe_video');
?>

<section id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).$cs_video_heading; ?>" class="cs-sections cs-video">
	<div class="wrapper">
		<p><?php echo $cs_video_text; ?></p>
		<div class="video-box">
			<?php echo $cs_iframe_video; ?>
		</div>
	</div>
</section>