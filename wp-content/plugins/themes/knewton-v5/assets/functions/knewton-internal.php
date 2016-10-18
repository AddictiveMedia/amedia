<?php


if (wp_next_scheduled('knewton_update_anticipation_count_cron')) {
    wp_clear_scheduled_hook('knewton_update_anticipation_count_cron');
}

wp_localize_script('knewton', 'knewton_data', array('ajaxurl' => admin_url('admin-ajax.php')));

function knewton_is_blog() {
    global $post;
    $post_type = get_post_type($post);
    return (is_home() || is_archive() || is_single()) && ($post_type == 'post');
}

function knewton_add_link_style($text, $location) {
    switch ($location) {
        case 'subtitle':
            $style = 'font-family:Georgia;font-size:14px;line-height:24px;color:#303030;font-weight:normal;margin:0;padding:0;font-style:italic;text-decoration:underline';
            break;
        case 'content':
            $style = 'color:#303030;font-family:Georgia;font-size:14px;line-height:25px;text-decoration:underline;';
            break;
    }

    return preg_replace('/<a/i', "<a style=\"{$style}\"", $text);
}

function knewton_show_hubspot() {

    // return false;

    if (isset($_GET['force_hubspot_overlay'])) {
        return true;
    }

    // if (isset($_COOKIE['hide_hubspot_popup'])) {
    //     return false;
    // }

    if (knewton_is_blog() || (function_exists('get_field') && get_field('show_hubspot'))) {

        // if (!isset($_COOKIE['hubspotutk'])) {
        //     return true;
        // }

        // require_once(realpath(dirname(__FILE__)) . '/hubspot/class.contacts.php');
        // $api_key = '88da077d-c58a-4c0e-a770-7c2f6dc91194';
        // $contacts = new HubSpot_Contacts($api_key);
        // $user_info = $contacts->get_contact_by_usertoken($_COOKIE['hubspotutk']);

        // if (isset($user_info->{'is-contact'}) && $user_info->{'is-contact'}) {
        //     return false;
        // }

        // if (isset($user_info->properties->user_type)) {
        //     return false;
        // }

        return true;
    }
}

function knewton_get_infographics() {

    return get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'infographic-template.php',
        'sort_order' => 'DESC',
        'sort_column' => 'menu_order',
        'hierarchical' => false
    ));
}

function knewton_login_footer() {
    if (class_exists('LWGP')) {
        echo LWGP::get_button();
    }
    return;
}

function knewton_get_urls_for_projector($post_id = 0) {

    date_default_timezone_set('America/New_York');

    if (!$post_id) {
        global $post;
        $post_id = $post->ID;
    }
    //first, check to see if there are any scheduled periods
    $scheduled = get_field('schedule', $post_id);
    if ($scheduled) {

        //found scheduled periods, so check if any of them match today's day of the week
        $today = date('w');
        //the admin interface uses 1 for monday and 7 for sunday,
        //but php date returns: "0 (for Sunday) through 6 (for Saturday)"
        if ($today == 0) {
            $today = 7;
        }

        $found_periods = array();
        foreach ($scheduled as $period) {
            $period_days = str_split($period['days_of_week']);
            if (in_array($today, $period_days)) {
                $found_periods[] = $period;
            }
        }

        $scheduled_period = false;
        if ($found_periods) {
            //if we found periods matching the day of the week, next we need to check the time
            $time = date('Gi');
            foreach ($found_periods as $period) {
                $period_start = preg_replace('/[^\d]/', '', $period['start_time']);
                $period_end = preg_replace('/[^\d]/', '', $period['end_time']);

                if ($time >= $period_start && $time < $period_end) {
                    $scheduled_period = $period;
                    break;
                }
            }
        }

        if ($scheduled_period) {
            //found a matching period, so we can just return those urls
            $scheduled_period['urls']['key'] = $scheduled_period['days_of_week'] . $scheduled_period['start_time'] . $scheduled_period['end_time'];
            return $scheduled_period['urls'];
        }
    }

    //didn't find a matching period, so just return the default
    $default = get_field('urls', $post_id);
    $default['key'] = 'default';
    return $default;
}

$shortcodes = array('pullquote');
foreach ($shortcodes as $shortcode) {
    add_shortcode($shortcode, 'knewton_handle_shortcode');
}

function knewton_handle_shortcode($args, $content, $shortcode) {
    $shortcode = trim(strtolower($shortcode));
    ob_start();

    switch ($shortcode) {
        case 'pullquote':
            echo '<p class="pullquote">' . $content . '</p>';
            break;

    }

    $html = ob_get_contents();
    ob_clean();
    return $html;
}

