<?php

function theme_enqueue_styles_and_scripts() {
    wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts');

?>