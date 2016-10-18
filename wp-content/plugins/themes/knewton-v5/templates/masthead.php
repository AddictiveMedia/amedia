
	<?php
		$id = $post->ID;

		if( is_home() ) {
			$id = get_option( 'page_for_posts' );
		}

		if( is_category() ) {
			$title = 'Category: ' . single_cat_title('', false);
		} elseif ( is_author() ) {
			$title = 'Posts by ' . get_the_author();
		} else {
			$title = get_field('masthead_title', $id);
				if(!$title) {
					$title = get_the_title();
				}
		}

		$sub = get_field('masthead_sub', $id);
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
		<?php if($title || $sub) { ?>
		<div class="tac masthead-bg-text">
			<div class="table center">
				<div class="table-cell">
					<h1 class="masthead-title"><?php echo $title; ?></h1>

					<?php if($sub) { ?>

					<h2 class="masthead-subtitle"><?php echo $sub; ?></h2>

					<?php } ?>

					<?php if($btn && $btn_link) { ?>

					<a href="<?php echo $btn_link; ?>" class="btn masthead-btn color-btn bg-turq1 btn-caret med"><?php echo $btn; ?></a>

					<?php } ?>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>

	<?php } else { ?>

	<div class="masthead content-block">
		<div class="inner">
			<h1 class="masthead-title"><?php echo $title; ?></h1>

			<?php if($sub) { ?>

			<h2 class="masthead-subtitle"><?php echo $sub; ?></h2>

			<?php } ?>

			<?php if($btn && $btn_link) { ?>

			<a href="<?php echo $btn_link; ?>" class="masthead-btn btn btn-caret border-btn med"><?php echo $btn; ?></a>

			<?php } ?>
		</div>
	</div>

	<?php } ?>
