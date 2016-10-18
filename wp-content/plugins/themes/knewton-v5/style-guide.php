<?php
/*
Template Name: Style Guide
*/
get_header();
?>

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<?php include('templates/masthead.php'); ?>

	<?php if(get_the_content()) : ?>
	<div class="content-block">
		<div class="inner">
			<div class="body-text">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php include('flexible-content.php'); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>