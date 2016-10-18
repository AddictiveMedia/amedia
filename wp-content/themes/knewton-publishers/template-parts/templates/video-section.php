<?php
	$vd_heading = get_sub_field('vd_heading');
	$vd_sub_heading = get_sub_field('vd_sub_heading');
	$vd_content = get_sub_field('vd_content');
	$vd_video_text_line = get_sub_field('vd_video_text_line');
	$vd_video_embedded_code = get_sub_field('vd_video_embedded_code');
?>
<section class="video-section">
	<div class="wrapper">
		<?php if(!empty($vd_heading)){ ?>
			<h2><?php echo $vd_heading; ?></h2>
		<?php } ?>
		<?php if(!empty($vd_sub_heading)){ ?>
			<h3><?php echo $vd_sub_heading; ?></h3>
		<?php } ?>
		<?php if(!empty($vd_content)){ ?>
			<p><?php echo $vd_content; ?></p>
		<?php } ?>
		<div class="single-video-box">
			<?php if(!empty($vd_video_text_line)){ ?>
				<h4><?php echo $vd_video_text_line; ?></h4>
			<?php } ?>
			<?php if(!empty($vd_video_embedded_code)){ ?>
				<div class="video-box">
					<?php echo $vd_video_embedded_code; ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>