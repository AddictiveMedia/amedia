<?php 
/*
Template Name: Results
*/
get_header();
?>
	
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<?php include('templates/masthead.php'); ?>	
	<?php include('templates/icon-columns.php'); ?>	
	<?php include('templates/color-block-quote.php'); ?>	
	<?php include('templates/color-block-full.php'); ?>	

<?php endwhile; endif; ?>
	
<?php get_footer(); ?>