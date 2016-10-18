<?php
/*
 * Template Name: Case Studies
*/
get_header();
include('banner.php');
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
					if(have_rows('cs_content_blocks')):
						while (have_rows('cs_content_blocks')) : the_row();
							if(get_row_layout() == 'cs_single_paragraph'):
								include('cs-templates/single-paragraph.php');
							elseif(get_row_layout() == 'cs_case_study_section'):
								include('cs-templates/case-study-section.php');
							elseif(get_row_layout() == 'cs_blue_block'):
								include('cs-templates/blue-block.php');
							endif;
						endwhile;
					endif;
				?>
			</article>
		<?php endwhile; ?>
	</main>
</div>
<?php get_footer(); ?>