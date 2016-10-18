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
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/nav.js"></script>
</body>
</html>
