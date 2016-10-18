<?php
	// HEADER STUFF
	function my_filter_head() {
		remove_action('wp_head', '_admin_bar_bump_cb');
	}

	function remove_twentytwelve_styles() {
		wp_dequeue_style( 'twentytwelve-style' );
		wp_dequeue_style( 'twentytwelve-ie' );
		wp_dequeue_style( 'twentytwelve-fonts' );
	}

	function my_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
	}

	function twentytwelvechild_remove_custom_header() {
		remove_theme_support( 'custom-header' );
		remove_theme_support( 'custom-background' );
	}

	add_action('after_setup_theme','start_cleanup');

	function start_cleanup() {
		remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
		remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
		remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
		remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
		remove_action( 'wp_head', 'index_rel_link'); // index link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		remove_action( 'wp_head', 'wp_generator' );

		add_action('get_header', 'my_filter_head');
		add_action( 'wp_print_styles', 'remove_twentytwelve_styles' );
		add_action( 'after_setup_theme', 'twentytwelvechild_remove_custom_header', 11 );
		add_action( 'widgets_init', 'my_remove_recent_comments_style' );

		if(!is_admin()) {
			add_filter('show_admin_bar', '__return_false');
		}
	}

	/**
	 * Clean up image tags
	 * ----------------------------------------------------------------------------
	 */

	// Clean the output of attributes of images in editor
	function image_tag_class($class, $id, $align, $size) {
	    $align = 'align' . esc_attr($align);
	    return $align;
	}

	// Remove width and height in editor, for a better responsive world.
	function image_editor($html, $id, $alt, $title) {
	    return preg_replace(array(
	            '/\s+width="\d+"/i',
	            '/\s+height="\d+"/i',
	            '/alt=""/i'
	        ),
	        array(
	            '',
	            '',
	            '',
	            'alt="' . $title . '"'
	        ),
	        $html);
	}
?>