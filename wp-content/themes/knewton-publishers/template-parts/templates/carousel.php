<?php
	$sl_heading = get_sub_field('sl_heading');
	$sl_link_text = get_sub_field('sl_link_text');
	$sl_link_url = get_sub_field('sl_link_url');
?>
<section class="logo-section">
	<div class="wrapper">
		<?php if(!empty($sl_heading)){ ?>
			<h2><?php echo $sl_heading; ?></h2>
		<?php } ?>
		<div class="logos-container">
			<?php if( have_rows('logos') ): ?>
			<div class="logo-slider">
				<?php
					while(have_rows('logos')):the_row();
					$sl_logo_img = get_sub_field('sl_logo');
				?>
				<div>
					<img src="<?php echo $sl_logo_img['url']; ?>" alt="" />
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php if(!empty($sl_link_text) && !empty($sl_link_url)){ ?>
		<div class="center-link">
			<a href="<?php echo $sl_link_url; ?>"><?php echo $sl_link_text; ?></a>
		</div>
		<?php } ?>
	</div>
</section>