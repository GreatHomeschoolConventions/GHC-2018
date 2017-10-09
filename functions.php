<?php

CONST GHC_THEME_VERSION = '3.0.3';

/**
 * Add minified stylesheet, webfonts, and other custom assets
 */
function ghc_2018_minified_css() {
    wp_enqueue_style( 'local-webfonts', 'https://cdn.greathomeschoolconventions.com/fonts/league-gothic-normal.css' );
    wp_enqueue_style( 'google-webfonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i' );
    wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_directory_uri() . '/style.min.css', array(), GHC_THEME_VERSION );
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'ghc_2018_minified_css', 5 );

function ghc_2018_featured_speaker_bio( $content ) {
    if ( 'speaker' === get_post_type() && has_post_thumbnail() ) {
        $content = get_the_post_thumbnail( get_the_ID(), 'square-thumb', array( 'class' => 'alignright' ) ) . $content;
    }
    return $content;
}
add_filter( 'the_content', 'ghc_2018_featured_speaker_bio', 15 );

include( 'functions-woocommerce.php' );
