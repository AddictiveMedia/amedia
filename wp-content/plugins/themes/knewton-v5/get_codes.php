<?php

set_time_limit(0);

require_once('../../../wp-load.php');

if (!current_user_can('manage_options')) {
    wp_redirect('/');
    die;
}

require_once(realpath(dirname(__FILE__)) . '/hubspot/class.lists.php');
require_once(realpath(dirname(__FILE__)) . '/hubspot/class.contacts.php');
$api_key = '88da077d-c58a-4c0e-a770-7c2f6dc91194';
$lists_client = new HubSpot_Lists($api_key);
$contact_client = new HubSpot_Contacts($api_key);

$config = array(
    'staging' => array(
        'url' => 'https://integration.beta.knewton.com/rps/user/register/token',
        'auth' => 'Authorization: Basic SHVic3BvdFJlZ2lzdHJhdGlvbi1EZXY6WVBnYGRGemp5bGtCNSRKdkslfDEvIWxILUNvYC5faStSS2ReUC59djsyb2Z7P0lYO31OaVFUZyZ8SX1wYiEsUg=='
    ),
    'production' => array(
        'url' => 'https://beta.knewton.com/rps/user/register/token',
        'auth' => 'Authorization: Basic SHVic3BvdFJlZ2lzdHJhdGlvbi1Qcm9kOkpdZyVIYC1UOGdrWWwlVG82SSBbPyhXLVBMZmVtRS8tLCB4TitMenVFdWpUeC5WZE0rMWVCK3A+aXdsfmtTXTM='
    )
);

$errors = array();

if ($_POST) {

    if (!in_array(@$_POST['mode'], array('staging', 'production'))) {
        $errors[] = 'Invalid or missing Mode.';
    } else {
        $mode = $_POST['mode'];
    }

    if (!in_array(@$_POST['action'], array('make-codes', 'assign-codes-to-emails', 'assign-codes-to-list'))) {
        $errors[] = 'Invalid or missing Action.';
    } else {
        $action = $_POST['action'];
    }

    if ($action == 'make-codes') {
        $num = (int)@$_POST['num'];
        if (!$num) {
            $errors[] = 'Invalid number of codes.';
        }
    } elseif ($action == 'assign-codes-to-emails') {
        $emails = @$_POST['emails'];
        if (!$emails) {
            $errors[] = 'Missing email addresses.';
        }
    } elseif ($action == 'assign-codes-to-list') {
        $list_id = (int)@$_POST['list-id'];
        if (!$list_id) {
            $errors[] = 'Invalid or missing List ID';
        }
    }

    if (!@$_POST['source']) {
        $errors[] = 'Missing Source.';
    } else {
        $source = $_POST['source'];
    }
}

if (!$_POST || $errors) {
    $step = 1;
} elseif ($_POST && !$errors) {
    $step = 2;

    global $curl;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $config[$mode]['url'],
        CURLOPT_POST => true,
        CURLOPT_SSL_VERIFYPEER => false, 
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_POSTFIELDS => http_build_query(array('source' => $source)),
        CURLOPT_HTTPHEADER => array($config[$mode]['auth']),
        CURLOPT_FOLLOWLOCATION => true
    ));

    $output = '';
    if ($action == 'make-codes') {
        for ($i = 0; $i < $num; $i++) {
            $output .= get_code() . '<br />';
        }
    } elseif ($action == 'assign-codes-to-emails') {
        $emails = explode("\n", $emails);
        foreach ($emails as $email) {
            $email = trim($email);
            if (preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i', $email)) {
                $contact = $contact_client->get_contact_by_email($email);
                if (isset($contact->{'is-contact'}) && $contact->{'is-contact'}) {

                    if (@$contact->properties->registration_code->value) {
                        $output .= "<span style=\"color:red;font-weight:bold;\">{$email} already has an existing registration code ({$contact->properties->registration_code->value})!</span><br />";
                    } else {
                        $registration_code = get_code();
                        $contact_client->update_contact($contact->vid, array('registration_code' => $registration_code));
                        $output .= "Assigning <b>{$registration_code}</b> to <b>{$email}</b><br />";
                    }
                } else {
                    $output .= "<span style=\"color:red;font-weight:bold;\">{$email} is not an existing Hubspot contact!</span><br />";
                }
            } else {
                $output .= "<span style=\"color:red;font-weight:bold;\">{$email} is invalid!</span><br />";
            }
        }
    } elseif ($action == 'assign-codes-to-list') {
        $all_contacts = array();

        // error_log("Fetching Hubspot contacts");

        $contacts = get_list_page($list_id);

        if (isset($contacts->status) && $contacts->status == 'error') {
            $step = 1;
            $errors[] = 'Invalid List ID.';
        } else {

            $all_contacts = format_contacts($contacts);

            // error_log("Retrieved " . count($all_contacts) . " contacts");
            
            if ($contacts->{'has-more'} == '1') {
                while ($contacts->{'has-more'} == '1') {
                    $contacts = get_list_page($list_id, $contacts->{'vid-offset'});
                    $all_contacts = array_merge($all_contacts, format_contacts($contacts));
                    // error_log("Retrieved " . count($all_contacts) . " contacts");
                }
            }

            // error_log("Finished fetching contacts, fetching registration codes and updating contacts");

            $i = 0;
            foreach ($all_contacts as $contact) {
                $i++;
                if ($contact['existing_code']) {
                    $output .= "<span style=\"color:red;font-weight:bold;\">{$contact['email']} already has an existing registration code ({$contact['existing_code']})!</span><br />";
                    // error_log("Contact already had a registration code");
                } else {
                    $registration_code = get_code();
                    if ($registration_code) {
                        // error_log("Updating Hubspot contact {$i}");
                        $contact_client->update_contact($contact['vid'], array('registration_code' => $registration_code));
                        $output .= "Assigning <b>{$registration_code}</b> to <b>{$contact['email']}</b><br />";
                    } else {
                        // error_log("Failed to get registration code");
                        die;
                    }
                }
            }
        }
    }

    curl_close($curl);
}

