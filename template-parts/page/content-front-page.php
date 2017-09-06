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
        <article class="educate">
            <h2>Educate</h2>
            <p>Respected speakers <strong>educate</strong> you for the houmeschool journey.</p>
        </article>
        <article class="encourage">
            <h2>Encourage</h2>
            <p>Grace-filled families <strong>encourage</strong> you to continue.</p>
        </article>
        <article class="equip">
            <h2>Equip</h2>
            <p>Comprehensize curriculum choices <strong>equip</strong> you to be the best.</p>
        </article>
    </div>
    <article class="fun">
        <h2>Fun!!!</h2>
    </article>
</section>
<section class="locations-map">
    <?php include( get_stylesheet_directory() . '/img/US-map.svg' ); ?>
    <section class="locations">
        <div class="wrap full">
            <div class="se theme bg">
                <a href="/locations/southeast/">
                    <h2>Southeast</h2>
                    <p class="info">March 8&ndash;10, 2018</p>
                    <p>More Information&rarr;</p>
                </a>
            </div>
            <div class="tx theme bg">
                <a href="/locations/texas/">
                    <h2>Texas</h2>
                    <p class="info">March 15&ndash;17, 2018</p>
                    <p>More Information&rarr;</p>
                </a>
            </div>
            <div class="mw theme bg">
                <a href="/locations/midwest/">
                    <h2>Midwest</h2>
                    <p class="info">April 12&ndash;14, 2018</p>
                    <p>More Information&rarr;</p>
                </a>
            </div>
            <div class="ca theme bg">
                <a href="/locations/california/">
                    <h2>California</h2>
                    <p class="info">June 14&ndash;16, 2018</p>
                    <p>More Information&rarr;</p>
                </a>
            </div>
            <div class="mo theme bg">
                <a href="/locations/missouri/">
                    <h2>Missouri</h2>
                    <p class="info">July 19&ndash;21, 2018</p>
                    <p>More Information&rarr;</p>
                </a>
            </div>
        </div>
    </section>
</section>
<section class="featured-speakers">
    <div class="wrap">
        <h2>Featured Speakers</h2>
        <?php echo do_shortcode( '[speaker_grid posts_per_page="15" show="image, name" image_size="150, 150"]' ); ?>
        <p><a class="button" href="<?php echo home_url(); ?>/speakers/">View All Featured Speakers&rarr;</a></p>
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
