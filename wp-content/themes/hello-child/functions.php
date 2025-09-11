<?php

/**
 * Functions File
 * 
 * @package Hello Elementor Child
 */

function enqueue_child_styles() {
    wp_enqueue_style("hello-child-styles", get_stylesheet_uri());
}

add_action("wp_enqueue_scripts", "enqueue_child_styles");