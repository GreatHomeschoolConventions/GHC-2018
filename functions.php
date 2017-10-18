<?php

CONST GHC_THEME_VERSION = '3.0.6';

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

/**
 * Add FullStory analytics tracking
 */
function ghc_2018_fullstory_js() { ?>
    <script>
    window['_fs_debug'] = false;
    window['_fs_host'] = 'fullstory.com';
    window['_fs_org'] = '82463';
    window['_fs_namespace'] = 'FS';
    (function(m,n,e,t,l,o,g,y){
        if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
        g=m[e]=function(a,b){g.q?g.q.push([a,b]):g._api(a,b);};g.q=[];
        o=n.createElement(t);o.async=1;o.src='https://'+_fs_host+'/s/fs.js';
        y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
        g.identify=function(i,v){g(l,{uid:i});if(v)g(l,v)};g.setUserVars=function(v){g(l,v)};
        g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
        g.clearUserCookie=function(c,d,i){if(!c || document.cookie.match('fs_uid=[`;`]*`[`;`]*`[`;`]*`')){
        d=n.domain;while(1){n.cookie='fs_uid=;domain='+d+
        ';path=/;expires='+new Date(0).toUTCString();i=d.indexOf('.');if(i<0)break;d=d.slice(i+1)}}};
    })(window,document,window['_fs_namespace'],'script','user');
    </script>
    <?php
}
add_action( 'wp_footer', 'ghc_2018_fullstory_js' );

include( 'functions-woocommerce.php' );
