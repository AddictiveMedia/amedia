<?php
/*
 * Template Name: Our Offering
*/
get_header();
include('banner.php');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					if(have_rows('offer_content_block')):
						while (have_rows('offer_content_block')) : the_row();
							if(get_row_layout() == 'image_full_text_block'):
								include('offer-templates/image-full-text-block.php');
							elseif(get_row_layout() == 'off_image_text_wrap'):
								include('offer-templates/img-text-wrap.php');
							elseif(get_row_layout() == 'off_image_text_wrap_with_tab'):
								include('offer-templates/img-text-wrap-with-tab.php');
							elseif(get_row_layout() == 'off_videos_section'):
								include('offer-templates/video-section.php');
							elseif(get_row_layout() == 'off_support_tabs_block'):
								include('offer-templates/support-tabs.php');
							endif;
						endwhile;
					endif;
				?>
			</article>
		<?php endwhile; ?>
	</main>
</div>
<?php get_footer(); ?>