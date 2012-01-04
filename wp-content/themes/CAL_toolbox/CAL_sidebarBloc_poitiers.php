<?php
    /**
     * User: Stan
     * Date: 03/01/12
     */
?>
<div id="blocPoitiers" class="CAL_bloc_sidebar">
    <h5>Bureau de Poitiers</h5>
    <?php
    $custom_fields = get_post_custom(144);
    echo $custom_fields['Adresse'][0];
    echo $custom_fields['CP'][0];
    echo $custom_fields['email'][0];
    echo $custom_fields['fax'][0];
    ?>
    <a href="#" class="CAL_bloc_sidebar_link">Voir la carte</a>
</div>
