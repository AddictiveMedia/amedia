	<?php include('masthead.php'); ?>
	<div id="blog-wrap">
		<div class="content-block">
			<div class="inner">
				<div class="row-fluid span-right">

					<div class="span4 resources-sidebar mb4">
						<?php if (is_tag()): ?>
							<?php include('search-sidebar-tag.php'); ?>
						<?php else: ?>
							<?php include('search-sidebar.php'); ?>
						<?php endif ?>
					</div>

					<div class="span8">

					<?php
						if ( have_posts() ) : while ( have_posts() ) : the_post();
							$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-feature' );
							$caption = get_post(get_post_thumbnail_id());
							$caption = $caption->post_excerpt;

						include('blog-post.php');

						endwhile; endif;
					?>

						<?php
							global $paged;

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

							<div class="post-nav post-nav-prev fl<?php echo ($paged == 0 ? ' page1' : ''); ?>">&nbsp;<?php previous_posts_link('<span class="post-nav-text">Previous</span>'); ?></div>

							<?php echo '<nav class="group c1 pagination nav-hor"><div class="table table-mob center">' . $links . '</div></nav>'; ?>

							<div class="post-nav fr post-nav-next"><?php next_posts_link('<span class="post-nav-text">Next</span>'); ?></div>
						</div>

						<?php endif; ?>

					</div> <!-- span8 -->
				</div>
			</div>
		</div>
	</div>
</div>
