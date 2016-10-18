    <?php
        $nobot = get_sub_field('no_padding_bottom');
        $img = get_sub_field('header_block_bg_img');
        if($img) :
    ?>

        <div class="content-block header-block-bg no-padding-top no-padding-bottom bg-cover bg-bluelite" style="background-image: url(<?php echo $img['url']; ?>)">

    <?php endif; ?>

    <?php
        $title = get_sub_field('header_block_title');
        $isSubHeader = get_sub_field('is_sub_header');

    ?>

        <div class="content-block header-block header-block-full<?php echo ($nobot ? ' no-padding-bottom' : '');?>">
            <div class="inner">
                <?php if($title) : ?>

                    <h3 class="header-block-title<?php echo ($isSubHeader ? ' gamma' : ' alpha'); ?>">
                        <?php echo $title ?>
                    </h3>

                <?php endif; ?>

                <div class="mb0<?php echo ($isSubHeader ? ' delta' : ' gamma'); ?>">
                    <?php the_sub_field('header_block_text'); ?>
                </div>

                <?php
                    $link = get_sub_field('header_block_link');
                    $btnText = get_sub_field('header_block_btn_txt');
                    $btnType = get_sub_field('header_block_btn_type');
                    $new_window = get_sub_field('new_window') ? ' target="_blank"' : '';

                    if($link && $btnText) :
                ?>
                    <a class="btn btn-caret med header-block-btn <?php echo ($btnType === 'secondary' ? 'border-btn' : 'color-btn bg-turq1'); ?>" href="<?php echo $link; ?>"<?php echo $new_window ?>>
                        <?php echo $btnText; ?>
                    </a>

                <?php endif; ?>

            </div>
        </div>

    <?php if($img) : ?>

    </div>

    <?php endif; ?>