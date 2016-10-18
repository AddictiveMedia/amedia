			</div>

		</div> <!-- content -->

		<footer class="footer" id="footer">
		    <div class="inner">
		        <div class="row-fluid">
		            <div class="span2">
		                <ul>
		                    <li>Our Approach</li>
		                    <li><a href="/approach/platform/">Platform</a></li>
		                    <li><a href="/approach/results/">Results</a></li>
		                    <li><a href="/approach/products/">Products</a></li>
		                    <li><a href="/approach/partners/">Partners</a></li>
		                </ul>
		            </div>
		            <div class="span2">
		                <ul>
		                    <li>About</li>
		                    <li><a href="/about/team/">Team</a></li>
		                    <li><a href="/about/investors/">Investors</a></li>
		                    <li><a href="/about/careers/">Careers</a></li>
		                    <li><a href="/about/contact/">Contact</a></li>
		                </ul>
		            </div>
		            <div class="span2">
		                <ul>
		                    <li>Resources</li>
		                    <li><a href="/resources/blog/">Knewton Blog</a></li>
		                    <li><a href="/resources/press/">Press</a></li>
		                    <li><a href="/resources/privacy/">Privacy</a></li>
		                    <li><a href="/resources/terms/">Terms of Service</a></li>
		                </ul>
		            </div>
		            <div class="footer-somed">
		                <ul>
		                    <li>
						        <a class="footer-somed-icon fa-twitter" href="<?php echo get_option('twitter_link'); ?>" target="_blank"></a>
						        <a class="footer-somed-icon fa-linkedin" href="<?php echo get_option('linkedin_link'); ?>" target="_blank"></a>
						        <a class="footer-somed-icon fa-google-plus" href="<?php echo get_option('google_link'); ?>" target="_blank"></a>
						        <a class="footer-somed-icon fa-facebook" href="<?php echo get_option('facebook_link'); ?>" target="_blank"></a>
		                    </li>
		                    <li>
		                        <a href="http://tech.knewton.com/blog" class="nchoosekay">N Choose K Blog</a>
		                    </li>
		                    <li>
		                        <a href="/identity/" class="nchoosekay">Brand Identity Guidelines</a>
		                    </li>
		                </ul>
		            </div>
		        </div>

				<a class="footer-logo-link">
					<img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logo-white.png" />
				</a>
			</div> <!-- inner -->
		</footer>
		<?php wp_footer(); ?>
		<?php include(realpath(dirname(__FILE__)) . '/assets/includes/footer_tracking_code.php') ?>
	</body>
</html>

<?php ob_get_flush(); ?>