	<?php
		global $swiper_i;	
	?>

	<div class="content-block">
		<div class="inner tac">

			<?php include('section-title.php'); ?>
			<?php $imgs = get_sub_field('slide_imgs'); ?>

		    <div class="swiper-container noSwipingClass" id="swiper<?php echo $swiper_i; ?>">
		    	<?php foreach($imgs as $img): ?>
		            <div class="swiper-slide"><img class="img-responsive" src="<?php echo $img['slide_img']['url'] ?>" /></div>
		        <?php endforeach ?>
		    </div>
			
			<div class="mt4">
				<?php include('cta-button.php'); ?>
			</div>
			
	    </div>
    </div>

    <script>
		jQuery(document).ready(function($){
			$('#swiper<?php echo $swiper_i; ?>').slick({
				centerMode: true,
				slidesToShow: 4,
				slidesToScroll: 1,
				allowSwipeToPrev: false,
				allowSwipeToNext: false,
				noSwipingClass: true,
				autoplay: false,
				autoplaySpeed: 2000,
				noSwiping: false,
				arrows: false,
				responsive: [
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 3
						}
					}
				]
			});
		});
    </script>