<?php
/**
 * Theme Functions
 * 
 * @package NovaTech
 */

use NovaTech\Inc\NovaTech_Theme;

if (!defined('NOVATECH_DIR_PATH')) {
    define('NOVATECH_DIR_PATH', unTrailingSlashit(get_template_directory()));
}

if (!defined('NOVATECH_DIR_URI')) {
    define('NOVATECH_DIR_URI', unTrailingSlashit(get_template_directory_uri()));
}

require_once NOVATECH_DIR_PATH . '/inc/helpers/autoloader.php';

function novaTech_get_theme_instance() {
    NovaTech_Theme::get_instance();
}

show_admin_bar(false);


novaTech_get_theme_instance();
