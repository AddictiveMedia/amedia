
	<?php
		function is_blog() {
			if( is_home() || is_category() || ((is_archive() || is_single()) && (get_post_type() == 'post' || get_post_type() == 'press-release')) || is_search() || is_author() ) {
				return true;
			} else {
				return false;
			}
		}

		$id = $post->ID;

		if( is_blog() ) {
			$id = get_option( 'page_for_posts' );
		}

		if( is_category() ) {
			$indexSub = '';
		} elseif ( is_author() ) {
			$indexSub = 'Posts by ' . get_the_author();
		} elseif ( is_archive() ) {

			if ( is_day() ) :
				$indexSub = 'Daily Archives: <span>' . get_the_date() . '</span>';
			elseif ( is_month() ) :
				$indexSub = 'Montly Archives: <span>' . get_the_date( 'FY' ) . '</span>';
			elseif ( is_year() ) :
				$indexSub = 'Yearly Archives: <span>' . get_the_date('Y') . '</span>';
			else :
				if (is_post_type_archive('press-release') || is_tag()) {
					$indexSub = '';
				} else {
					$indexSub = 'Archives';
				}
			endif;

		} elseif(is_search()) {
			if ( have_posts() ) :
				$indexSub = 'Search Results for: ' . get_search_query();
			else :
				$indexSub = 'No Results Found for: ' . get_search_query();
			endif;
		} else {
			$sub = get_field('masthead_sub', $id);
		}

		if (!isset($title) || !$title) {
			$title = get_field('masthead_title', $id);
				if(!$title) {
					$title = get_the_title();
				}
			}

		if(is_singular('press-release') || is_post_type_archive('press-release')) {
			$title = 'Knewton in the News';
		}

		$btn = get_field('masthead_btn', $id);
		$btn_link = get_field('masthead_btn_link', $id);

		$img = get_field('masthead_bg', $id);
		$img_src = "";

		if($img) {
			$img_src = $img['url'];
		}
	?>

	<?php if($img) { ?>

	<div class="content-block masthead-bg bg-cover" style="background-image: url(<?php echo $img_src; ?>)">
		<img class="masthead-img bg-cover-img" src="<?php echo $img_src; ?>" />
	</div>

	<?php } ?>


	<div class="masthead content-block">
		<div class="inner">
			<h1 class="masthead-title"><?php echo $title; ?></h1>

			<?php if($sub) { ?>

			<h2 class="masthead-subtitle"><?php echo $sub; ?></h2>

			<?php } ?>

			<?php if($btn && $btn_link) { ?>

			<a href="<?php echo $btn_link; ?>" class="btn btn-caret border-btn med"><?php echo $btn; ?></a>

			<?php } ?>
		</div>
	</div>

	<?php if ($indexSub) { ?>
		<div class="content-block header-block header-block-full no-padding-bottom">
			<div class="inner">
				<h3 class="header-block-title gamma">
                        <?php echo $indexSub; ?>
                </h3>
            	<div class="mb0 delta"></div>
            </div>
        </div>
	<?php } ?>