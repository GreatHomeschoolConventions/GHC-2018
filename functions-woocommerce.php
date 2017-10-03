<?php

/**
 * Display location stripe
 * @param  string string to display
 * @return string HTML output
 */
function ghc_locations_stripe( $info_text = 'More Information&rarr;' ) {
    global $conventions;
    ob_start();
    ?>
    <section class="locations">
        <div class="wrap full">
            <?php foreach ( $conventions as $convention ) { ?>
            <div class="<?php echo strtolower( $convention['convention_abbreviated_name'][0] ); ?> theme bg">
                <a href="<?php echo get_permalink( $convention['ID'] ); ?>" data-post-id="<?php echo $convention['registration'][0]; ?>" data-post-category="<?php echo strtolower( $convention['convention_short_name'][0] ); ?>">
                    <h2><?php echo $convention['convention_short_name'][0]; ?></h2>
                    <p class="info"><?php echo $convention['city'][0] . ', ' . $convention['state'][0]; ?></p>
                    <p class="info"><?php echo ghc_format_date_range( $convention['begin_date'][0], $convention['end_date'][0], 'Ymd' ); ?></p>
                    <p><?php echo esc_attr( $info_text ); ?></p>
                </a>
            </div>
            <?php } ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

/**
 * Tweak YITH Social Login locations
 */
if ( class_exists( 'YITH_WC_Social_Login_Frontend' ) ) {
    // remove third “stripe”
    remove_action( 'woocommerce_after_template_part', array( YITH_WC_Social_Login_Frontend::get_instance(), 'social_buttons_in_checkout' ) );

    // move above username/email
    add_action( 'woocommerce_login_form_start', 'ghc_yith_social_login_returning' );
    remove_action( 'woocommerce_login_form', array( YITH_WC_Social_Login_Frontend::get_instance(), 'social_buttons' ) );

    // add above new password field
    add_filter( 'woocommerce_checkout_fields', 'ghc_yith_social_login_password' );
}

/**
 * Wrap YITH Social Login in a paragraph
 */
function ghc_yith_social_login_returning() {
    echo '<p>' . do_shortcode( '[yith_wc_social_login]' ) . '</p>';
}

/**
 * Add YITH Social Login buttons above new password field
 * @param  array $fields WooCommerce checkout fields
 * @return array modified WooCommerce checkout fields
 */
function ghc_yith_social_login_password( $fields ) {
    $fields['account']['account_password']['label'] = do_shortcode( '[yith_wc_social_login]' ) . '<br/>Or create a password:';

    return $fields;
}
