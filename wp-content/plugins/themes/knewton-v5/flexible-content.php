	<?php
		$slide_i = 0;
		$swiper_i = 0;

		if( have_rows('flex_ui') ) : while ( have_rows('flex_ui') ) : the_row();

			if( get_row_layout() == 'column_switch' ) :

				include('templates_php/column-switch.php');

			elseif( get_row_layout() == 'slide_show' ) :
				include('templates_php/slide-shows.php');

				$slide_i++;

			elseif( get_row_layout() == 'float_caption' ) :

				include('templates_php/float-caption.php');

			elseif( get_row_layout() == 'header_block_full' ) :

				include('templates_php/header-block-full.php');

			elseif( get_row_layout() == 'color_block_full' && !(isset($hide_block) && $hide_block == 'color_block_full') ) :

				include('templates_php/color-block-full.php');

			elseif( get_row_layout() == 'color_block_quote' ) :

				include('templates_php/color-block-quote.php');

			elseif( get_row_layout() == 'color_block_half' ) :

				include('templates_php/color-block-half.php');

			elseif( get_row_layout() == 'color_block_third' && !(isset($hide_block) && $hide_block == 'color_block_third') ) :

				include('templates_php/color-block-third.php');

			elseif( get_row_layout() == 'icon_columns' ) :

				include('templates_php/icon-columns.php');

			elseif( get_row_layout() == 'icon_thirds' ) :

				include('templates_php/third-columns.php');

			elseif( get_row_layout() == 'quarter_columns' ) :

				include('templates_php/quarter-columns.php');

			elseif( get_row_layout() == 'fifth_columns' ) :

				include('templates_php/fifth-columns.php');

			elseif( get_row_layout() == 'background_overlay' ) :

				include('templates_php/background-overlay.php');

			elseif( get_row_layout() == 'careers' ) :

				include('templates_php/careers.php');

			elseif( get_row_layout() == 'swiper' ) :

				include('templates_php/swiper.php');

				$swiper_i++;

			elseif( get_row_layout() == 'image_block_links' ) :

				include('templates_php/image-links.php');

			elseif( get_row_layout() == 'video_embed' ) :

				include('templates_php/video-embed.php');

			elseif( get_row_layout() == 'whitespace' ) :

				echo '<br/><br/>';

			elseif( get_row_layout() == 'raw_html' ) :

				include('templates_php/raw-html.php');

			elseif( get_row_layout() == 'video_menu' ) :

  				include('templates_php/video-menu.php');

			endif;

		endwhile; endif;
	?>
