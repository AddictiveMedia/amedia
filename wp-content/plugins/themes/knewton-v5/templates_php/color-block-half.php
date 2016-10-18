<?php $hide = get_sub_field('hide', get_the_ID()) ?>
<?php if ($hide) return; ?>
	<div class="content-block">
		<div class="inner">
			<div class="row-fluid">

			<?php
				if( have_rows('color_block_halves') ) : while ( have_rows('color_block_halves') ) : the_row();
					include('color-block-background.php');

					$link = get_sub_field('color_block_link');
					$btn_link = get_sub_field('color_block_btn_link');
					$btn_text = get_sub_field('color_block_btn');

						if(!$btn_text) {
							$btn_text = 'Learn More';
						}

					$class = 'class="span6 color-block color-block-half' . ($color ? $color : '') . '"';
					$btn_class = 'class="btn color-block-btn med' . ($color ? ' ' . $color . '-hover' : '');

					$open_tag = '';
					$close_tag = '';

					$btn_html = '';
					$btn_open_tag = '';
					$btn_close_tag = '';

						if($link) {
							$open_tag = '<a ' . $class . ' href="' . $link . '">';
							$close_tag = '</a>';

							$btn_open_tag = '<span ' . $btn_class . '>';
							$btn_close_tag = '</span>';
						} else {
							$open_tag = '<div ' . $class . '>';
							$close_tag = '</div>';

							$btn_open_tag = '<a ' . $btn_class . ' href="' . $btn_link . '">';
							$btn_close_tag = '</a>';
						}

					if($btn_link) {
						$btn_html = $btn_open_tag . $btn_text . $btn_close_tag;
					}

			?>

				<?php echo $open_tag; ?>

					<p><?php echo get_sub_field('color_block_text'); ?></p>

					<?php echo $btn_html; ?>

				<?php echo $close_tag; ?>

			<?php endwhile; endif; ?>

			</div>
		</div>
	</div>