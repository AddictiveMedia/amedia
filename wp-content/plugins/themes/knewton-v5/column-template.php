<?php
/*
Template Name: Single Column
*/
get_header();
?>

<?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

    <?php include('templates/masthead.php'); ?>

    <div class="content-block single-column">
        <div class="inner">
            <div class="row-fluid ">
                <div class="span12 mb12">
                    <?php the_content(); ?>
                    <?php include('flexible-content.php') ?>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>