<?php

    /*
    Template Name: CAL_pageLettreInfo
    */

    get_header();
    CAL_get_leftNav();
?>
<div id="primary">
    <div id="content" role="main">

        <?php while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title">
                    Page de téléchargement des lettres d'infos </h1>

                <?php if ('post' == get_post_type()) : ?>
                <div class="entry-meta">
                    <?php toolbox_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php endif; ?>
            </header>
            <!-- .entry-header -->

            <?php if (is_search()) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
                <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'toolbox')); ?>
                <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'toolbox'),
                                          'after'  => '</div>')); ?>
                <?php
                $custom_fields = get_post_custom();
                echo $custom_fields['Adresse'][0];
                echo $custom_fields['CP'][0];
                echo $custom_fields['email'][0];
                echo $custom_fields['fax'][0];
                ?>
            </div><!-- .entry-content -->
            <?php endif; ?>

            <footer class="entry-meta">
                <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
                <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list(__(', ', 'toolbox'));
                if ($categories_list && toolbox_categorized_blog()) :
                    ?>
                    <span class="cat-links">
        				<?php printf(__('Posted in %1$s', 'toolbox'), $categories_list); ?>
        			</span>
                    <span class="sep"> | </span>
                    <?php endif; // End if categories ?>

                <?php
                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', __(', ', 'toolbox'));
                if ($tags_list) :
                    ?>
                    <span class="tag-links">
        				<?php printf(__('Tagged %1$s', 'toolbox'), $tags_list); ?>
        			</span>
                    <span class="sep"> | </span>
                    <?php endif; // End if $tags_list ?>
                <?php endif; // End if 'post' == get_post_type() ?>

                <?php if (comments_open() || ('0' != get_comments_number() && !comments_open())) : ?>
                <span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'toolbox'), __('1 Comment', 'toolbox'), __('% Comments', 'toolbox')); ?></span>
                <span class="sep"> | </span>
                <?php endif; ?>

                <?php edit_post_link(__('Edit', 'toolbox'), '<span class="edit-link">', '</span>'); ?>
            </footer>
            <!-- #entry-meta -->
        </div><!-- #post-<?php the_ID(); ?> -->


        <?php endwhile; // end of the loop. ?>

    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php
    CAL_get_sidebar();
?>
<?php get_footer(); ?>