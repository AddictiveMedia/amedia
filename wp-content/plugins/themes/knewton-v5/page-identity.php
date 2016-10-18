<?php 
/*
Template Name: Identity
*/
get_header();
?>

<?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
    <?php include('templates_php/masthead.php'); ?>
    <?php include('flexible-content.php'); ?>

    <div class="content-block">
        <div class="inner group">
			<?php
				$logos = array(
					0 => array(
						0 => '1knewton4color.png',
						1 => '2knewton4color.eps'
					),
					
					1 => array(
						0 => '3knewtongrey.jpg',
						1 => '4knewtongrey.eps'
					),
					
					2 => array(
						0 => '5knewtonwhite.png',
						1 => '6knewtonwhite.eps',
						2 => 1
					)
				);
			?>

			<h2 class="identity-header mbh">Primary Knewton Logo</h2>
			<p class="mb2"><a target="_blank" href="/wp-content/uploads/knewton-brand-guidelines-july-2016.pdf">See full branding guidelines here.</a></p>
			<?php include('templates_php/identity-card.php'); ?>

						       		
       		<?php
       			$logos = array(
					3 => array(
						0 => '7poweredby-vert-4c.png',
						1 => '8poweredby-vert-4c.eps'
					),

					4 => array(
						0 => '9poweredby-vert-dkgrey.jpg',
						1 => '10poweredby-vert-dkgrey.eps'
					),

					5 => array(
						0 => '11poweredby-vert-white.png',
						1 => '12poweredby-vert-white.eps',
						2 => 1
					)
				);      		
       		?>

			<h2 class="identity-header mbh">Powered by Knewton Logo</h2>
			<p class="mb2">For use in Knewton-powered partner products. <a target="_blank" href="/wp-content/uploads/knewton-branding-guidelines-april-2016.pdf">See full ingredient branding guidelines here.</a></p>

			<?php include('templates_php/identity-card.php'); ?>
			
			
			<h2 class="identity-header mb2">Logo Don'ts</h2>
			<div class="row-fluid mb2">

				<div class="span4 mb3">

					<a href="http://www.knewton.com/stem-education/" class="border-card identity-card mb1">
						
						<div class="table table-mob">
							<div class="table-cell">
								
								<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/dnu1.jpg" class="mb0 img-responsive border-card-img">
							
							</div>
						</div>
						
					</a>
					
					<div class="row-fluid tac pth">
						Don't place logo on backgrounds that provide insufficient contrast.
					</div>
                                        
				</div>

				<div class="span4 mb3">

					<a href="http://www.knewton.com/stem-education/" class="border-card identity-card mb1">
						
						<div class="table table-mob">
							<div class="table-cell">
								
								<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/dnu2.jpg" class="mb0 img-responsive border-card-img">
							
							</div>
						</div>
						
					</a>
					
					<div class="row-fluid tac pth">
						Don't place logo on busy photographic backgrounds.
					</div>
                                        
				</div>

				<div class="span4 mb3">

					<a href="http://www.knewton.com/stem-education/" class="border-card identity-card mb1">
						
						<div class="table table-mob">
							<div class="table-cell">
								
								<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/dnu3.jpg" class="mb0 img-responsive border-card-img">
							
							</div>
						</div>
						
					</a>
					
					<div class="row-fluid tac pth">
						Don't separate symbol (atom) from logotype.
					</div>
                                        
				</div>
			</div>
			
			       		
        </div> <!-- inner -->
    </div> <!-- content-block -->
<?php endwhile; endif; ?>


<?php get_footer(); ?>