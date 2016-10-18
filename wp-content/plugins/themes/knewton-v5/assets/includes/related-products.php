<?php
	// check if the function already exists
	if ( function_exists('km_rpbt_related_posts_by_taxonomy') ) {
	
		$args = array(
			'post_types' => 'product',
			'posts_per_page' => 3
		);
		
		$taxonomies = array('colors', 'brands', 'apparel');
		
		$related_posts = km_rpbt_related_posts_by_taxonomy($theid, $taxonomies, $args);
	
		if ($related_posts) {
			// loop through related posts
			foreach((array) $related_posts as $related) :
				$theid = $related->ID;
	
				$fields = $cfs->get( false, $theid );
							
				$img = wp_get_attachment_image_src( get_post_thumbnail_id($theid), 'full' );
					
			endforeach;
		}
	} 
?>
