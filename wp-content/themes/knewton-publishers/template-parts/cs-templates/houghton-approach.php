<?php
	$cs_houghton_approach_heading = get_sub_field('cs_houghton_approach_heading');
	$cs_houghton_full_content     = get_sub_field('cs_houghton_full_content');
?>
<section id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).'Approach'; ?>" class="cs-sections cs-houghton-approach">
	<div class="wrapper">
		<h3 class="cs-block-heading"><?php echo $cs_houghton_approach_heading; ?></h3>
		<?php echo $cs_houghton_full_content; ?>
		<?php if(have_rows('cs_houghton_points')): ?>
			<ul>
				<?php
					$counter = 1;
					while(have_rows('cs_houghton_points')) : the_row();
					$cs_houghton_points_content = get_sub_field('cs_houghton_points_content');
				?>
				<li data-label="<?php echo $counter; ?>"><?php echo $cs_houghton_points_content; ?></li>
				<?php $counter++; endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>