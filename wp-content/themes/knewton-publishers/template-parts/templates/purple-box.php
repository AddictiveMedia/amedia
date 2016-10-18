<?php
$pu_section_heading = get_sub_field('pu_section_heading');
$pu_button_text = get_sub_field('pu_button_text');
$pu_button_url = get_sub_field('pu_button_url');
?>
<section class="purple-section">
	<div class="wrapper">
		<?php if(!empty($pu_section_heading)){ ?>
			<h2><?php echo $pu_section_heading; ?></h2>
		<?php } ?>
		<?php if(have_rows('pu_icons_list')): ?>
		<div class="icons-list">
			<ul>
			<?php
				$counter = 1;
				while( have_rows('pu_icons_list') ) : the_row();
				$upload_icon = get_sub_field('pu_upload_icon');
				$icon_heading = get_sub_field('icon_heading');
				$icon_text = get_sub_field('icon_text');
			?>
				<li class="feature<?php echo $counter; ?>">
					<div class="feature-box">
						<?php if(!empty($upload_icon)){ ?>
							<img src="<?php echo $upload_icon['url']; ?>" alt="<?php echo $icon_heading; ?>" />
						<?php } ?>
						<?php if(!empty($icon_heading)){ ?>
							<h3><?php echo $icon_heading; ?></h3>
						<?php } ?>
						<?php if(!empty($icon_text)){ ?>
							<?php echo $icon_text; ?>
						<?php } ?>
					</div>
				</li>
			<?php $counter++; endwhile; ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php if(!empty($pu_button_text) && !empty($pu_button_url)){ ?>
			<div>
				<a href="<?php echo $pu_button_url; ?>" class="btn"><?php echo $pu_button_text; ?></a>
			</div>
		<?php } ?>
	</div>
</section>