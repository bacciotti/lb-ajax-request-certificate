<?php
//=================================================
// Scripts Page
//=================================================
// Enqueue CSS and JS/jQuery
// Enqueue Ajax
// Enqueue CSS
//=================================================
add_action('admin_enqueue_scripts', 'lb_ajax_request_certificate_add_scripts');

function lb_ajax_request_certificate_add_scripts()
{
    //Js/jQuery
    wp_enqueue_script(
        'lb_ajax_request_certificate_js', //MESMO HANDLE NAME
        plugin_dir_url(__FILE__) . '../js/lb_ajax_request_certificate_js.js',
        array('jquery'),
        null,
        true
    );

    //Ajax
    wp_localize_script(
        'lb_ajax_request_certificate_js', //MESMO HANDLE NAME
        'lb_ajax_object',
        array('ajax_url' => admin_url('admin-ajax.php'),
            'we_value' => 'ID DO PARTICIPANTE'));

    // Styles
    wp_enqueue_style(
        'lb_ajax_certificate',
        plugin_dir_url(__FILE__) . '../css/lb_ajax_request_certificate_css.css'
    );
}