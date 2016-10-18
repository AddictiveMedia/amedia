<?php
/*
Plugin Name: Log In With Google Plus
Plugin URI: http://www.knewton.com
Description: Allow users to request access to your website using Google Plus
Version: 1.0
Author: Jon Tascher
Author URI: http://www.knewton.com
*/

if (!class_exists('LWGP')) {

	ob_start();

	register_activation_hook(__FILE__, array('LWGP', 'activate'));

	class LWGP {

		public static $text_domain = 'LWGP';
		private static $_settings;

		public function __construct() {
			add_action('plugins_loaded', array(&$this, 'plugins_loaded'));
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('admin_menu', array(&$this, 'admin_menu'));
			add_action('wp_ajax_lwgp_login', array(&$this, 'store_token'));
			add_action('wp_ajax_nopriv_lwgp_login', array(&$this, 'store_token'));
			add_action('login_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
			add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));

	        if (self::get_setting('auto_add_to_login') === '1') {
	        	add_action('login_form', array(&$this, 'login_form'));
	        }

			$shortcodes = array(
				'lwgp-button',
			);

			foreach ($shortcodes as $shortcode) {
				add_shortcode($shortcode, array(&$this, 'handle_shortcode'));
			}
		}

		public function login_form() {
			echo '<div id="lwgp-button-wrap" style="float:right;padding-top:20px;clear:both;">' . self::get_button() . '</div>';
			echo <<<EOT
<script type="text/javascript">
	(function($) {
		$(function() {
			var button = $('#lwgp-button-wrap').detach();
			$('#wp-submit').after(button);
		});
	})(jQuery);
</script>
EOT;
		}

		public function admin_enqueue_scripts() {
			wp_enqueue_script('jquery');
		}

		public function activate() {
			$button_theme = self::get_setting('button_theme');
			if (!$button_theme) {
				self::update_setting('button_theme', 'light');
			}

			$auto_add_to_login = self::get_setting('auto_add_to_login');
			if ($auto_add_to_login !== '1') {
				self::update_setting('auto_add_to_login', '1');
			}
		}

		public static function get_plugin_url() {
			return plugins_url(plugin_basename(dirname(__FILE__)));
		}
		
		public static function get_plugin_path() {
			return preg_replace('|^http://[^/].*?/|i', '/', plugins_url(plugin_basename(dirname(__FILE__))));
		}

		public function plugins_loaded() {
			 load_plugin_textdomain('lwgp', false, basename(self::get_plugin_path()) . '/languages');
		}

		public function admin_menu() {
			add_options_page(__('LWGP Settings', self::$text_domain), __('LWGP Settings', self::$text_domain), 'manage_options', 'lwgp-options', array(&$this, 'admin_options'));
		}

		public function admin_init() {
			register_setting('lwgp', 'lwgp');
			register_setting('lwgp_settings', 'lwgp_settings');
		}

		public function admin_options() {
			include('templates/options.php');
		}

		public static function get_setting($setting) {
            
            if (!is_array(self::$_settings)) {
                self::$_settings = get_option('lwgp_settings');
            }
            
            return isset(self::$_settings[$setting]) ? self::$_settings[$setting] : null;
        }
        
        public static function update_setting($setting, $value) {
            self::$_settings[$setting] = $value;
            update_option('lwgp_settings', self::$_settings);
        }

		public function handle_shortcode($args, $content, $shortcode) {
			$shortcode = trim(strtolower($shortcode));
		    ob_start();

		    switch ($shortcode) {
		    	case 'lwgp-button':
		    		self::get_button(true);
		    		break;
		    }

		    $html = ob_get_contents();
		    ob_clean();
		    return $html;
		}

		/**
		 * Use this function as a template tag if you don't want to use the [lwgp-button] shortcode
		 * You can use it in a theme with <?php echo LWGP::get_button() ?>
		 */
		public static function get_button($echo = false) {

			ob_start();
			require('templates/button.php');
			$button = ob_get_contents();
		    ob_clean();

		    if ($echo) {
		    	echo $button;
		    } else {
		    	return $button;
		    }
		}

		public function store_token() {
			require_once(realpath(dirname(__FILE__)) . '/google-api-client/Google_Client.php');
	        require_once(realpath(dirname(__FILE__)) . '/google-api-client/contrib/Google_PlusService.php');
	        require_once(realpath(dirname(__FILE__)) . '/google-api-client/contrib/Google_Oauth2Service.php');

	        $client = new Google_Client();
	        $client->setApplicationName(self::get_setting('application_name'));
	        $client->setClientId(self::get_setting('client_id'));
	        $client->setClientSecret(self::get_setting('client_secret'));
	        $client->setRedirectUri('postmessage');
	        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.email'));
	        $client->setDeveloperKey(self::get_setting('developer_key'));
	        $plus = new Google_PlusService($client);
	        $oauth = new Google_Oauth2Service($client);
	        $client->authenticate($_POST['code']);
	        $client->setAccessToken($client->getAccessToken());
	        $user_data = $oauth->userinfo->get();
	        $me = $plus->people->get('me');

	        $domain_ok = true;
	        $allowed_domains = self::get_setting('allowed_domains');
	        if (strlen($allowed_domains)) {
	        	$domain_ok = false;
	        	$allowed_domains = explode(',', $allowed_domains);
	        	foreach ($allowed_domains as $domain) {
	        		$domain = trim($domain);
	        		if (preg_match('/@' . preg_quote($domain, '/') . '$/i', $user_data['email'])) {
	        			$domain_ok = true;
	        			break;
	        		}
	        	}
	        }

	        if (!$domain_ok) {
	        	echo json_encode(array(
	        		'error' => __('Invalid email domain.', LWGP::$text_domain)
        		));
        		die;
	        }

	        $wordpress_user = get_user_by('email', $user_data['email']);

	        $allow_user_creation = LWGP::get_setting('allow_user_creation');

	        if ($allow_user_creation !== '1' && !$wordpress_user) {
	        	echo json_encode(array(
	        		'error' => __('New account creation has been disabled.', LWGP::$text_domain)
        		));
        		die;
	        }

	        if (!$wordpress_user) {
	            $found = false;
	            $role = LWGP::get_setting('new_user_role');
	            if (!$role) {
	            	$role = get_option('default_role');
	            }
	            $userdata = array(
	                'user_login' => $user_data['email'],
	                'user_email' => $user_data['email'],
	                'user_pass' => md5(rand()),
	                'first_name' => $me['name']['givenName'],
	                'last_name' => $me['name']['familyName'],
	                'role' => strtolower($role)
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

	        $redirect = self::get_setting('redirect_url');
	        if (!$redirect) {
	        	$redirect = '/wp-admin/';
	        }

	        echo json_encode(array(
	            'found' => $found, 
	            'email' => $user_data['email'],
	            'redirect' => $redirect
	        ));

	        die;


		}
	}

	$LWGP = new LWGP;
}