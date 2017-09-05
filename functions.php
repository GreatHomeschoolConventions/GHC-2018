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

/**
 * Format date range
 *
 * @link https://codereview.stackexchange.com/a/78303 Adapted from this answer
 *
 * @param  object|string $d1            start DateTime object or string
 * @param  object|string $d2            end DateTime object or string
 * @param  string        [$format       = ''] date format if passed as strings
 * @return string        formatted date string
 */
function ghc_format_date_range( $d1, $d2, $format = '' ) {
    if ( is_string( $d1 ) && is_string( $d2 ) && $format ) {
        $d1 = date_create_from_format( $format, $d1 );
        $d2 = date_create_from_format( $format, $d2 );
    }

    if ( $d1->format( 'Y-m-d' ) === $d2->format( 'Y-m-d' ) ) {
        // Same day
        return $d1->format( 'F d, Y' );
    } elseif ( $d1->format( 'Y-m' ) === $d2->format( 'Y-m' ) ) {
        // Same calendar month
        return $d1->format( 'F d' ) . '&ndash;' . $d2->format( 'd, Y' );
    } elseif ( $d1->format( 'Y' ) === $d2->format( 'Y' ) ) {
        // Same calendar year
        return $d1->format( 'F d' ) . '&ndash;' . $d2->format( 'F d, Y' );
    } else {
        // General case (spans calendar years)
        return $d1->format( 'F d, Y' ) . '&ndash;' . $d2->format( 'F d, Y' );
    }
}
