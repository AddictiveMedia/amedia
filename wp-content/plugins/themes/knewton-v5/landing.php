<?php 
/*
Template Name: Landing
*/
get_header();
?>
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<?php include('templates/masthead.php'); ?>
	<?php include('templates/column-switch.php'); ?>
	<?php include('templates/color-block-half.php'); ?>
		
<?php endwhile; endif; ?>

<?php get_footer(); ?>