add_action('wp_ajax_knewton_get_jobs', 'knewton_get_jobs');
add_action('wp_ajax_nopriv_knewton_get_jobs', 'knewton_get_jobs');
function knewton_get_jobs($return = false) {

    $url = 'https://api.lever.co/v0/postings/knewton?mode=json';
    $json = file_get_contents($url);
    $objs = json_decode($json);
    $jobs = array();

    foreach ($objs as $job) {
        $jobs[(string) $job->text] = array(
            'id' => (string)$job->id,
            'title' => (string)$job->text,
            'url' => (string)$job->hostedUrl,
            'location' => (string)$job->categories->location,
            'department' => (string)$job->categories->team,
            'commitment' => (string)$job->categories->commitment,
            'description' => (string)$job->descriptionPlain
        );

        uasort($jobs, 'knewton_sort_jobs');
    }

    if ($return) {
        return $jobs;
    }

    echo json_encode($jobs);
    die;
}

function get_job_url($code, $title) {
    // escape job titles, e.g., "Manager of IT / Operations" => "Manager-of-IT-Operations"
    $title = preg_replace('/[^a-zA-Z0-9\s]+/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $job_url = "http://knewton.applytojob.com/apply/{$code}/{$title}";
    return $job_url;
}

function knewton_sort_jobs($a, $b) {
    if ($a['department'] == $b['department']) {
        if ($a['title'] == $b['title']) {
            return 0;
        }

        return $a['title'] > $b['title'] ? 1 : -1;
    }

    return $a['department'] > $b['department'] ? 1 : -1;
}

if (isset($_GET['talentreef_xml'])) {
    $date = date(DATE_RSS);

    $jobs = '';

    foreach (knewton_get_jobs(true) as $job) {

        $date = date(DATE_RSS);
        $desc = htmlspecialchars($job['description']);

        $jobs .= <<<EOT
<job>
    <title><![CDATA[{$job['title']}]]></title>
    <location_city><![CDATA[{$job['city']}]]></location_city>
    <location_state><![CDATA[{$job['state']}]]></location_state>
    <location_zip><![CDATA[{$job['postalcode']}]]></location_zip>
    <location_country><![CDATA[{$job['country']}]]></location_country>
    <job_id><![CDATA[{$job['id']}]]></job_id>
    <description><![CDATA[{$job['description']}]]></description>
    <category><![CDATA[{$job['department']}]]></category>
    <recruiter_name_first><![CDATA[]]></recruiter_name_first>
    <recruiter_name_last><![CDATA[]]></recruiter_name_last>
    <recruiter_id><![CDATA[]]></recruiter_id>
    <apply_url><![CDATA[{$job['url']}]]></apply_url>
    <language><![CDATA[en]]></language>
    <market><![CDATA[us]]></market>
    <recruiter_email><![CDATA[]]></recruiter_email>
</job>

EOT;
    }

        echo <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<source>
{$jobs}</source>
EOT;

die;
}

if (isset($_GET['jobs_rss'])) {

    $items = '';

    foreach (knewton_get_jobs(true) as $job) {

        $date = date(DATE_RSS);
        $desc = htmlspecialchars($job['description']);

        $items .= "
<item>
    <title>{$job['title']}</title>
    <description>{$desc}</description>
    <link>{$job['url']}</link>
    <pubDate>{$date}</pubDate>
    <guid>{$job['id']}</guid>
</item>
";
    }

echo <<<EOT
<?xml version="1.0" ?>
<rss version="2.0">
    <channel>
        <title>Knewton Jobs RSS Feed</title>
        <link>http://www.knewton.com/?jobs_rss</link>
        <description>A list of open Knewton jobs in RSS format</description>
        <language>en-us</language>
        <copyright>Knewton</copyright>
        {$items}
    </channel>
</rss>
EOT;
    die;
}

add_action('wp_ajax_knewton_get_referrer_url', 'knewton_get_referrer_url');
add_action('wp_ajax_nopriv_knewton_get_referrer_url', 'knewton_get_referrer_url');
add_action('knewton_update_anticipation_count_cron', 'knewton_update_anticipation_count');

if (!wp_next_scheduled('knewton_update_anticipation_count_cron')) {
    wp_schedule_event(time(), 'hourly', 'knewton_update_anticipation_count_cron');
}

function knewton_get_anticipation_count() {
    $count = get_option('knewton_anticipation_count');

    if (!$count) {
        $count = 17811; //starting value as of 8/5/14
        update_option('knewton_anticipation_count', $count);
    }

    return $count;
}

function knewton_increment_anticipation_count() {
    $count = knewton_get_anticipation_count();
    update_option('knewton_anticipation_count', ++$count);
    return $count;
}

function knewton_update_anticipation_count() {
    require_once(realpath(dirname(__FILE__)) . '/hubspot/class.lists.php');
    $api_key = '88da077d-c58a-4c0e-a770-7c2f6dc91194';
    $lists_client = new HubSpot_Lists($api_key);
    $list = $lists_client->get_list(15);

    if ($list->metaData->processing != 'DONE') {
        return;
    }

    update_option('knewton_anticipation_count', $list->metaData->size);
}

function knewton_get_referrer_url_by_email($email, $create = false) {
    require_once(realpath(dirname(__FILE__)) . '/hubspot/class.contacts.php');
    $api_key = '88da077d-c58a-4c0e-a770-7c2f6dc91194';
    $contact_client = new HubSpot_Contacts($api_key);

    $contact = $contact_client->get_contact_by_email($email);

    if (isset($contact->{'is-contact'}) && $contact->{'is-contact'}) {
        if (isset($contact->properties->referrer_id) && $id = $contact->properties->referrer_id->value) {
            return "https://www.knewton.com/beta-join/{$id}/";
        }
    }

    if (!$create) {
        return false;
    }

    //they either are not a contact or dont have a referrer id, and we want to create one, so do so here
    if (!isset($contact->{'is-contact'}) || !$contact->{'is-contact'}) {
        //create the hubspot contact
        $id = knewton_get_new_referrer_id();
        $new_contact = $contact_client->create_contact(array('email' => $email, 'referrer_id' => $id));

        if (isset($new_contact->vid) && $new_contact->vid) {
            //it worked, new contact is created
            knewton_increment_anticipation_count();
            return "https://www.knewton.com/beta-join/{$id}/";
        } else {
            return false;
        }
    } else {
        //they already exist in hubspot but don't have a referrer id, so update their contact
        $id = knewton_get_new_referrer_id();
        $contact_client->update_contact($contact->vid, array('referrer_id' => $id));
        return "https://www.knewton.com/beta-join/{$id}/";
    }

    return false;
}

function knewton_get_new_referrer_id() {

    $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $length = 6;

    $id = '';
    for ($i = 0; $i < $length; $i++) {
        $id .= substr($chars, wp_rand(0, strlen($chars) - 1), 1);
    }

    return $id;
    // return "https://www.knewton.com/beta-join/{$id}/";
}

function knewton_get_referrer_url() {

    require_once(realpath(dirname(__FILE__)) . '/hubspot/class.contacts.php');
    $api_key = '88da077d-c58a-4c0e-a770-7c2f6dc91194';
    $contact_client = new HubSpot_Contacts($api_key);

    $email = $_GET['email'];

    //check to see if this email address exists in hubspot, and if it has a referral url set
    $contact = $contact_client->get_contact_by_email($email);

    if (isset($contact->status) && $contact->status == 'error' && $contact->message == 'contact does not exist') {
        //contact doesn't exist in hubspot, so generate a referral url and send it back to the front end
        knewton_increment_anticipation_count();
        echo json_encode(array('status' => 'new', 'referrer_id' => knewton_get_new_referrer_id()));
    } elseif (isset($contact->{'is-contact'}) && $contact->{'is-contact'}) {

        //the contact exists in hubspot, so check to see if it has already got a referrer url
        if (isset($contact->properties->referrer_id) && $id = $contact->properties->referrer_id->value) {
            echo json_encode(array('status' => 'existing', 'referrer_id' => $id));
        } else {
            //either no referrer set or it isnt a valid url,
            //so generate one and return it to the front end so it can be put in the form and then submitted
            knewton_increment_anticipation_count();
            echo json_encode(array('status' => 'update', 'referrer_id' => knewton_get_new_referrer_id()));
        }
    } else {
        //something went wrong
        echo json_encode(array('status' => 'error'));
    }

    die;
}

add_filter('query_vars', 'knewton_query_vars');
function knewton_query_vars($vars) {
    $vars[] = 'chapter';
    $vars[] = 'referrer_id';
    return $vars;
}

add_filter('rewrite_rules_array', 'knewton_rewrite_rules_array');
function knewton_rewrite_rules_array($rules) {
    $tmp = array();
    $tmp['about/executive-team/?$'] = 'index.php?post_type=team';
    $tmp['about/executive-team/(.*)$'] = 'index.php?post_type=team&name=$matches[1]&team=$matches[1]';
    $tmp['(adaptive\-learning\-intro)/?(.*?)?/?$'] = 'index.php?post_type=page&pagename=adaptive-learning-intro&chapter=$matches[2]';
    $tmp['beta\-join/(.*?)/?$'] = 'index.php?post_type=page&pagename=beta-join&referrer_id=$matches[1]';
    return $tmp + $rules;
}

add_action('pre_get_posts', 'knewton_search_filter');
function knewton_search_filter($query) {
    if (is_admin()) { return $query; }

    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('the_content', 'knewton_the_content');
function knewton_the_content($content) {

    if (is_single() && get_post_type() == 'quote') {
        wp_redirect('/quotes/', 301);
        die;
    }

    if (is_single() && get_post_type() == 'post') {
        if (preg_match('/wistia_embed/si', $content)) {
            $content .= <<<EOT
<script src="//fast.wistia.com/static/embed_shepherd-v1.js"></script>
<script>
wistiaEmbeds.onFind(function(video) {
  video.videoFoam(true);
  video.addPlugin("dimTheLights", {
    src: "//fast.wistia.com/labs/dim-the-lights/plugin.js",
    outsideIframe: true
  });
});
</script>
EOT;
        }
    }
    return $content;
}

add_filter('wpseo_canonical', 'knewton_wpseo_canonical');
function knewton_wpseo_canonical($original) {
    if (is_page('beta-join')) {
        global $wp_query;
        if ($wp_query->query['referrer_id']) {
            return false;
        }
    }
}

add_action('add_meta_boxes', 'knewton_add_meta_boxes');
function knewton_add_meta_boxes() {
    add_meta_box('newsletter_jobs', 'Jobs List', 'knewton_jobs_list', 'newsletter', 'side', 'default');
}

function knewton_jobs_list() {
    $jobs = knewton_get_jobs(true);
    echo '<script type="text/javascript">';
    echo "\nvar job_list = {\n";
    $i = 0;
    foreach ($jobs as $job) {
        echo "\t" . (string)$job['id'] . ": { \n";
        echo "\t\t" . 'title:\'' . (string)$job['title'] . "',\n";
        echo "\t\t" . 'url:\'' . (string)$job['url'] . "'\n";
        echo "\t}";
        if (++$i != count($jobs)) {
            echo ',';
        }
        echo "\n";
    }
    echo "};\n";
    echo <<<EOT
(function($) {

    var module_type = 'field_528547bab0ff5';

    $(function() {

        //remove already added jobs
        var knerd_alerts = $('tr[data-field_name="knerd_alerts"]');
        var jobs = $('#job-list li a');
        $('tr.row', knerd_alerts).each(function(i, row) {
            row = $(row);
            var title = $('input[type="text"]', row).first().val();
            jobs.filter(function() {
                return $(this).text() == title;
            }).remove();

        });

        $('.add-job').click(function() {

            var knerd_alerts_select = $('select').filter(function() { return $(this).val() == 'Knerd Alerts' });

            if (knerd_alerts_select.length != 1) {
                alert('You must have exactly one Knerd Alerts module in order to auto add jobs.');
                return;
            }

            var knerd_alerts_module = knerd_alerts_select.closest('.row');
            var add_alert_button = $('a.acf-button').filter(function() { return $(this).text() == 'Add Alert' && $(this).is(':visible'); });
            add_alert_button.trigger('click');

            var knerd_alerts = $('tr[data-field_name="knerd_alerts"]');
            var last_alert = $('tr.row', knerd_alerts).last();


            var title = $('input[type="text"]', last_alert).first();
            var url = $('input[type="text"]', last_alert).last();


            var job_id = $(this).data('jobid');
            var job = job_list[job_id];

            title.val(job.title);
            url.val(job.url);

            $(this).remove();

        });
    });
})(jQuery);
EOT;
    echo '</script>';
    echo '<p>Click on a job below to add it to the newsletter.  You must add a module of type "Knerd Alerts" before adding jobs.</p>';
    echo '<ul id="job-list">';
    foreach ($jobs as $job) {
        echo '<li><a class="add-job" data-jobid="' . (string)$job['id'] . '" href="javascript:void(0);">';
        echo (string)$job['title'];
        echo '</a></li>';
    }
    echo '</ul>';
}

add_filter('excerpt_length', 'knewton_excerpt_length');
add_filter('excerpt_more', 'knewton_excerpt_more');
function knewton_excerpt_length($length) {
    return 75;
}

function knewton_excerpt_more($more) {
    return '... <a href="' . get_permalink() . '">Read more</a>';
}