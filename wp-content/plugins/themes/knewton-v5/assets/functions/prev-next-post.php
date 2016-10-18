<?php 
	function bs_get_posts($id, $type) {
		$pages = array();
		
		global $post;
		$posts = get_posts(array(
			'post_type' => $type,
			'posts_per_page' => -1
		));
		
		foreach($posts as $post) :
			setup_postdata($post);
			$pages[] = $post->ID;
		endforeach;
			
		return $pages;
	}
	
	function bs_prev_post($id, $type) {
		$pages = bs_get_posts($id, $type);
		$index = array_search($id, $pages);
		
		if($index === 0) {
			$prev = count($pages) - 1;
		} else {
			$prev = $index - 1;
		}
		
		$prev = $pages[$prev];
		
		$id = $prev;
		return $id;
	}
	
	function bs_next_post($id, $type) {
		$pages = bs_get_posts($id, $type);
		$index = array_search($id, $pages);
		$length = count($pages) - 1;
		
		if($index === $length) {
			$next = 0;
		} else {
			$next = $index + 1;
		}
		$next = $pages[$next];

		$id = $next;
		return $id;
	}
?>