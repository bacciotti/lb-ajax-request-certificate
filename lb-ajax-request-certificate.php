<?php

/*
 * Plugin Name: LB Ajax Request Certificate
 * Description: With Ajax, request and download certificate based on your ID (brazilian CPF) number
 *  Version: 2.0.0
 * Author: Lucas Bacciotti Moreira
*/

//=================================================
// Security: Abort if this file is called directly
//=================================================
if (!defined('ABSPATH')) {
    die;
}

//=================================================
// Absolute path
//=================================================
define('LB_AJAX_REQUEST_CERTIFICATE_PLUGIN_DIR', plugin_dir_path(__FILE__));

//=================================================
// Includes
//=================================================
require_once LB_AJAX_REQUEST_CERTIFICATE_PLUGIN_DIR . '/includes/lb_ajax_request_certificate_scripts.php';
require_once LB_AJAX_REQUEST_CERTIFICATE_PLUGIN_DIR . '/includes/lb_ajax_request_certificate_settings.php';
