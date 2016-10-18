<?php
	$title = get_sub_field('section_intro_title');
	$text = get_sub_field('section_intro_text');
?>

<?php if($title || $text) : ?>

<header class="mb6 section-intro">

	<?php if($title) : ?>
	<div class="tac beta mb2">
		<?php echo $title; ?>
	</div>
	<?php endif; ?>

	<?php if($text) : ?>
	<div class="tac gamma">
		<?php echo $text; ?>
	</div>
	<?php endif; ?>

</header>

<?php endif; ?>