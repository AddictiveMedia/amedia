
			<div class="row-fluid mb2">

			<?php $lcount = 1; foreach($logos as $logo) { ?>
			
				<div class="span4 mb3">

					<a href="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logos/<?php echo $logo[0]; ?>" class="border-card identity-card mb1<?php if($logo[2] == 1) {echo  ' white';} ?>">
						
						<div class="table table-mob">
							<div class="table-cell">
								
								<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logos/<?php echo $logo[0]; ?>" class="mb0 img-responsive border-card-img">
							
							</div>
						</div>
						
					</a>
					
					<div class="row-fluid tac">
						<div class="span6">
							<a href="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logos/<?php echo $logo[0]; ?>"><?php echo substr($logo[0], strpos($logo[0], '.')); ?></a>
						</div>
						
						<div class="span6">
							<a href="<?php bloginfo('stylesheet_directory'); ?>/assets/images/logos/<?php echo $logo[1]; ?>"><?php echo substr($logo[1], strpos($logo[1], '.')); ?></a>
						</div>
					</div>
                                        
				</div>
						
			<?php if($lcount % 3 == 0) { ?></div><div class="row-fluid mb4"><?php } ?>

			<?php $lcount++; } ?>
       		
       		</div>
