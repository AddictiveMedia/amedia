<!-- Slide show regular width -->

<div class="img-text-block img-text-slide-wrap slide-wrap-caption slide-wrap-press no-border group">
	<div class="img-text-block-inner">

		<!-- The image column must come first in order for the slide show -->

		<div class="img-text-col img-col">
			<div
				class="img-text-slide-cycle cycle-slideshow"
				data-cycle-prev="#img-text-slide-prev2"
				data-cycle-next="#img-text-slide-next2"
				data-cycle-swipe="true"
				data-cycle-swipe-fx="scrollHorz"
				data-cycle-caption=".slide-caption"
				data-cycle-timeout="0"
				data-cycle-caption-template="{{cycleTitle}}"
				data-cycle-slides=".slide-link"
			>
				<!-- All of these images need to be the same height -->
				<?php
					$slides = get_posts(array(
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'post_type' => 'press-slides'
					));
				?>
				<?php
					$captions = array();

					foreach($slides as $slide) {
						$text = get_field('text', $slide->ID);

						if($text) {
							$captions[] = $text;
						}
					}

					if(!empty($captions)) {
						usort($captions, function($a,$b) {return strlen($b)-strlen($a);});
					}

					foreach ($slides as $slide):
						$img = get_field('thumbnail', $slide->ID)['sizes']['post-thumbnail'];
						$text = get_field('text', $slide->ID);
						$link = get_field('link', $slide->ID);
						$ext = get_field('new_window', $slide->ID);
				?>
					<a
						class="slide-link"
						href="<?php echo $link; ?>"
						data-cycle-title="<?php echo htmlspecialchars($text) ?>"
						<?php echo ($ext ? ' target="_blank"' : ''); ?>
					>
						<img class="img-responsive img-text-col-img img-text-col-img-visible" src="<?php echo $img ?>" />
					</a>
				<?php endforeach ?>
			</div>

		</div>

		<div class="img-text-col img-text-col-text pr">

			<div class="pr"><div class="slide-caption-placeholder"><?php echo $captions[0]; ?></div><p class="slide-caption"></p></div>

			<!-- <p><a class="btn-caret">Watch</a></p> -->

			<br/>

			<div class="img-text-slide-ctrl-wrap mb0">
				<div id="img-text-slide-prev2" class="img-text-slide-prev img-text-slide-ctrl fa-caret-left"></div>
				<div id="img-text-slide-next2" class="img-text-slide-next img-text-slide-ctrl fa-caret-right"></div>
			</div>
		</div>
	</div>
</div> <!-- img-text-block -->
<?php wp_reset_query() ?>