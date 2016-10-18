	<?php include('color-block-background.php'); ?>
	<?php
		$right = get_sub_field('color_block_right');
	?>
	
	<div class="content-block color-block color-block-full<?php echo ($color ? $color : ''); ?>">
		<div class="inner">
			<blockquote class="color-block-quote<?php echo ($right ? ' color-block-quote-right': ''); ?>">
				<?php echo get_sub_field('color_block_text'); ?>
				
				<footer>
					<?php echo get_sub_field('color_block_author'); ?>
				</footer>
			</blockquote>
		</div>
	</div>