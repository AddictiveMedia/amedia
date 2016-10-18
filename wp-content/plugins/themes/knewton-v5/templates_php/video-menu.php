<!-- Featured video -->
<div class="content-block no-padding-top">
  <div class="inner border-bottom2">
    <div class="video-embed">
      <!-- Wistia inline video player -->
      <script src="//fast.wistia.com/embed/medias/<?php echo (get_sub_field('featured_video')); ?>.jsonp" async></script>
      <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
        <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
          <div class="wistia_embed wistia_async_<?php echo (get_sub_field('featured_video')); ?> videoFoam=true" style="height:100%;width:100%">&nbsp;</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Visible videos -->
<?php if ( have_rows('visible_video') ):  ?>
  <div id="visible-videos">
    <?php while( have_rows('visible_video') ) : the_row(); ?>
      <div class="img-text-wrap column-switch med-type">
        <div class="img-text-block content-block group">
          <div class="inner pr">
            <div class="img-text-block-inner">
              <div class="img-text-col-img-mob">
                <!-- Wistia inline video player -->
                <script src="//fast.wistia.com/embed/medias/<?php echo (the_sub_field('visible_video_id')); ?>.jsonp" async></script>
                <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                  <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                    <div class="wistia_embed wistia_async_<?php echo (the_sub_field('visible_video_id')); ?> videoFoam=true" style="height:100%;width:100%">&nbsp;</div>
                  </div>
                </div>
              </div>
              <div class="img-text-col text-col img-text-col-top img-text-col-70">
                <h2 class="epsilon mb4"><?php the_sub_field('visible_video_title') ?></h2>
                <p><?php the_sub_field('visible_video_description') ?></p>
              </div>
              <div class="img-text-col img-col img-text-col-top">
                <!-- Wistia popover video (clicking image launches autoplay video player in lightbox modal) -->
                <script src="//fast.wistia.com/embed/medias/<?php echo (the_sub_field('visible_video_id')); ?>.jsonp" async></script>
                <span class="wistia_embed wistia_async_<?php echo (the_sub_field('visible_video_id')); ?> popover=true popoverAnimateThumbnail=true" style="display:inline-block;height:169px;width:300px">&nbsp;</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>

<!-- More videos (toggle show/hide) -->
<?php if ( have_rows('hidden_video') ):  ?>
  <!-- See more videos button -->
  <div class="content-block tac no-padding-top" id="showButtonDiv">
    <a id="showButton" class="btn btn-caret-down med header-block-btn border-btn" href="#more-videos">See More Videos</a>
  </div>
  <!-- More videos -->
  <div id="more-videos" class="hidden">
    <?php while( have_rows('hidden_video') ) : the_row(); ?>
      <div class="img-text-wrap column-switch med-type">
        <div class="img-text-block content-block group">
          <div class="inner pr">
            <div class="img-text-block-inner">
              <div class="img-text-col-img-mob">
                <!-- Wistia inline video player -->
                <script src="//fast.wistia.com/embed/medias/<?php echo (the_sub_field('hidden_video_id')); ?>.jsonp" async></script>
                <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                  <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                    <div class="wistia_embed wistia_async_<?php echo (the_sub_field('hidden_video_id')); ?> videoFoam=true" style="height:100%;width:100%">&nbsp;</div>
                  </div>
                </div>
              </div>
              <div class="img-text-col text-col img-text-col-top img-text-col-70">
                <h2 class="epsilon mb4"><?php the_sub_field('hidden_video_title') ?></h2>
                <p><?php the_sub_field('hidden_video_description') ?></p>
              </div>
              <div class="img-text-col img-col img-text-col-top">
                <!-- Wistia popover video (clicking image launches autoplay video player in lightbox modal) -->
                <script src="//fast.wistia.com/embed/medias/<?php echo (the_sub_field('hidden_video_id')); ?>.jsonp" async></script>
                <span class="wistia_embed wistia_async_<?php echo (the_sub_field('hidden_video_id')); ?> popover=true popoverAnimateThumbnail=true" style="display:inline-block;height:169px;width:300px">&nbsp;</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
  <!-- Hide videos button -->
  <div class="content-block tac no-padding-top hidden" id="hideButtonDiv">
    <a id="hideButton" class="btn btn-caret-up med header-block-btn border-btn" href="#visible-videos">Hide Videos</a>
  </div>
<?php endif; ?>
<script src="//fast.wistia.com/assets/external/E-v1.js" async></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/video-menu.js"></script>