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
			endif;
		endwhile;
	endif;
?>