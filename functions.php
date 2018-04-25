<?php

define( 'GHC_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Add minified stylesheet, webfonts, and other custom assets
 */
function ghc_2018_minified_css() {
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_directory_uri() . '/style.min.css', array(), GHC_THEME_VERSION );
	wp_enqueue_style( 'dashicons' ); ?>

	<script>
		WebFontConfig = {
			custom: {
				families: ['league_gothicregular', 'league_gothicitalic'],
				urls: ['https://cdn.greathomeschoolconventions.com/fonts/league-gothic-normal.css']
			},
			google: {
				families: ['Open Sans:400,400i,700,700i', 'Libre Franklin:300,300i,400,400i,600,600i,800,800i']
			},
			// World Radio popup ad
			google: {
				families: ['Raleway:300,500,700i'],
				text: 'Busy families rely on Want news reports from a biblical perspective, not a political bias? Don’t simply digest the news; examine it along with us!'
			},
		};

		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>

	<?php
}
add_action( 'wp_enqueue_scripts', 'ghc_2018_minified_css', 5 );

/**
 * Dequeue parent theme font stylesheet
 */
function ghc_2018_fonts() {
	wp_dequeue_style( 'twentyseventeen-fonts' );
}
add_action( 'wp_enqueue_scripts', 'ghc_2018_fonts', 15 );

/**
 * Remove Popup Maker stylesheet
 *
 * Should already be removed via plugin settings, but this will make sure
 */
function ghc_2018_popup_css() {
	wp_dequeue_style( 'popup-maker-site' );
}
add_action( 'wp_enqueue_scripts', 'ghc_2018_popup_css', 15 );

/**
 * Add featured speaker photo in content instead of as full featured image
 * @param  string $content HTML post content
 * @return string modified HTML post content
 */
function ghc_2018_featured_speaker_bio( $content ) {
	if ( 'speaker' === get_post_type() && has_post_thumbnail() ) {
		$content = get_the_post_thumbnail( get_the_ID(), 'square-thumb', array( 'class' => 'alignright' ) ) . $content;
	}
	return $content;
}
add_filter( 'the_content', 'ghc_2018_featured_speaker_bio', 15 );

include( 'functions-woocommerce.php' );
