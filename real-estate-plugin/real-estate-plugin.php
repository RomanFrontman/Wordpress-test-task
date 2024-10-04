<?php
/**
 * Real-estate-plugin
 *
 *    
 * @author        Roman
 *
 * @wordpress-plugin
 * Plugin Name:       Real estate plugin
 * Description:       This plugin initializes a new post type "Real estate" and taxonomy "District". 
 * Version:           1.0.0
 * Author:            WP Engine
 */

define('REAL_ESTATE_DIR', __DIR__);
define('REAL_ESTATE_URL', plugin_dir_url(__FILE__));

require_once(REAL_ESTATE_DIR . '/includes/setup.php');
require_once(REAL_ESTATE_DIR . '/includes/post-type.php');
require_once(REAL_ESTATE_DIR . '/includes/post-ajax.php');
require_once(REAL_ESTATE_DIR . '/includes/shortcode.php');
 
 
