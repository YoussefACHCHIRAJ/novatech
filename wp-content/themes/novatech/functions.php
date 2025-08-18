<?php


/**
 * Theme Functions
 * 
 * @package NovaTech
 */

use NovaTech\Inc\NovaTechTheme;

if (!defined('NOVATECH_DIR_PATH')) {
    define('NOVATECH_DIR_PATH', get_template_directory());
}

require_once NOVATECH_DIR_PATH . '/Inc/Helpers/autoloader.php';

NovaTechTheme::get_instance(); 
