<?php

// special circumstances
if ( is_singular( 'lending_expert' ) || is_singular( 'leadership' ) ) {

	if ( is_singular( 'leadership' ) )
		$post_type = get_post_type_object( 'leadership' );
	elseif ( is_singular( 'lending_expert' ) )
		$post_type = get_post_type_object( 'lending_expert' );

	$parent = get_page_by_path( $post_type->rewrite['slug'] );

	// use the parent's thumbnail instead
	if ( has_post_thumbnail( $parent->ID ) ) {
		?><div class="banner-image">
			<?php echo get_the_post_thumbnail( $parent->ID, 'product-banner' ); ?>
		</div><?php
	} else {
		?><div class="banner-image"></div><?php
	}

// normal circumstances
} else {

	if ( has_post_thumbnail() ) { ?>
		<div class="banner-image">
			<?php if ( get_field( 'banner_blurb' ) ) {
				the_post_thumbnail( 'landing-banner' ); ?>
				<div class="banner-blurb__wrap">
					<div class="banner-blurb"><?php the_field( 'banner_blurb' ); ?></div>
				</div>
			<?php } else {
				the_post_thumbnail( 'product-banner' );
			} ?>
		</div>
	<?php }

}