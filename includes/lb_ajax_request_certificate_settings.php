<?php
//=================================================
// Settings Page
//=================================================
// Create plugin pages
// Register menu
// Code the main function 'lb_ajax_action'
//=================================================
add_action('admin_menu', 'lb_ajax_request_certificate_menu');
function lb_ajax_request_certificate_menu()
{
    add_menu_page(
        'LB Ajax Request Certificate',
        'LB Ajax Request Certificate',
        'manage_options',
        'lb-ajax-request-certificate',
        'lb_ajax_request_certificate_menu_page',
        'dashicons-format-aside',
        98
    );
}

function lb_ajax_request_certificate_menu_page()
{
    ?>
    <div>
        <h1>LB Ajax Request Certificate</h1>
        <div id="lb-ajax-request-certificate-advice">
            This plugin allows you to request and download the customer's certificate (or other media) just inserting
            its name. Now with Ajax :)
        </div>
        <div>
            <h3>Type customer ID:</h3>
            <input name="user_id" id="user_id" type="text" placeholder="E.g.: 123456789">
            <button id="lb_ajax_request_certificate_button">REQUEST CERTIFICATE</button>
            <p>Only numbers. The ID should match the PDF file name.</p>
            <div id="lb_ajax_request_certificate_message"><p></p></div>
            <a href="" id="lb_ajax_request_certificate_button_anchor" target="_blank">Click here to download</a>
        </div>
    </div>
    <?php
}

add_action('wp_ajax_lb_ajax_action', 'lb_ajax_action');
function lb_ajax_action()
{
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;

    if (is_null($user_id) or strlen(trim($user_id)) == 0) {
        echo "error";
    } else {
        $user_id = sanitize_text_field($user_id);
        $args = array(
            'posts_per_page' => 1,
            'post_type' => 'attachment',
            'name' => trim($user_id),
        );
        $_header = get_posts($args);
        $header = $_header ? array_pop($_header) : null;
        $result = $header ? wp_get_attachment_url($header->ID) : '';
        $ext = trim(substr($result, -4, 4));

        if ($ext != ".pdf" && $ext != ".png" && $ext != ".jpg" && $ext != ".jpeg") {
            echo "error";
        } else {
            echo $result;
        }
    }
    wp_die();
}

