<?php
	$prev_post = get_previous_post();
	$next_post = get_next_post();
?>

<?php if($prev_post->ID) { ?><a class="prev" href="<?php echo get_permalink( $prev_post->ID ); ?>">Previous Post</a><?php } ?>

<?php if($next_post->ID) { ?><a class="next" href="<?php echo get_permalink( $next_post->ID ); ?>">Next Post</a><?php } ?>