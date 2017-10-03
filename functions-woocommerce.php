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

remove_action( 'woocommerce_after_template_part', array( YITH_WC_Social_Login_Frontend::get_instance(), 'social_buttons_in_checkout' ) );
