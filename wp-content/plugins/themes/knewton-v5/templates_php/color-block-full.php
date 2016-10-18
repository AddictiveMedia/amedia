	<?php include('color-block-background.php'); ?>

	<?php
		$img = get_sub_field('color_block_bg_img');
		if($img) :
	?>

		<div class="content-block bg-overlay bg-cover" style="background-image: url(<?php echo $img['url']; ?>)">

	<?php endif; ?>

	<?php $title = get_sub_field('color_block_title'); ?>

		<div class="content-block color-block color-block-full<?php echo ($color ? $color : ' transparent border-top2 border-bottom2'); ?>">
			<div class="inner">
				<?php echo ($title ? '<h2 class="beta">' . $title . '</h2>' : ''); ?>

				<?php echo ($title ? '<div class="delta">' : ''); ?>

				<?php the_sub_field('color_block_text'); ?>

				<?php echo ($title ? '</div>' : ''); ?>

				<?php
					$link = get_sub_field('color_block_link');
					$btn = get_sub_field('color_block_btn');
					$new_window = get_sub_field('new_window') ? ' target="_blank"' : '';

					if($link && $btn && $color) :
				?>
					<a class="btn btn-caret color-block-btn med <?php echo $color . '-hover'; ?>" href="<?php echo $link; ?>"<?php echo $new_window ?>><?php echo $btn; ?></a>

				<?php elseif($link && $btn) : ?>
					<a class="btn btn-caret color-block-btn border-btn med" href="<?php echo $link; ?>"<?php echo $new_window ?>><?php echo $btn; ?></a>

				<?php endif; ?>

			</div>
		</div>

	<?php if($img) : ?>

	</div>

	<?php endif; ?>