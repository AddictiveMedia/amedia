<?php
	if(is_admin()) {
		add_action('admin_menu', 'add_barestrap_settings');
				
		function add_barestrap_settings() {
			$blog_title = get_bloginfo('name');
			$settings_title = $blog_title . ' Theme Settings';
		
			add_options_page($settings_title, $settings_title, 'manage_options', 'functions', 'global_custom_options');
		}
		
		function global_custom_options() {
?>
	
		<div class="wrap">
			<div id="icon-themes" class="icon32"><br></div>
			<h2><?php bloginfo('name'); ?> Theme Settings (please include "http://" in all URLs)</h2>
			
			<form method="post" action="options.php">
				<?php wp_nonce_field('update-options') ?>
				<p>
					<strong>Google Link:</strong><br/>
					<input type="text" name="google_link" size="45" value="<?php echo get_option('google_link'); ?>" />
				</p>
	
				<p>
					<strong>LinkedIn Link</strong><br/>
					<input type="text" name="linkedin_link" size="45" value="<?php echo get_option('linkedin_link'); ?>" />
				</p>
	
				<p>
					<strong>Twitter Link</strong><br/>
					<input type="text" name="twitter_link" size="45" value="<?php echo get_option('twitter_link'); ?>" />
				</p>
	
				<p>
					<strong>Facebook Link</strong><br/>
					<input type="text" name="facebook_link" size="45" value="<?php echo get_option('facebook_link'); ?>" />
				</p>
	
				<p>
					<strong>Youtube Link</strong><br/>
					<input type="text" name="youtube_link" size="45" value="<?php echo get_option('youtube_link'); ?>" />
				</p>

				<p>
					<strong>Pinterest Link</strong><br/>
					<input type="text" name="pinterest_link" size="45" value="<?php echo get_option('pinterest_link'); ?>" />
				</p>
									
				<p>
					<strong>Phone Number</strong><br/>
					<input type="text" name="site_phone" size="45" value="<?php echo get_option('site_phone'); ?>" />
				</p>
	
				<p>
					<strong>Email</strong><br/>
					<input type="text" name="site_email" size="45" value="<?php echo get_option('site_email'); ?>" />
				</p>
												
				<p><input class="button action" type="submit" name="Submit" value="Save Settings" /></p>
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="google_link,linkedin_link,twitter_link,facebook_link,youtube_link,pinterest_link,site_phone,site_email" />
			</form>
		</div>
		
	<?php
		}
	}
?>