<?php
	if(have_rows('content_block')):
		while (have_rows('content_block')) : the_row();
			if(get_row_layout() == 'image_text_column'):
				include('templates/images-content.php');
			elseif(get_row_layout() == 'full_colored_box'):
				include('templates/colored-box.php');
			elseif(get_row_layout() == 'full_purple_box'):
				include('templates/purple-box.php');
			elseif(get_row_layout() == 'testimonial_box'):
				include('templates/testimonial-box.php');
			elseif(get_row_layout() == 'raw_html'):
				include('templates/raw-html.php');
			elseif(get_row_layout() == 'carousel_section'):
				include('templates/carousel.php');
			elseif(get_row_layout() == 'image_bg_section'):
				include('templates/image-bg.php');
			elseif(get_row_layout() == 'image_text_slider'):
				include('templates/img-text-slider.php');
			elseif(get_row_layout() == 'video_section'):
				include('templates/video-section.php');
			elseif(get_row_layout() == 'two_videos_section'):
				include('templates/two-video-section.php');
			elseif(get_row_layout() == 'partner_testimonials'):
				include('templates/partner-testimonials.php');
			elseif(get_row_layout() == 'image_full_text_block'):
				include('templates/image-full-text-block.php');
			endif;
		endwhile;
	endif;
?>