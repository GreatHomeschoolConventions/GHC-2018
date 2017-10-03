<?php
/**
 * Section to show social login buttons
 *
 * @package YITH WooCommerce Social Login
 * @since   1.0.0
 * @author  Yithemes
 */
?>

<span class="wc-social-login">
    <?php if( !empty($label)):?>
        <span class="ywsl-label">Log in with your preferred social network:</span><br/>
        <span class="socials-list">
    <?php endif;

    YITH_WC_Social_Login_Frontend()->social_buttons('social-icons');

    if ( ! empty( $label ) ) {
        echo '</span>';
    }
    ?>
</span>
