<?php

require_once('../../../wp-load.php');
if (!is_user_logged_in()) {
    wp_redirect('/');
    die;
}

require_once(realpath(dirname(__FILE__)) . '/hubspot/class.lists.php');
$api_key = '88da077d-c58a-4c0e-a770-7c2f6dc91194';
$lists_client = new HubSpot_Lists($api_key);

$list_ids = explode(',', $_GET['ids']);

?><html>
<head>
    <title>Get Listz</title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.17.5/js/jquery.tablesorter.min.js"></script>
    <script type="text/javascript">
        (function($) {
            $(function() {
                $('.tablesorter').tablesorter({
                    widgets: ['zebra', 'columns']
                });
            });
        })(jQuery);
    </script>
    <link type="text/css" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.17.5/css/theme.default.css">
</head>
<body>
    <table class="tablesorter">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Size</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_ids as $list_id): ?>
                <?php $list = $lists_client->get_list($list_id) ?>
                <?php $size = $list->metaData->processing == 'DONE' ? $list->metaData->size : 0 ?>
                <tr>
                    <td><?php echo $list_id ?></td>
                    <td><?php echo $list->name ?></td>
                    <td><?php echo $size ? number_format($size) : 'N/A' ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>