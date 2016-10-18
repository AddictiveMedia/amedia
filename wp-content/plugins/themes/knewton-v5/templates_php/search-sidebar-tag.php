<a class="btn med bg-turq1 color-btn block mb3" id="newsletter-signup" href="javascript:void(0);">Subscribe to Newsletter</a>

<div id="newsletter-form" class="mb4">
    <p class="mb2">Our monthly newsletter features edtech and product updates, with a healthy dose of fun Knerd news.</p>
    <script charset="utf-8" src="//js.hubspot.com/forms/current.js"></script>
	<script>
		hbspt.forms.create({
			css: '',
			portalId: '214594',
			formId: 'b8d09a7a-10c4-4311-aaa3-a605298c5594',
			submitButtonClass: 'btn color-btn bg-turq1 button-primary',
			pageId: 'blog-sidebar',
			scrollToFirstError: false,
			formInstanceId: 'sidebar',
			onFormReady: function(form, ctx) {
				var $ = jQuery;

				$('input[type="email"]', form).removeClass('hs-input').attr('id', 'email');
				$('label', form).hide();
		    	$(form).removeClass('hs-form').removeClass('stacked').css('display', 'inline-block');
		    	$(form).parent().css('display', 'inline-block');
		    	$('div', form).css('display', 'inline-block');
		    	$('input[type="email"]', form).attr('placeholder', 'Email address');
			}
		});

		jQuery(document).ready(function($){
			$('#newsletter-signup').click(function() {
				$(this).hide();
				$('#newsletter-form').show();
			});
		});
  	</script>
</div>

<div class="sidebar-somed beta mb4">
	<div class="table table-mob">
		<a class="sidebar-somed-icon table-cell fa-twitter" href="<?php echo get_option('twitter_link'); ?>"></a>
		<a class="sidebar-somed-icon table-cell fa-linkedin" href="<?php echo get_option('linkedin_link'); ?>"></a>
		<a class="sidebar-somed-icon table-cell fa-google-plus" href="<?php echo get_option('google_link'); ?>"></a>
		<a class="sidebar-somed-icon table-cell fa-facebook" href="<?php echo get_option('facebook_link'); ?>"></a>
	</div>
</div>

<ul id="category-list" class="mb4 zeta museo-sans-500 black-links">
    <?php $tags = get_tags() ?>
    <?php foreach ($tags as $tag): ?>
        <li class="category-list-li"><a href="<?php echo get_term_link($tag) ?>"><?php echo ucwords($tag->name) ?></a></li>
    <?php endforeach ?>
</ul>