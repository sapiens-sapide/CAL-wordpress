<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
<nav class="leftNav">
    <?php
        if (is_page(2)) :
            wp_nav_menu( array( 'theme_location' => 'leftNav-prestations' ) );
        elseif (is_page(52)):
            wp_nav_menu( array( 'theme_location' => 'leftNav-actualites' ) );
        elseif (is_page(29)):
            wp_nav_menu( array( 'theme_location' => 'leftNav-clients' ) );
        elseif (is_page(23)):
            wp_nav_menu( array( 'theme_location' => 'leftNav-cabinet' ) );
        elseif (is_page(31)):
            wp_nav_menu( array( 'theme_location' => 'leftNav-ressources' ) );
        endif;
?>
</nav>
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); //hide comment area ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>