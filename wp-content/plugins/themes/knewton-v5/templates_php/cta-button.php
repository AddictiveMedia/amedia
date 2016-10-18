<?php
	$cta = get_sub_field('section_cta');
	$cta_link = get_sub_field('section_cta_link');
	$icon = get_sub_field('section_cta_icon');

	$cta2 = get_sub_field('section_cta2');
	$cta2_link = get_sub_field('section_cta2_link');
	$icon2 = get_sub_field('section_cta2_icon');
?>

<?php
	if($cta2) {
		echo '<div class="row-fluid"><div class="span6">';
	}
?>


			<?php if($cta) : ?>

			<div class="tac mt2">
				<a class="btn border-btn btn-caret med<?php echo ($full || $cta2 ? ' block' : ' inline-block center'); echo ($icon ? ' ' . $icon : ''); ?>"<?php echo ($cta_link ? ' href="' . $cta_link . '"' : ''); ?>><?php echo $cta; ?></a>
			</div>

			<?php endif; ?>
			
			<?php if($cta2) : ?>
			
			</div><div class="span6">
			
			<div class="tac mt2">
				<a class="btn border-btn btn-caret med<?php echo ($full || $cta2 ? ' block' : ' inline-block center'); echo ($icon2 ? ' ' . $icon2 : ''); ?>"<?php echo ($cta2_link ? ' href="' . $cta2_link . '"' : ''); ?>><?php echo $cta2; ?></a>
			</div>

			<?php endif; ?>

<?php
	if($cta2) {
		echo '</div></div>';
	}
?>