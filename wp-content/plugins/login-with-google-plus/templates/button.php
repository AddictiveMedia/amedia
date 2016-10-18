<div class="lwgp-button-wrap gConnect">
	<div class="lwgp-button-button">
	    <button class="g-signin"
	        data-scope="https://www.googleapis.com/auth/userinfo.email"
	        data-clientId="<?php echo LWGP::get_setting('client_id') ?>"
	        data-accesstype="offline"
            data-redirecturi="postmessage"
	        data-callback="onSignInCallback"
	        data-theme="<?php echo strtolower(LWGP::get_setting('button_theme')) ?>"
	        data-cookiepolicy="none">
	    </button>
    </div>
    <div style="display:none;" class="lwgp-button-message"></div>
</div>

<script type="text/javascript">
var onSignInCallback;

(function($) {
    (function() {
    var po = document.createElement('script');
    po.type = 'text/javascript'; po.async = true;
    po.src = 'https://plus.google.com/js/client:plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
    })();

    onSignInCallback = function(authResult) {
    	if (authResult.code) {
            // Hide the sign-in button now that the user is authorized
            $('.lwgp-button-button').hide();
            $('.lwgp-button-message').html('<?php echo __('Attempting to log you in with Google+...', LWGP::$text_domain) ?>').show();
            
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/wp-admin/admin-ajax.php',
                success: function(response) {
                    if (typeof response.error != 'undefined') {
                    	$('.lwgp-button-message').html(response.error);
                    } else {
                    	if (response.found) {
                            $('.lwgp-button-message').html("<?php echo __('A WordPress user was found with email address " + response.email + ".  Logging you in now...', LWGP::$text_domain) ?>");
                        } else {
                            $('.lwgp-button-message').html("<?php echo __('No WordPress user user could be located with email address " + response.email + ".  Creating one and logging you in now...', LWGP::$text_domain) ?>");
                        }

                        setTimeout(function() {
                            window.location = response.redirect;
                        }, 2000);
                    }
                },
                data: {
                    action: 'lwgp_login', 
                    code: authResult['code'],
                }
            });
        }
    }
})(jQuery);
</script>