function get_contact_email_address($contact) {
    foreach ($contact->{'identity-profiles'}[0]->identities as $profile) {
        if ($profile->type == 'EMAIL') {
            return $profile->value;
        }
    }
}

function format_contacts($contacts) {
    $return = array();

    foreach ($contacts->contacts as $contact) {
        $return[] = array(
            'vid' => $contact->vid, 
            'email' => get_contact_email_address($contact),
            'existing_code' => @$contact->properties->registration_code->value
        );
    }
    return $return;
}

function get_list_page($list_id, $start = false) {
    require_once(realpath(dirname(__FILE__)) . '/hubspot/class.lists.php');
    $api_key = '88da077d-c58a-4c0e-a770-7c2f6dc91194';
    $lists_client = new HubSpot_Lists($api_key);

    $params = array('property' => 'registration_code', 'count' => 100);
    if ($start) {
        $params['vidOffset'] = $start;
    }

    return $lists_client->get_contacts_in_list($params, $list_id);
}

global $code_counter;
$code_counter = 0;

function get_code() {
    global $curl;
    global $code_counter;

    if ($code_counter >= 100) {
        // error_log("Sleeping for 1s after retrieving {$code_counter} registration codes");
        sleep(1);
        $code_counter = 0;
    }

    $code_counter++;
    // error_log("Fetching registration code {$code_counter} of 100 in current batch");
    $response = curl_exec($curl);
    $obj = json_decode($response);
    if (is_object($obj) && isset($obj->token) && $obj->token) {
        return $obj->token;
    } else {
        // error_log("Error retrieving registration code.  Got {$response}");
        die;
    }
}

?><html>
<head>
    <title>Generate Codez</title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        (function($) {
            $(function() {
                $('.action').change(function() {
                    $('.wrapper').hide();
                    $('#' + $('.action:checked').val()).show();
                }).trigger('change');
            });
        })(jQuery);
    </script>
</head>
<body>
    <h1>Generate Registration Codes</h1>
    <?php if ($step == 1): ?>
        <p><strong>To generate registration codes, complete the form below.</strong></p>
        <?php if ($errors): ?>
            <strong style="color:red;">The following errors occurred:</strong>
            <ul style="color:red;font-weight:bold;">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
        <form action="" method="post">
            Mode:&nbsp;&nbsp;<br /><label><input type="radio" name="mode" value="staging"<?php echo @$_POST['mode'] == 'staging' || !$_POST ? 'checked' : '' ?> />&nbsp;&nbsp;Staging</label>
            <br />
            <label><input type="radio" name="mode" value="production"<?php echo @$_POST['mode'] == 'production' ? 'checked' : '' ?> />&nbsp;&nbsp;Production</label>
            <br /><br />
            <label>Source:&nbsp;&nbsp;<input type="text" name="source" value="<?php echo @$_POST['source'] ?>" /></label>
            <br /><br />
            Select action:<br />
            <label><input type="radio" class="action" name="action" value="make-codes"<?php echo @$_POST['action'] == 'make-codes' || !$_POST ? 'checked' : '' ?>>I want to generate a number of arbitrary codes</label>
            <br />
            <label><input type="radio" class="action" name="action" value="assign-codes-to-emails"<?php echo @$_POST['action'] == 'assign-codes-to-emails' ? 'checked' : '' ?>>I want to generate codes and assign them to Hubspot email addresses</label>
            <br />
            <label><input type="radio" class="action" name="action" value="assign-codes-to-list"<?php echo @$_POST['action'] == 'assign-codes-to-list' ? 'checked' : '' ?>>I want to generate codes and assign them to a Hubspot list</label>
            <br /><br />
            <div id="make-codes" class="wrapper" style="display:none;">
                <label>Number of Codes:&nbsp;&nbsp;<input type="text" name="num" value="<?php echo isset($_POST['num']) ? $_POST['num'] : 1 ?>" /></label>
            </div>
            <div id="assign-codes-to-emails" class="wrapper" style="display:none;">
                <label style="vertical-align:top">Enter email addresses one per line:&nbsp;&nbsp;<textarea rows="20" cols="30" name="emails"><?php echo @$_POST['emails'] ?></textarea></label>
            </div>
            <div id="assign-codes-to-list" class="wrapper" style="display:none;">
                <label>List ID:&nbsp;&nbsp;<input type="text" name="list-id" value="<?php echo @$_POST['list-id'] ?>" /></label>
            </div>
            <br /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
    <?php elseif ($step == 2): ?>
        <strong>Results:</strong><br /><br />
        <?php echo $output ?>
        <br /><br />
        <a href="/wp-content/themes/knewton-v3/get_codes.php">Back</a>
    <?php endif ?>
</body>
</html>