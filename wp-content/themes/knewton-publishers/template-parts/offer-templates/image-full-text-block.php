<?php
	$ift_section_heading = get_sub_field('ift_section_heading');
	$ift_section_image   = get_sub_field('ift_section_image');
	$ift_content_heading = get_sub_field('ift_content_heading');
	$ift_text_content    = get_sub_field('ift_text_content');
	$ift_icon_1          = get_sub_field('ift_icon_1');
	$ift_heading_1       = get_sub_field('ift_heading_1');
	$text_content_1      = get_sub_field('text_content_1');
	$ift_icon_2          = get_sub_field('ift_icon_2');
	$ift_heading_2       = get_sub_field('ift_heading_2');
	$ift_text_content_2  = get_sub_field('ift_text_content_2');
	$ift_link_text       = get_sub_field('ift_link_text');
	$ift_link_url        = get_sub_field('ift_link_url');
?>
<section class="common-wrap image-full-text-block">
	<?php if(!empty($ift_section_heading)){ ?>
		<h2 class="section-heading"><?php echo $ift_section_heading; ?></h2>
	<?php } ?>
	<?php if(!empty($ift_section_image)){ ?>
	<div class="ift-image">
		<img src="<?php echo $ift_section_image['url'] ?>" alt="" />
	</div>
	<?php } ?>
	<div class="wrapper">
		<div class="text-block">
			<?php if(!empty($ift_content_heading)){ ?>
				<h3><?php echo $ift_content_heading; ?></h3>
			<?php } ?>
			<?php if(!empty($ift_text_content)){ ?>
				<p><?php echo $ift_text_content; ?></p>
			<?php } ?>
			<?php if($ift_icon_1 || $ift_heading_1 || $text_content_1 || $ift_icon_2 || $ift_heading_2 || $ift_text_content_2){ ?>
			<ul class="clear">
				<li>
					<?php if(!empty($ift_icon_1)){ ?>
						<img src="<?php echo $ift_icon_1['url']; ?>" alt="" />
					<?php } ?>
					<?php if(!empty($ift_heading_1)){ ?>
						<h4><?php echo $ift_heading_1; ?></h4>
					<?php } ?>
					<?php if(!empty($text_content_1)){ ?>
						<p><?php echo $text_content_1; ?></p>
					<?php } ?>
				</li>
				<li>
					<?php if(!empty($ift_icon_2)){ ?>
						<img src="<?php echo $ift_icon_2['url']; ?>" alt="" />
					<?php } ?>
					<?php if(!empty($ift_heading_2)){ ?>
						<h4><?php echo $ift_heading_2; ?></h4>
					<?php } ?>
					<?php if(!empty($ift_text_content_2)){ ?>
						<p><?php echo $ift_text_content_2; ?></p>
					<?php } ?>
				</li>
			</ul>
			<?php } ?>
			<?php if(!empty($ift_link_text) && !empty($ift_link_url)){ ?>
			<div class="anchor">
				<a href="<?php echo $ift_link_url; ?>"><?php echo $ift_link_text; ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
</section>