<?php
/**
 * Displays content for front page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<section class="tagline">
    <div class="wrap full">
        <article class="encourage">
            <h2>Encouraging!</h2>
            <p>Grace-filled families <strong>encourage</strong> you to continue!</p>
        </article>
        <article class="equip">
            <h2>Equipping!</h2>
            <p>Comprehensive curriculum choices <strong>equip</strong> you to be the best!</p>
        </article>
        <article class="energize">
            <h2>Energizing!</h2>
            <p>Speakers and workshops <strong>energize</strong> you to keep on going!</p>
        </article>
    </div>
    <article class="fun">
        <h2>Fun!!!</h2>
        <p>Nationally-recognized special events are fun for the whole family!</p>
    </article>
</section>
<section class="locations-map">
    <?php include( get_stylesheet_directory() . '/img/US-map.svg' ); ?>
    <?php echo ghc_locations_stripe(); ?>
</section>
<section class="featured-speakers">
    <div class="wrap">
        <h2>Featured Speakers</h2>
        <?php echo do_shortcode( '[speaker_grid posts_per_page="12" show="image, name" image_size="150, 150"]' ); ?>
        <p><a class="button all-speakers" href="<?php echo home_url(); ?>/speakers/">View All Featured Speakers&rarr;</a></p>
    </div>
</section>
<section class="sponsors">
    <div class="wrap">
        <h2>Sponsors</h2>
        <?php echo do_shortcode( '[sponsors width="200" gray="true"]' ); ?>
    </div>
</section>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'twentyseventeen-panel ' ); ?> >
    <div class="panel-content">
        <div class="wrap">
            <div class="entry-content">
                <?php
                    /* translators: %s: Name of current post */
                    the_content( sprintf(
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
                        get_the_title()
                    ) );
                ?>
            </div><!-- .entry-content -->

        </div><!-- .wrap -->
    </div><!-- .panel-content -->

</article><!-- #post-## -->
