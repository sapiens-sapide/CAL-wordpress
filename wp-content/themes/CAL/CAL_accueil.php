<?php
    /*
    Template Name: Accueil
    */
?>

<?php

    get_header(); ?>

<div id="primary">
    <div id="content" role="main">
        <div id="incipit">
            <?php
            $the_query = new WP_Query('page_id=48');
            while ($the_query->have_posts()) :
                $the_query->the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'twentyeleven') . '</span>',
                                                  'after'  => '</div>')); ?>
                    </div>
                </article>
                <?php endwhile; ?>
        </div>

        <div id="blocCentral" role="sidebar">
            <?php ////////////////////// bloc "le cabinet"
            $the_query = new WP_Query('page_id=23');
            while ($the_query->have_posts()) :
                $the_query->the_post(); ?>
                <aside id="post-<?php the_ID(); ?>" class="blocHome">
                    <div class="entry-content">
                        <h3>
                            <?php the_title('', '', true); ?>
                        </h3>
                        <?php
                        global $more;    // Declare global $more (before the loop).
                        $more = 0;       // Set to 0 to display content above the more tag, to 1 to display the whole content
                        the_content('En savoir plus sur notre cabinet');?>
                    </div>
                </aside>
                <?php endwhile; ?>
            <?php ////////////////////// bloc "Prestations"
            $the_query = new WP_Query('page_id=2');
            while ($the_query->have_posts()) :
                $the_query->the_post(); ?>
                <aside id="post-<?php the_ID(); ?>" class="blocHome">
                    <div class="entry-content">
                        <h3>
                            <?php the_title('', '', true); ?>
                        </h3>
                        <?php
                        global $more;    // Declare global $more (before the loop).
                        $more = 0;       // Set to 0 to display content above the more tag, to 1 to display the whole content
                        the_content('En savoir plus sur nos prestations');?>
                    </div>
                </aside>
                <?php endwhile; ?>
        </div>

        <div id="blocActu" role="sidebar">
            <aside id="actuHome" class="blocActu">
                <h2>ACTUALITÉS</h2>
                <?php //////////////////////// dernière actu de "agent commercial"
                $the_query = new WP_Query('cat=11', array ( 'orderby' => 'date', 'order' => 'DESC' ));
                    $the_query->the_post(); ?>
                    <section id="post-<?php the_ID(); ?>" class="sectionActu">
                        <div class="entry-content">
                            <h3>Agent Commercial</h3>
                            <h4>
                                <a href="<?php the_permalink() ?>"><?php the_title('', '', true); ?></a>
                            </h4>
                        </div>
                    </section>
                <?php //////////////////////// dernière actu de "Distribution et franchise"
                $the_query = new WP_Query('cat=12', array ( 'orderby' => 'date', 'order' => 'DESC' ));
                    $the_query->the_post(); ?>
                    <section id="post-<?php the_ID(); ?>" class="sectionActu">
                        <div class="entry-content">
                            <h3>Distribution et franchise</h3>
                            <h4>
                                <a href="<?php the_permalink() ?>"><?php the_title('', '', true); ?></a>
                            </h4>
                        </div>
                    </section>
                <?php //////////////////////// dernière actu de "Contrats commerciaux"
                $the_query = new WP_Query('cat=13', array ( 'orderby' => 'date', 'order' => 'DESC' ));
                    $the_query->the_post(); ?>
                    <section id="post-<?php the_ID(); ?>" class="sectionActu">
                        <div class="entry-content">
                            <h3>Contrats commerciaux</h3>
                            <h4>
                                <a href="<?php the_permalink() ?>"><?php the_title('', '', true); ?></a>
                            </h4>
                        </div>
                    </section>
            </aside>
        </div>

    </div>
    <!-- #content -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>