<div class="wrapper">
	<section class="partners-logos">
		<?php
			$st_partners_logos_heading = get_sub_field('st_partners_logos_heading');
			if(!empty($st_partners_logos_heading)){
		?>
			<h4><?php echo $st_partners_logos_heading; ?></h4>
		<?php } ?>
		<?php if( have_rows('st_logos') ): ?>
			<ul>
				<?php
					while(have_rows('st_logos')):the_row();
					$st_logo = get_sub_field('st_logo');
				?>
				<li>
					<img src="<?php echo $st_logo['url']; ?>" alt="" />
				</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</section>
</div>