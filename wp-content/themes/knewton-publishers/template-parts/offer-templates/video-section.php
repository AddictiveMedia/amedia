<?php
	$vs_section_heading = get_sub_field('vs_section_heading');
	$vs_box_1_icon      = get_sub_field('vs_box_1_icon');
	$vs_box_1_heading   = get_sub_field('vs_box_1_heading');
	$vs_box_1_content   = get_sub_field('vs_box_1_content');
	$vs_box_1_link_text = get_sub_field('vs_box_1_link_text');
	$vs_box_1_link_url  = get_sub_field('vs_box_1_link_url');
	$vs_box_2_icon      = get_sub_field('vs_box_2_icon');
	$vs_box_2_heading   = get_sub_field('vs_box_2_heading');
	$vs_box_2_content   = get_sub_field('vs_box_2_content');
	$vs_box_2_link_text = get_sub_field('vs_box_2_link_text');
	$vs_box_2_link_url  = get_sub_field('vs_box_2_link_url');
	$vs_box_2_link_url  = get_sub_field('vs_box_2_link_url');
	$vs_box_2_video     = get_sub_field('vs_box_2_video');
	$vs_box_3_icon      = get_sub_field('vs_box_3_icon');
	$vs_box_3_heading   = get_sub_field('vs_box_3_heading');
	$vs_box_3_content   = get_sub_field('vs_box_3_content');
	$vs_box_3_link_text = get_sub_field('vs_box_3_link_text');
	$vs_box_3_link_url  = get_sub_field('vs_box_3_link_url');
?>
<section class="common-wrap offer-video-section">
	<div class="wrapper">
		<?php if(!empty($vs_section_heading)){ ?>
			<h2 class="section-heading"><?php echo $vs_section_heading; ?></h2>
		<?php } ?>
		<div class="boxes-container clear">
			<div class="box">
				<div class="white-box">
					<?php if(!empty($vs_box_1_icon)){ ?>
						<span class="icon">
							<img src="<?php echo $vs_box_1_icon['url']; ?>" alt="<?php echo $vs_box_1_heading; ?>" />
						</span>
					<?php } ?>
					<?php if(!empty($vs_box_1_heading)){ ?>
						<h4><?php echo $vs_box_1_heading; ?></h4>
					<?php } ?>
					<?php if(!empty($vs_box_1_content)){ ?>
						<p><?php echo $vs_box_1_content; ?></p>
					<?php } ?>
					<?php if(!empty($vs_box_1_link_text) && !empty($vs_box_1_link_url)){ ?>
						<div class="anchor">
							<a href="<?php echo $vs_box_1_link_url; ?>"><?php echo $vs_box_1_link_text; ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="box">
				<div class="white-box">
					<?php if(!empty($vs_box_2_icon)){ ?>
						<span class="icon">
							<img src="<?php echo $vs_box_2_icon['url']; ?>" alt="<?php echo $vs_box_2_heading; ?>" />
						</span>
					<?php } ?>
					<?php if(!empty($vs_box_2_heading)){ ?>
						<h4><?php echo $vs_box_2_heading; ?></h4>
					<?php } ?>
					<?php if(!empty($vs_box_2_content)){ ?>
						<p><?php echo $vs_box_2_content; ?></p>
					<?php } ?>
					<?php if(!empty($vs_box_2_link_text)){ ?>
						<div class="anchor">
							<a href="#process-video" class="popup-link"><?php echo $vs_box_2_link_text; ?></a>
						</div>
						<a href="#process-video" class="popup-link video-icon"></a>
					<?php } ?>
				</div>
				<div style="display: none;">
					<div class="popup-video-box" id="process-video">
						<?php echo $vs_box_2_video; ?>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="white-box">
					<?php if(!empty($vs_box_3_icon)){ ?>
						<span class="icon">
							<img src="<?php echo $vs_box_3_icon['url']; ?>" alt="<?php echo $vs_box_3_heading; ?>" />
						</span>
					<?php } ?>
					<?php if(!empty($vs_box_3_heading)){ ?>
						<h4><?php echo $vs_box_3_heading; ?></h4>
					<?php } ?>
					<?php if(!empty($vs_box_3_content)){ ?>
						<p><?php echo $vs_box_3_content; ?></p>
					<?php } ?>
					<?php if(!empty($vs_box_3_link_text) && !empty($vs_box_3_link_url)){ ?>
						<div class="anchor">
							<a href="<?php echo $vs_box_3_link_url; ?>"><?php echo $vs_box_3_link_text; ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>