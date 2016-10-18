<?php
get_header();
?>

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<?php include('templates/masthead.php'); ?>

	<div class="content-block">
		<div class="inner">
			<?php the_content(); ?>
		</div>
	</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>