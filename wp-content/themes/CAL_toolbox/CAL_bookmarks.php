<?php

    /*
    Template Name: CAL_bookmarks
    */

    get_header(); ?>
CAL_BOOKMARKS.PHP

<?php CAL_get_leftNav(); ?>

<div id="primary">
    <div id="content" role="main">

        <?php

        $cat = get_cat_ID($category);
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 4; // -1 shows all posts
        $do_not_show_stickies = 1; // 0 to show stickies
        $args = array('post_type'      => 'publications',
                      'posts_per_page' => 5);
        $temp = $wp_query;  // assign orginal query to temp variable for later use
        $wp_query = null;
        $wp_query = new WP_Query($args);
        if (have_posts()) :
            while ($wp_query->have_posts()) : $wp_query->the_post();  ?>

                <?php get_template_part('content', 'page'); ?>

                <?php comments_template('', true); ?>

                <?php endwhile; // end of the loop. ?>
            <?php endif;

        $wp_query = $temp;  //reset back to original query
        ?>
    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php
    CAL_get_sidebar();
?>
<?php get_footer(); ?>