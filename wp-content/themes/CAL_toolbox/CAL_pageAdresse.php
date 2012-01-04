<?php

    /*
    Template Name: CAL_pageAdresse
    */

    get_header();
    CAL_get_leftNav();
?>
<div id="primary">
    <div id="content" role="main">

        <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('CAL_adresse_content', 'page'); ?>

        <?php endwhile; // end of the loop. ?>

    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php
    CAL_get_sidebar();
?>
<?php get_footer(); ?>