	<div class="img-text-wrap column-switch">

	<?php
		$section_title = get_sub_field('section_title');
		$i = 0;

		$rows = get_sub_field('col_sw_row');
		$start = get_sub_field('col_sw_start');

		$border = get_sub_field('section_border');
		$borderClass = '';

		if ($border === 'top') {
			$borderClass = ' border-top2';
		} elseif ($border === 'bottom') {
			$borderClass = ' border-bottom2';
		} elseif ($border === 'both') {
			$borderClass = ' border-top2 border-bottom2';
		}

		$img = get_sub_field('col_sw_img');
			$img = $img['url'];

			if(!$img) {
				$img = 'http://placehold.it/1400x650';
			}

		$img_mob = get_sub_field('col_sw_img_mob');
			if($img_mob) {
				$img_mob = $img_mob['url'];
			}

		$align = get_sub_field('slide_align');

			$top = ($align == 'Top' ? true : false);
			$bottom = ($align == 'Bottom' ? true : false);


		$text = get_sub_field('col_sw_text');
		$top_title = get_sub_field('col_sw_title_top');
		$top_text = get_sub_field('col_sw_text_top');
		$layout_alt = get_sub_field('col_sw_7030');
		$noborderbot = get_sub_field('no_border_bottom');
		$bgcolor = get_sub_field('col_bg_color');
		if ($bgcolor) {
			$bgcolor = ' bg-' . $bgcolor;
		}

		$title = get_sub_field('col_sw_title');

		$image_link = get_sub_field('image_link');

        // save button field data to variables
        $button_link = get_sub_field('btn_link');
        $button_text = get_sub_field('btn_text'); // TODO: need to validate that this is a URL?
        $button_with = get_sub_field('btn_with');
        $button = ''; // declare button html here so it is in scope; empty string is falsey in php
        $button_mob = ''; // button to display below image in responsive small screen

        // construct button html
        if($button_link && $button_text && $button_with) { // don't try to make the button unless all fields completed
            $button = '
            <a class="btn border-btn btn-caret med bg-turq1-hover' . ($button_with == 'image' ? ' img-text-col-btn-w-img' : '') . '" href="' . $button_link . '">' . $button_text . '</a>';
            $button_mob = '
            <a class="btn border-btn btn-caret med bg-turq1-hover img-text-col-btn-mob" href="' . $button_link . '">' . $button_text . '</a>';
        }

		if ($section_title) {
			$section_title = '<div class="img-text-col text-col">' . $section_title . '</div>';
		}

		$img_col = '
			<div class="img-text-col img-col' . ($top == true ? ' img-text-col-top' : '') . ($bottom == true ? ' img-text-col-bottom' : '') . ($layout_alt == true ? ' img-text-col-70' : '') .'">';

			if($bottom) {
				$img_col .= '<img class="img-responsive img-text-col-img img-text-col-img-placeholder" src="' . $img . '" />';
			}

			if ($image_link) {
				$img_col .= '<a href="' . $image_link . '">';
			}

			$img_col .=	'<img class="img-responsive img-text-col-img img-text-col-img-visible" src="' . $img . '" />';
			if ($image_link) {
				$img_col .= '</a>';
			}
            // add button if it exists and user wants it here
            // don't really need to check $button since no harm adding an empty string to html
            // but this makes the logic clearer
            if($button && $button_with == 'image') {
                $img_col .= $button;
            }
			$img_col .=	'</div>';

		$text_col = '<div class="img-text-col text-col' . ($top_text == true ? ' img-text-col-top' : '') . ($layout_alt == true ? ' img-text-col-30' : '') . '">';

			if($top_title == false) {
				$text_col .= '<h2>' . $title . '</h2>';
			}

            $text_col .= $text;

            // add button if it exists and user wants it here
            if($button && $button_with == 'text') {
                $text_col .= $button;
            }
            $text_col .= '</div>';

		$img_left_col = $img_col . $text_col;
		$img_right_col = $text_col . $img_col;
	?>

			<div class="img-text-block content-block group<?php echo ($bottom ? ' img-bottom' : ''); echo $borderClass; echo $bgcolor; ?>">
				<div class="inner pr">
						<?php if($top_title == true || $section_title) : ?>
							<?php if ($section_title) : ?>
								<h2 class="beta mb6 tac section-title"><?php echo strip_tags( $section_title ); ?></h2>
							<?php endif ?>

							<?php if ($top_title) : ?>
								<h2 class="beta mb4"><?php echo $title ?></h2>
							<?php endif ?>

						<?php endif; ?>
					<div class="img-text-block-inner">

						<img class="img-responsive img-text-col-img-mob" src="<?php echo ($img_mob ? $img_mob : $img); ?>" />
                        <!-- add mobile button if button is part of image block -->
                        <?php
                            if($button && $button_with == 'image') {
                                echo $button_mob;
                            }
                        ?>

						<div>

						<?php
							if($start == 'Left') {
								echo $img_left_col;
							} else {
								echo $img_right_col;
							}
						?>

						</div>

					</div>
				</div>
			</div> <!-- img-text-block -->

		</div>