<?php if( have_rows('cs_case_study_block') ): ?>
	<?php while ( have_rows('cs_case_study_block') ) : the_row(); ?>
		<?php if(have_rows('cs_case_study_structure')): ?>
				<section class="case-study-section">
			<?php while (have_rows('cs_case_study_structure')) : the_row(); ?>
				<?php if(get_row_layout() == 'cs_case_study_top_block'){
						$cs_case_study_heading = get_sub_field('cs_case_study_heading');
						$cs_case_study_logo = get_sub_field('cs_case_study_logo');
						$cs_product_market = get_sub_field('cs_product_market');
						$cs_subject = get_sub_field('cs_subject');
				?>
					<div class="cs-heading">
						<h2><?php echo $cs_case_study_heading; ?></h2>
					</div>
					<?php if(have_rows('cs_points_of_study')): ?>
					<div class="sections-links">
						<ul>
						<?php
							while ( have_rows('cs_points_of_study') ) : the_row();
							$cs_point_heading = get_sub_field('cs_point_heading');
						?>
							<li>
								<a class="scroll-ease" data-name="<?php echo $cs_point_heading; ?>" data-id="<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).$cs_point_heading; ?>" href="#<?php echo trim(preg_replace('/[\s\t\n\r\s]+/', '_', $cs_case_study_heading)).$cs_point_heading; ?>"><?php echo $cs_point_heading; ?></a>
							</li>
						<?php endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
					<div class="wrapper">
						<div class="clear cs-top-section">
							<div class="cs-logo">
								<img src="<?php echo $cs_case_study_logo['url']; ?>" alt="" />
							</div>
							<div class="cs-top-detail">
								<div class="market">
									<h3>Product Market</h3>
									<p><?php echo $cs_product_market; ?></p>
								</div>
								<div class="subject">
									<h3>Subject</h3>
									<p><?php echo $cs_subject; ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php } elseif(get_row_layout() == 'cs_summary_block'){ ?>
					<?php include('cs-summary-block.php'); ?>
				<?php } elseif(get_row_layout() == 'cs_challenges_block'){ ?>
					<?php include('cs-challenges-block.php'); ?>
				<?php } elseif(get_row_layout() == 'cs_waggle_approach'){ ?>
					<?php include('waggle-approach.php'); ?>
				<?php } elseif(get_row_layout() == 'cs_houghton_approach'){ ?>
					<?php include('houghton-approach.php'); ?>
				<?php } elseif(get_row_layout() == 'cs_pearson_approach'){ ?>
					<?php include('pearson-approach.php'); ?>
				<?php } elseif(get_row_layout() == 'cs_results'){ ?>
					<?php include('results.php'); ?>
				<?php } elseif(get_row_layout() == 'cs_video'){ ?>
					<?php include('video.php'); ?>
				<?php } elseif(get_row_layout() == 'cs_feedback'){ ?>
					<?php include('feedback.php'); ?>
				<?php } elseif(get_row_layout() == 'cs_industry_feedback'){ ?>
					<?php include('industry-feedback.php'); ?>
				<?php } ?>
			<?php endwhile; ?>
				</section>
		<?php endif;?>
	<?php endwhile; ?>
<?php endif; ?>