<?php

/**
 * Use minified stylesheet
 */
function ghc_2018_minified_css() {
    wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_directory_uri() . '/style.min.css' );
}
add_action( 'wp_enqueue_scripts', 'ghc_2018_minified_css', 5 );
