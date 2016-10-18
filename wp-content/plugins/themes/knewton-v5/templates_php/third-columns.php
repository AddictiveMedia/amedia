	<?php
		$hasBgColor = get_sub_field('has_bg_color');
		$length = count(get_sub_field('icon_column'));
		$textClass = get_sub_field('text_alignment');
		$hasLargerTitle = get_sub_field('has_col_title_lg');
		$hasBorderDividers = get_sub_field('has_border_dividers');
		$sectionBorder = get_sub_field('section_border');
		$sectionBorderClass = '';

		if ($textClass === 'left') {
			$textClass = 'tal';
		} elseif ($textClass === 'right') {
			$textClass = 'tar';
		} else {
			$textClass = 'tac';
		}

		if ($sectionBorder === 'top') {
			$sectionBorderClass = ' border-top2';
		} elseif ($sectionBorder === 'bottom') {
			$sectionBorderClass = ' border-bottom2';
		} elseif ($sectionBorder === 'both') {
			$sectionBorderClass = ' border-top2 border-bottom2';
		}
	?>

	<div class="content-block no-padding-bottom tac<?php echo $sectionBorderClass; echo ($hasBgColor ? ' bg-bluelite' : ''); ?>">
		<div class="inner">
			<?php include('section-title.php'); ?>


			<?php
				if( have_rows('icon_column') ) :
					$i = 1;

					while ( have_rows('icon_column') ) : the_row();
					$img = get_sub_field('icon_col_img');
						$img = $img['url'];
			?>

				<?php if ( $i % 3 == 1) : ?>

					<div class="row-fluid icon-third-row<?php echo $hasBorderDividers ? ' bordered' : '' ?>">

				<?php endif; ?>

					<div class="icon-third <?php echo $textClass; echo $hasBorderDividers ? ' bordered' : ' span4' ?>">

						<?php if($img) { ?><img class="img-responsive icon-third-img" src="<?php echo $img; ?>" /><?php } ?>

						<h3 class="icon-column-header <?php echo $hasLargerTitle ? 'gamma' : '';?>">
							<?php echo get_sub_field('icon_col_title') ?>
						</h3>

						<div class="icon-column-text">
							<?php echo get_sub_field('icon_col_text'); ?>
						</div>
					</div>

				<?php if ( ($i % 3 == 0) || ($length == $i) ) : ?>

					</div>

				<?php endif; ?>

			<?php $i++; endwhile; endif; ?>

			</div>

			<div class="icon-third-btn"><?php include('cta-button.php'); ?></div>
		</div>
	</div>