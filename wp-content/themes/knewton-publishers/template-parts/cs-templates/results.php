<?php
	$cs_results_heading       = get_sub_field('cs_results_heading');
?>
<section id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).$cs_results_heading; ?>" class="cs-sections cs-results">
	<div class="wrapper">
		<h3 class="cs-block-heading"><?php echo $cs_results_heading; ?></h3>
		<?php if(have_rows('cs_results_image_content_block')): ?>
			<?php
				while ( have_rows('cs_results_image_content_block') ) : the_row();
				$cs_full_image            = get_sub_field('cs_full_image');
				$cs_left_content_heading  = get_sub_field('cs_left_content_heading');
				$cs_content_sub_heading   = get_sub_field('cs_content_sub_heading');
				$cs_results_left_content  = get_sub_field('cs_results_left_content');
				$cs_results_content_image = get_sub_field('cs_results_content_image');
				$cs_image_on_which_side   = get_sub_field('cs_image_on_which_side');
				if(!empty($cs_full_image)){
			?>
				<img class="result-full-image" src="<?php echo $cs_full_image['url']; ?>" alt="" />
			<?php }
			if(!empty($cs_left_content_heading) && !empty($cs_results_left_content)) { ?>
				<div class="img-text-content">
					<?php if($cs_image_on_which_side == "Right"){ ?>
						<div class="img-block img-right">
							<img src="<?php echo $cs_results_content_image['url']; ?>" alt="" />
						</div>
					<?php } else{ ?>
						<div class="img-block">
							<img src="<?php echo $cs_results_content_image['url']; ?>" alt="" />
						</div>
					<?php } ?>
					<div class="text-block">
						<h4><?php echo $cs_left_content_heading; ?></h4>
						<?php if(!empty($cs_content_sub_heading)){ ?>
							<h5><?php echo $cs_content_sub_heading; ?></h5>
						<?php } ?>
						<?php echo $cs_results_left_content; ?>
					</div>
				</div>
			<?php } endwhile; ?>
		<?php endif; ?>
	</div>
</section>