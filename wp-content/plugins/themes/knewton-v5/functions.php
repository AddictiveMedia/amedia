<?php
	add_image_size('gal_3000', 2990, 9999, false);
	add_image_size('gal_2000', 2000, 9999, false);
	add_image_size('gal_1000', 1000, 9999, false);
	add_image_size('gal_640', 640, 9999, false);
	add_image_size('gal_30', 30, 9999, false);
	add_image_size('blog-feature', 691, 9999, false);
	add_image_size('press-release', 169, 80, true);

	require_once 'vendor/autoload.php';
	require_once 'knewton.php';
	include_once('assets/functions/theme-setup.php');
	include_once('assets/functions/cleanup.php');
	include_once('assets/functions/theme-settings.php');
	include_once('assets/functions/post-types.php');

	if ( ! defined( 'USE_LOCAL_ACF_CONFIGURATION' ) || ! USE_LOCAL_ACF_CONFIGURATION ) {
	  require_once 'assets/functions/acf-flexible-ui.php';
	}

	function knewton_preview_post_link () {
		$post_id = get_the_ID();
		$site_url = get_site_url();
		return "$site_url/index.php/?p=$post_id&preview=true";
	}

	add_filter( 'preview_post_link', 'knewton_preview_post_link' );

	function button_shortcode( $atts ) {
		$atts = shortcode_atts( array(
			'title' => '',
			'link' => '',
			'caret' => false
		), $atts, 'button' );

		return '<a class="btn med border-btn' . ( $atts['caret'] == true ? ' btn-caret' : '') . '" href="' . $atts['link'] . '">' . $atts['title'] . '</a>';
	}

	add_shortcode( 'button', 'button_shortcode' );

	class Child_Wrap extends Walker_Nav_Menu {
	    function start_lvl(&$output, $depth = 0, $args = array())
	    {
	    	$display = '';
	    	if ($depth > 0) {
	    		$display = ' style="display:none;"';
	    	}
	        $indent = str_repeat("\t", $depth);
	        $output .= "\n$indent<div class=\"sub-menu-wrap depth-{$depth}\"{$display}><div class=\"sub-menu-inner\"><ul class=\"sub-menu\">\n";
	    }
	    function end_lvl(&$output, $depth = 0, $args = array())
	    {
	        $indent = str_repeat("\t", $depth);
	        $output .= "$indent</ul></div></div>\n";
	    }
	}

	function knewton_posts_join($join) {
		global $wp_query, $wpdb;
		if ($wp_query->query['post_type'] == 'press-release' && isset($_GET['type']) && $_GET['type'] == 'press-release') {
	        $join .= " LEFT JOIN $wpdb->postmeta links_to ON {$wpdb->posts}.ID = links_to.post_id AND links_to.meta_key = '_links_to' ";
		}
		return $join;
	}
	add_filter('posts_join', 'knewton_posts_join');

	function knewton_posts_where($where, &$wp_query) {
		if ($wp_query->query['post_type'] == 'press-release' && isset($_GET['type']) && $_GET['type'] == 'press-release') {
			$where .= " AND ISNULL(links_to.meta_value) ";
		}
		return $where;
	}
	add_filter( 'posts_where', 'knewton_posts_where', 10, 2 );

	// function knewton_pre_get_posts($query) {
	// 	if ($query->post_type == '')
	// }
	// add_action( 'pre_get_posts', 'knewton_pre_get_posts' );

	function enqueue_scripts() {
		if (is_admin()) { return; }
		$theme_url = get_bloginfo('stylesheet_directory');

		wp_enqueue_script('jquery');
		wp_enqueue_script('smartresize', $theme_url . '/assets/js/plugins/jquery.smartresize.js');
		wp_enqueue_script('modernizr', $theme_url. '/assets/js/plugins/modernizr.js');
		wp_enqueue_script('global', $theme_url . '/assets/js/global.js');
		wp_enqueue_script('bootstrap', $theme_url . '/assets/js/plugins/bootstrap.js');
		wp_enqueue_script('cycle2', $theme_url . '/assets/js/plugins/cycle2.js');
		wp_enqueue_script('velocity', $theme_url . '/assets/js/plugins/velocity.js');
		wp_enqueue_script('velocityui', $theme_url . '/assets/js/plugins/velocity.ui.min.js');
		wp_enqueue_script('hoverintent', $theme_url . '/assets/js/plugins/hoverintent.js');
		wp_enqueue_script('slick', $theme_url . '/assets/js/plugins/slick.js');
		wp_enqueue_script('fancybox', $theme_url . '/assets/js/plugins/fancybox/jquery.fancybox.pack.js');
		wp_enqueue_script('fancybox-media', $theme_url . '/assets/js/plugins/fancybox/helpers/jquery.fancybox-media.js');
	}

	enqueue_scripts();

	function knewton_linkify_twitter($status_text) {
	    $status_text = preg_replace('/(https?:\/\/\S+)/i', '<a target="_blank" href="\1">\1</a>', $status_text);
	    $status_text = preg_replace('/(^|\s)@($|\w+)/i', '\1<a target="_blank" href="http://twitter.com/\2">@\2</a>', $status_text);
	    $status_text = preg_replace('/(^|\s)#($|\w+)/i', '\1<a target="_blank" href="http://search.twitter.com/search?q=%23\2">#\2</a>', $status_text);
	    return $status_text;
	}

	function knewton_get_current_template( $echo = false ) {
	    if( !isset( $GLOBALS['current_theme_template'] ) )
	        return false;
	    if( $echo )
	        echo $GLOBALS['current_theme_template'];
	    else
	        return $GLOBALS['current_theme_template'];
	}

    function knewton_limit_publish_cap_to_admin() {
        // get the roles we want to modify
        $roles = array();
        array_push($roles, get_role('editor'));
        array_push($roles, get_role('author'));
        array_push($roles, get_role('contributor'));
        array_push($roles, get_role('subscriber'));

        // capabilities to remove from each of these roles
        $caps = array(
            'publish_pages',
            'publish_posts',
            'delete_published_pages',
            'delete_published_posts',
            'edit_published_pages',
            'edit_published_posts'
        );

        // remove capabilities from each role
        foreach ( $roles as $role  ) {
            foreach ($caps as $cap ) {
                $role->remove_cap( $cap );
            }
        }
    }
    add_action('init', 'knewton_limit_publish_cap_to_admin');
		function my_cdn_upload_url() {
		    return 'http://12964-presscdn-0-91.pagely.netdna-cdn.com/wp-content/uploads';
		}
		add_filter( 'pre_option_upload_url_path', 'my_cdn_upload_url' );
?>
