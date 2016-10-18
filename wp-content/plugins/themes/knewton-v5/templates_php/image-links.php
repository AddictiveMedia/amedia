	<div class="content-block">
		<div class="inner group">								
			<div class="grid-4-3-2-1">
			
				<?php
					$links = get_sub_field('image_links');
					
					foreach($links as $link) :
						$img = $link['image_link_img']['url'];
						
						if(!$img)
							continue;
				?>
				
					<div class="grid-4-3-2-1-item">
						<div class="grid-4-3-2-1-item-inner">
							<a class="border-card" href="<?php echo $link['image_link_url']; ?>">
								<img class="img-responsive border-card-img" src="<?php echo $img; ?>" />
								<div class="border-card-table table table-mob">
									<h2 class="border-card-text"><?php echo $link['image_link_text']; ?></h2>
								</div>
							</a>
						</div>
					</div>
					
				<?php endforeach; ?>
				
			</div>
		</div>
	</div>