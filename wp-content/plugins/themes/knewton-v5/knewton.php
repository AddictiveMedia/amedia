<?php

//composer autoloader
require_once(realpath(dirname(__FILE__)) . '/vendor/autoload.php');

class K {
    
    private static $_theme_data;
    public static $local;
    private static $_cache = array();
    public static $use_less = false;
    
    public function __construct() {
        add_filter('get_archives_link', array($this, 'get_archives_link'));
        add_filter('nav_menu_css_class', array($this, 'nav_menu_css_class'), 10, 2);
        add_filter('wp_nav_menu', array($this, 'wp_nav_menu'));

        add_action('wp_ajax_knewton_store_token', array(&$this, 'store_token'));
        add_action('wp_ajax_nopriv_knewton_store_token', array(&$this, 'store_token'));

        $filters = array(
            'bloginfo', 
            'comment_text', 
            'comment_author', 
            'link_name', 
            'link_description', 
            'link_notes', 
            'list_cats', 
            'single_post_title', 
            'single_cat_title', 
            'single_tag_title', 
            'single_month_title', 
            'term_description', 
            'term_name', 
            'the_content', 
            'the_excerpt', 
            'the_title', 
            'nav_menu_attr_title', 
            'nav_menu_description', 
            'widget_title', 
            'wp_title'
        );
        
        foreach ($filters as $filter) {
        	remove_filter($filter, 'wptexturize', 40);
        }

        self::$local = self::is_local();

        if (self::$local) {
            self::$use_less = true;
            // self::$use_less = false;
        }
    }

    public static function is_xhr() {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest');
    }

    public static function is_production() {
        return (bool)(!(self::is_local() || self::is_staging()));
    }

    public static function is_local() {
        return (bool)(preg_match('/\.local\/?$/', $_SERVER['HTTP_HOST']));
    }

    public static function is_staging() {
        return (bool)(isset($_SERVER['IS_WPE_SNAPSHOT']));
    }
    
    public function getarchives_where($where , $r) {
        $args = array('public' => true , '_builtin' => false); 
        $output = 'names'; 
        $operator = 'and';
        $post_types = get_post_types($args, $output, $operator); 
        $post_types = array_merge($post_types , array('post')); 
        $post_types = "'" . implode( "' , '" , $post_types ) . "'";
        return str_replace( "post_type = 'post'" , "post_type IN ( $post_types )" , $where );
    }
    
    public function get_archives_link($link) {
    	$url = preg_match('|(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.-]*(\?\S+)?)?)?)|i', $link, $matches);
    	return $matches[4] == $_SERVER['REQUEST_URI'] ? preg_replace('|<li|', '<li class="current"', $link) : $link;
    }
    
    function nav_menu_css_class($classes, $item) {
        $title_attr = explode(' ', $item->attr_title);
        if (!empty($title_attr) && in_array(get_post_type(), $title_attr)) {
            array_push($classes, 'current-menu-item');
        }
        return $classes;
    }

    function wp_nav_menu($html) {
          $html = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item', $html, 1);
          $html = substr_replace($html, 'class="last-menu-item menu-item', strripos($html, 'class="menu-item'), strlen('class="menu-item'));
          return $html;
    }
    
	public static function img($image, $return = false) {
        $src = get_bloginfo('template_directory') . "/images/{$image}";
        
        if ($return) {
            return $src;
        }
        
        echo $src;
	}
    
    public static function get_theme_data($var = false) {
        if (!self::$_theme_data) {
            self::$_theme_data = wp_get_theme();
        }
        
        if ($var) {
            return self::$_theme_data->$var ? self::$_theme_data->$var : false;
        }
        return self::$_theme_data;
    }
    
    public static function get_top_parent($object_id = 0) {
        if (!$object_id) {
            global $post;
            if ($post) {
                $object_id = $post->ID;
            }
        }
        if ($object_id) {
            $ancestors = get_ancestors($object_id, get_post_type($object_id));
            return $ancestors ? array_pop($ancestors) : $object_id;
        }
        return false;
    }
    
    public static function is_child_of($child_id, $parent_id) {
        $ancestors = get_ancestors($child_id, get_post_type($child_id));
        return in_array($parent_id, $ancestors);
    }
    
    /*
    public static function query($args) {
	    $defaults = array(
	        'post_type' => 'post', 
	        'count' => -1, 
	        'page' => 1, 
	        'orderby' => 'menu_order', 
	        'order' => 'ASC', 
	        'meta_query' => array(), 
	        'meta_key' => false, 
	        'child_of' => false, 
	        'post_parent' => false, 
	        'post_not_in' => false
	    );
	    
	    $settings = array_merge($args, $defaults);
	    
        $args = array(
            'post_type' => $settings['post_type'], 
            'showposts' => $settings['count'], 
            'orderby' => $settings['orderby'],
            'order' => $settings['order'], 
            'paged' => $settings['page'], 
            'meta_query' => $settings['meta_query']
        );
        
        if ($settings['post_not_in']) {
            if (!is_array($settings['post_not_in'])) {
                $settings['post_not_in'] = array($settings['post_not_in']);
            }
            $args['post__not_in'] = $settings['post_not_in'];
        }

        if ($settings['meta_key']) {
            $args['meta_key'] = $settings['meta_key'];
        }

        if ($settings['child_of'] !== false) {
            $args['child_of'] = (int)$settings['child_of'];
        }

        if ($settings['post_parent'] !== false) {
            $args['post_parent'] = (int)$settings['post_parent'];
        }
        return new WP_query($args);
    }
    */
    
