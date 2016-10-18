<?php
	$st_testimonial_heading   = get_sub_field('st_testimonial_heading');
	$st_author_name           = get_sub_field('st_author_name');
	$st_author_details        = get_sub_field('st_author_details');
	$st_testimonial_content   = get_sub_field('st_testimonial_content');
	$st_testimonial_link_text = get_sub_field('st_testimonial_link_text');
	$st_testimonial_link_url  = get_sub_field('st_testimonial_link_url');
?>
<section class="partner-testimonials-section">
	<div class="wrapper">
		<?php if(!empty($st_testimonial_heading)) { ?>
			<h2 class="section-heading"><?php echo $st_testimonial_heading; ?></h2>
		<?php } ?>
		<?php if(!empty($st_author_name)) { ?>
			<span class="author-name"><?php echo $st_author_name; ?></span>
		<?php } ?>
		<?php if(!empty($st_author_details)) { ?>
			<span class="author-details"><?php echo $st_author_details; ?></span>
		<?php } ?>
		<?php if(!empty($st_testimonial_content)) { ?>
			<p><?php echo $st_testimonial_content; ?></p>
		<?php } ?>
		<?php if(!empty($st_testimonial_link_text) && !empty($st_testimonial_link_url)) { ?>
			<a class="btn" href="<?php echo $st_testimonial_link_url; ?>"><?php echo $st_testimonial_link_text; ?></a>
		<?php } ?>
	</div>
</section>