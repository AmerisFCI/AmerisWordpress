<?php
/**
 * The template used for displaying the banner image across the full page.
 */
?>

<div class="banner wide-banner <?php if ( ameris_has_banner_image() ) { ?>has-banner-image<?php } ?><?php if ( get_field( 'banner_blurb' ) ) { ?>has-blurb<?php } ?>">
    <?php get_template_part( 'template-parts/page', 'banner-image' ); ?>
</div>