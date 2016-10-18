<?php
/*
Template Name: Customers
*/
get_header();
?>
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<?php include('templates/masthead.php'); ?>

<?php endwhile; endif; ?>

	<div class="content-block no-padding-top main-partners-block">
		<div class="inner">
				<?php // Always show Pearson first
					// TODO A.R. 2015/08/25: Make this more flexible
				?>
				<div class="logo-wrap group logo-col-2">
					<div class="logo-col-block">
						<img class="img-responsive logo-col-block-img" src="/wp-content/uploads/new-pearson-logo.png">
						<header class="logo-block-header">
							<h2 class="delta">Pearson</h2>
							<h3 class="caps">Since October 2011</h3>
						</header>
						<div class="logo-block-p">
							<p>Hundreds of thousands of students at schools across the country currently use Pearson MyLab with Knewton Adaptive Learning titles in subjects including reading, economics, math, and writing.</p>
							<p><a href="http://learn.knewton.com/pearson">Contact Pearson&nbsp;<strong>›</strong></a></p>
						</div>
						<a class="btn-caret" target="_blank" href="http://www.knewton.com/about/press/pearson-and-knewton-underprepared-college-students/">Read press release</a>
					</div>

				<?php

					$args = array(
						'post_type' => 'partners',
						'posts_per_page' => -1
					);

					$myposts = get_posts( $args );

					$imgs = array(
						'http://placehold.it/400x300/eeeeee',
						'http://placehold.it/400x300/bbbbbb',
						'http://placehold.it/400x300/cccccc'
					);

					foreach ( $myposts as $post ) :
						setup_postdata( $post );
						if (get_the_title() === 'Pearson') {
							continue;
						}

						$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

						if(!$img) {
							$img = array_rand($imgs);
								$img = $imgs[$img];
						} else {
							$img = $img[0];
						}
				?>

					<div class="logo-col-block">
						<img class="img-responsive logo-col-block-img" src="<?php echo $img; ?>" />

						<header class="logo-block-header">
							<h2 class="delta"><?php the_title(); ?></h2>
							<h3 class="caps">Since <?php echo get_field('partner_date'); ?></h3>
						</header>

						<div class="logo-block-p"><?php the_content(); ?></div>
						<?php $link_id = array_pop(get_field('partner_link')) ?>
						<?php if ($link_id): ?>
							<a class="btn-caret" target="_blank" href="<?php echo get_permalink($link_id) ?>">Read press release</a>
						<?php endif ?>

					</div>

				<?php endforeach; wp_reset_postdata(); ?>

				</div>
		</div>
	</div>

	<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post();
			include('flexible-content.php');
		endwhile; endif;
	?>


<?php get_footer(); ?>