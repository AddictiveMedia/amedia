    <?php
        $cta = get_sub_field('icon_col_cta');
        $cta_link = get_sub_field('icon_col_cta_link');

        $grey = get_sub_field('bg_gray');
    ?>

    <div class="content-block border-bottom2 border-top2<?php echo ($grey ? ' bg-graylite' : ''); ?>">
        <div class="inner">

            <?php include('section-title.php'); ?>

            <div class="row-fluid grid-5-4-2-1 tac museo-sans-500">

            <?php
                if( have_rows('icon_column') ) : while ( have_rows('icon_column') ) : the_row();
                    $img = get_sub_field('icon_col_img');
                        $img = $img['url'];
                        $title =  get_sub_field('icon_col_title');
            ?>

                <div class="span2">

                    <?php if($img) { ?><img class="img-responsive icon-third-img mb1" src="<?php echo $img; ?>" /><?php } ?>

                    <?php echo ($title ? '<h2 class="mb2 zeta caps">' . $title . '</h2>' : ''); ?>

                    <p class="zeta">
                        <?php echo get_sub_field('icon_col_text'); ?>
                    </p>
                </div>

            <?php endwhile; endif; ?>

            </div>

            <?php if($cta) : ?>

            <a class="btn border-btn btn-caret fa-file-text med block"<?php echo ($link ? ' href="' . $link . '"' : ''); ?>><?php echo $cta; ?></a>

            <?php endif; ?>

        </div>
    </div>