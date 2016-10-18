<?php
	$cs_waggle_approach_heading = get_sub_field('cs_waggle_approach_heading');
	$cs_full_content            = get_sub_field('cs_full_content');
	$cs_waggle_icon_1           = get_sub_field('cs_waggle_icon_1');
	$cs_waggle_heading_1        = get_sub_field('cs_waggle_heading_1');
	$cs_waggle_content_1        = get_sub_field('cs_waggle_content_1');
	$cs_waggle_icon_2           = get_sub_field('cs_waggle_icon_2');
	$cs_waggle_heading_2        = get_sub_field('cs_waggle_heading_2');
	$cs_waggle_content_2        = get_sub_field('cs_waggle_content_2');
	$cs_waggle_icon_3           = get_sub_field('cs_waggle_icon_3');
	$cs_waggle_heading_3        = get_sub_field('cs_waggle_heading_3');
	$cs_waggle_content_3        = get_sub_field('cs_waggle_content_3');
?>
<section id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).'Approach'; ?>" class="cs-sections cs-waggle-approach">
	<div class="wrapper">
		<h3 class="cs-block-heading"><?php echo $cs_waggle_approach_heading; ?></h3>
		<?php echo $cs_full_content; ?>
		<div class="site-row three-content">
			<div class="col-1-3">
				<img src="<?php echo $cs_waggle_icon_1['url']; ?>" alt="" />
				<h4><?php echo $cs_waggle_heading_1; ?></h4>
				<?php echo $cs_waggle_content_1; ?>
			</div>
			<div class="col-1-3">
				<img src="<?php echo $cs_waggle_icon_2['url']; ?>" alt="" />
				<h4><?php echo $cs_waggle_heading_2; ?></h4>
				<?php echo $cs_waggle_content_2; ?>
			</div>
			<div class="col-1-3">
				<img src="<?php echo $cs_waggle_icon_3['url']; ?>" alt="" />
				<h4><?php echo $cs_waggle_heading_3; ?></h4>
				<?php echo $cs_waggle_content_3; ?>
			</div>
		</div>
	</div>
</section>