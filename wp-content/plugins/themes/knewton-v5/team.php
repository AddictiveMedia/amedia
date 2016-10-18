<?php
/*
Template Name: Team
*/
get_header();
?>
<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<?php include('templates/masthead.php'); ?>

	<div class="content-block">
		<div class="inner">
			<div class="body-text">

			<?php
				if( have_rows('flex_ui') ) : while ( have_rows('flex_ui') ) : the_row();
					if( get_row_layout() == 'column_switch' ) :
						$section_title = get_sub_field('section_title');
						$title = get_sub_field('col_sw_title');
						$text = get_sub_field('col_sw_text');

						$img = get_sub_field('col_sw_img');
							$img = $img['url'];

							if(!$img) {
								$img = 'http://placehold.it/650x650';
							}
			?>

				<div class="group team-block">
					<div class="team-photo-wrap">
						<img class="img-responsive team-photo" src="<?php echo $img; ?>" />
						<?php if (get_sub_field('twitter_handle')): ?>
							<span class="team-twitter"><a target="_blank" href="http://twitter.com/<?php echo get_sub_field('twitter_handle'); ?>">@<?php echo get_sub_field('twitter_handle'); ?></a></span>
						<?php endif ?>
					</div>

					<header class="team-header">
						<h2><?php echo $section_title; ?></h2>
						<h3><?php echo $title; ?></h3>
					</header>

					<div class="team-desc">
						<?php echo $text; ?>
					</div>
				</div> <!-- team-block -->

				<?php endif; ?>
			<?php endwhile; endif;?>

			</div> <!-- body-text -->
		</div> <!-- inner -->
	</div> <!-- content-block -->

	<?php include('templates/color-block-full.php'); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>