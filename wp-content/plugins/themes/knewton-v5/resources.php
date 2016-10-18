<?php
/*
Template Name: Resources
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
	<?php $hide_block = 'color_block_full' ?>
	<?php include('flexible-content.php'); ?>

	<div class="content-block border-top2">
		<div class="inner">

			<h3 class="gamma museo-slab-300 tac mb3">Latest From the Knewton Blog</h3>
			<div class="row-fluid span-right">

				<div class="span4 resources-sidebar mb4">
					<?php include('templates_php/resource-sidebar.php'); ?>
				</div>

				<div class="span8">
					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 1
					);

					$myposts = get_posts( $args );

					foreach ( $myposts as $post ) :
						setup_postdata( $post );

						$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-feature' );
						$caption = get_post(get_post_thumbnail_id());
						$caption = $caption->post_excerpt;

						include('templates_php/blog-post.php');

						endforeach;
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; endif; ?>
<?php $hide_block = 'color_block_third' ?>
<?php include('flexible-content.php'); ?>
<script>
	var $ = jQuery || false;
	if ($) {
		$(function() {
			$('.fancybox-media').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',
				helpers : {
					media : {}
				}
			});
		});
	}
</script>
<?php get_footer(); ?>