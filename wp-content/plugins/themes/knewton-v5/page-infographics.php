<?php get_header(); ?>

<?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
    <?php $title = 'Knewton Infographics'; ?>
    <?php include('templates_php/masthead.php'); ?>
    <?php include('flexible-content.php'); ?>

    <div class="content-block">
        <div class="inner group">
            <div class="grid-4-3-2-1 group">
                <?php $infographics = knewton_get_infographics() ?>
                <?php foreach ($infographics as $infographic): ?>
                    <?php $thumb = get_field('thumbnail', $infographic->ID) ?>
                    <div class="grid-4-3-2-1-item">
                        <div class="grid-4-3-2-1-item-inner">
                            <a class="border-card" href="<?php echo get_permalink($infographic->ID) ?>">
                                <img class="img-responsive border-card-img" src="<?php echo $thumb['url']; ?>" />
                                <div class="border-card-table table table-mob">
                                    <h2 class="border-card-text" style="position:relative;top:-10px;">
                                        <?php echo get_the_title($infographic->ID); ?>
                                    </h2>
                                </div>
                            </a>
                            <br />
                            <div style="position:relative;top:-60px;">
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                <a href="https://twitter.com/share" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://twitter.com/share']);" class="twitter-share-button" data-url="<?php echo get_permalink($infographic->ID) ?>" data-via="Knewton" data-text="<?php echo $infographic->post_title ?>">Tweet</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
        </div> <!-- inner -->
    </div> <!-- content-block -->
<?php endwhile; endif; ?>

<?php get_footer(); ?>