
<div class="img-text-wrap group">

<?php
	// This is a counter that counts every slideshow on the page
	global $slide_i;

	$rows = get_sub_field('slide_row');
	$start = get_sub_field('slide_start');

	$imgs = get_sub_field('slide_imgs');

	if(!$imgs) {
		$imgs = array(
			array('slide_img' => array(
				'url' => 'http://placehold.it/1400x650/00acb7'
			)),
			array('slide_img' => array(
				'url' => 'http://placehold.it/1400x650/30bca2'
			)),
			array('slide_img' => array(
				'url' => 'http://placehold.it/1400x650/f3b520'
			))
		);
	}
	$align = get_sub_field('slide_align');

		$top = ($align == 'Top' ? true : false);
		$bottom = ($align == 'Bottom' ? true : false);

	$align_text = get_sub_field('slide_align_text');

		$toptext = ($align_text == 'Top' ? true : false);
		$bottomtext = ($align_text == 'Bottom' ? true : false);

	$top = ($align == 'Top' ? true : false);
	$bottom = ($align == 'Bottom' ? true : false);


	$full = get_sub_field('slide_img_full');
	$nopadding = get_sub_field('slide_nopadding');
	$noborderbot = get_sub_field('no_border_bottom');

	$text = get_sub_field('slide_text');
	$title = get_sub_field('slide_title');
	$caption = $imgs[0]['slide_caption'];
	$captions = array();

	$img_col = '

		<div class="img-text-col img-text-col-70 img-col">';

			if($bottom) {
				$img_col .= '<img class="img-responsive img-text-col-img img-text-col-img-placeholder" src="' . $imgs[0]['slide_img']['url'] . '" />';
			}

			$img_col.= '<div
					class="img-text-slide-cycle cycle-slideshow"
					data-cycle-prev="#img-text-slide-prev' . $slide_i . '"
					data-cycle-next="#img-text-slide-next' . $slide_i . '"
					data-cycle-swipe="true"
					data-cycle-swipe-fx="scrollHorz"
					data-cycle-timeout="0"';

				if($caption) {
					$img_col .= '
						data-cycle-caption=".slide-caption"
						data-cycle-caption-template="<h3>{{cycleTitle}}</h3><p>{{cycleText}}</p>"';
				}

				$img_col.=	'>';


		foreach($imgs as $img) {
			$img_col .= '<img class="img-responsive img-text-col-img img-text-col-img-visible" src="' . $img['slide_img']['url'] . '" ';

			$caption = $img['slide_caption'];
			$cap_title = $img['slide_caption_title'];



			$img_col .= ' data-cycle-title="' . ($cap_title ? $cap_title : '') . '"';
			$img_col .= ' data-cycle-text="' . ($caption ? $caption : '') . '"';

			$img_col .= '/>';

			if($cap_title || $caption) {
				$captions[] = '<h3>'.$cap_title . '</h3><p>' . $caption . '</p>';
			}
		}

		$img_col .=	'</div></div>';

	$text_col = '
		<div class="img-text-col img-text-col-30' . ($toptext ? ' img-text-col-top' : '') . ($bottomtext ? ' img-text-col-bottom' : '') . '">';

		$caption = $imgs[0]['slide_caption'];

		if($caption) {

			usort($captions, function($a,$b) {return strlen($b)-strlen($a);});

			$text_col .= '<div class="pr"><div class="slide-caption-placeholder">' . $captions[0] . '</div><div class="slide-caption"></div></div>';
		} else {
			$text_col .= $text;
		}

		$text_col .= '
				<div class="img-text-slide-ctrl-wrap">
					<div id="img-text-slide-prev' . $slide_i . '" class="img-text-slide-prev img-text-slide-ctrl fa-caret-left"></div>
					<div id="img-text-slide-next' . $slide_i . '" class="img-text-slide-next img-text-slide-ctrl fa-caret-right"></div>
				</div>
			</div>';

?>

	<div class="img-text-block img-text-slide-wrap content-block group<?php echo ($top ? ' img-top' : ''); echo ($bottom ? ' img-bottom' : ''); echo ($full ? ' img-text-slide-full' : ''); echo ($noborderbot ? ' no-border-bottom' : ''); ?>">

		<!-- For a full width slideshow, this .inner div needs the 'no-mob-padding' class -->

		<div class="inner<?php echo ($full ? ' no-mob-padding' : ''); echo($nopadding ? ' no-padding' : ''); ?>">

		<?php
			if($title) { echo '<h3 class="slide-title gamma tac mb3">' . $title . '</h3>'; }
		?>

			<div class="img-text-block-inner">

					<!-- The image column must come first in order for the slide show -->

					<?php
						echo $img_col . $text_col;
					?>
			</div>
		</div>
	</div> <!-- img-text-block -->

</div>