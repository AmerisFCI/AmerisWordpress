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
		?><div class="wide-banner-image">
			<?php echo get_the_post_thumbnail( $parent->ID, 'wide-banner' ); ?>
			<?php if ( get_field( 'banner_blurb', $parent->ID ) ) { ?>
				<div class="wide-banner-blurb__wrap">
					<div class="wide-banner-blurb"><?php echo get_field( 'banner_blurb', $parent->ID ); ?></div>
				</div>
			<?php } ?>
		</div><?php
	} else {
		?><div class="wide-banner-image"></div><?php
	}

// normal circumstances
} else {

	$wide = is_page_template( 'page-templates/leadership-page.php' ) ||
		is_page_template( 'page-templates/about-page.php' ) ||
		is_page_template( 'page-templates/history-page.php' ) ||
		is_home();

	$prefix = $wide ? 'wide-' : '';

	if ( is_home() ) {
		$post_id = get_option( 'page_for_posts' );
	} else {
		$post_id = null; // will use global post
	}

	if ( has_post_thumbnail( $post_id ) ) { ?>
		<div class="<?php echo $prefix; ?>banner-image">
			<?php if ( get_field( 'banner_blurb', $post_id ) ) {
				if ( $wide )
					echo get_the_post_thumbnail( $post_id, 'wide-banner' );
				else
					echo get_the_post_thumbnail( $post_id, 'landing-banner' ); ?>
				<div class="<?php echo $prefix; ?>banner-blurb__wrap">
					<div class="<?php echo $prefix; ?>banner-blurb"><?php the_field( 'banner_blurb', $post_id ); ?></div>
				</div>
			<?php } else {
				if ( $wide )
					echo get_the_post_thumbnail( $post_id, 'wide-banner' );
				else
					echo get_the_post_thumbnail( $post_id, 'product-banner' );
			} ?>
		</div>
	<?php }

}