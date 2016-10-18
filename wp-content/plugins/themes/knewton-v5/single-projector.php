<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<title>Knewton Dashboards</title>
		<meta name="robots" content="noindex,nofollow,noodp,noydir"/>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

		<style type="text/css">
			body, html { margin: 0; padding: 0; width: 100%; height: 100%; overflow:hidden; }
			iframe { border: none; }
		</style>

		<?php while (have_posts()): ?>
			<?php the_post() ?>
			<?php global $post ?>

			<?php $urls = knewton_get_urls_for_projector() ?>

			<?php $index = isset($_GET['i']) ? $_GET['i'] : 0 ?>
			<?php $index = isset($urls[$index]) ? $index : 0 ?>

			<?php $old_key = isset($_GET['key']) ? $_GET['key'] : '' ?>
			<?php $new_key = $urls['key'] ?>

			<?php $index = $old_key == $new_key ? $index : 0 ?>

			<?php $url = $urls[$index] ?>
			<?php $image = isset($url['upload_image']) && $url['upload_image'] ?>
		<?php endwhile ?>

		<script type="text/javascript">
			(function($) {
				$(function() {
					setTimeout(function() {
						var a = document.createElement('a');
						a.href = window.location.href;
						var url = a.protocol + '//' + a.host + a.pathname + '?i=' + <?php echo ++$index ?> + '&key=' + '<?php echo $new_key ?>';
						window.location = url;
					}, <?php echo $url['time_to_display'] * 1000 ?>);
				});
			})(jQuery);
		</script>

	</head>
	<body bgcolor="<?php echo $url['background_color'] ?>">
		<?php if ($image): ?>
			<img src="<?php echo $url['upload_image']['url'] ?>" style="width:1920px;display:block;margin:0 auto;" />
		<?php else: ?>
			<iframe width="100%" src="<?php echo $url['url'] ?>" height="<?php echo $url['height'] ?>" scrolling="no" border="no"></iframe>
		<?php endif ?>
	</body>
</html>