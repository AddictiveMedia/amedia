</section>
<?php
$flogo = get_field('footer_logo','option');
$copyright = get_field('copyright_text','option');
?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="wrapper">
		<div class="footer-logo">
			<img src="<?php echo $flogo['url']; ?>" alt="<?php bloginfo('name'); ?>" />
		</div>
		<div class="copyright">
			<?php if(!empty($copyright)): ?>
			<p><?php echo $copyright; ?></p>
			<?php endif; ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slick.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.smartTabs.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/core.js"></script>
</body>
</html>
