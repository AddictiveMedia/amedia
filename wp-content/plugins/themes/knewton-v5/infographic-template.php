<?php
/*
Template Name: Infographic
*/
get_header();
    if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
    <?php $title = 'Knewton Infographics'; ?>
    <?php include('templates_php/masthead.php'); ?>
    <?php include('flexible-content.php'); ?>

    <div class="content-block infographic">
        <div class="inner">
            <h1 style="font-weight:300;font-size:26px;line-height:32px;"><?php the_title() ?></h1>
            <?php the_content() ?>
            <br />
            <?php include('templates_php/infographic-share.php') ?>
            <br clear="all" /><br />

            <a href="<?php the_permalink() ?>"><img src="<?php the_field('infographic_url') ?>" /></a>
            <br /><br />

            <?php include('templates_php/infographic-share.php') ?>
            <br clear="all" /><br />
            <p><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php the_permalink() ?>" num_posts="10" width="1000"></fb:comments></p>
        </div> <!-- inner -->
    </div> <!-- content-block -->

    <div class="content-block color-block color-block-full bg-turq1">
        <div class="inner">
            <p>Knewton.com gives students personalized Math, Biology and English lessons made smart and easy. Signup is free.</p>
            <a class="btn btn-caret color-block-btn med bg-turq1-hover" href="/">Explore Knewton</a>
        </div>
    </div>

<?php endwhile; endif; ?>



<?php get_footer(); ?>