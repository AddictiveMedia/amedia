<?php
/*
Template Name: Careers
*/
get_header();
?>

<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

	<?php include('templates/masthead.php'); ?>
	<?php include('templates/icon-columns.php'); ?>
	<?php include('templates/background-overlay.php'); ?>

	<div class="content-block bg-graylite2">
		<div class="inner">
			<h2 class="beta-heading beta">Careers</h2>

			<div class="row-fluid span-right">

				<div class="span3">
					<?php include('templates/widget-bw.php'); ?>
				</div>

				<div class="span9">

					<!-- div wrapper to use :first-child on career-table -->

					<div>

						<div class="career-table">
							<h2 class="gamma career-header">Engineering</h2>

							<a class="career-row">
								<div class="career-cell career-job">Front End Engineer</div>
								<div class="career-cell career-city">Tokyo</div>
							</a>

							<a class="career-row">
								<div class="career-cell career-job">Senior Database Administrator</div>
								<div class="career-cell career-city">New York</div>
							</a>

							<a class="career-row">
								<div class="career-cell career-job">Accountant</div>
								<div class="career-cell career-city">London</div>
							</a>
						</div> <!-- career-table -->

						<div class="career-table">
							<h2 class="gamma career-header">Accounting</h2>

							<a class="career-row">
								<div class="career-cell career-job">Front End Engineer</div>
								<div class="career-cell career-city">Tokyo</div>
							</a>

							<a class="career-row">
								<div class="career-cell career-job">Senior Database Administrator</div>
								<div class="career-cell career-city">New York</div>
							</a>

							<a class="career-row">
								<div class="career-cell career-job">Accountant</div>
								<div class="career-cell career-city">London</div>
							</a>
						</div> <!-- career-table -->
					</div>
				</div> <!-- span9 -->
			</div> <!-- row-fluid -->

		</div> <!-- inner -->
	</div> <!-- content-block -->

	<?php include('templates/color-block-full.php'); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>