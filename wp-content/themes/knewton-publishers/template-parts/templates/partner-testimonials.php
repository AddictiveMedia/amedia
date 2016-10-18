<?php
	$pt_section_heading = get_sub_field('pt_section_heading');
	$pt_box_1_content = get_sub_field('pt_box_1_content');
	$pt_box_1_author_name = get_sub_field('pt_box_1_author_name');
	$pt_box_1_author_details = get_sub_field('pt_box_1_author_details');
	$pt_box_2_content = get_sub_field('pt_box_2_content');
	$pt_box_2_author_name = get_sub_field('pt_box_2_author_name');
	$pt_box_2_author_details = get_sub_field('pt_box_2_author_details');
?>
<section class="partner-testimonials">
	<div class="wrapper">
		<?php if(!empty($pt_section_heading)){ ?>
			<h2><?php echo $pt_section_heading; ?></h2>
		<?php } ?>
		<ul>
			<li>
				<div class="testimonial-box1">
					<?php if(!empty($pt_box_1_content)){ ?>
					<div class="testimonial-content">
						<p><?php echo $pt_box_1_content; ?></p>
					</div>
					<?php } ?>
					<?php if(!empty($pt_box_1_author_name)){ ?>
						<span class="author-name"><?php echo $pt_box_1_author_name; ?>,</span>
					<?php } ?>
					<?php if(!empty($pt_box_1_author_details)){ ?>
						<span class="author-details"><?php echo $pt_box_1_author_details; ?>,</span>
					<?php } ?>
				</div>
			</li>
			<li>
				<div class="testimonial-box1">
					<?php if(!empty($pt_box_2_content)){ ?>
					<div class="testimonial-content">
						<p><?php echo $pt_box_2_content; ?></p>
					</div>
					<?php } ?>
					<?php if(!empty($pt_box_2_author_name)){ ?>
						<span class="author-name"><?php echo $pt_box_2_author_name; ?>,</span>
					<?php } ?>
					<?php if(!empty($pt_box_2_author_details)){ ?>
						<span class="author-details"><?php echo $pt_box_2_author_details; ?>,</span>
					<?php } ?>
				</div>
			</li>
		</ul>
	</div>
</section>