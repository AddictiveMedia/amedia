<?php
	$imt_heading = get_sub_field('imt_heading');
?>
<section class="img-text-slider-section">
	<div class="wrapper">
		<h2><?php echo $imt_heading; ?></h2>
		<?php if( have_rows('imt_slider_container') ): ?>
		<div class="img-text-slider">
			<?php
				while(have_rows('imt_slider_container')):the_row();
				$imt_slider_heading = get_sub_field('imt_slider_heading');
				$imt_slider_content = get_sub_field('imt_slider_content');
				$imt_slider_image = get_sub_field('imt_slider_image');
			?>
			<div class="img-text-slide">
				<div class="img-block">
					<img src="<?php echo $imt_slider_image['url']; ?>" alt="<?php echo $imt_slider_heading; ?>" />
				</div>
				<div class="text-block">
					<?php if(!empty($imt_slider_heading)): ?>
						<h3><?php echo $imt_slider_heading; ?></h3>
					<?php endif; ?>
					<?php if(!empty($imt_slider_content)): ?>
						<p><?php echo $imt_slider_content; ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>