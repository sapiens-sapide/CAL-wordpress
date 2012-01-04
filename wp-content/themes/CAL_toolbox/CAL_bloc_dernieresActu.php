<?php
    /**
     * User: Stan
     * Date: 03/01/12
     */
?>

<?php //////////////////////// dernière actu de "agent commercial"
    $the_query = new WP_Query('cat=11', array('orderby' => 'date',
                                              'order'   => 'DESC'));
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
    $the_query = new WP_Query('cat=12', array('orderby' => 'date',
                                              'order'   => 'DESC'));
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
    $the_query = new WP_Query('cat=13', array('orderby' => 'date',
                                              'order'   => 'DESC'));
    $the_query->the_post(); ?>
<section id="post-<?php the_ID(); ?>" class="sectionActu">
    <div class="entry-content">
        <h3>Contrats commerciaux</h3>
        <h4>
            <a href="<?php the_permalink() ?>"><?php the_title('', '', true); ?></a>
        </h4>
    </div>
</section>