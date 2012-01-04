<?php
    /**
     * User: Stan
     * Date: 03/01/12
     */
?>
<div id="nuage" class="CAL_bloc_sidebar">
    <h5>Mots Clés</h5>
    <?php wp_tag_cloud(array(
    'smallest'  => 8,
    'largest'   => 8,
    'unit'      => 'pt',
    'number'    => 45,
    'format'    => 'flat',
    'separator' => "\n",
    'orderby'   => 'name',
    'order'     => 'ASC',
    'exclude'   => '',
    'include'   => '',
    'link'      => 'view',
    'taxonomy'  => 'post_tag',
    'echo'      => true
)); ?>
</div>
