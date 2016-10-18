<?php
	add_image_size('gallery_thumb', 200, 200, TRUE);
	add_image_size('gal_3000', 3000, 9999, TRUE);
	
	function get_gallery($id) {
		$featured_id = get_post_thumbnail_id( $id );
		
		$args = array(
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'post_type'      => 'attachment',
			'post_parent'    =>  $id,
			'post_mime_type' => 'image, text',
			'post_status'    => null,
			'numberposts'    => -1,
			'exclude' => $featured_id
		);
		
		// Get all image attachments for current post
		$attachments = get_posts($args);
		$i = 0;
		$gallery_class = '';
		
		$fancybox = get_post_meta( $id, 'fancybox_gal', TRUE );
		$fancybox = true;
		
		if($fancybox == true) {
			echo '<script>$(".fancybox").fancybox({
				openEffect	: "none",
				closeEffect	: "none"
			});</script>';

			$gallery_class = ' class="bs-fancybox-gallery"';
		}
		
		$single_gallery = '<div' . $gallery_class . '>';
		
		if($attachments) {
			
			foreach ($attachments as $attachment) {
				$img_id = $attachment->ID;
				$caption = $attachment->post_excerpt;
				$blogurl = get_bloginfo('wpurl');
				
				$caption_html = '';
				
				if($caption) {
					$caption_html = ' data-caption="' . $caption . '"';
				}
				
				$img = wp_get_attachment_image_src( $img_id, 'full' );
				$img_thumb = wp_get_attachment_image_src( $img_id, 'gallery_thumb' );
				
			// ALT TEXT
				$alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
				$alt_text = '';
				
				if($alt) {
					$alt_text = ' alt="' . $alt . '"';
				}
			// FANCYBOX
			
				if($fancybox == true) {
					$single_gallery .= '<a href="' . $img[0] . '" class="fancybox no-ajaxy" rel="gallery1">';
				}
				
				$single_gallery .= '<img src="' . $img[0] . '" ' . $alt_text . '/>';
				
				if($fancybox == true) {
					$single_gallery .= '</a>';
				}
					
			} // foreach attachment
		
			return $single_gallery;
		
		} else {
			return false;
		}
	}

?>