<?php
/**
 * Output the banner. There's a lot of custom logic in here.
 */

// defaults - use current post and landing-style banner
$post_id     = null;
$prefix      = '';
$banner_size = 'landing-banner';

// maybe get something other than the current post
if ( is_singular( 'leadership' )
  || is_singular( 'lending_expert' )
  || is_singular( 'advisor' )
  || is_singular( 'warehouse_lender' ) ) {
	$post_type = get_post_type_object( get_post_type() );
	$parent    = get_page_by_path( $post_type->rewrite['slug'] );
	$post_id   = $parent->ID;
} elseif ( is_home() || is_category() ) {
	$post_id = get_option( 'page_for_posts' );
}

// maybe set the banner to the wide style
if ( is_page_template( 'page-templates/leadership-page.php' ) ||
	is_page_template( 'page-templates/about-us-page.php' ) ||
	is_page_template( 'page-templates/history-page.php' )  ||
	is_page_template( 'page-templates/wide-page.php' )  ||
	is_home() || 
	is_category() || 
	is_singular( 'leadership' ) ) {
	$prefix      = 'wide-';
	$banner_size = 'wide-banner';
}

// one extra tweak - if there's no banner_blurb, the landing-banner size
// should drop to product-banner -- only on product templates
if ( is_page_template( 'page-templates/product-page.php' ) ) {
	if ( $banner_size === 'landing-banner' && !get_field( 'banner_blurb', $post_id ) )
		$banner_size = 'product-banner';
}

if ( has_post_thumbnail( $post_id ) ) {
	$imgID = get_post_thumbnail_id($post_id); //get the id of the featured image
	$featuredImage = wp_get_attachment_image_src($imgID, $banner_size );//get the url of the featured image (returns an array)
	$imgURL = $featuredImage[0]; //get the url of the image out of the array
?>
	<div class="<?php echo $prefix; ?>banner-image">
		<div class="banner-background-image" style="background-image:url(<?php echo $imgURL ?>?chromecachebuster=banner);"></div>
		<?php
		//echo get_the_post_thumbnail( $post_id, $banner_size );
		if ( get_field( 'banner_blurb', $post_id ) ) { ?>
			<div class="<?php echo $prefix; ?>banner-blurb__wrap">
				<div class="<?php echo $prefix; ?>banner-blurb"><?php the_field( 'banner_blurb', $post_id ); ?></div>
			</div>
		<?php } ?>
	</div>
<?php } else {
	?><div class="<?php echo $prefix; ?>banner-image"></div><?php
}

wp_reset_postdata(); ?>