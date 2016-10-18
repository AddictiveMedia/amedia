<article class="post-preview row-fluid border-bottom1 span-right">
	<div class="<?php echo ($img && !is_single() ? 'span6' : ''); ?>">
		<header class="post-preview-header">
			<h2 class="post-preview-h2">
				<?php if( !is_single() ) { ?><a class="post-preview-link" href="<?php the_permalink(); ?>"><?php } ?>

					<?php the_title(); ?>

				<?php if( !is_single() ) { ?></a><?php } ?>
			</h2>
			<?php if (get_post_type() == 'post'): ?>
				<p class="post-preview-meta">
					Posted in <?php echo get_the_category_list(', '); ?>
					on <a href="<?php echo get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('j')) ?>"><?php echo get_the_date('F j, Y') ?></a>
					by <?php echo the_author_posts_link(); ?></p>
			<?php endif ?>
		</header>

		<div class="post-preview-excerpt <?php if(is_single()) { echo ' post-single-content'; } ?>">
			<?php if (is_single()): ?>
				<?php if($img[0]) { ?><img class="img-responsive" src="<?php echo $img[0]; ?>" /><?php } ?>
				<?php if ($caption && get_post_type() != 'press-release'): ?>
					<em><?php echo $caption ?></em>
					<br /><br />
				<?php endif ?>
			<?php endif ?>
			<?php (is_single() ? the_content() : the_excerpt() ); ?>
		</div>
	</div>

	<?php if(!empty($img) && !is_single() ) : ?>
	<div class="span6">
		<img class="img-responsive" src="<?php echo $img[0]; ?>" />
		<?php if ($caption): ?>
			<em><?php echo $caption ?></em>
			<br /><br />
		<?php endif ?>
	</div>
	<?php endif; ?>

</article>