<?php
/*
Template Name: Press
*/
get_header();
?>
<?php include('templates_php/masthead.php'); ?>

<div class="content-block">
	<div class="inner">
		<div class="row-fluid span-right">`
			<div class="span4 sidebar mb3">
				<h3 class="zeta caps museo-sans-900">Contact Us</h3>
				<p class="mb2">For press inquiries contact <a href="mailto:press@knewton.com">press@knewton.com</a></p>
				<p class="mb4">For Knewton logos and branding guidelines, please visit <a href="/identity/">knewton.com/identity</a></p>
				<h3 class="zeta caps museo-sans-900">Follow Knewton</h3>
				<div class="sidebar-somed beta mb4">
				    <div class="table table-mob">
				        <a class="sidebar-somed-icon table-cell fa-twitter" href="<?php echo get_option('twitter_link'); ?>" target="_blank"></a>
				        <a class="sidebar-somed-icon table-cell fa-linkedin" href="<?php echo get_option('linkedin_link'); ?>" target="_blank"></a>
				        <a class="sidebar-somed-icon table-cell fa-google-plus" href="<?php echo get_option('google_link'); ?>" target="_blank"></a>
				        <a class="sidebar-somed-icon table-cell fa-facebook" href="<?php echo get_option('facebook_link'); ?>" target="_blank"></a>
				    </div>
				</div>
			</div>

			<div class="span8 mb9">
				<?php global $paged; ?>
				<?php if ($paged == 1 || $paged == 0): ?>
					<!-- TODO: remove slideshow for now, get it working after launch -->
				<?php endif ?>
				<a href="/resources/press/?type=press-release">Press Releases Only</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/resources/press/">See All</a>
				<br clear="all" /><br />
				<div class="border-top2 border-bottom2">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php $link = get_permalink() ?>
					<?php $new_window = preg_match('|^https?://(www\.)?knewton|i', $link) ? '' : ' target="_blank"'; ?>
					<article class="row-fluid press-preview">
						<a href="<?php echo $link ?>"<?php echo $new_window ?> class="block press-preview-link">
							<div class="span3">
								<?php
									if (has_post_thumbnail()):
										$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'press-release' );
											$img = $img[0];
									else:
										$img = get_bloginfo('stylesheet_directory') . '/assets/images/press-release-new.jpg';
									endif;
								?>
									<img class="img-responsive press-preview-img" src="<?php echo $img; ?>" />
							</div>

							<div class="span9 press-preview-text">
								<time class="press-preview-time"><?php echo get_the_date() ?></time>
								<h2 class="press-preview-title"><?php the_title() ?></h2>
							</div>
						</a>
					</article>

				<?php endwhile; endif; ?>

				</div>

				<?php

					global $wp_query;

					$big = 999999999; // need an unlikely integer

					$links = paginate_links( array(
					'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, $paged ),
					'total' => $wp_query->max_num_pages,
					'type' => 'list',
					'prev_text' => '',
					'next_text' => ''
					) );

					if($links) :
				?>

				<div class="group pagination-wrap">
					<br /><br />
					<div class="post-nav post-nav-prev fl<?php echo ($paged == 0 ? ' page1' : ''); ?>">&nbsp;<?php previous_posts_link('<span class="post-nav-text">Previous</span>'); ?></div>

					<?php echo '<nav class="group c1 pagination nav-hor"><div class="table table-mob center">' . $links . '</div></nav>'; ?>

					<div class="post-nav fr post-nav-next"><?php next_posts_link('<span class="post-nav-text">Next</span>'); ?></div>
				</div>

				<?php endif; ?>
			</div> <!-- span9 -->
		</div> <!-- row -->
	</div> <!-- inner -->
	<?php get_footer(); ?>
</div>