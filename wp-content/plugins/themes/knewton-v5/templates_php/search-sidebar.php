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
  	</script>
</div>
<?php // TODO A.R. 2015/08/26 - Fix the url for search ?>
<?php /*
<form class="mb4 resources-sidebar pr" action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
	<input id="s" placeholder="Search the blog" name="s" type="text" class="form-control resources-sidebar-search" />
	<button class="fa-search resources-sidebar-submit" type="submit"></button>
</form>
*/ ?>

<div class="sidebar-somed beta mb4">
	<div class="table table-mob">
        <a class="sidebar-somed-icon table-cell fa-twitter" href="<?php echo get_option('twitter_link'); ?>" target="_blank"></a>
        <a class="sidebar-somed-icon table-cell fa-linkedin" href="<?php echo get_option('linkedin_link'); ?>" target="_blank"></a>
        <a class="sidebar-somed-icon table-cell fa-google-plus" href="<?php echo get_option('google_link'); ?>" target="_blank"></a>
        <a class="sidebar-somed-icon table-cell fa-facebook" href="<?php echo get_option('facebook_link'); ?>" target="_blank"></a>
	</div>
</div>

<ul id="category-list" class="mb4 zeta museo-sans-500 black-links">
        <li class="category-list-li"><a href="/blog/adaptive-learning/">Adaptive Learning</a></li>
        <li class="category-list-li"><a href="/blog/ceo-jose-ferreira/">CEO Jose Ferreira</a></li>
        <li class="category-list-li"><a href="/blog/ed-tech/">Ed Tech</a></li>
        <li class="category-list-li"><a href="/blog/ed-tech-101/">Ed Tech 101</a></li>
        <li class="category-list-li"><a href="/blog/education-infographics/">Education Infographics</a></li>
        <li class="category-list-li"><a href="/blog/education-videos/">Education Videos</a></li>
        <li class="category-list-li"><a href="/blog/knerds/">Knerds</a></li>
        <li class="category-list-li"><a href="/blog/student-resources/">Student Resources</a></li>
        <li class="category-list-li"><a href="/blog/teacher-feature/">Teacher Feature</a></li>
        <li class="category-list-li"><a href="/blog/teacher-tools/">Teacher Tools</a></li>
</ul>