    function get_custom_type($type, $count = -1, $page = 1, $orderby = 'menu_order', $order = 'ASC', $meta_query = array(), $meta_key = false, $child_of = false, $post_parent = false, $post_not_in = false) {
        $args = array(
            'post_type' => $type, 
            'showposts' => $count, 
            'orderby' => $orderby,
            'order' => $order, 
            'paged' => $page, 
            'meta_query' => $meta_query
        );

        if ($post_not_in) {
            if (!is_array($post_not_in)) {
                $post_not_in = array($post_not_in);
            }
            $args['post__not_in'] = $post_not_in;
        }

        if ($meta_key) {
            $args['meta_key'] = $meta_key;
        }

        if ($child_of !== false) {
            $args['child_of'] = (int)$child_of;
        }

        if ($post_parent !== false) {
            $args['post_parent'] = (int)$post_parent;
        }
        return new WP_query($args);
    }
    
    public static function get_page_number() {
        return get_query_var('page') ? get_query_var('page') : 1;
    }
    
    function get_page_range($current_page, $max_pages) {
		if ($current_page < 3) {
				$min = 1;
				$max = 5;
		} elseif ($current_page > ($max_pages - 3)) {;
				$min = $max_pages - 4;
				$max = $max_pages;
		} else {
				$min = $current_page - 2;
				$max = $current_page + 2;
		}

		if ($min < 1) {
				$min = 1;
		}

		if ($max > $max_pages) {
				$max = $max_pages;
		}

		return array($min, $max);
    }
    
    public static function decode_bitmask($mask) {
        $return = array();

        if ($mask && is_numeric($mask)) {
            while ($mask > 0) {
                for ($i = 0, $n = 0; $i <= $mask; $i = 1 * pow(2, $n), $n++) {
                    $end = $i;
                }
                $return[] = $end;
                $mask = $mask - $end;
            }
            sort($return);
        }
        return $return;
    }
    
    public static function get_page_id($name) {
        global $wpdb;
        $name = esc_sql($name);
        $id = (int)$wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE post_name = '{$name}' AND post_status = 'publish' AND post_type = 'page'");
        if (!$id) {
            $id = -1;
        }
        return $id;
    }

    public static function set($k, &$v) {
        self::$_cache[$k] = $v;
    }
    
    public static function get($k) {
        return isset(self::$_cache[$k]) ? self::$_cache[$k] : null;
    }
    
    public static function delete($k) {
        unset(self::$_cache[$k]);
    }

    public static function store_token() {

        // @todo probably want to add csrf checks here, store a code in the session and output to js to include in ajax request

        require_once(realpath(dirname(__FILE__)) . '/google-api-client/Google_Client.php');
        require_once(realpath(dirname(__FILE__)) . '/google-api-client/contrib/Google_PlusService.php');
        require_once(realpath(dirname(__FILE__)) . '/google-api-client/contrib/Google_Oauth2Service.php');

        $client = new Google_Client();
        $client->setApplicationName("Knewton Login");
        $client->setClientId('335737504307.apps.googleusercontent.com');
        $client->setClientSecret('O4idpH8Bu7NjFt0LXGeBMu32');
        $client->setRedirectUri('postmessage');
        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email'));
        $client->setDeveloperKey('AIzaSyAVDpmyz7ANWG08jUUq7ANKeExbfVPKLwc');
        $plus = new Google_PlusService($client);
        $oauth = new Google_Oauth2Service($client);
        $client->authenticate($_POST['code']);
        $client->setAccessToken($client->getAccessToken());
        $user_data = $oauth->userinfo->get();
        $me = $plus->people->get('me');

        if (!preg_match('/@knewton\.com$/i', $user_data['email'])) {
            echo json_encode(array(
                'error' => 'knewton_only'
            ));
            die;
        }

        $wordpress_user = get_user_by('email', $user_data['email']);

        if (!$wordpress_user) {
            $found = false;
            $userdata = array(
                'user_login' => $user_data['email'],
                'user_email' => $user_data['email'],
                'user_pass' => md5(rand()),
                'first_name' => $me['name']['givenName'],
                'last_name' => $me['name']['familyName'],
                'role' => 'author',
            );

            $user_id = wp_insert_user($userdata);

            update_user_meta($user_id, 'primary_blog', get_current_blog_id());

            $wordpress_user = get_userdata($user_id);
        } else {
            $found = true;
            $user_id = $wordpress_user->ID;

            //make sure this user can access this blog, if they dont currently have a role for it
            if (!isset($wordpress_user->roles) || !$wordpress_user->roles) {
                add_user_to_blog(get_current_blog_id(), $user_id, 'author');
            }
        }

        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id, true);
        do_action('wp_login', $wordpress_user->user_login, $wordpress_user);

        echo json_encode(array(
            'found' => $found, 
            'email' => $user_data['email']
        ));

        die;
    }
}

if (class_exists('K')) {
    $k = new K();
}