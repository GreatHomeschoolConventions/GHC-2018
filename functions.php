<?php

/**
 * Add minified stylesheet, webfonts, and other custom assets
 */
function ghc_2018_minified_css() {
    wp_enqueue_style( 'local-webfonts', 'https://cdn.greathomeschoolconventions.com/fonts/league-gothic-normal.css' );
    wp_enqueue_style( 'google-webfonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i' );
    wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_directory_uri() . '/style.min.css' );
}
add_action( 'wp_enqueue_scripts', 'ghc_2018_minified_css', 5 );
