<?php
	$off_heading = get_sub_field('off_heading');
	$off_content = get_sub_field('off_content');
	$off_image = get_sub_field('off_image');
	$off_link_text = get_sub_field('off_link_text');
	$off_link_url = get_sub_field('off_link_url');
?>
<section class="common-wrap off-img-text-block">
	<div class="wrapper">
		<?php if(!empty($off_heading)){ ?>
			<h3><?php echo $off_heading; ?></h3>
		<?php } ?>
		<div class="content-block">
			<?php if(!empty($off_image)){ ?>
			<div class="img-block">
				<img src="<?php echo $off_image['url']; ?>" alt="" />
			</div>
			<?php } ?>
			<?php if(!empty($off_content)){ ?>
			<div class="text-block">
				<p><?php echo $off_content; ?></p>
				<?php if(!empty($off_link_text) && !empty($off_link_url)){ ?>
					<div class="anchor">
						<a href="<?php echo $off_link_url; ?>"><?php echo $off_link_text; ?></a>
					</div>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</section>