<?php
/**
 * Template Name: Landing Page
 *
 * The template for displaying custom landing pages
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();

if ( get_field( 'background_image' ) ) { ?>
	<style type="text/css">
		.site-content-contain {
			background-image: url('<?php the_field( 'background_image' ); ?>');
		}
	</style>
<?php
}

?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
the_post();
			?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php twentyseventeen_edit_link( get_the_ID() ); ?>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->

			<?php
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php

/**
 * Remove sidebars
 */
add_filter( 'is_active_sidebar', '__return_false' );

get_footer();
