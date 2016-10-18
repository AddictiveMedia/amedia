<?php
	$off_heading1 = get_sub_field('off_heading1');
	$off_content1 = get_sub_field('off_content1');
	$off_image1 = get_sub_field('off_image1');
?>
<section class="common-wrap off-img-text-block-with-tab">
	<div class="wrapper">
		<?php if(!empty($off_heading1)){ ?>
			<h3><?php echo $off_heading1; ?></h3>
		<?php } ?>
		<div class="content-block">
			<?php if(!empty($off_image1)){ ?>
			<div class="img-block">
				<img src="<?php echo $off_image1['url']; ?>" alt="" />
			</div>
			<?php } ?>
			<?php if(!empty($off_content1)){ ?>
			<div class="text-block">
				<p><?php echo $off_content1; ?></p>
			</div>
			<?php } ?>
		</div>
		<div class="content-tabbing">
			<h5>Finally Uncover:</h5>
			<?php if( have_rows('off_tabbing') ): ?>
			<dl id="content-insights" class="smart-tabs">
				<?php
					while(have_rows('off_tabbing')):the_row();
					$off_tab_label = get_sub_field('off_tab_label');
					$off_tab_content = get_sub_field('off_tab_content');
					$off_tab_link_text = get_sub_field('off_tab_link_text');
					$off_tab_link_url = get_sub_field('off_tab_link_url');
					if(!empty($off_tab_label) && !empty($off_tab_content)):
				?>
				<dt>
					<a href="#"><?php echo $off_tab_label; ?></a>
				</dt>
				<dd>
					<p><?php echo $off_tab_content; ?></p>
					<?php if(!empty($off_tab_link_text) && !empty($off_tab_link_url)) { ?>
					<div class="anchor">
						<a href="<?php echo $off_tab_link_url; ?>"><?php echo $off_tab_link_text; ?></a>
					</div>
					<?php } ?>
				</dd>
				<?php endif; endwhile; ?>
			</dl>
			<?php endif; ?>
		</div>
	</div>
</section>