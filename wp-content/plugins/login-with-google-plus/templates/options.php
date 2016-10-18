<div id="wpbody">
	<div id="wpbody-content" aria-label="Main content" tabindex="0">
		<div class="wrap">
			<div id="icon-users" class="icon32">
				<br />
			</div>
			<h2><?php _e('Log In With Google Plus - Settings', LWGP::$text_domain) ?></h2>

			<br clear="all" />

			<form method="post" action="options.php"> 
				<?php settings_fields('lwgp_settings') ?>
				<?php $options = get_option('lwgp_settings') ?>

				<table class="form-table">
		            <tbody>

			            <tr>
		                    <th>
		                        <label for="redirect_url"><?php echo __('Redirect URL', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<input type="text" name="lwgp_settings[redirect_url]" id="redirect_url" class="large-text" value="<?php echo $options['redirect_url'] ?>" />
		                    	<br />
		                    	<small><?php echo __('This determines where users are sent after successfully logging in.  You can enter a full URL with http:// or a path like /redirect/to/here/', LWGP::$text_domain) ?></small>
		                    </td>
		                </tr>

			            <tr>
		                    <th>
		                        <label for="application_name"><?php echo __('Application Name', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<input type="text" name="lwgp_settings[application_name]" id="application_name" class="large-text" value="<?php echo $options['application_name'] ?>" />
		                    </td>
		                </tr>

						<tr>
		                    <th>
		                        <label for="client_id"><?php echo __('Client ID', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<input type="text" name="lwgp_settings[client_id]" id="client_id" class="large-text" value="<?php echo $options['client_id'] ?>" />
		                    </td>
		                </tr>

		                <tr>
		                    <th>
		                        <label for="client_secret"><?php echo __('Client Secret', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<input type="text" name="lwgp_settings[client_secret]" id="client_secret" class="large-text" value="<?php echo $options['client_secret'] ?>" />
		                    </td>
		                </tr>

		                <tr>
		                    <th>
		                        <label for="developer_key"><?php echo __('Developer Key', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<input type="text" name="lwgp_settings[developer_key]" id="developer_key" class="large-text" value="<?php echo $options['developer_key'] ?>" />
		                    </td>
		                </tr>

		                <tr>
		                    <th>
		                        <label for="button_theme"><?php echo __('Button Theme', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<select name="lwgp_settings[button_theme]">
		                    		<option value="light"<?php echo $options['button_theme'] == 'light' ? ' selected' : '' ?>><?php echo __('Light', LWGP::$text_domain) ?></option>
		                    		<option value="dark"<?php echo $options['button_theme'] == 'dark' ? ' selected' : '' ?>><?php echo __('Dark', LWGP::$text_domain) ?></option>
		                    	</select>
		                    </td>
		                </tr>

		                 <tr>
		                    <th>
		                        <label for="auto_add_to_login"><?php echo __('Auto insert button on WordPress login page', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<input type="checkbox" id="auto_add_to_login" name="lwgp_settings[auto_add_to_login]" value="1"<?php echo (isset($options['auto_add_to_login']) && $options['auto_add_to_login']) ? ' checked' : '' ?>/>
		                    	<small>You can manually add the button in other locations using a Template Tag <code><?php echo htmlspecialchars('<?php echo LWGP::get_button() ?>') ?></code> or shortcode <code>[lwgp-button]</code>, see plugin instructions for more details</small>
		                    </td>
		                </tr>

		                 <tr>
		                    <th>
		                        <label for="allowed_domains"><?php echo __('Limit users to the following domains', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<input type="text" name="lwgp_settings[allowed_domains]" id="allowed_domains" class="large-text" value="<?php echo $options['allowed_domains'] ?>" />
		                    	<br />
		                    	<small><?php echo __('Leave blank to allow all domains, or supply a comma separated list, eg, domain1.com, domain2.com', LWGP::$text_domain) ?></small>
		                    </td>
		                </tr>

		                <tr id="allow_user_creation_tr">
		                    <th>
		                        <label for="allow_user_creation"><?php echo __('Allow plugin to create new WordPress users', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
		                    	<input type="checkbox" id="allow_user_creation" name="lwgp_settings[allow_user_creation]" value="1"<?php echo (isset($options['allow_user_creation']) && $options['allow_user_creation']) ? ' checked' : '' ?>/>
		                    </td>
		                </tr>

		                <tr id="new_user_role_tr"<?php echo (isset($options['allow_user_creation']) && $options['allow_user_creation']) ? '' : ' style="display:none;"' ?>>
		                    <th>
		                        <label for="new_user_role"><?php echo __('Select role for new users', LWGP::$text_domain) ?></label>
		                    </th>
		                    <td>
			                    <select name="lwgp_settings[new_user_role]" id="new_user_role">
				                    <?php global $wp_roles ?>
				                	<?php foreach (apply_filters('editable_roles', $wp_roles->roles) as $role): ?>
				                		<?php $selected = $role['name'] == $options['new_user_role'] ? ' selected' : '' ?>
				                		<option value="<?php echo $role['name'] ?>"<?php echo $selected ?>><?php echo $role['name'] ?></option>
					                <?php endforeach ?>
			                    </select>
		                    </td>
		                </tr>

	                </tbody>
                </table>
                <script type="text/javascript">
                	(function($) {
                		$(function() {
                			$('#allow_user_creation_tr').on('change', 'input[type=checkbox]', function() {
                				if ($(this).is(':checked')) {
                					$('#new_user_role_tr').show();
                				} else {
                					$('#new_user_role_tr').hide();
                				}
                			});
                		});
                	})(jQuery);
                </script>
                <p class="submit">
		            <input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', LWGP::$text_domain) ?>">
		        </p>
            </form>
		</div>
	</div>
</div>