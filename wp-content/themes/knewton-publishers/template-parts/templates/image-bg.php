<?php
	$im_heading = get_sub_field('im_heading');
	$im_content = get_sub_field('im_content');
	$im_link_text = get_sub_field('im_link_text');
	$im_link_url = get_sub_field('im_link_url');
	$im_background_image = get_sub_field('im_background_image');
?>
<?php if(!empty($im_background_image)){ ?>
<section class="image-bg-section" style="background-image: url(<?php echo $im_background_image['url']; ?>);">
<?php } else{ ?>
<section class="image-bg-section">
<?php } ?>
	<div class="wrapper">
		<?php if(!empty($im_heading)){ ?>
			<h2><?php echo $im_heading; ?></h2>
		<?php } ?>
		<?php if(!empty($im_content)){ ?>
			<p><?php echo $im_content; ?></p>
		<?php } ?>
		<?php if(!empty($im_link_text) && !empty($im_link_url)){ ?>
			<div class="section-link">
				<a href="<?php echo $im_link_url; ?>" class="btn"><?php echo $im_link_text; ?></a>
			</div>
		<?php } ?>
	</div>
</section>