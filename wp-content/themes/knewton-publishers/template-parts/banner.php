<?php
	$id = $post->ID;
	$img = get_field('masthead_bg', $id);
	$img_src = "";
	$title = get_field('masthead_title', $id);
	$sub = get_field('masthead_sub', $id);
	if($img) {
		$img_src = $img['url'];
	}
	if($img){
?>
<section class="banner-block img-bg" style="background-image: url(<?php echo $img_src; ?>);">
	<img class="banner-img" src="<?php echo $img_src; ?>" alt="" />
	<?php if($title || $sub) { ?>
	<div class="banner-content">
		<h1><?php echo $title; ?></h1>
		<?php if($sub) { ?>
		<h2><?php echo $sub; ?></h2>
		<?php } ?>
	</div>
	<?php } ?>
</section>
<?php } else { ?>
<section class="banner-block color-black">
	<div class="banner-content">
		<h1><?php echo $title; ?></h1>
		<?php if($sub) { ?>
		<h2><?php echo $sub; ?></h2>
		<?php } ?>
	</div>
</section>
<?php } ?>