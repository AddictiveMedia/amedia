	<?php
		$nobot = get_sub_field('no_padding_bottom');
		$notop = get_sub_field('no_padding_top');
	?>

	<div class="content-block border-top2<?php echo ($nobot ? ' no-padding-bottom' : ''); echo ($notop ? ' no-padding-top' : ''); ?>">
		<div class="inner">
			<div class="row-fluid">

			<?php
				if( have_rows('color_block_thirds') ) : while ( have_rows('color_block_thirds') ) : the_row();
					include('color-block-background.php');

					$title = get_sub_field('color_block_title');
					$img = get_sub_field('color_block_img');
						if($img) {
							$img = $img['url'];
						}

					$link = get_sub_field('color_block_link');
					$btn_link = get_sub_field('color_block_btn_link');
					$btn_text = get_sub_field('color_block_btn');

						if(!$btn_text) {
							$btn_text = 'Learn More';
						}

					$class = 'class="span4 color-block color-block-third' . ($color ? $color : '') . '"';

					$open_tag = '';
					$close_tag = '';

						if($link) {
							$open_tag = '<a ' . $class . ' href="' . $link . '">';
							$close_tag = '</a>';
						} else {
							$open_tag = '<div ' . $class . '>';
							$close_tag = '</div>';
						}

			?>

				<?php echo $open_tag; ?>

						<?php if($title) : ?>

							<h3 class="color-block-title gamma museo-sans-700"><?php echo $title; ?></h3>

						<?php endif; ?>

						<?php if($img) : ?>

						<img class="img-responsive color-block-img" src="<?php echo $img; ?>" />

						<?php endif; ?>

						<p class="color-block-text"><?php echo get_sub_field('color_block_text'); ?></p>

						<?php if($btn_link): ?>

							<a class="color-block-btn btn med border-btn" href="<?php echo $btn_link; ?>"><?php echo $btn_text; ?></a>

						<?php endif; ?>

				<?php echo $close_tag; ?>

			<?php endwhile; endif; ?>

			</div>
		</div>
	</div>