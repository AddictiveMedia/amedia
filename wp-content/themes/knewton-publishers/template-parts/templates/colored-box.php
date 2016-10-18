<?php
	$cb_heading = get_sub_field('cb_heading');
	$cb_sub_heading = get_sub_field('cb_sub_heading');
	$cb_text = get_sub_field('cb_text');
	$cb_button_text = get_sub_field('cb_button_text');
	$cb_button_url = get_sub_field('cb_button_url');
	$cb_background_image = get_sub_field('cb_background_image');
?>
<?php if(!empty($cb_background_image)){ ?>
<section class="colored-box" style="background-image: url(<?php echo $cb_background_image['url']; ?>);">
<?php } else{ ?>
<section class="colored-box">
<?php } ?>
	<?php if(!empty($cb_heading)){ ?>
		<h2><?php echo $cb_heading; ?></h2>
	<?php } ?>
	<?php if(!empty($cb_sub_heading)){ ?>
		<h3><?php echo $cb_sub_heading; ?></h3>
	<?php } ?>
	<?php if(!empty($cb_text)){ ?>
		<p><?php echo $cb_text; ?></p>
	<?php } ?>
	<?php if(!empty($cb_button_text) && !empty($cb_button_url)){ ?>
		<div>
			<a href="<?php echo $cb_button_url; ?>" class="btn"><?php echo $cb_button_text; ?></a>
		</div>
	<?php } ?>
</section>