<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', ' |' );
	}
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentyseventeen' ) ); ?>" target="_blank" rel="noopener">Proudly powered by WordPress</a> | Designed and developed by <a href="https://andrewrminion.com/?ref=greathomeschoolconventions.com" target="_blank" rel="noopener">AndrewRMinion Design</a>
</div><!-- .site-info -->
