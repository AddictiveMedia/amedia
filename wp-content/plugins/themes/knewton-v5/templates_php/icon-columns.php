	<?php
		$noTopPadding = get_sub_field('no_top_padding');
		$border = get_sub_field('section_border');
		$paddingClass = $noTopPadding ? ' no-padding-top' : '';
		$borderClass = '';
		$isColumnSlim = get_sub_field('is_column_slim');

		if ($border === 'top') {
			$borderClass = ' border-top2';
		} elseif ($border === 'bottom') {
			$borderClass = ' border-bottom2';
		} elseif ($border === 'both') {
			$borderClass = ' border-top2 border-bottom2';
		}
	?>

	<div class="content-block no-padding-bottom<?php echo $paddingClass; echo $borderClass; ?>">
		<div class="inner tac">

			<?php
				$length = count(get_sub_field('icon_column'));

				if( have_rows('icon_column') ) :
			?>


			<?php
				$i = 1;

				while ( have_rows('icon_column') ) : the_row();
					$title = get_sub_field('icon_col_title');
					$img = get_sub_field('icon_col_img');
						$img = $img['url'];

						if(!$img) {
							$img = 'http://placehold.it/84x84';
						}
			?>

				<?php if ( $i % 2 == 1) : ?>

					<div class="row-fluid">

				<?php endif; ?>

					<div class="icon-column<?php echo $isColumnSlim ? ' icon-column-slim': ''; ?>">
						<img class="icon-column-img" src="<?php echo $img; ?>" />

						<?php if($title) : ?>
							<h3 class="icon-column-header"><?php echo $title; ?></h3>
						<?php endif; ?>

						<div class="icon-column-p">
							<?php echo get_sub_field('icon_col_text'); ?>
						</div>
					</div>

				<?php if ( ($i % 2 == 0) || ($length == $i) ) : ?>

					</div>

				<?php endif; ?>

			<?php $i++; endwhile; endif; ?>

			<?php include('cta-button.php'); ?>

		</div>
	</div>