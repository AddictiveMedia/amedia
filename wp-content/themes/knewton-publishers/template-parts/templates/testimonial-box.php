<?php
	$ts_section_heading = get_sub_field('ts_section_heading');
	$ts_column = get_sub_field('ts_columns');
	$ts_box_1_heading = get_sub_field('ts_box_1_heading');
	$ts_box_1_content = get_sub_field('ts_box_1_content');
	$ts_box_1_author = get_sub_field('ts_box_1_author');
	$ts_box_1_author_detail = get_sub_field('ts_box_1_author_detail');
	$ts_box_2_heading = get_sub_field('ts_box_2_heading');
	$ts_box_2_content = get_sub_field('ts_box_2_content');
	$ts_box_2_author = get_sub_field('ts_box_2_author');
	$ts_box_2_author_detail = get_sub_field('ts_box_2_author_detail');
	$ts_box_3_heading = get_sub_field('ts_box_3_heading');
	$ts_box_3_content = get_sub_field('ts_box_3_content');
	$ts_box_3_author = get_sub_field('ts_box_3_author');
	$ts_box_3_author_detail = get_sub_field('ts_box_3_author_detail');
?>
<section class="testimonial-box">
	<div class="wrapper">
		<?php if(!empty($ts_section_heading)){ ?>
			<h2><?php echo $ts_section_heading; ?></h2>
		<?php } ?>
		<?php if($ts_column == "3"){ ?>
			<ul class="col-3">
				<li>
					<?php if(!empty($ts_box_1_heading)){ ?>
						<h3><?php echo $ts_box_1_heading; ?></h3>
					<?php } ?>
					<?php if(!empty($ts_box_1_content)){ ?>
					<div class="box-content">
						<p><?php echo $ts_box_1_content; ?></p>
					</div>
					<?php } ?>
					<?php if(!empty($ts_box_1_author)){ ?>
						<span class="author"><?php echo $ts_box_1_author; ?>,</span>
					<?php } ?>
					<?php if(!empty($ts_box_1_author_detail)){ ?>
						<span class="author-detail"><?php echo $ts_box_1_author_detail; ?></span>
					<?php } ?>
				</li>
				<li>
					<?php if(!empty($ts_box_2_heading)){ ?>
						<h3><?php echo $ts_box_2_heading; ?></h3>
					<?php } ?>
					<?php if(!empty($ts_box_2_content)){ ?>
					<div class="box-content">
						<p><?php echo $ts_box_2_content; ?></p>
					</div>
					<?php } ?>
					<?php if(!empty($ts_box_2_author)){ ?>
						<span class="author"><?php echo $ts_box_2_author; ?>,</span>
					<?php } ?>
					<?php if(!empty($ts_box_2_author_detail)){ ?>
						<span class="author-detail"><?php echo $ts_box_2_author_detail; ?></span>
					<?php } ?>
				</li>
				<li>
					<?php if(!empty($ts_box_3_heading)){ ?>
						<h3><?php echo $ts_box_3_heading; ?></h3>
					<?php } ?>
					<?php if(!empty($ts_box_3_content)){ ?>
					<div class="box-content">
						<p><?php echo $ts_box_3_content; ?></p>
					</div>
					<?php } ?>
					<?php if(!empty($ts_box_3_author)){ ?>
						<span class="author"><?php echo $ts_box_3_author; ?>,</span>
					<?php } ?>
					<?php if(!empty($ts_box_3_author_detail)){ ?>
						<span class="author-detail"><?php echo $ts_box_3_author_detail; ?></span>
					<?php } ?>
				</li>
			</ul>
		<?php } else{ ?>
			<div class="testimonial-container">
				<ul class="col-2">
					<li>
						<?php if(!empty($ts_box_1_heading)){ ?>
							<h3><?php echo $ts_box_1_heading; ?></h3>
						<?php } ?>
						<?php if(!empty($ts_box_1_content)){ ?>
						<div class="box-content">
							<p><?php echo $ts_box_1_content; ?></p>
						</div>
						<?php } ?>
						<?php if(!empty($ts_box_1_author)){ ?>
							<span class="author"><?php echo $ts_box_1_author; ?>,</span>
						<?php } ?>
						<?php if(!empty($ts_box_1_author_detail)){ ?>
							<span class="author-detail"><?php echo $ts_box_1_author_detail; ?></span>
						<?php } ?>
					</li>
					<li>
						<?php if(!empty($ts_box_2_heading)){ ?>
							<h3><?php echo $ts_box_2_heading; ?></h3>
						<?php } ?>
						<?php if(!empty($ts_box_2_content)){ ?>
						<div class="box-content">
							<p><?php echo $ts_box_2_content; ?></p>
						</div>
						<?php } ?>
						<?php if(!empty($ts_box_2_author)){ ?>
							<span class="author"><?php echo $ts_box_2_author; ?>,</span>
						<?php } ?>
						<?php if(!empty($ts_box_2_author_detail)){ ?>
							<span class="author-detail"><?php echo $ts_box_2_author_detail; ?></span>
						<?php } ?>
					</li>
				</ul>
			</div>
		<?php } ?>
	</div>
</section>