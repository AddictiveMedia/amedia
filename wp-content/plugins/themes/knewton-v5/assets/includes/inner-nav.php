<?php
	$parent = get_page_by_title($parent);
	
	if($parent) {
		$parentid = $parent->ID;
		$class = '';
		
		if($theid == $parentid) {
			$class = " class='current'";
		}
?>
						<li class="c-accent">In this section: </li>
						<li<?php echo $class; ?>><a href="<?php echo get_permalink($parentid); ?>">Our Company</a></li>

<?php
global $post;

$myposts = get_posts('post_type=page&posts_per_page=-1&post_parent='.$parentid);
foreach($myposts as $post) :
setup_postdata($post);
	$feature_fields = $cfs->get();
	
	$class = '';
	
	if($theid == $post->ID) {
		$class = " class='current'";
	}
?>

						<li<?php echo $class; ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

<?php endforeach; wp_reset_postdata(); ?>
<?php } ?>