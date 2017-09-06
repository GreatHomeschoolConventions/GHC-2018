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

            <div class="wrap full venue-date-info">
                <div class="venue theme <?php echo $convention_abbreviation; ?> bg">
                    <h2>Venue</h2>
                    <address>
                        <?php the_field( 'convention_center_name' ); ?><br/>
                        <?php the_field( 'address' ); ?><br/>
                        <?php the_field( 'city' ); ?>, <?php the_field( 'state' ); ?> <?php the_field( 'zip' ); ?>
                    </address>
                </div>

                <div class="dates theme bg">
                    <h2>Dates</h2>
                    <p><?php echo ghc_format_date_range( get_field( 'begin_date' ), get_field( 'end_date' ), 'Ymd' ); ?></p>
                    <?php
                    if ( get_field( 'ics_file' ) ) {
                        echo '<p><a class="button" href="' . get_field( 'ics_file' ) . '">Add to my calendar&rarr;</a></p>';
                    }
                    ?>
                </div>
            </div>

            <div class="wrap full theme gray bg">
                <article>
                    <h2>Special Events</h2>
                    <?php echo do_shortcode( '[special_event_grid convention="' . $convention_abbreviation . '" show="name,image,excerpt" image_size="600, 300"]' ); ?>
                </article>
            </div>

            <div class="wrap full theme <?php echo $convention_abbreviation; ?> bg">
                <article>
                    <h2>Featured Speakers</h2>
                    <?php echo do_shortcode( '[speaker_grid convention="' . $convention_abbreviation . '" show="name,image"]' ); ?>
                </article>
            </div>

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
            </div><!-- .wrap -->

        <?php
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
