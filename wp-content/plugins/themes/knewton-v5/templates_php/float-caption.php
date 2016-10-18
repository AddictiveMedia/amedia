	<?php
		$img = get_sub_field('float_img_cap_img')['url'];
		
		if(!$img) {
			$img = 'http://placehold.it/600x400';
		}
	?>
	
	<div class="content-block border-top2 border-bottom2">
		<div class="inner">
			<div class="float-caption table">
				<div class="table-cell float-caption-img-wrap">
					<img class="img-responsive float-caption-img" src="<?php echo $img; ?>" />
				</div>
				
				<div class="table-cell delta float-caption-text">
					<?php the_sub_field('float_img_cap_text'); ?>
				</div>
			</div>
		</div>
	</div>