<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php
        while ( have_posts() ) : the_post();
            $convention_abbreviation = strtolower( get_field( 'convention_abbreviated_name' ) );
            ?>

            <div class="theme bg venue-date-info">
                <article class="wrap">
                    <div id="venue" class="venue">
                        <h2>Venue</h2>
                        <address>
                            <?php the_field( 'convention_center_name' ); ?><br/>
                            <?php the_field( 'address' ); ?><br/>
                            <?php the_field( 'city' ); ?>, <?php the_field( 'state' ); ?> <?php the_field( 'zip' ); ?>
                        </address>
                    </div>

                    <div id="dates" class="dates">
                        <h2>Dates</h2>
                        <p><?php echo ghc_format_date_range( get_field( 'begin_date' ), get_field( 'end_date' ), 'Ymd' ); ?></p>
                        <?php
                        if ( get_field( 'ics_file' ) ) {
                            echo '<p><a class="button" href="' . get_field( 'ics_file' ) . '">Add to my calendar&rarr;</a></p>';
                        }
                        ?>
                    </div>
                </article>
            </div>

            <div id="features" class="theme bg">
                <div class="wrap">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <?php
                                the_content();

                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->

                    <?php
                    if ( get_field( 'hours' ) ) {
                        echo '<article class="general-convention-hours">
                            <h2>General Convention Schedule</h2>
                            ' . get_field( 'hours' ) . '
                        </article>';
                    }

                    if ( get_field( 'featured_video' ) ) {
                        echo '<article class="featured-video">
                            ' . wp_oembed_get( get_field( 'featured_video' ) ) . '
                        </article>';
                    }
                    ?>
                </div>
            </div>

            <div class="cta theme bg">
                <div class="wrap">
                    <?php echo do_shortcode( '[convention_cta convention="' . $convention_abbreviation . '"]' ); ?>
                </div>
            </div>

            <div id="special-events" class="theme bg">
                <article class="wrap">
                    <h2>Special Events</h2>
                    <?php echo do_shortcode( '[special_event_grid convention="' . $convention_abbreviation . '" show="name,image,excerpt,bio" image_size="special-event-large"]' ); ?>
                </article>
            </div>

            <div class="cta theme bg">
                <div class="wrap">
                    <?php echo do_shortcode( '[convention_cta convention="' . $convention_abbreviation . '"]' ); ?>
                </div>
            </div>

            <div id="speakers" class="theme bg">
                <article class="wrap">
                    <h2>Featured Speakers</h2>
                    <?php echo do_shortcode( '[speaker_grid convention="' . $convention_abbreviation . '" show="name,image,bio" image_size="square-thumb"]' ); ?>
                </article>
            </div>

            <div class="cta theme bg">
                <div class="wrap">
                    <?php echo do_shortcode( '[convention_cta convention="' . $convention_abbreviation . '"]' ); ?>
                </div>
            </div>

            <div id="special-tracks" class="theme bg">
                <article class="wrap">
                    <h2>Special Tracks</h2>
                    <?php
                    $special_tracks_tax_args = array(
                        'taxonomy'              => 'ghc_special_tracks_taxonomy',
                    );
                    $special_tracks = get_categories( $special_tracks_tax_args );

                    if ( $special_tracks ) {
                        echo '<div class="special-track-container">';
                        foreach ( $special_tracks as $track ) {
                            echo '<article class="special-track ' . $track->slug . '">';
                            if ( get_field( 'featured_image', $track ) ) {
                                echo '<a class="track-link" href="' . get_term_link( $track ) . '">' . wp_get_attachment_image( get_field( 'featured_image', $track ), 'medium' ) . '</a>';
                            }
                            echo '<h3><a href="' . get_term_link( $track ) . '">' . $track->name . '</a></h3>';
                            if ( $track->description != '' ) {
                                echo wpautop( $track->description );
                                echo '<p><a href="' . get_term_link( $track ) . '" class="button">More Information&rarr;</a></p>';
                            }
                            echo '</article>';
                        }
                        echo '</div>';
                    } ?>
                </article>
            </div>

            <div class="cta theme bg">
                <div class="wrap">
                    <?php echo do_shortcode( '[convention_cta convention="' . $convention_abbreviation . '"]' ); ?>
                </div>
            </div>

            <div id="workshops" class="theme bg">
                <article class="wrap">
                    <h2>Workshops</h2>
                    <?php echo do_shortcode( '[workshop_list convention="' . $convention_abbreviation . '" posts_per_page="30"]' ); ?>
                </article>
            </div>

            <div class="cta theme bg">
                <div class="wrap">
                    <?php echo do_shortcode( '[convention_cta convention="' . $convention_abbreviation . '"]' ); ?>
                </div>
            </div>

            <div id="exhibitors" class="theme bg">
                <article class="wrap">
                    <h2>Exhibitors</h2>
                    <h3>Schedule</h3>
                    <ul>
                        <li><strong>Thursday</strong>: 6:00&ndash;9:00 PM&mdash;<strong>free</strong> shopping!</li>
                        <li><strong>Friday</strong>: 9:30 AM&ndash;8:30 PM</li>
                        <li><strong>Saturday</strong>: 9:30 AM&ndash;5:30 PM</li>
                    </ul>
                    <p>Shopping-only tickets are also available at the door; get more information here:</p>
                    <p><a class="button" href="<?php echo get_home_url(); ?>/shopping-ticket-information/">Shopping-Only Tickets&rarr;</a></p>
                    <?php echo do_shortcode( '[exhibitor_list style="list" convention="' . $convention_abbreviation . '"]' ); ?>
                </article>
            </div>

            <div class="cta theme bg">
                <div class="wrap">
                    <?php echo do_shortcode( '[convention_cta convention="' . $convention_abbreviation . '"]' ); ?>
                </div>
            </div>

            <div id="hotels" class="theme bg">
                <article class="wrap">
                    <h2>Discounted Hotels</h2>
                    <?php echo do_shortcode( '[hotel_grid convention="' . $convention_abbreviation . '"]' ); ?>
                </article>
            </div>

            <div class="cta theme bg">
                <div class="wrap">
                    <?php echo do_shortcode( '[convention_cta convention="' . $convention_abbreviation . '"]' ); ?>
                </div>
            </div>

        <?php
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
