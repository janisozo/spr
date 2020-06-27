<?php

function theme_enqueue_style() {
    wp_enqueue_style( 'spriditis', 'style.css', false );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_style' );