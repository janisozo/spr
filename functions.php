<?php

function load_main_stylesheet() {
	wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'load_main_stylesheet');

?>