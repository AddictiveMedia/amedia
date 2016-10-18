<div class="slide-show-full c-offwhite fade" id="slides">	
				
	<?php if( $fields['slide_overlay_text'] ) { ?>
		
		<div class="slide-overlay tac">
			<div class="overlay-inner">
				<div class="inner">
					<div class="table">
						<div class="table-row">
							<div class="table-cell">
								<?php if($fields['slide_overlay_title']) { ?>
									<strong class="goth caps overlay-title block"><?php echo $fields['slide_overlay_title']; ?></strong>
								<?php } ?>
								
									<p class="slab lite"><?php echo $fields['slide_overlay_text']; ?></p>
								
								<?php if($fields['slide_overlay_link']) { ?>
									<a class="c-accent goth caps caret-link tdn" href="<?php echo $fields['slide_overlay_link']; ?>">Learn More</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>			
			</div> <!-- overlay-inner -->
		</div> <!-- slide-overlay -->
	
	<?php } ?>
			
	<ul class="slides-container">
	
	<?php 
		$blogurl = get_bloginfo('wpurl');
		foreach($fields['slide_loop'] as $slide) {
			
			$img = wp_get_attachment_image_src( $slide['slide_image'], 'gal_3000' );
			
			$orientation = 'slide-center';
			
			foreach($slide['slide_orientation'] as $value => $label) {
				$orientation = 'slide-' . strtolower( $value );
				
			}

			$id = $slide['slide_image'];
			$image = wp_get_attachment_image_src( $id, "gal_30" );

			$image_full = str_replace($blogurl, '', wp_get_attachment_image_src( $id, "gal_3000" ) );			
			$image_lg = str_replace($blogurl, '', wp_get_attachment_image_src( $id, "gal_2000" ) );
			$image_reg = str_replace($blogurl, '', wp_get_attachment_image_src( $id, "gal_1000" ) );
			$image_med = str_replace($blogurl, '', wp_get_attachment_image_src( $id, "gal_640" ) );
			
			
			$btn_text = 'View Property';
			
			if($slide['slide_btn']) {
				$btn_text = $slide['slide_btn'];
			}
	?>
	
		<li class="background-parent <?php echo $orientation; ?>">
			<div class="slide-inner">					
				<div class="text c-offwhite">
					<h1 class="slab alpha"><?php echo $slide['slide_title']; ?></h1>
				
					<a class="more goth caps tdn caret-link bold zeta" href="<?php echo $slide['slide_link']; ?>">
						<?php echo $btn_text; ?>
					</a>
				</div>
			</div>
			
			<img 
				alt="<?php echo $image_post['alt']; ?>" 
				src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/empty.gif"
				data-src-base="<?php bloginfo('wpurl'); ?>"
				data-src="<640:<?php echo $image_med[0]; ?>,>767:<?php echo $image_reg[0]; ?>,>1023:<?php echo $image_lg[0]; ?>,>1800:<?php echo $image_full[0]; ?>" 
			/>
			
		</li>
	
	<?php } ?>
	
	</ul>
	
<!-- 	<a class="caption-toggle block fa-info-circle c-offwhite"></a> -->
</div>