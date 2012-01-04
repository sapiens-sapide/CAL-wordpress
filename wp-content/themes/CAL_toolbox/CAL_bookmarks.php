<?php

    /*
    Template Name: CAL_bookmarks
    */

    get_header(); ?>
CAL_BOOKMARKS.PHP

<?php CAL_get_leftNav(); ?>

<div id="primary">
    <div id="content" role="main">

        <?php wp_list_bookmarks('title_li=&category_before=&category_after='); ?>

    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php
    CAL_get_sidebar();
?>
<?php get_footer(); ?>