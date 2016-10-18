<?php
	$st_section_heading = get_sub_field('st_section_heading');
?>
<section class="common-wrap support-tabbing">
	<?php if(!empty($st_section_heading)){ ?>
		<h2 class="section-heading"><?php echo $st_section_heading; ?></h3>
	<?php } ?>
	<div class="support-tab-block">
		<?php if( have_rows('off_support_tabs') ): ?>
			<dl id="support" class="supporting-tabs">
			<?php
				while(have_rows('off_support_tabs')):the_row();
				$st_tab_label = get_sub_field('st_tab_label');
				$st_tab_content = get_sub_field('st_tab_content');
			?>
				<dt>
					<a href="#"><?php echo $st_tab_label; ?></a>
				</dt>
				<dd>
					<div class="wrapper">
						<p class="tab-content"><?php echo $st_tab_content; ?></p>
					</div>
					<?php
						if(have_rows('st_extra_content')):
							while (have_rows('st_extra_content')) : the_row();
								if(get_row_layout() == 'st_logo_section'):
									include('partner-logo-section.php');
								elseif(get_row_layout() == 'st_partners_testimonials'):
									include('partner-testimonials.php');
								endif;
							endwhile;
						endif;
					?>
				</dd>
			<?php endwhile; ?>
			</dl>
		<?php endif; ?>
	</div>
</section>