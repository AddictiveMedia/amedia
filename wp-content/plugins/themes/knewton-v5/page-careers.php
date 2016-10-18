<?php
/*
Template Name: Careers
*/
get_header();
?>

<?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
    <?php include('templates_php/masthead.php'); ?>

    <?php include('flexible-content.php'); ?>

    <div class="content-block">
        <div class="inner">
            <?php include('templates_php/careers.php'); ?>
        </div> <!-- inner -->
    </div> <!-- content-block -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>