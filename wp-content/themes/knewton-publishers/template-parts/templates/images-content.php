<section class="img-content">
	<?php
		$sc_heading = get_sub_field('section_heading');
		//image
		$img = get_sub_field('block_image');
		$img = $img['url'];
		if(!$img) {
			$img = 'http://placehold.it/1400x650';
		}
		$img_side = get_sub_field('image_on_which_side');
		$text_heading = get_sub_field('text_heading');
		$content = get_sub_field('content');
		$link_text = get_sub_field('link_text');
		$link_url = get_sub_field('link_url');
		$link_type = get_sub_field('link_type');
		$content_alignment = get_sub_field('content_alignment');
		$columns_type = get_sub_field('columns_type');
	?>
	<div class="wrapper">
		<?php if(!empty($sc_heading)){ ?>
			<h2 class="section-heading"><?php echo $sc_heading; ?></h2>
		<?php } ?>
		<div class="img-content-block clear">
			<?php if($columns_type == "70/30"){ ?>
				<?php if($img_side == "Right"){ ?>
				<div class="img-block img-right col-4">
					<img src="<?php echo $img; ?>" alt="" />
				</div>
				<?php } else{ ?>
				<div class="img-block img-left col-4">
					<img src="<?php echo $img; ?>" alt="" />
				</div>
				<?php } ?>
				<div class="text-block col-8">
					<?php if($content_alignment == "Middle"){ ?>
						<div class="pt-top">
						<?php if(!empty($text_heading)): ?>
							<h2><?php echo $text_heading; ?></h2>
						<?php endif; ?>
						<p><?php echo $content; ?></p>
						<?php if($link_type == "Button"){ ?>
							<?php if(!empty($link_text) && !empty($link_url)): ?>
								<a href="<?php echo $link_url; ?>" class="btn"><?php echo $link_text; ?></a>
							<?php endif; ?>
						<?php } else{ ?>
							<?php if(!empty($link_text) && !empty($link_url)): ?>
								<a href="<?php echo $link_url; ?>" class="simple-link"><?php echo $link_text; ?></a>
							<?php endif; ?>
						<?php } ?>
						</div>
					<?php } else{ ?>
						<?php if(!empty($text_heading)): ?>
							<h2><?php echo $text_heading; ?></h2>
						<?php endif; ?>
						<p><?php echo $content; ?></p>
						<?php if($link_type == "Button"){ ?>
							<?php if(!empty($link_text) && !empty($link_url)): ?>
								<a href="<?php echo $link_url; ?>" class="btn"><?php echo $link_text; ?></a>
							<?php endif; ?>
						<?php } else{ ?>
							<?php if(!empty($link_text) && !empty($link_url)): ?>
								<a href="<?php echo $link_url; ?>" class="simple-link"><?php echo $link_text; ?></a>
							<?php endif; ?>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } else{ ?>
				<?php if($img_side == "Right"){ ?>
				<div class="img-block img-right">
					<img src="<?php echo $img; ?>" alt="" />
				</div>
				<?php } else{ ?>
				<div class="img-block img-left">
					<img src="<?php echo $img; ?>" alt="" />
				</div>
				<?php } ?>
				<div class="text-block">
					<?php if($content_alignment == "Middle"){ ?>
						<div class="pt-top">
						<?php if(!empty($text_heading)): ?>
							<h2><?php echo $text_heading; ?></h2>
						<?php endif; ?>
						<p><?php echo $content; ?></p>
						<?php if($link_type == "Button"){ ?>
							<?php if(!empty($link_text) && !empty($link_url)): ?>
								<a href="<?php echo $link_url; ?>" class="btn"><?php echo $link_text; ?></a>
							<?php endif; ?>
						<?php } else{ ?>
							<?php if(!empty($link_text) && !empty($link_url)): ?>
								<a href="<?php echo $link_url; ?>" class="simple-link"><?php echo $link_text; ?></a>
							<?php endif; ?>
						<?php } ?>
						</div>
					<?php } else{ ?>
						<?php if(!empty($text_heading)): ?>
							<h2><?php echo $text_heading; ?></h2>
						<?php endif; ?>
						<p><?php echo $content; ?></p>
						<?php if($link_type == "Button"){ ?>
							<?php if(!empty($link_text) && !empty($link_url)): ?>
								<a href="<?php echo $link_url; ?>" class="btn"><?php echo $link_text; ?></a>
							<?php endif; ?>
						<?php } else{ ?>
							<?php if(!empty($link_text) && !empty($link_url)): ?>
								<a href="<?php echo $link_url; ?>" class="simple-link"><?php echo $link_text; ?></a>
							<?php endif; ?>
						<?php } ?>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>