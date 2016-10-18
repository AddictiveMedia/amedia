<?php
	$tw_section_heading = get_sub_field('tw_section_heading');
?>
<section class="two-video-section">
	<div class="wrapper">
		<?php if(!empty($tw_section_heading)){ ?>
			<h2><?php echo $tw_section_heading; ?></h2>
		<?php } ?>
		<?php if( have_rows('tw_video') ): ?>
			<ul class="video-row">
				<?php
					$counter = 1;
					while(have_rows('tw_video')):the_row();
					$tw_video_image = get_sub_field('tw_video_image');
					$tw_video_embedded_code = get_sub_field('tw_video_embedded_code');
					$tw_video_heading = get_sub_field('tw_video_heading');
					$tw_video_sub_heading = get_sub_field('tw_video_sub_heading');
					$tw_video_content = get_sub_field('tw_video_content');
					$tw_author_name = get_sub_field('tw_author_name');
					$tw_author_details = get_sub_field('tw_author_details');
				?>
				<li>
					<div class="video-box">
						<div class="video-thumb-box">
							<img src="<?php echo $tw_video_image['url']; ?>" alt="" />
							<div class="video-text">
								<?php if(!empty($tw_video_heading)){ ?>
									<h3><?php echo $tw_video_heading; ?></h3>
								<?php } ?>
								<?php if(!empty($tw_video_sub_heading)){ ?>
									<h4><?php echo $tw_video_sub_heading; ?></h4>
								<?php } ?>
							</div>
							<span class="black-overlay"></span>
							<a class="popup-link" href="#onpage-video<?php echo $counter; ?>">Play Video</a>
						</div>
						<div class="video-details">
							<?php
								if(!empty($tw_video_content))
									echo $tw_video_content;
							?>
							<?php if(!empty($tw_author_name)){ ?>
								<span class="author-name"><?php echo $tw_author_name; ?></span>
							<?php } ?>
							<?php if(!empty($tw_author_details)){ ?>
								<span class="author-details"><?php echo $tw_author_details; ?></span>
							<?php } ?>
						</div>
					</div>
					<div style="display: none;">
						<div class="popup-video-box" id="onpage-video<?php echo $counter; ?>">
							<?php echo $tw_video_embedded_code; ?>
						</div>
					</div>
				</li>
				<?php $counter++; endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>