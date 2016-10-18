<?php 
    get_header();
    global $wp_query;
    $step1 = '';
    $step2 = ' display-none';
    $referrer_url = false;

    if (isset($_GET['email']) && $email = $_GET['email']) {
        //get this user's referrer id
        $referrer_url = knewton_get_referrer_url_by_email($email, true);

        if ($referrer_url) {
            $step1 = ' display-none';
            $step2 = '';
        }
    }
?><div id="page-content">
    <div <?php if (!isset($_GET['beta-overlay'])): ?>class="container"<?php endif ?> id="anticipation"<?php if (isset($_GET['beta-overlay'])): ?> style="width:570px;"<?php endif ?>>
        <div <?php if (!isset($_GET['beta-overlay'])): ?>class="row"<?php endif ?>>
            <?php if (!isset($_GET['beta-overlay'])): ?>
                <div class="span4 offset1" id="anticipation-logo-wrap">
                    <img id="anticipation-logo" src="<?php K::img('anticipation-logo.jpg') ?>" />
                </div>
            <?php endif ?>
            <div class="<?php if (!isset($_GET['beta-overlay'])): ?>span6<?php endif ?> step<?php echo $step1 ?>" id="step1">
                <script type="text/javascript">
                  var odometer_count;
                  var od;
                  
                  jQuery(function() {

                    od = new Odometer({
                      el: document.querySelector('.odometer'),
                      value: 1,
                      duration: 3000
                    });

                    odometer_count = <?php echo knewton_get_anticipation_count() ?>;

                    od.update(odometer_count);

                    jQuery('#referrer_url').on('click', select_text);

                    function select_text() {
                        if (document.selection) {
                            var range = document.body.createTextRange();
                            range.moveToElementText(this);
                            range.select();
                        } else if (window.getSelection) {
                            var range = document.createRange();
                            range.selectNodeContents(this);
                            window.getSelection().removeAllRanges();
                            window.getSelection().addRange(range);
                        }
                    }

                    //preload the arrows
                    var up_arrow = new Image();
                    up_arrow.src = '/wp-content/themes/knewton-v3/images/arrow-up.jpg';
                    var down_arrow = new Image();
                    down_arrow.src = '/wp-content/themes/knewton-v3/images/arrow-down.jpg';

                    jQuery('#toggle-email').click(function() {
                        if (jQuery(this).hasClass('closed')) {
                            jQuery(this).removeClass('closed').addClass('open').text('Hide sample email');
                            jQuery('#sample-email').slideDown();
                        } else {
                            jQuery(this).removeClass('open').addClass('closed').text('Show sample email');
                            jQuery('#sample-email').slideUp();
                        }
                    });

                    jQuery('#sample-email').click(select_text);

                    jQuery('#open-tweet').click(function() {
                        var width  = 575,
                        height = 400,
                        left   = (jQuery(window).width()  - width)  / 2,
                        top    = (jQuery(window).height() - height) / 2,
                        url    = 'http://twitter.com/intent/tweet?text=' + encodeURIComponent('I signed up to try the @Knewton open platform with free adaptive learning. Reserve your spot with my link: ' + jQuery('#referrer_url').html()),
                        opts   = 'status=1' +
                                 ',width='  + width  +
                                 ',height=' + height +
                                 ',top='    + top    +
                                 ',left='   + left;
                    
                        window.open(url, 'twitter', opts);
                    });

                    jQuery('#open-facebook').click(function() {
                        var width  = 560,
                        height = 320,
                        left   = (jQuery(window).width()  - width)  / 2,
                        top    = (jQuery(window).height() - height) / 2,
                        url    = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(jQuery('#referrer_url').html()),
                        opts   = 'status=1' +
                                 ',width='  + width  +
                                 ',height=' + height +
                                 ',top='    + top    +
                                 ',left='   + left;
                    
                        window.open(url, 'facebook', opts);
                    });

                  });

                  var referrer_id;
                  hbspt.forms.create({ 
                    portalId: '214594',
                    formId: 'd11c156e-2a78-459f-8bb1-4a04e2e30009',
                    submitButtonClass: 'button button-primary',
                    pageId: 'anticipation',
                    scrollToFirstError: false,
                    formInstanceId: 'anticipation',
                    onFormReady: function(form, ctx) {
                        var $ = jQuery;
                        $('input[type="email"]', form).removeClass('hs-input').attr('id', 'footer-email');
                        $('label', form).hide();
                        $(form).removeClass('hs-form').removeClass('stacked').css('display', 'inline');
                        $(form).parent().css('display', 'inline');
                        $('div', form).css('display', 'inline');
                        $('input[type="email"]', form).attr('placeholder', 'Email address');
                        $('fieldset').css('display', 'inline');

                        var referrer_id_field = $('input[name="referrer_id"]', form);
                        var referred_by_id_field = $('input[name="referred_by"]', form);

                        referred_by_id_field.val('<?php echo $wp_query->query['referrer_id'] ?>');

                        //set up some submit hooks for this form so we can do some manaul checking and validation before allowing the submission
                        var ajax_running = false;
                        var in_event = false;
                        $(form).on('submit', function() {

                            if (in_event) {
                                return true;
                            }
                            
                            if (ajax_running) {
                                return false;
                            }

                            var email = $('input[type="email"]', form).val();
                            if (email && email.match(/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i)) {
                                ajax_running = true;
                                $('.mask').fadeIn('fast');


                                $.get(knewton_data.ajaxurl.replace(/https?/, 'https'), {
                                    email:email,
                                    action: 'knewton_get_referrer_url'
                                }, function(response) {
                                    
                                    in_event = true;

                                    var ret;
                                    switch (response.status) {
                                        case 'new':
                                        case 'update':
                                            //new or existing contact, needs the referrer id updated and the form to submit
                                            referrer_id_field.val(response.referrer_id);
                                            ret = true;
                                            break;

                                        case 'existing':
                                            //existing contact who already has a referrer id, don't let form submit
                                            ret = false;
                                            break;

                                        case 'error':
                                        default:
                                            //something went wrong
                                            ret = false;
                                            break;
                                    }

                                    //if i need to submit the form, since the return false already ran before the async ajax, need to submit it manually
                                    if (ret) {
                                        $(form).submit();
                                    }

                                    ajax_running = false;
                                    in_event = false;
                                    $('#referrer_url').html('https://www.knewton.com/beta-join/' + response.referrer_id + '/');
                                    $('#email-url').html('https://www.knewton.com/beta-join/' + response.referrer_id + '/');
                                    $('#step1').hide();
                                    $('#step2').show();
                                    $('.mask').fadeOut('fast');

                                }, 'json');

                                return false;
                            }
                        }); 
                    }
                  });
                </script>

                <div id="counter">
                    <strong class="odometer"></strong> people joined so far!
                </div>
            </div>
            <div class="<?php if (!isset($_GET['beta-overlay'])): ?>span7<?php endif ?> step<?php echo $step2 ?>" id="step2">
                <h1>Spread the word!</h1>
                <p>Here is your unique referral link.  Copy and paste it into an email or share with your friends to get an account sooner!</p>
                <div id="referrer_url"><?php echo $referrer_url ?></div>
                <div id="links">
                    <?php if (!isset($_GET['beta-overlay'])): ?>
                        <div class="pull-left">
                            <a class="first closed" id="toggle-email" href="javascript:void(0);">Show sample email</a>
                        </div>
                    <?php endif ?>
                    <div class="pull-right social-wrap">
                        Share your link: 
                        <a href="javascript:void(0);" id="open-tweet"><img src="<?php K::img('anticipation-twitter.jpg') ?>" /></a>
                        <a href="javascript:void(0);" id="open-facebook"><img src="<?php K::img('anticipation-facebook.jpg') ?>" /></a>
                    </div>
                </div>
                <div id="sample-email" class="clearfix">
                    Hey,<br />
                    <br />
                    I've reserved a spot in line for Knewton's new open platform (it's free!). As space opens up, they're issuing registration links.<br />
                    <br />
                    I'm spreading the word so you can snag a spot. Sign up!<br />
                    <br />
                    <span id="email-url"><?php echo $referrer_url ?></span>
                </div>
            </div>
        </div>
        <div class="mask"><p>Please wait...</p></div>
    </div>
</div>
<?php get_footer() ?>