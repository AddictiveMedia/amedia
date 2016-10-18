<div class="row">
    <div class="pull-left">
        <h5>Share with your friends</h5>
        <ul class="share clearfix" style="position:relative;top:8px;">
            <li class="facebook-share" style="float:left;margin-right:10px;position:relative;top:-4px;">
                <div id="fb-root"></div>
                <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php the_permalink() ?>" send="false" layout="button_count" width="90" show_faces="false" font=""></fb:like>
            </li>

            <li class="twitter-share not-fb" style="float:left;margin-right:0px;">
                <a href="http://twitter.com/share" onclick=
                "javascript:_gaq.pursh(['_trackEvent','outbound-article','http://twitter.com/share']);"
                class="twitter-share-button" data-text="<?php the_field('tweet_text') ?>" data-count="horizontal" data-via=
                "Knewton">Tweet</a><script type="text/javascript" src=
                "http://platform.twitter.com/widgets.js"></script>
            </li>

            <li class="linkedin-share not-fb" style="float:left;margin-right:10px;">
                <script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-url="<?php the_permalink() ?>" data-counter="right"></script>
            </li>
            <li class="google-share not-fb" style="float:left;margin-right:10px;">
                <g:plusone size="medium" href="<?php the_permalink() ?>"></g:plusone>
                <script type='text/javascript' src='http://apis.google.com/js/plusone.js?ver=3.5.1'></script>
            </li>
        </ul>
        <br /><br />
        View all <a href="/infographics/" title="Education Infographics">Education Infographics ›</a>
    </div>
    <div class="pull-right">
        <h5>Embed this infographic on your website</h5>
        <?php
            $embed_string = '<a href="' . get_permalink() . '"><img src="' . get_field('infographic_url') . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" width="1000" /></a>';
            $embed_string .= "\n";
            $embed_string .= '<p>Created by <a href="http://www.knewton.com/" alt="Knewton" title="Knewton">Knewton</a>';

            if (($extra_creator = get_field('created_by_name')) && ($extra_creator_url = get_field('created_by_url'))) {
                $embed_string .= ' and <a href="' . $extra_creator_url . '">' . $extra_creator . '</a>';
            }
            $embed_string .= '</p>';
        ?>
        <textarea style="border:1px solid black;margin-right:90px;" rows="2" cols="50" onclick="select();" class=""><?php echo htmlspecialchars($embed_string) ?></textarea>
    </div>
</div>