<?php
	$cs_blue_link_text = get_sub_field('cs_blue_link_text');
	$cs_blue_link_url = get_sub_field('cs_blue_link_url');
?>
<?php if(!empty($cs_blue_link_text) && !empty($cs_blue_link_url)){ ?>
<div class="cs-blue-block">
	<a class="btn" href="<?php echo $cs_blue_link_url; ?>"><?php echo $cs_blue_link_text; ?></a>
</div>
<?php } ?>